<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');

	$collection = $client->datattu->ttu;
	echo "stringout";
	$data = $_GET['delete'];
	echo $data;

	if (!empty($_GET['delete'])) {
		echo "stringinside";
		echo $_GET['delete'];
			// $collection->deleteOne(['username' => $_SESSION['username']]);
			$collection->deleteMany(['password' => null]);
			session_destroy();
			session_unset();
	    }else{
	    	echo "string";
	    	echo "me";
	    }


 ?>
