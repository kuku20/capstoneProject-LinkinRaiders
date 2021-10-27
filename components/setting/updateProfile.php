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
 </head>
 <body>
	 <div>
	 	<form id="" action="updateProfile.php" method="post" enctype="multipart/form-data">
            <!-- <h1 id="closeform">X</h1>
            <h2>Sign Up </h2>
            <p>It's quick and easy.</p> -->
            <label for= "name"> Name:</label>
            <input type="text" name="name" placeholder="Current name : <?php echo $document['name'] ?>"><br>
            <label for= "email">Email:</label>
            <input type="email" name="email" placeholder="Email"><br>

            <label for="gender">Choose a gender:</label>
			<select name="gender">
				<option ><?php echo $document['gender']  ?></option>
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
        <!-- <form action="updateProfile.php" method="post" enctype="multipart/form-data">
        	<input type="submit" name="submit" value ="DELETE" onclick="deletefuntion()">
        </form> -->
        <!-- <button onclick = "myfunction()">DELETE</button> -->
        <input type = "button" onclick = "myfunction()" value = "Display">  
	 </div>
 </body>
 </html>
  <?php
	function php_func(){
		$collection->deleteOne(['username' => $_SESSION['username']]);
		session_destroy();
		session_unset();

		header('Location: https://www.youtube.com/watch?v=0UmfPohDH3I');
	}
?>
 <script type = "text/javascript">  
function myfunction() {  
	var result ="<?php echo php_func(); ?>";
	 

	if (confirm("DO YOU WANT TO ADD GOOGLE AUTHENTICATOR TO YOUR ACCOUNT?")) {
	
	alert("DELETE, SEE YOUR LATER!!!!");
}else{alert("YOUR CANCEL IT!!!");}}

</script>

<!-- <script type="text/javascript">
	function myfunction() {   
		alert("how are you");  
    }  
	function clickMe(){
		if (confirm("DO YOU WANT TO ADD GOOGLE AUTHENTICATOR TO YOUR ACCOUNT?")) {
			alert("DELETE, SEE YOUR LATER!!!!");
			// var result ="<?php php_func(); ?>"
			document.write(result);
		}else{
			alert("YOUR CANCEL IT!!!")
		}
		
	}
</script> -->


<?php  

	// if(isset($_POST['submit'])){
	// 	$collection->deleteOne(['username' => $_SESSION['username']]);
	// 	session_destroy();
	// 	session_unset();
		
	// 	header('Location: https://www.youtube.com/watch?v=0UmfPohDH3I');
	// }
?>




 <?php 
 // if(isset( $_FILES["image"] )){
// 		$questionCover = $_FILES["cover"];
// 		$image_data = array( 
// 			"type" => "MCQ",
// 	      	"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),);
// 		$collection->updateOne(
// 	        ['username' => $_SESSION['username']],
// 	        ['$set' => ['image'		=> $image_data]],
// 	    );
// 	}
// if (isset($_POST['user_update_profile'])) {
// 	$_POST['name'];
// 	$questionCover = $_FILES["cover"];
// 	$image_data = array( 
// 		"type" => "MCQ",
//       	"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),);
// 	$collection = $client->datattu->ttu;
//     $collection->updateOne(
//         ['username' => $_SESSION['username']],
//         ['$set' => ['name' 		=> $_POST['Name'],
//         			'email' 	=> 'new',
//     				'gender'	=> $_POST['gender'],
//     				'role'		=> 'Admin',
//     				'image'		=> $image_data,
//     				]],
//     );
// }
if (isset($_POST['user_update_profile'])) {
	$userupdate = $client->datattu->ttu;
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
	if(!empty( $_POST['name'])){
		$userupdate->updateOne(
	        ['username' => $_SESSION['username']],
	        ['$set' 	=> ['name'	=> $_POST['name']]],
	    );
	}
	if(!empty( $_POST['email'] )){
		$userupdate->updateOne(
	        ['username' => $_SESSION['username']],
	        ['$set' 	=> ['email'	=> $_POST['email']]],
	    );
	}
	if(!empty( $_POST['gender'] )){
		$userupdate->updateOne(
	        ['username' => $_SESSION['username']],
	        ['$set' 	=> ['gender'	=> $_POST['gender']]],
	    );
	}

}


  ?>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>