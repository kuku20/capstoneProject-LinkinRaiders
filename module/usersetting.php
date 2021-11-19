<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');
$collection = $client->datattu->ttu;
$document = $collection->findOne(['username' => $_SESSION['username']]);
// call here to prevent refesh data
$_SESSION['google_require']=$document['google_require'];
$_SESSION['secret'] = $document['google_secret'];
$_SESSION['image'] = $document['image'];
$_SESSION['pagecomfirm'] = "thepagecomfirm";
$_SESSION['pagevalidated'] = "thepagevalidated";
 ?>
<?php 	
require('../components/inc/head.php');
require('../components/inc/sideBar.php');
require('../components/inc/footer.php'); 
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/usersetting.css">
<div class="home_content">
	<h1 class="text">Profile <a href="../components/setting/updateProfile.php">Edit</a></h1> 
	<div id = "imageprofile">
		<?php
		if ($_SESSION['image']!=null) { 
			echo '<img class="avatar" src="data:jpeg;base64,';
			echo base64_encode($_SESSION['image']->cover->getData());
			echo'" />';}
			else{
				echo '<img class="avatar" src="../assets/userdefault.jpg" />';
			}
		?>

	</div>
	<h1 class="text">Username: <?php echo $_SESSION['username'] ?></h1>
	<h1 class="text">Name: <?php echo $document['name'] ?></h1>
	<h1 class="text">Email: <?php echo $document['email'] ?></h1>
	<h1 class="text">Gender: <?php echo $document['gender'] ?></h1>
	<h1 class="text">Role: <?php echo $document['role'] ?></h1>

    <!-- <h1 class="text">PassWord: update</h1> -->
    <div class="text">
    	2FA :
		<?php  
			if ($_SESSION['google_require']==true) { 
				echo 'Enabled';}
				else{
					echo 'Unenabled';
				}
		?>
		<button id = "myQR" onClick="parent.location='../components/setting/updateQR.php'">CHANGE</button>

		<?php 
			if($_SESSION['secret'] != " "){
				echo '<a href="../components/security/comfirm_google_auth.php">UPDATE QR</a>';
			}
		 ?>
		 <!-- <a href="../components/security/comfirm_google_auth.php">UPDATE QR</a> -->
	</div>
    <!-- <h1 class="text"><a href="">DELETE ACCOUNT</a></h1> -->
	
    
     

<!-- when click to the button change
it will call this function to change the google_require
then go to test.php -->
<script >
	//let boolVal = "<?php //echo $_SESSION['google_require'] ?>";
	let BtnEle = document.querySelector("#myQR");
	BtnEle.addEventListener("click", () => {
		"<?php $_SESSION['google_require'] = !$_SESSION['google_require'] ?>";
	});
</script>


