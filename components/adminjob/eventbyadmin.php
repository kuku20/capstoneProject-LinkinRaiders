
<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');
	
	// require('../inc/sideBar.php');
	// require('../inc/footer.php'); 

	$eventscollection = $client->datattu->events;
	echo $_SESSION['idevent'];

	$event = $eventscollection->find();

		foreach ($event as $document) {
			if($document->{'_id'} . " " == $_SESSION['idevent']){
				
			echo '<div class="text">';
				var_dump($document);
				// echo $_SESSION['idevent']=$document['_id'];
				// echo '<a id= "your_click" value ="';
				// echo $document['_id'];;
				// echo ' "  href="#"   >topic: ';
				// echo $document['topic'];
				// echo'  need your decide </a>';
				echo '';
			echo'  </div>';

		}
		}



 ?>