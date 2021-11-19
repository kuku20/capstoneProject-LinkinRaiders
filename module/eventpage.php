<?php 
  require ('../vendor/autoload.php');
  require_once ('../config.php');
  require_once ('../session.php');
  require('../components/inc/head.php');
  require('../components/inc/sideBar.php');
  require('../components/inc/footer.php'); 
?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/eventsDecor.css">
	</head>
	<style type="text/css">
		.home_content{
			overflow: scroll;
		}
	</style>
<body>
	<div class="home_content">
	<div class="text">
	<h2>Texas Tech Events</h2>
	




<?php 
include 'addnewevent.php';

// try {
//     $client = new MongoDB\Client("mongodb://localhost:27017");
//     $collection = $client->Events->TTU;
//     $cursor = $collection->find();
    

//echo "EVENTS LOCATOR";



$csv = array();
$lines = file('newlist.csv', FILE_IGNORE_NEW_LINES);

foreach($lines as $key => $value)
{
$csv[$key] = str_getcsv($value);
}

echo'<pre>';
//print_r($csv);//this will show all data
echo'<pre>';

$file = "/temp.php";
$get = "get";
$Submit = "Submit";
$Locate = "Directions";
$Text = "text";
$Hidden = "hidden";




for($j = 0; $j<count($csv)-1; $j++){
//2D array of data

echo'<ul>';
echo'<li>';   
	echo '<h1>';
        echo $csv[$j+1][0];
	echo '</h1>';
	echo "\n";
        echo "Date",": ", $csv[$j+1][10], "\n";
	
        echo "Day",": ", $csv[$j+1][11], "\n";

        echo "Start Time",": ", $csv[$j+1][12], "\n";

        echo "End Time",": ", $csv[$j+1][20], "\n";

        echo "Location",": ", $csv[$j+1][24], "\n";

//--------------------------------
	$locate = $csv[0][24];
	$locatedata = $csv[$j+1][24];
//--------------------------------

      //  echo "Description",": ", $csv[$j+1][34], "\n";
echo'</li>';


echo"<form action= .$file method = $get >";

echo"<input type = $Hidden name = $locate value = '".$locatedata."'>";//when you go to get on other page have to use string like locationaddress

echo"<input type = $Submit value= $Locate>";
echo"</form>";


echo "\n";
echo'</ul>';

}
?>

		</div>
	</div>
</body>
</html>
 <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>



