<?php 
require ('../../vendor/autoload.php');
require_once ('../../config.php'); 

?>
<?php 
    session_start();
    $_SESSION['newqr']= 'newqr';
    $g = new \Google\Authenticator\GoogleAuthenticator();
    // generate for each user
    $secret = $g->generateSecret();
    $_SESSION['secret'] = $secret;
    // test code
    // $secret = 'XVQ2UIGO75XRUKJO';
    //display the qr secret for scan by user
    $qr_code= \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($_SESSION['username'] , $secret, 'LINKINRAIDERS.COM');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm User Device</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../css/comfirm_google_auth.css">
</head>
<body>
<div class="hero">
    <div class="form-box">
        <form id="qrcode" class="input-group" action="gasignup.php" method="post" enctype="multipart/form-data">
            <h4 class="input-file">Application Authentication 
                <a href="<?php echo $_SERVER['http_referrer']; ?>">Try New</a>
            </h4>
            <p class="input-file" >Please download and install Google authenticate app on your phone, and scan following QR code to configure your device.</p>
            <!-- <div class="form-group"> -->
            <img class="qrdisplay" src="<?php echo $qr_code; ?>">
                
            <!-- </div> -->
            <?php
                if ($error_message != "") {
                    echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $error_message . '</div>';
                }
            ?>
            <p  name="secret"><?php echo $secret ?></p>
            <label class="input-file" for="code">Enter Authentication Code:</label>
            <input type="text" name="code" placeholder="6 Digit Code" class="input-field" autocomplete="off">
                
            <div class="input-file">
                <button type="submit" class="validate-btn" name="user_code">Validate</button>
            </div>
            <div class="skip">
                <a  href="<?php 
                if(isset($_SESSION['pagecomfirm'])) {
                    unset($_SESSION['pagecomfirm']);
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