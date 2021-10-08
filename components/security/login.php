<?php 
// login
	require ('vendor/autoload.php');
 	$username = "";
	$password    = "";
	$client = new MongoDB\Client('mongodb+srv://data2u:6iCNVznyS9xm2VXU@data2u.f9hzo.mongodb.net/datattu');
	if (isset($_POST['user_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo $username;
		$collection = $client->datattu->ttu;
		$document = $collection->findOne(['username' => $username]);
		if($document['password']==$password ){
			// get user to mainpage
			$_SESSION['id']=$document['_id'];
          	$_SESSION['username'] = $username;
          	$_SESSION['success'] = "You are now logged in";
			header("Location: module/homepage.php");
		} 
	}
		
 ?>