

<?php   
require ('../vendor/autoload.php');
    require_once ('../config.php');
    require_once ('../session.php');
require('../components/inc/head.php');
require('../components/inc/sideBar.php');
require('../components/inc/footer.php'); 
?>

<div class="home_content">
    <div class="text">
       
<?php 

// try {
//     // $client = new MongoDB\Client("mongodb://localhost:27017");
//     // $collection = $client->Events->TTU;
//     $cursor = $collection->find();
    

echo "EVENTS LOCATOR";



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
$Locate = "locate";
$Text = "text";
$Hidden = "hidden";





for($j = 0; $j<count($csv)-1; $j++){
//2D array of data
    
        echo $csv[0][0], ": ", $csv[$j+1][0], "\n";
	//$summary = $csv[$j+1][0];what the variable is
	//$sum = $csv[0][0];var name

        echo $csv[0][10],": ", $csv[$j+1][10], "\n";
	//$start = $csv[0][10];
	//$startdata = $csv[$j+1][10];



        echo $csv[0][11],": ", $csv[$j+1][11], "\n";
        echo $csv[0][12],": ", $csv[$j+1][12], "\n";
        echo $csv[0][20],": ", $csv[$j+1][20], "\n";
        echo $csv[0][24],": ", $csv[$j+1][24], "\n";
	$locate = $csv[0][24];
	$locatedata = $csv[$j+1][24];


        echo $csv[0][34],": ", $csv[$j+1][34], "\n";







echo"<form action= .$file. method = .$get.>";
//echo"<input type = $Hidden name = $sum value = '".$summary."'>";
//echo"<input type = $Hidden name = $start value = '".$startdata."'>";
echo"<input type = $Hidden name = $locate value = '".$locatedata."'>";//when you go to get on other page have to use string like locationaddress




echo"<input type = $Submit value= $Locate>";
echo"</form>";









echo "\n";
}

// } catch (Exception $e) {
//     echo "<p>Check you connection</p>";
//     echo $e->getMessage();
// }
?>

 </div>
    </div>





