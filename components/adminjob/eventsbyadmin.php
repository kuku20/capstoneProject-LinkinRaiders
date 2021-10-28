
<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');
	// echo "you decide out";
	// $collection = $client->datattu->ttu;
	// $document = $collection->findOne(['username' => $_SESSION['username']]);
	// echo $_SESSION['idevent'];
	if (isset($_GET['idevent'])) {
		
		echo $_GET['idevent'];
    }else{
    	echo "stringelse";
    	echo $_GET['idevent'];
    }


 ?>