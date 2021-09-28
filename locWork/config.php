<?php
 require ('../vendor/autoload.php');
 	session_start();
	// session_start(['cookie_lifetime'=>2592000,]);
	
 	$client = new MongoDB\Client('mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu');

 define ('ROOT_PATH', realpath(dirname(__FILE__)));
?>