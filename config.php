<?php
error_reporting(0);
try {
    $client = new MongoDB\Client('mongodb+srv://grabriel:lT2NJ49bghV8gTF5@data2u.f9hzo.mongodb.net/datattu');
    
    // $dbs = $mc->listDatabases();
    // echo "<p>List</p>";
} catch (Exception $e) {
	echo "<p>Check you connection</p>";
    echo $e->getMessage();
}
?>