
<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');
    error_reporting(0);
    $_SESSION['idevent'] = $_POST['idevent'];
    $collection = $client->datattu->ttu;
    $insertOneResult = $collection->insertOne([
            'username'     => $_SESSION['idevent'],
            'google_secret'=>' ',
            // 'image'=>$image_data,
            'image'=>null,
            'google_require' => false,
            ]);
 ?>