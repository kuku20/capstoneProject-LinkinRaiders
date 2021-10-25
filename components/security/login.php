<?php 
	function function_alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');</script>";
	}
// login==========================
	require ('vendor/autoload.php');
	require ('config.php');
	// $client = new MongoDB\Client('mongodb+srv://data2u:i8AohiQaOzxPEpIc@data2u.f9hzo.mongodb.net/datattu');
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

          	$_SESSION['image'] = $document['image'];
          	// $_SESSION['google_require']=$document['google_require'];
          	
          	if ($document['google_require']==false){
          		$_SESSION['logined']='accepted';
          		header("Location: module/homepage.php");
          	}else{
          		$_SESSION['secret'] = $document['google_secret'];
          		header("Location: components/security/validated_google_auth.php");
          	}
			
		} 
		else{
		function_alert("Wrong Password or Username!!!!");
		}
	}
		
 ?>

 