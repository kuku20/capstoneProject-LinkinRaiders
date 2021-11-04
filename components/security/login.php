<?php 
require ('google_code_encrypt_decrypt.php');
	function function_alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');</script>";
	}
// login==========================
	require ('vendor/autoload.php');
	require ('config.php');
	$username = "";
	$password    = "";
	if (isset($_POST['user_login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$collection = $client->datattu->ttu;
		$document = $collection->findOne(['username' => $username]);
		if(password_verify($password, $document['password'])){
			// get user to mainpage
			$_SESSION['id']=$document['_id'];
          	$_SESSION['username'] = $username;
          	$_SESSION['success'] = "You are now logged in";

          	$_SESSION['image'] = $document['image'];
          	// admin page
          	$_SESSION['google_require']=$document['google_require'];
          	$_SESSION['role']=$document['role'];       	
          	if($document['google_require']==false){
          		$_SESSION['logined']='accepted';
          		if($_SESSION['role']=='admin'){
          			header("Location: module/adminhomepage.php");
          		}
          		elseif($_SESSION['role']=='moderator'){
          			header("Location: module/moderatorhp.php");
          		}else{
          			header("Location: module/homepage.php");
          		}	
          	}else{
          		// decrypt the database to original for gg to read
          		$_SESSION['secret'] = encrypt_decrypt($document['google_secret'],$_SESSION['id'],'decrypt');
          		header("Location: components/security/validated_google_auth.php");
          	}
          	
			
		} 
		else{
		function_alert("Wrong Password or Username!!!!");
		}
	}
		
 ?>

 