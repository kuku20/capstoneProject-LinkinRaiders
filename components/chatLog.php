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
                '_id' => 1, 
                //'timestamp'['timestamp'] => -1,
            ],
        ]);
        // if chat log history exist
        if(!$log->isDead()) {
            foreach($log as $msg) {
                if($msg['userid'] == $_SESSION['id']) {    // displaying self message
                    $output = '<div class="detail">
                                '. $msg['message'] .' &emsp; sent by 
                                '. $msg['username'] .'
                            </div>';
                } else {    // displaying others message
                    $output = '<div class="detail">
                                Sent from '. $msg['username'] .' &emsp;
                                '. $msg['message'] .'
                            </div>';
                }
                echo $output;
			}
        } else {
            $output = '<div class="detail">
                            <div class="detail">Currently nobody is chatting</div>
                        </div>';
        }
    } else {
        header("../index.php");
    }

?>