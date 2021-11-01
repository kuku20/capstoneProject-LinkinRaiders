<?php
    session_start();
    error_reporting(0);

    $_SESSION['timeStamp'] = $_POST['timestamp'];
    $_SESSION['year'] = $_POST['timestamp_year'];
    $_SESSION['month'] = $_POST['timestamp_month'];
    $_SESSION['date'] = $_POST['timestamp_date'];
    $_SESSION['hour'] = $_POST['timestamp_hour'];
    $_SESSION['minute'] = $_POST['timestamp_minute'];
    $_SESSION['second'] = $_POST['timestamp_second'];
?>