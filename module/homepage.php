<?php 
	require ('../vendor/autoload.php');
 	session_start();
 	$client = new MongoDB\Client('mongodb+srv://vin:PkWCp8BvSFNWNQ4e@data2u.f9hzo.mongodb.net/datattu');
	
	error_reporting(0);
	if (!isset($_SESSION['username'])) {
	  	$_SESSION['msg'] = "You must log in first";
	  	header('location: ../index.php');
	}
	if ($_GET["logout"]== 1 AND $_SESSION['id']) {
		session_unset();
		session_destroy();
	    header('location: ../index.php');
	}
	if (isset($_GET['logout'])) {
		session_unset();
	    session_destroy();
	    unset($_SESSION['username']);
	    header("location: ../index.php");
	}
 ?>

<?php require('../components/inc/head.php'); ?>
<?php require('../components/inc/sideBar.php'); ?>
<div class="home_content">
    <div class="text">Dashboard Content</div>
    <h1 class="text">username: <?php echo $_SESSION['username'] ?></h1>
    <h1 class="text">userID: <?php echo $_SESSION['id'] ?></h1>
</div>
<?php require('../components/inc/footer.php'); ?>