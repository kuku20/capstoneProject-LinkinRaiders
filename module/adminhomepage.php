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
 	<h1 class="text">These events need to comfirm!!</h1>
 	<?php 
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

 	 ?>
 	 


 	<!-- <a href="../components/adminjob/eventsbyadmin.php">event id</a> -->
 	<!-- <a href="#" value ="hihi" onclick="getIdEvent(this)" >Test Link</a> -->

 	<h1 class="text">report account id= can delete it</h1>
 	<h1 class="text">assign role to some user....</h1>
 	<h1 class="text"></h1>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
// function getIdEvent(a) {
// 	var idevent = "";
// 	idevent = a.getAttribute("value");
// 	// location.replace("../components/adminjob/eventsbyadmin.php");
// 	console.log(idevent)
// }
// Function to change the content of t2
function getIdEvent(a) {
  var idevent = "";
	idevent = a.getAttribute("value");
	// location.replace("../components/adminjob/eventsbyadmin.php");
	console.log(idevent)
	$.ajax({
            type: "POST",
            url: "../components/adminjob/eventholder.php",
            data: {
                idevent: idevent,
            }
        });
}

// // Add event listener to table
// const el = document.getElementById("your_click");
// el.addEventListener("click", getIdEvent, false);


// const form = document.querySelector(".typing_area"),
// inputField = form.querySelector(".msgInputField"),
sendBtn1 = document.querySelector("#sMsg");

$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
    });
});


sendBtn1.onclick = function() {
    $(document).ready(function() {
    	var idevent = "";
        idevent = a.getAttribute("value");
        console.log(idevent)
        $.ajax({
            type: "POST",
            url: "../components/adminjob/eventholder.php",
            data: {
                idevent: idevent,
            }
        });
    });
    
}
</script>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
