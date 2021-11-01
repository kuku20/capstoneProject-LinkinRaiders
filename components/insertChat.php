
<?php
    session_start();
    error_reporting(0);
    if(!empty($_POST['message'])) {
        require "../vendor/autoload.php";
        include_once "../config.php";
        $collection = $client->datattu->chatLog;
        $document = $collection->insertOne([
            'userid' => $_SESSION['id'],
            'username' => $_SESSION['username'],
            'channel' => "group chat",
            'message' => $_POST['message'],
            'timestamp' =>  [
                'timestamp' => $_SESSION['timeStamp'],
                'year' => $_SESSION['year'],
                'month' => $_SESSION['month'],
                'date' => $_SESSION['date'],
                'hour' => $_SESSION['hour'],
                'minute' => $_SESSION['minute'],
                'second' => $_SESSION['second'],
            ],
        ]);
    }

?>


