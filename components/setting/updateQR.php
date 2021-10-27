<?php 
require ('../../vendor/autoload.php'); 
require_once ('../../config.php');
require_once ('../../session.php');
 ?>
<?php 
	if($_SESSION['secret'] == " "){
		header("location: ../security/comfirm_google_auth.php");

	}else{
		$collection = $client->datattu->ttu;
		$collection->updateOne(  
			['username' => $_SESSION['username']],
			['$set' => ['google_require' => $_SESSION['google_require']]],
		);
		header("location: ../../module/usersetting.php");
	}
?>