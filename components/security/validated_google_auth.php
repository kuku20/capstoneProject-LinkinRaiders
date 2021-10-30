<?php
require ('../../vendor/autoload.php'); 
require_once ('../../config.php');
// require_once ('../sessionc.php');

session_start();

$g = new \Google\Authenticator\GoogleAuthenticator();

if (isset($_POST['user_code'])) {
	$check_this_code = $_POST['code'];
	if ($g->checkCode($_SESSION['secret'], $check_this_code)) {
		$collection = $client->datattu->ttu;
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_secret' => $_SESSION['secret']]],
        );
        $collection->updateOne(
            ['username' => $_SESSION['username']],
            ['$set' => ['google_require' => true]],
        );
        $_SESSION['google_require']=true;
        $_SESSION['logined']='accepted';
        if($_SESSION['role']=='admin' or $_SESSION['role']=='moderator'){
            header("Location: ../../module/adminhomepage.php");
            }elseif($_SESSION['role']=='moderator'){
                    header("Location: module/moderatorhp.php");
                }
                else{
                header("Location: ../../module/homepage.php");
            }
        
	} else {
        echo '<script type="text/javascript">';
        echo ' alert("Invalid Code")'; 
        echo '</script>';
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../../css/comfirm_google_auth.css">
</head>
<body>
    <div class="hero">
    <div class="form-validated">

        <form id="qrcode" class="input-group" action="validated_google_auth.php" method="post" enctype="multipart/form-data">
            <h4><?php if(isset($_SESSION['newqr'])){
            unset($_SESSION['newqr']);
            echo '<script type="text/javascript">';
            echo ' alert("Invalid Code")'; 
            echo '</script>';
        } ?></h4>
            <label class="input-file" for="code">Enter Authentication Code Again:</label>
            <input type="text" name="code" placeholder="6 Digit Code" class="input-field" autocomplete="off">
                
            <div class="input-file">


                <button class="validate-btn" type="submit" name="user_code">Validate</button>  
            </div>

            <div class="skip">
                <a  href="<?php 
                if(isset($_SESSION['pagevalidated'])) {
                unset($_SESSION['pagevalidated']);
                echo "../../module/usersetting.php";
                }else{
                echo "../../module/homepage.php";
            } ?>">SKIP</a>   
            </div>
        </form>
    </div>
</div>







</body>
</html>