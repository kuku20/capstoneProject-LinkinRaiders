<?php 
	session_start(); 
	if (!isset($_SESSION['username']) or $_SESSION['logined']==null) {
	  	$_SESSION['msg'] = "You must log in first";
	  	header('location: ../index.php');
	}
	if ($_GET["logout"]== 1 AND $_SESSION['id']) {
	  	session_destroy();
	    header('location: ../index.php');
	}
	if (isset($_GET['logout'])) {
	    session_destroy();
	    session_unset();
	    // unset($_SESSION['username']);
	    header("location: ../index.php");
		}
?>