<!doctype html>
<html lang ="en", dir ="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/homeStyle.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Boxicons Link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>LinkinRaider</title>
  </head>
  <body>
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