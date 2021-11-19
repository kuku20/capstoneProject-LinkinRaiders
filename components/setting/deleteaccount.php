<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../sessionc.php');

	$collection = $client->datattu->ttu;
	// echo "stringout";
	// $data = $_GET['delete'];
	// echo $data;

	if (!empty($_GET['delete'])) {
		// echo "stringinside";
		// echo $_GET['delete'];
			$collection->deleteOne(['username' => $_SESSION['username']]);
			// // $collection->deleteMany(['password' => null]);
			session_destroy();
			session_unset();
			location.replace("../../index.php");
	    }else{
	    	// echo "string";
	    	// echo "me";
	    }


 ?>
