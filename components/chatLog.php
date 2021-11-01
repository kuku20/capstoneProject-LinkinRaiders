<?php
    function checkImg() {
        if ($_SESSION['image']!=null) { 
            echo '<img class="userPhoto" alt="user icon" src="data:jpeg;base64,';
            echo base64_encode($_SESSION['image']->cover->getData());
            echo'" />';}
            else{
                echo '<img class="userPhoto" src="../assets/profile_img.png" />';
            }
    }
?>
<?php
    require ('../vendor/autoload.php');
    include_once ("../config.php");
    session_start();
    error_reporting(0);

    if(isset($_SESSION['id'])) {
        $output = "";
        // retrieve chat log data
        $collection = $client->datattu->chatLog;
        $log = $collection->find(
            [], [
            //'limit' => 20,
            'sort' => [
                '_id' => -1, 
                //'timestamp'['timestamp'] => -1,
            ],
        ]);
        // $collection2 = $client->datattu->ttu;
        // $profile_img = $collection2->find(
        //     [

        //     ]
        // );
        // if chat log history exist
        if(!$log->isDead()) {
            foreach($log as $msg) {
                if($msg['userid'] == $_SESSION['id']) {    // displaying self message
                    $output =   '<div class="message-row you-message">
					                <div class="message-content">
						                <div class="message-text">' . $msg['message'] . '</div>
						                <div class="message-time">' . 
                                        $msg['timestamp']['year'] . '/'. $msg['timestamp']['month'] . '/' . $msg['timestamp']['date'] .
                                    	' '. $msg['timestamp']['hour'] .':'. $msg['timestamp']['minute']
                                        . '</div>
					                </div>                
				                </div>';
                } else {    // displaying others message
                    $output =   '<div class="message-row other-message">
					                <div class="message-content">
						                <?php checkImg(); ?>
						                <div class="message-text">
							                ' . $msg['message'] . '
						                </div>
						                <div class="message-time">' . 
                                        $msg['timestamp']['year'] . '/'. $msg['timestamp']['month'] . '/' . $msg['timestamp']['date'] .
                                    	' '. $msg['timestamp']['hour'] .':'. $msg['timestamp']['minute']
                                        . '</div>
					                </div>
				                </div>';
                }
                echo $output;
			}
        } else {
            // no chat log retrieved
        }
    } else {
        header("../index.php");
    }

?>
