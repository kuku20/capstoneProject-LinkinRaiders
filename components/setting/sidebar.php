<?php 
	require ('../../vendor/autoload.php'); 
	require_once ('../../config.php');
	require_once ('../sessionc.php');

 ?>
<!doctype html>
<html lang ="en", dir ="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/homeStyle.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>LinkinRaider</title>
  </head>
  <body>

    <div class="sidebar">
       

  	<!-- logo -->
  	<div class="logo_content">
            <div class="logo">
                <i class='bx bxl-linkedin-square'></i>
                <div class = "logo_name">LinkinRaider</div>
            </div>
            <i class='bx bx-menu' id = "btn"></i>
    </div>
    <!-- list -->
    
    <ul class="nav_list">
                <li>
                    <a href = "../../module/homepage.php">
                        <i class='bx bx-grid-alt'></i>
                        <span class = "links_name">Dashboard</span>
                    </a>
                    <span class = "tooltip">Dashboard</span>
                </li>
                <li>
                    <a href="../../module/googlemap.php">
                        <i class='bx bx-map-alt' ></i>
                        <span class="links_name">Campus Map</span>
                    </a>
                    <span class = "tooltip">Campus Map</span>
                </li>
                <li>
                    <a href = "../../module/chatpage.php">
                        <i class='bx bxs-group'></i>
                        <span class="links_name">Group Matcher</span>
                    </a>
                    <span class = "tooltip">Group Matcher</span>
                </li>
                <li>
                    <a href="../../module/eventpage.php">
                        <i class='bx bx-calendar-event' ></i>
                        <span class="links_name">Student Events</span>
                    </a>
                    <span class = "tooltip">Student Events</span>
                </li>
                <li>
                    <a href="../../module/Translator.php">
                        <i class='bx bx-globe'></i>
                        <span class="links_name">Translator</span>
                    </a>
                    <span class = "tooltip">Translator</span>
                </li>
                <li>
                    <a href="../../module/usersetting.php">
                        <i class='bx bxs-cog'></i>
                        <span class="links_name">Setting</span>
                    </a>
                    <span class = "tooltip">Setting</span>
                </li>
                <!-- admin option display -->
                <?php 
                if($_SESSION['role']!='user'){
                        echo '<li>';
                        echo '<a href = "../../module/ad_mod_hp.php">';
                        echo    '<i class="bx bx-grid-alt"></i>';
                    if($_SESSION['role']=='admin'){
                        echo    '<span class = "links_name">Admin Dashboard</span>';
                        echo '</a>';
                        echo '<span class = "tooltip">Admin Dashboard</span>';
                        echo '</li>';
                    } 
                    if($_SESSION['role']=='moderator'){
                        echo    '<span class = "links_name">Moderator Dashboard</span>';
                        echo '</a>';
                        echo '<span class = "tooltip">Moderator Dashboard</span>';
                        echo '</li>';
                    } 
                }
                ?>
            </ul>
    <!-- profile-logout -->
    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <?php
                if ($_SESSION['image']!=null) { 
                    echo '<img class="avatar" src="data:jpeg;base64,';
                    echo base64_encode($_SESSION['image']->cover->getData());
                    echo'" />';}
                    else{
                        // echo '<img class="avatar" src="../assets/userdefault.jpg" />';
                        echo '<img src="../../assets/userdefault.jpg" alt="">';
                    }
                ?>

                
                <div class="name_permission">
                    <div class="name"><?php echo $_SESSION['username']; ?></div>
                    <div class="permission">Student</div>
                </div>
            </div>
            <a href="../index.php?logout=1">
                <i class='bx bx-log-out' id="log_out">
               
                </i>
            </a>
        </div>
    </div>
</div>
<!-- footer -->
<script>
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");

        btn.onclick = function() {
            sidebar.classList.toggle("active")
        }
    </script>
  </body>
</html>