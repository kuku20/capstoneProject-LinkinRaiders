<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');	
	require('../components/inc/head.php');
	require('../components/inc/sideBar.php');
	require('../components/inc/footer.php'); 

 ?>
<link rel="stylesheet" href="../css/adminhomepage.css">

 <div class="home_content">
 	<?php
 		if($_SESSION['role']=='admin'){
 			echo '<h1 class="text">HELLO ADMIN:';
 		}else{
 			echo '<h1 class="text">HELLO MODERATOR:';
 		}
 		echo $_SESSION['username'];
 		echo '</h1>';
 		echo '<h1 class="text">These events need to comfirm!!</h1>';
	 	$eventscollection = $client->datattu->events;
		$event = $eventscollection->find(['permit' => false]);
		foreach ($event as $document) {
			echo '<div class="text">';
				// $_SESSION['ids'] = ;
				echo '<a id= "sMsg" value ="';
				echo $document['_id'];
				echo ' "  href="../components/adminjob/eventbyadmin.php" onclick="getIdEvent(this)"  >topic: ';
				echo $document['topic'];
				echo'  need your decide </a>';
			echo'  </div>';

		}
		//more job for admin
		if($_SESSION['role']=='admin'){
			include 'adminjob.php';
		}
 	 ?>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


      


<script src="../javascript/adminhomepage.js"></script>