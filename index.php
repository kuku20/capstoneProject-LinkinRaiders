<?php
 echo "Hello canata";
 //mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
  $mng = new MongoDB\Driver\Manager("mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu");
 $qry = new MongoDB\Driver\Query([]);
  $rows = $mng->executeQuery("datattu.products", $qry);

 foreach($rows as $document) {
    print_r($document);
}
 echo "Connection to database successfully";
 // $db = $connection->mydb;
    
   // echo "Database mydb selected";
 
?>