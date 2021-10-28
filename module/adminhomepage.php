<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');	
	require('../components/inc/head.php');
	require('../components/inc/sideBar.php');
	require('../components/inc/footer.php'); 

 ?>

 <div class="home_content">
 	<h1 class="text">HELLO ADMIN</h1>
 	<h1 class="text">Display events need to comfirm!!</h1>
 	<h1 class="text">id for each event(click here then go to the side to see event then design to accept or not)</h1>
 	


 	<?php 
	 	$eventscollection = $client->datattu->events;
		$event = $eventscollection->find(['permit' => false]);
		foreach ($event as $document) {
			echo '<div class="text">';
				// echo $_SESSION['idevent']=$document['_id'];
				echo '<a id= "your_click" value ="hihi"  href="#" onclick="getIdEvent(this)"  >topic: ';
				echo $document['topic'];
				echo'  need your decide </a>';
			echo'  </div>';
	    	// echo $document['_id'], "\n";

		}

 	 ?>
 	 


 	<!-- <a href="../components/adminjob/eventsbyadmin.php">event id</a> -->
 	<a href="#" value ="hihi" onclick="getIdEvent(this)" >Test Link</a>

 	<h1 class="text">report account id= can delete it</h1>
 	<h1 class="text">assign role to some user....</h1>
 	<h1 class="text"></h1>
 </div>

 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.jss"></script>
<script>
function getIdEvent(a) {
	var idevent = "fadsfa";
	$.ajax({
		type: "GET",
		url: "../components/adminjob/eventsbyadmin.php",
		data: {
			idevent: idevent,
		}
	});
	location.replace("../components/adminjob/eventsbyadmin.php");
}
</script>

<!-- <script type = "text/javascript">
	// let idevent = document.querySelector("#your_click");
function getevenid() {  
		var deleteyes = 'delete';

		$.ajax({
			type: "GET",
			url: "deleteaccount.php",
			data: {
				deleteyes: deleteyes,
				}
		});
		location.replace("../../index.php");
	}
</script> -->
