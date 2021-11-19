<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	try {
    $client = new MongoDB\Client("mongodb+srv://grabriel:lT2NJ49bghV8gTF5@data2u.f9hzo.mongodb.net/datattu");
    $collection = $client->datattu->events;
    $cursor = $collection->find();
//-------------------------------------------------------
	$suminfo = array();
	$dateinfo = array();
	$dayinfo= array();
	$startinfo = array();
	$endinfo = array();
	$locinfo = array();
	$perminfo = array();
	//-------------------------------------------------------
	echo '<details style="cursor: pointer;">
	    <summary>
	        Add An Event Here...
	    </summary>';	
			echo "<form action = '' method = 'get'>";
				echo'<table>';
					echo'<tr>';
						echo'<td>';
							echo 'Title :';	
						echo'</td>';
						echo'<td>';
						echo"<input type = 'text' placeholder = 'ex. Christmas Lights Show' name = 'title'>";
						echo'</td>';
					echo'</tr>';

				        echo'<tr>';
						echo'<td>';
							echo 'Date :';	
						echo'</td>';
						echo'<td>';
						echo"<input type = 'date' placeholder = 'ex. December 25, 2021' name = 'date'>";
						echo'</td>';
					echo'</tr>';

			            echo'<tr>';
						echo'<td>';
							echo 'Start Time :';	
						echo'</td>';
						echo'<td>';
						echo"<input type = 'time' placeholder = 'ex. 5:00 PM' name = 'starttime'>";
						echo'</td>';
					echo'</tr>';

			                echo'<tr>';
						echo'<td>';
							echo 'End Time :';	
						echo'</td>';
						echo'<td>';
						echo"<input type = 'time' placeholder = 'ex. 8:00 PM' name = 'endtime'>";
						echo'</td>';
					echo'</tr>';

			                echo'<tr>';
						echo'<td>';
							echo 'Location :';	
						echo'</td>';
						echo'<td>';
						// echo"<input type = 'text' placeholder = 'ex. Student Union Building' name = 'location'>";

						echo '<input list = "locations" type="text" id="location" name="location" placeholder = "ex. Student Union Building" ><br>
						  <datalist id = "locations">
						    <option value = "Murdough Hall">
						    <option value ="Experemental Sciences">
						    <option value ="Student Union Building">
						    <option value ="Allen Theatre">
						    <option value ="Fraizer Pavillion">
						    <option value ="The Commons by United Supermarkets">
						    <option value ="The Market at Stangel/Murdough">
						    <option value ="Wiggins Complex">
						    
						  </datalist>';



						echo'</td>';
					echo'</tr>';

			                echo'<tr>';
						echo'<td>';
						echo"<input type = 'submit' value = 'Submit' name = 'sent'>";
						echo'</td>';
					echo'</tr>';
				echo'</table>';
			echo '</form>';
		echo '</details>';
	if(isset($_GET['sent']))
	{
	$usertitle = $_GET['title'];
	$userdate = $_GET['date'];
	// $userday = $_GET['day'];
	$userstime = $_GET['starttime'];
	$useretime = $_GET['endtime'];
	$userlocation = $_GET['location'];

	$insertOneResult = $collection->insertOne([
	'summary' => $usertitle,
	'startlongdate'=> $userdate,
	
	'starttime' => $userstime,
	'endtime' => $useretime,
	'locationaddress'=> $userlocation,
	'permission' => false,
	]);
	}


	//-------------------------------------------------------




	  foreach ($cursor as $document) {

	  $suminfo[] = $document["summary"];
	  $dateinfo[] = $document["startlongdate"];
	  $dayinfo[] = date("l",$document["startdayname"]);
	  $startinfo[] = $document["starttime"];
	  $endinfo[] = $document["endtime"];
	  $locinfo[] = $document["locationaddress"];
	  $perminfo[] = $document["permission"];
	 }    

	//---------------------------------------------------------




	echo'<pre>';

	echo'<pre>';

	$file = "/temp.php";
	$get = "get";
	$Submit = "Submit";
	$Locate = "Directions";
	$Text = "text";
	$Hidden = "hidden";




	for($j = 0; $j<count($suminfo); $j++){

	if($perminfo[$j] == "true"){ 
	echo'<ul>';
	echo'<li>';  

		echo '<h1>';
	        echo $suminfo[$j];
		echo '</h1>';
		echo "\n";
	        echo "Date",": ", $dateinfo[$j], "\n";
		
	        echo "Day",": ", $dayinfo[$j], "\n";

	        echo "Start Time",": ", $startinfo[$j], "\n";

	        echo "End Time",": ", $endinfo[$j], "\n";

	        echo "Location",": ", $locinfo[$j], "\n";

	//--------------------------------
		$locate = "locationaddress";
		$locatedata = $locinfo[$j];
	//--------------------------------

	echo'</li>';

	//----------------------------------------------------------------------------------------
	echo"<form action= .$file method = .$get.>";

	echo"<input type = $Hidden name = $locate value = '".$locatedata."'>";//when you go to get on other page have to use string like locationaddress

	echo"<input type = $Submit value= $Locate>";
	echo"</form>";


	echo "\n";
	echo'</ul>';

	}
	}

	} catch (Exception $e) {
	    echo "<p>Check you connection</p>";
	    echo $e->getMessage();
	}


 ?>
 <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>