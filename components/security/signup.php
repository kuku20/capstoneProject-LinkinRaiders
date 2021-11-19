<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="css/signup_signin.css"> -->
</head>
<body>	
</body>
</html>

<?php 

	 // require_once ('../../config.php');
	session_start();
	$username = "";
	$password = "";
	$email = "";
	$errors = array(); 
	//for new account data check
	
	if(isset($_POST['user_signup'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password1'];
		$password_2 = $_POST['password2'];
 		$collection = $client->datattu->ttu;
 		$checkExistUser = $collection->findOne(['username' => $username]);
 		if($checkExistUser){
 			// array_push($errors, "Username alrady exists, Try Login!");
 			echo '<script type="text/javascript">';
			echo ' alert("Username alrady exists, Try Login!")';  //not showing an alert box.
			echo '</script>';
 		}else {
 			if (empty($username)) { array_push($errors, "Username is required."); }
			if (empty($email)) { array_push($errors, "Email is required."); }
			if (empty($password_1)) { array_push($errors, "Password is required."); }
			if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match.");
				}else{
					// Validate password strength
					$uppercase 	  = preg_match('@[A-Z]@', $password_1);
					$lowercase 	  = preg_match('@[a-z]@', $password_1);
					$number    	  = preg_match('@[0-9]@', $password_1);
					$specialChars = preg_match('@[^\w]@', $password_1);
					if (empty($uppercase)) { array_push($errors, "Password should include at least one upper case letter."); }
					if (empty($lowercase)) { array_push($errors, "Password should include at least one lower case letter."); }
					if (empty($number)) { array_push($errors, "Password should include at least one number."); }
					if (empty($specialChars)) { array_push($errors, "Password should include at least one special letter."); }
				}
			if(count($errors)==0){
 			
			$passhash = password_hash($password_1, PASSWORD_DEFAULT);
			$_SESSION['username'] = $username;
			$insertOneResult = $collection->insertOne([
    		'username' 	=> $username,
    		'name'		=> 'none',
    		'email' 	=> $email,
    		'gender'	=> 'none',
    		'role'		=> 'user',
    		'password' => $passhash,
    		'google_secret'=>' ',
    		'image'=>null,
    		'google_require' => false,
			]);
			// logined
			$getnewuser = $collection->findOne(['username' => $username]);
			$_SESSION['id']=$getnewuser['_id'];
			$_SESSION['role']=$getnewuser['role'];
			echo '<script type="text/javascript">';
			echo ' alert("Create success!!")'; 
			echo '</script>';
			// offer 2fa or do later
		 	echo '<script type="text/javascript"> ';  
			// echo ' function openulr(newurl) {';  
		    echo '  if (confirm("DO YOU WANT TO ADD GOOGLE AUTHENTICATOR TO YOUR ACCOUNT?")) {';  
		    	echo '    location.href = "components/security/comfirm_google_auth.php";';  
		    echo '  }'; 
		    echo 'else{'; 
		    	$_SESSION['logined']='accepted';
		    	// $_SESSION['google_require']=$getnewuser['google_require'];;
		    	echo '    location.href = "module/homepage.php";';
		    echo '}';  
		    echo '</script>'; 
			
			
			
 		}
 		}
 		
			
		// <a href="components/security/login.php">
			// header('location: index.php');
		
	}


 ?>


<script>
// $(document).ready(function () {
//     $("#btnPopup").click(function () {
//         $("#signUpPopup").show();
//     });
//     // click to X to close the pop up
//     $("#closeform").click(function(){
//     	$("#signUpPopup").hide();
//     });
//     $('#signmeup').click(function(){
//     	$('#signUpPopup').show();
//     });
// });
</script>