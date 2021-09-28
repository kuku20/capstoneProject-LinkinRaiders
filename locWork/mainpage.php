<?php 
	// require_once ('config.php');
	// session_start(); 
	// if (!isset($_SESSION['username'])) {
	//   	$_SESSION['msg'] = "You must log in first";
	//   	header('location: index.php');
	// }
	// if ($_GET["logout"]== 1 AND $_SESSION['id']) {
	//   	session_destroy();
	//     header('location: index.php');
	// }
	// if (isset($_GET['logout'])) {
	//     session_destroy();
	//     unset($_SESSION['username']);
	//     header("location: index.php");
	// 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LINKINRAIDERS</title>
</head>
<body>
<h1>WEllCOME!!!!!</h1>

<a href="index.php?logout=1" style="color: red;">
Logout</a> 

<?php 
	echo $_SESSION['id'];
	echo $_SESSION['username'];

?>
</body>
</html>