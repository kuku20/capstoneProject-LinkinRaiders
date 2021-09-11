<?php
require '../vendor/autoload.php';
 echo "Hello canata";
 //echo phpinfo();
//  $client = new MongoDB\Client("mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu?retryWrites=true&w=majority");

// $db = $client->test;
 // $connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
 // $mng = new MongoDB\Driver\Manager("mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu?retryWrites=true&w=majority");
 //mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
//   $mng = new MongoDB\Driver\Manager("mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu");
//  $qry = new MongoDB\Driver\Query([]);
//   $rows = $mng->executeQuery("datattu.products", $qry);
//  //$rows = $mng->executeQuery("test.products", $qry);
 

//  foreach($rows as $document) {
//     print_r($document);
// }
 $client = new MongoDB\Client(
    'mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu'
);
$db = $client->test;
 echo "Connection to database successfully";
 // $db = $connection->mydb;
    
   // echo "Database mydb selected";
 
?>