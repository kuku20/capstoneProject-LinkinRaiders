<?php
require ('../../vendor/autoload.php'); 
require_once ('../../config.php');

session_start();

$g = new \Google\Authenticator\GoogleAuthenticator();

if (isset($_POST['user_code'])) {
	$check_this_code = $_POST['code'];
	if ($g->checkCode($_SESSION['secret'], $check_this_code)) {
		$collection = $client->datattu->ttu;
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_secret' => $_SESSION['secret']]],
        );
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_require' => true]],
        );
        $_SESSION['google_require']=true;
        $_SESSION['logined']='accepted';
	  header("Location: ../../module/homepage.php");
	} else {
	  echo 'Invalid login';
	}
}

?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="login">
    <form action="validated_google_auth.php" method="post">
        <h2>QR Code</h2>
        <p><?php $_SESSION['google_require'] ?></p>
        <input type="text" name="code" placeholder="QR code" required="">
        <button class="loginbtn" type="submit" name="user_code">Validate</button>  
    </form>
</div>

</body>
</html>