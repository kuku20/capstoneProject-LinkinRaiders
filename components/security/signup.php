
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
		<form id="showForm" method="post" action="signup.php">
			<h1 id="closeform">X</h1>
			<h2>Sign Up	</h2>
			<p>It's quick and easy.</p>
 			<input type="text" name="username" placeholder="Username" required="true">
 			<input type="email" name="email" placeholder="Email">
 			<input type="password" name="password" placeholder="Password" required="true">
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
	require_once ('config.php');
	$username = "";
	$password = "";
	$email = "";
	//for new account data check
	if(isset($_POST['user_signup'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
 		$collection = $client->datattu->ttu;
 		$checkExistUser = $collection->findOne(['username' => $username]);
 		if($checkExistUser){
 			echo "Username alrady exists, Try new one!";
 		}else{
		$insertOneResult = $collection->insertOne([
    		'username' => $username,
    		'email' => $email,
    		'password' => $password,
		]);
		header('location: index.php');}
	}


 ?>

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