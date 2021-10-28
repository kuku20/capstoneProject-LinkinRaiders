<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');

	$collection = $client->datattu->ttu;
	$document = $collection->findOne(['username' => $_SESSION['username']]);


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile Update</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 <body>
	 <div>
	 	<form id="" action="updateProfile.php" method="post" enctype="multipart/form-data">
            <label for= "name"> Name:</label>
            <input type="text" name="name" placeholder="Current name : <?php echo $document['name'] ?>"><br>
            <label for= "email">Email:</label>
            <input type="email" name="email" placeholder="Email"><br>

            <label for="gender">Choose a gender:</label>
			<select name="gender">
				<option ><?php echo $document['gender']  ?></option>
				<option value="Female">Male</option>
				<option value="Female">Female</option>
			</select>
  
			<br><br>
			<label for = "password1">Your new password: </label>
            <input type="password" name="password1" placeholder="New password"> <br>
            <label for = "password2">Repeat password:</label>
            <input type="password" name="password2" placeholder="Repeat-new password"> <br>
            <label for="cover">Your profile image:</label>
            <input type="file" name="cover" >
            <br><br>
            <button id="" class="" type="submit" name="user_update_profile" >UPDATE</button>
        </form>
        <a href = "../../module/usersetting.php">Back</a>
        <br><br>
        <button onclick = "myfunction()">DELETE</button> 
	 </div>
 </body>
 </html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<!-- for delete the account-- send data to deleteaccount.php to clear database -->
<script type = "text/javascript">  
function myfunction() {  
	if (confirm("DO YOU WANT TO DELETE YOUR ACCOUNT?")) {
		alert("DELETE, SEE YOUR LATER!!!!");
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
		location.replace("../../index.php");
	}else{alert("YOUR CANCEL IT!!!");}}
</script>

<!-- update user information -->
 <?php 
	if (isset($_POST['user_update_profile'])) {
		$userupdate = $client->datattu->ttu;
		// update image
	 	if(isset( $_FILES["cover"] ) && !empty( $_FILES["cover"]["name"] )){
			$questionCover = $_FILES["cover"];
			$image_data = array( 
				"type" => "MCQ",
		      	"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),);
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['image'	=> $image_data]],
		    );
		}
		// update name
		if(!empty( $_POST['name'])){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['name'	=> $_POST['name']]],
		    );
		}
		// update email
		if(!empty( $_POST['email'] )){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['email'	=> $_POST['email']]],
		    );
		}
		// update gender
		if(!empty( $_POST['gender'] )){
			$userupdate->updateOne(
		        ['username' => $_SESSION['username']],
		        ['$set' 	=> ['gender'	=> $_POST['gender']]],
		    );
		}

	}
?>
<!-- prevent upload when refesh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>