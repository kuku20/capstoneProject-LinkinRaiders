<?php

try {
    $client = new MongoDB\Client('mongodb+srv://data2u:e2DsCNMzoqmjeIxc@data2u.f9hzo.mongodb.net/datattu');
    
    // $dbs = $mc->listDatabases();
    // echo "<p>List</p>";
} catch (Exception $e) {
	echo "<p>Check you connection</p>";
    echo $e->getMessage();
}
?>