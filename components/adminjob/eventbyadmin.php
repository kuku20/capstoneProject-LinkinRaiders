
<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');
	
	// require('../inc/sideBar.php');
	// require('../inc/footer.php'); 

	$eventscollection = $client->datattu->events;
	$eventid = new \MongoDB\BSON\ObjectId($_POST['idevent']);
	//deny=>delete the database
	if($_POST['decision']=='deny'){
		$eventscollection->deleteOne(['_id' => $eventid]);
	// accept it
	}else{
		$eventscollection->updateOne(  
			['_id' => $eventid],
			['$set' => ['permit' => true]],
		);
	}

	
	// header("location: ../../module/ad_mod_hp.php");
	// echo $_POST['idevent'];

	// $event = $eventscollection->find();

	// 	foreach ($event as $document) {
	// 		if($document->{'_id'} . " " == $_SESSION['idevent']){
	// 		echo '<div class="text">';
	// 			echo 
	// 			var_dump($document);
	// 			// echo $_SESSION['idevent']=$document['_id'];
	// 			// echo '<a id= "your_click" value ="';
	// 			// echo $document['_id'];;
	// 			// echo ' "  href="#"   >topic: ';
	// 			// echo $document['topic'];
	// 			// echo'  need your decide </a>';
	// 			echo '';
	// 		echo'  </div>';

	// 		}
	// 	}
 ?>