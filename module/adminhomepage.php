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

<!--  	<form  method="" enctype="multipart/form-data">
	 	
	 	<input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" >
	 	<button  type="submit" onclick="updaterole()">APPLY</button>
	</form>
<a class="text" href="../components/adminjob/assignrole.php">cl</a> -->
<h1 class="text">Assign role to user: </h1>

	<input class="text" type="type" id="userrole" name="usernamerole" placeholder="Username" >
      <button onclick='functionConfirm("Which role would you assign?", function moderator() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
            type: "POST",
            url: "../components/adminjob/assignrole.php",
            data: {
                userrole: userrole,
                role : "moderator",
            }
        });
          alert("moderator");
          alert(userrole);
      }, function user() {
        var userrole = document.getElementById("userrole").value;
        $.ajax({
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
      );'class="text">Apply</button>


      	<div id="confirm">
         <div class="message"></div>
         <button class="moderator">moderator</button>
         <button class="user">user</button>
         <button class="cancel">Cancel</button>
      </div>

 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


      


<script src="../javascript/adminhomepage.js"></script>