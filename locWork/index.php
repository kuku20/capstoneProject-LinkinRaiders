<?php 

require_once ('config.php');
require_once ('signup.php');
 ?>
 <?php
session_start();
if($_GET["logout"]== 1 AND $_SESSION['id']) {
    session_destroy();
    $message = "You have been logged out. Have a nice day!";
    header('location: index.php');

}
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>LinkinRaiders</title>
 	<!-- Google Fonts  -->
 	<link rel="stylesheet" type="text/css" href="">

 	<div>
 		<div class="login">
 			<form action="index.php" method="post">
 				<h2>Login</h2>
 				<input type="text" name="username" placeholder="Username">
 				<input type="password" name="password" placeholder="Password">
 				<button class="loginbtn" type="submit" name="user_login">Sign In</button>	
 			</form>
 		</div>
 	</div>
 </head>
 <body>
 
 </body>
 </html>
<!--  //login user -->
<?php 
// login
 	$username = "";
	$password    = "";
	if (isset($_POST['user_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$collection = $client->datattu->ttu;
		$document = $collection->findOne(['username' => $username]);
		if($document['password']==$password ){
			// get user to mainpage
			$_SESSION['id']=$document['_id'];
          	$_SESSION['username'] = $username;
          	$_SESSION['success'] = "You are now logged in";
			header("Location: ../web/vinWork/homepage.php");
		} 
	}
		
 ?>