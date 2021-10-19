<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup_signin.css">
</head>
<body>
	<button id="btnPopup">CREATE ACCOUNT</button>
	
	<div id="signUpPopup">
		<form id="showForm" method="post">
			<h1 id="closeform">X</h1>
			<h2>Sign Up	</h2>
			<p>It's quick and easy.</p>
 			<input type="text" name="username" placeholder="Username" required="true">
 			<input type="email" name="email" placeholder="Email">
 			<input type="password" name="password1" placeholder="Password" required="true">
 			<input type="password" name="password2" placeholder="Repeat-Password" required="true">
 			<br>
			<button id="signmeup" class="SignUpBtn" type="submit" name="user_signup">Sign Up</button>
		</form>
	</div>
	<!-- <div id="signUpSuccess">
		<h1>SUCCESS TO SIGN UP</h1>
	</div> -->
	
</body>
</html>

<?php 
	 // require_once ('../../config.php');

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
		// by adding (array_push()) corresponding error unto $errors array
		// by adding (array_push()) corresponding error unto $errors array
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
		}

 		$collection = $client->datattu->ttu;
 		$checkExistUser = $collection->findOne(['username' => $username]);
 		if($checkExistUser){
 			array_push($errors, "Username alrady exists, Try Login!");
 			echo '<script type="text/javascript">';
			echo ' alert("Username alrady exists, Try Login!")';  //not showing an alert box.
			echo '</script>';
 		}
 		if(count($errors)==0){
 		// 	echo '<script type="text/javascript">';
			// echo  $error;  //not showing an alert box.
			// echo '</script>';
 			echo '<script type="text/javascript">';
			echo ' alert("Create success!!")';  //not showing an alert box.
			echo '</script>';
			$pass = md5($password_1);

			$insertOneResult = $collection->insertOne([
    		'username' => $username,
    		'email' => $email,
    		'password' => $password_1,
			]);
 		}else{
 			echo '<script type="text/javascript">';
			echo  $error;  //not showing an alert box.
			echo '</script>';
 		}




 		
 			
			
		// <a href="components/security/login.php">
			// header('location: index.php');
		
	}


 ?>
<?php if (count($errors) > 0) : ?>
  <div class="message error validation_errors" >
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php endif ?>
<script>
$(document).ready(function () {
    $("#btnPopup").click(function () {
        $("#signUpPopup").show();
    });
    // click to X to close the pop up
    $("#closeform").click(function(){
    	$("#signUpPopup").hide();
    });
    $('#signmeup').click(function(){
    	$('#signUpPopup').show();
    });
});
</script>
