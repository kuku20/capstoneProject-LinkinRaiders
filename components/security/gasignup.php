<?php
require ('../../vendor/autoload.php');
require_once ('../../config.php');
// require_once ('../sessionc.php');
session_start();
$g = new \Google\Authenticator\GoogleAuthenticator();
if (isset($_POST['user_code'])) {
    $check_this_code = $_POST['code'];
    $secret = $_SESSION['secret'];
    // $check_secret = 'secret in database user';
    echo $_SESSION['username'];
    echo $_SESSION['secret'];
    if ($g->checkCode($secret, $check_this_code)) {
        echo 'Success!';
        // add to data user update user
        $collection = $client->datattu->ttu;
        // $collection->drop();
        // $collection->insertOne(['name' => 'Bob', 'state' => 'ny']);
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_secret' => $_SESSION['secret']]],
        );
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_require' => true]],
        );
        $_SESSION['google_require']==true;
        $_SESSION['logined']='accepted';
        header("Location: ../../module/homepage.php");
    } else {
        header("Location: validated_google_auth.php");
      echo 'Invalid login';
    }
}
?>