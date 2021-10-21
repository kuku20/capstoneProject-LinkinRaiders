<?php 
require ('../../vendor/autoload.php');

require_once ('../../config.php'); ?>
<?php 
    session_start();
    $g = new \Google\Authenticator\GoogleAuthenticator();
    // generate for each user
    $secret = $g->generateSecret();
    $_SESSION['secret'] = $secret;
    // test code
    // $secret = 'XVQ2UIGO75XRUKJO';
    echo "Get a new Secret: $secret \n";
    echo $_SESSION['username'] ;

    // echo '<img src=" '.\Sonata\GoogleAuthenticator\GoogleQrUrl::generate($_SESSION['username'] , $secret, 'LINKINRAIDERS.COM').'" />';

    $qr_code= \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($_SESSION['username'] , $secret, 'LINKINRAIDERS.COM');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm User Device</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well">
            <h4>Application Authentication</h4>

            <p>
                Please download and install Google authenticate app on your phone, and scan following QR code to configure your device.
            </p>

            <div class="form-group">
                <img src="<?php echo $qr_code; ?>">
                
            </div>
            <form method="post" action="gasignup.php">
                <?php
                if ($error_message != "") {
                    echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $error_message . '</div>';
                }
                ?>

                <div class="form-group">
                    <p name="secret"><?php echo $secret ?></p>
                    <label for="code">Enter Authentication Code:</label>
                    <input type="text" name="code" placeholder="6 Digit Code" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="user_code" class="btn btn-primary">Validate</button>
                </div>
            </form>

            <div class="form-group">
                <!-- Click here to <a href="index.php">Login</a> if you have already registered your account. -->
            </div>
        </div>
    </div>
</div>

</body>
</html>