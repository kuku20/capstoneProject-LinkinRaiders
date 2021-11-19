<?php
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');

	$collection = $client->datattu->ttu;
	$_POST['userrole'];
	if (isset($_POST['userrole'])) {
		$updateResult =$collection->updateOne(  
			['username' => $_POST['userrole']],
			['$set' => ['role' => $_POST['role']]],
		);
	    }


?>