
<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../../session.php');
    
    // if(isset($_POST['admin_assign_user'])){
    // $_SESSION['userrole']= $_POST['usernamerole'];}
    
    $_SESSION['idevent'] = $_POST['idevent'];
    $collection = $client->datattu->ttu;
    // $insertOneResult = $collection->insertOne([
    //         'username'     => $_SESSION['idevent'],
    //         'google_secret'=>' ',
    //         // 'image'=>$image_data,
    //         'image'=>null,
    //         'google_require' => false,
    //         ]);
 ?>