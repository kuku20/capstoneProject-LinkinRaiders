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
 	<h1 class="text">HELLO ADMIN: <?php echo $_SESSION['username']; ?></h1>
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

 	<h1 class="text">report account id= can delete it</h1>

 	<form  method="" enctype="multipart/form-data">
	 	<h1 class="text">Assign role to user: </h1>
	 	<!-- <input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" > -->
	 	<button  type="submit" onclick="updaterole()">APPLY</button>
	</form>
<a class="text" href="../components/adminjob/assignrole.php">cl</a>


<<<<<<< HEAD
	<input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" >
      <button onclick='functionConfirm("Which role would you assign?", function admin() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
                role : "admin",
            }
        });
          alert("admin");
          alert(userrole);
      }, function user() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
=======
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
>>>>>>> 841699990ed211acb9667a07706f6c6ec030a4e3
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
                role : "user",
            }
        });
        alert("user");
          alert(userrole);
      }
      );'>submit</button>


      	<div id="confirm">
         <div class="message"></div>
         <button class="admin">admin</button>
         <button class="user">user</button>
         <button class="cancel">Cancel</button>
      </div>

 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<<<<<<< HEAD
      


<script src="../javascript/adminhomepage.js"></script>
=======
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
>>>>>>> 841699990ed211acb9667a07706f6c6ec030a4e3
