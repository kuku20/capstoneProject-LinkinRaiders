<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup_signin.css">
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

		$questionCover = $_FILES["cover"];
		$image_data = array( 
		"type" => "MCQ",
      	"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
  			); 
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
 			
			$pass = md5($password_1);
			$_SESSION['username'] = $username;
			$insertOneResult = $collection->insertOne([
    		'username' 	=> $username,
    		'name'		=> '',
    		'email' 	=> $email,
    		'gender'	=> '',
    		'role'		=> '',
    		'password' => $password_1,
    		'google_secret'=>' ',
    		'image'=>$image_data,
			]);
			// logined
			$getnewuser = $collection->findOne(['username' => $username]);
			$_SESSION['id']=$getnewuser['_id'];
			$_SESSION['image'] = $getnewuser['image'];
			echo '<script type="text/javascript">';
			echo ' alert("Create success!!")'; 
			echo '</script>';
			// offer 2fa or do later
		 	echo '<script type="text/javascript"> ';  
			// echo ' function openulr(newurl) {';  
		    echo '  if (confirm("DO YOU WANT TO ADD GOOGLE AUTHENTICATOR TO YOUR ACCOUNT?")) {';  
		    echo '    location.href = "components/security/comfirm_google_auth.php";';  
		    // echo '    header("Location: module/homepage.php");';  
		    echo '  }'; 
		    echo 'else{'; 
		    	$_SESSION['google_require']='accepted';
		    // echo '    location.href = "module/homepage.php";';
		    echo '    location.href = "module/homepage.php";';
		    echo '}';  
		    echo '</script>'; 
			
			
			
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