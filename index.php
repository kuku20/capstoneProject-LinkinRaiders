<?php
require '../vendor/autoload.php';
 echo "Hello canata";

 $client = new MongoDB\Client(
    'mongodb+srv://data2u:IMpSIo53MwLE0YwC@data2u.f9hzo.mongodb.net/datattu'
);
$db = $client->test;
 echo "Connection to database successfully";

?>
