<?php
 require ('vendor/autoload.php');
 	// session_start();
	// session_start(['cookie_lifetime'=>2592000,]);
 	$client = new MongoDB\Client('mongodb+srv://data2u:6iCNVznyS9xm2VXU@data2u.f9hzo.mongodb.net/datattu');

 define ('ROOT_PATH', realpath(dirname(__FILE__)));
?>