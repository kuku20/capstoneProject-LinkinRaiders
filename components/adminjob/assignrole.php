<?php
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');

	$collection = $client->datattu->ttu;
	$insertOneResult = $collection->insertOne([
    		'username' 	=> $_POST['userrole'],
    		'name'		=> 'none',
    		'email' 	=> $email,
    		'gender'	=> 'none',
    		'role'		=> 'none',
    		'password' => $password_1,
    		'google_secret'=>' ',
    		// 'image'=>$image_data,
    		'image'=>null,
    		'google_require' => false,
			]);

	$_POST['userrole'];
	if (isset($_POST['userrole'])) {
		$updateResult =$collection->updateOne(  
			['username' => $_POST['userrole']],
			['$set' => ['role' => $_POST['role']]],
		);

		
	    }


?>