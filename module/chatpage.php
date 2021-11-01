
<?php 
	require ('../vendor/autoload.php');
 	session_start();
 	$client = new MongoDB\Client('mongodb+srv://vin:PkWCp8BvSFNWNQ4e@data2u.f9hzo.mongodb.net/datattu');
	
	error_reporting(0);
	if (!isset($_SESSION['username'])) {
	  	$_SESSION['msg'] = "You must log in first";
	  	header('location: ../index.php');
	}
	if ($_GET["logout"]== 1 AND $_SESSION['id']) {
		session_unset();
		session_destroy();
	    header('location: ../index.php');
	}
	if (isset($_GET['logout'])) {
		session_unset();
	    session_destroy();
	    unset($_SESSION['username']);
	    header("location: ../index.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en", dir ="ltr">
<head>
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LinkinRaider</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/chatStyle.css"/>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<?php require('../components/inc/sideBar.php'); ?>
<div class="home_content">
	<div id="chat-container">
		<div id="search-container">
			<input type="text" placeholder="Search" />
		</div>
		<!-- Channel List -->
		<div id="conversation-list">
			<button class="conversation active" onclick="location.href='chatpage.php'">
				<img src="../assets/channel_default.png" alt="channel icon" />
				<div class="title-text">
					Group Channel #1
				</div>
				<!-- <div class="created-date">
					Apr 16   
				</div> -->
				<div class="conversation-message">
					<!-- channel description -->
                    Welcome to the Channel 
				</div>
			</button>
			<button class="conversation" onclick="location.href='chatpage2.php'">
				<img src="../assets/channel_default.png" alt="channel icon" />
				<div class="title-text">
					Group Channel 2
				</div>
				<!-- <div class="created-date">
					Oct 20   
				</div> -->
				<div class="conversation-message">
					<!-- channel description -->
                    Welcome to the Channel
				</div>
			</button>
			<button class="conversation" onclick="location.href='chatpage3.php'">
				<img src="../assets/channel_default.png" alt="channel icon" />
				<div class="title-text">
					Group Channel 3
				</div>
				<!-- <div class="created-date">
					Apr 16   
				</div> -->
				<div class="conversation-message">
					<!-- channel description -->
                    Welcome to the Channel
				</div>
			</button>
			<button class="conversation" onclick="location.href='chatpage4.php'">
				<img src="../assets/channel_default.png" alt="channel icon" />
				<div class="title-text">
					Group Channel 4
				</div>
				<!-- <div class="created-date">
					3 days ago   
				</div> -->
				<div class="conversation-message">
					<!-- channel description -->
                    Welcome to the Channel
				</div>
			</button>	
		</div>
		<!-- Add new channel -->
		<div id="new-message-container">
		<input type="checkbox" id="click">
            <label for="click" class="newChat"><span></span></label>
            <div class="content">
                <div class="header">
                    <h2>Create a new channel</h2>
                </div>
                <p>Enter channel name</p>
                <input type="text" class="newChatForm-control" placeholder="write a name">
                <div class="line"></div>
                <button for="click" class="create-btn">Create</button>
                <label for="click" class="close-btn">Close</label>
            </div>
		</div>
		<!-- Chat Conversation Inside Channel -->
		<div id="chat-title">
				<span>Group Matcher 1</span>
		</div>
		<div id="chat-message-list" class="chat_content">
	    	<!-- Chat messages -->
		</div>
		<!-- Typing Area -->
		<div id="chat-form"> 
			<button class="bottom-icons">
				<i class="fa fa-smile-o fa-3x"></i>
			</button>
			<form action="#" method="post" class="typing_area" autocomplete="off">
				<div class="input-group">
					<input id="textField" type="text" class="form-control" name="message" placeholder="Write a message" require="">
					<?php require_once("../components/insertChat.php"); ?>
				</div>
				<button id="sMsg" class="paperPlaneBack" type="submit" name="sendMessage">
						<i class="fa fa-paper-plane fa-2x"></i>
				</button>
			</form>
		</div> 
	</div>
</div>
<!-- outside content section -->
<?php
    function checkImg() {
        if ($_SESSION['image']!=null) { 
            echo '<img class="userPhoto" alt="user icon" src="data:jpeg;base64,';
            echo base64_encode($_SESSION['image']->cover->getData());
            echo'" />';}
            else{
                echo '<img class="userPhoto" src="../assets/profile_img.png" />';
            }
    }
?>	
	
	
	
	
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script>
	if ( window.history.replaceState ) {
  		window.history.replaceState( null, null, window.location.href );
	}
</script>

<!-- Backup plan for triggering enter -->
<!-- <script>
	var input = document.getElementById("textField");
	input.addEventListener("keyup", function(event) {
		if(event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("sMsg").click();
		}
	});
</script> -->
<script src="../javascript/chat.js"></script>
<?php require('../components/inc/footer.php'); ?>
