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
    <!-- <link rel="stylesheet" type="text/css" href=""> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/signup_signin.css"> -->
    <!-- <link rel="stylesheet" href="../css/homeStyle.css"> -->
    <link rel="stylesheet" type="text/css" href="css/webPageCss.css">

 </head>
 <body>
<div class="hero">
    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn" onclick="register()">Register</button>
        </div>

        <div class="social-icons">
            <img src="assets/raiderlink.png">
            <img src="assets/blackboard.jpg">
            <img src="assets/linkin.jpg">
        </div>
        <form id="login" action="index.php" class="input-group" method="post">
            <h2>Login</h2>
            <input type="text" class="input-field" name="username" placeholder="Username" required="">

            <input type="password" class="input-field" name="password" placeholder="Password" required="">

            <button class="submit-btn" type="submit" name="user_login">Sign In</button>   

        </form>
<!-- create account -->
<!-- <button id="btnPopup">CREATE ACCOUNT</button> -->
<!-- <div id="signUpPopup"> -->
        <form id="register" class="input-group" action="index.php" method="post" enctype="multipart/form-data">
        <!-- <h1 id="closeform">X</h1> -->
        <!-- <h2>Sign Up </h2>
        <p>It's quick and easy.</p> -->
            <input type="text" class="input-field" name="username" placeholder="Username" required="true">

            <input type="email" class="input-field" name="email" placeholder="Email">

            <input type="password" name="password1" class="input-field" placeholder="Password" required="true">

            <input type="password" name="password2" class="input-field" placeholder="Repeat-Password" required="true">
            <!-- <input type="file" name="cover" > -->
            <br>
            <input type="checkbox" class="check-box"><span>I agree to the terms and conditions</span>

            <button id="signmeup" class="submit-btn" type="submit" name="user_signup" >Sign Up</button>
        </form>
<!-- </div> -->
<!-- log in -->

<!-- <div class="login"> -->
        
    </div>
</div>

 </body>
 </html>
 <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left= "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left= "450px";
            z.style.left = "0";
        }
    </script>
<!--  //login user -->