<?php
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	include( ROOT_PATH . '/vendor/autoload.php');
 	// session_start();
	// session_start(['cookie_lifetime'=>2592000,]);
 	$client = new MongoDB\Client('mongodb+srv://vin:PkWCp8BvSFNWNQ4e@data2u.f9hzo.mongodb.net/datattu');

?>