<?php 
require ('vendor/autoload.php');
require_once ('config.php');
require_once ('components/security/signup.php');
require_once ('components/security/login.php');
 ?>
 <?php
session_start();
if($_GET["logout"]== 1 AND $_SESSION['id']) {
    session_destroy();
    $message = "You have been logged out. Have a nice day!";
    header('location: index.php');
}
?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>LinkinRaiders</title>
    <!-- Google Fonts  -->
    <link rel="stylesheet" type="text/css" href="">

 </head>
 <body>
    <!-- create account -->
    <button id="btnPopup">CREATE ACCOUNT</button>
    <div id="signUpPopup">
        <form id="showForm" action="index.php" method="post" enctype="multipart/form-data">
            <h1 id="closeform">X</h1>
            <h2>Sign Up </h2>
            <p>It's quick and easy.</p>
            <input type="text" name="username" placeholder="Username" required="true">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password1" placeholder="Password" required="true">
            <input type="password" name="password2" placeholder="Repeat-Password" required="true">
            <!-- <input types="file" name="cover" > -->
            <br>
            <button id="signmeup" class="SignUpBtn" type="submit" name="user_signup" >Sign Up</button>
        </form>
    </div>
    <!-- log in -->
        <div>
        <div class="login">
            <form action="index.php" method="post">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="Username" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button class="loginbtn" type="submit" name="user_login">Sign In</button>   
            </form>
        </div>
    </div>
 </body>
 </html>
<!--  //login user -->