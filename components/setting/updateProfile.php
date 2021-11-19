<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../sessionc.php');
  	require('sidebar.php');


	$collection = $client->datattu->ttu;
	$document = $collection->findOne(['username' => $_SESSION['username']]);
	function function_alert($msg) {
    	echo "<script type='text/javascript'>alert('$msg');</script>";
	}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile Update</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="../../css/updateProfile.css">
 </head>
 <body>
<div class="home_content">
	<div class="form-box">
		<form id="updatesetting" class="input-group" action="updateProfile.php" method="post" enctype="multipart/form-data">
			<label for= "name"> Name:</label>
            <input class="input-field" type="text" name="name" placeholder="new name" autocomplete="off"><br>

            <label for= "email">Email:</label>
            <input class="input-field" type="email" name="email" placeholder="new email" autocomplete="off"><br>

			<label for="gender">Choose a gender:</label>
			<input class="input-field" list="genders" name="gender" id="gender" placeholder="new gender">
			<datalist id="genders">
				<option value="Female">
				<option value="Male">
				<option value="Unknown">
			</datalist>

			<label for = "password1">Your new password: </label>
			<input type="password" class="input-field" placeholder="New Password" name = "password1" autocomplete="off">
			

			<label for = "password2" autocomplete="off">Repeat password:</label>
			<input type="password" class="input-field" placeholder="Repeat Password" name = "password2" autocomplete="off">
			
		

			<label for="cover">Your profile image:</label>
            <input class="input-file" type="file" name="cover" ><br>

			<button type="submit" class="update-btn" name="user_update_profile">Update</button><br>

			<button onclick = "myfunction()" id="delete-ac" >DELETE ACCOUNT</button><br>
			
		</form>
		<a class="" href = "../../module/usersetting.php">GO BACK TO SETTING</a>
			<!-- <button  type="submit" ></button> -->
	</div>
</div>
 </body>
 </html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<!-- for delete the account-- send data to deleteaccount.php to clear database -->
<script type = "text/javascript">  
function myfunction() {  
	if (confirm("DO YOU WANT TO DELETE YOUR ACCOUNT?")) {
		alert("DELETED, SEE YOUR LATER!!!!");
		let deleteyes = "delete";
			
		$(document).ready(function(){
			$.ajax({
				type: "GET",
				url: "deleteaccount.php",
				data: {
					delete: deleteyes,
					trash: "deleteyes",
					},
				success: function(result) {
            	window.console.log('Successful');
        		}
			});
		});
		// parent.location="../components/setting/updateQR.php";
		location.reload();
		location.replace("../../index.php");
	}else{
		location.reload();
		alert("YOUR CANCEL IT!!!");}}
</script>

<!-- update user information -->
 <?php 
	if (isset($_POST['user_update_profile'])) {
		$userupdate = $client->datattu->ttu;
		// update image
	 	if(isset( $_FILES["cover"] ) && !empty( $_FILES["cover"]["name"] )){
	 		$img_name = $_FILES["cover"]["name"];
	 		$img_explode = explode('.', $img_name);
	 		$img_ext = end($img_explode);
	 		$extenstions = ['png','jpeg','jpg'];
	 		if(in_array($img_ext, $extenstions) === true){
	 			$questionCover = $_FILES["cover"];
				$image_data = array( 
					"type" => "MCQ",
			      	"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),);
				$userupdate->updateOne(
			        ['username' => $_SESSION['username']],
			        ['$set' 	=> ['image'	=> $image_data]],
			    );
			    function_alert("Profile update successfully!!!");
	 		}else{
	 			function_alert("Please select an Image file - jpeg, jpg, png!");
	 		}	
		}
		// update name
		if(!empty( $_POST['name'])){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['name'	=> $_POST['name']]],
		    );
		    function_alert("Name update successfully!!!");

		}
		// update email
		if(!empty( $_POST['email'] )){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['email'	=> $_POST['email']]],
		    );
		    function_alert("Email update successfully!!!");
		}
		// update gender
		if(!empty( $_POST['gender'] )){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['gender'	=> $_POST['gender']]],
		    );
		    function_alert("Gender update successfully!!!");
		}

	}
?>
<!-- prevent upload when refesh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
