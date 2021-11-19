<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');
 ?>

<?php require('../components/inc/head.php'); ?>
<?php require('../components/inc/sideBar.php'); ?>

<div class="home_content">
    <div class="text">Dashboard Content</div>
    <h1 class="text">username: <?php echo $_SESSION['username'] ?></h1>
   
    <h1 class="text">userID: <?php echo $_SESSION['id'] ?></h1>
</div>
<?php require('../components/inc/footer.php'); ?>