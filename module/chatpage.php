
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
    <div class="text">Group Matcher Content</div>
	<div class="text">
		<form action="#" method="post" class="typing_area" autocomplete="off">
			<input type="text" class="msgInputField" name="message" placeholder="Send Message" require="">
			<?php require_once("../components/insertChat.php"); ?>
			<button id="sMsg" class="msgBtn" type="submit" name="sendMessage">Send Message</button>
		</form>
	</div>
	<div class="chat_content">
	<?php
		// foreach($log as $msg) {
		// 	echo $msg['username'];
		// 	echo "&nbsp&nbsp&nbsp&nbsp";
		// 	echo $msg['message'];
		// 	echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		// 	echo $msg['timestamp']['year'],"/",$msg['timestamp']['month'],"/",$msg['timestamp']['date'],
		// 	" ", $msg['timestamp']['hour'],":", $msg['timestamp']['minute'], ":", $msg['timestamp']['second'];
		// 	echo "<br>";
		// }
	?>
	</div>
</div>
<!-- outside content section -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
	if ( window.history.replaceState ) {
  		window.history.replaceState( null, null, window.location.href );
	}
</script>
<script src="../javascript/chat.js"></script>
<?php require('../components/inc/footer.php'); ?>