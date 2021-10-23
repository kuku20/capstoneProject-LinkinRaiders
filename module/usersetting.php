<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');
 ?>
<?php require('../components/inc/head.php'); ?>
<?php require('../components/inc/sideBar.php'); ?>
<?php require('../components/inc/footer.php'); ?>
<div class="home_content">
	<h1 class="text">Profile/icon: image</h1>

	<img src="data:jpeg;base64,<?=base64_encode($_SESSION['image']->cover->getData())?> " />

	<h1 class="text">username: <?php echo $_SESSION['username'] ?></h1>
	<h2 class="text">Name: username(can change)</h2>
	<h2 class="text">Email: email(can change)</h2>
	<h2 class="text">Gender: null</h2>
	<h2 class="text">Role: null</h2>
	<!-- <h2 class="text">Interest:need update for group matcher</h2> -->
	<p class="text"> </p>
    <h1 class="text"></h1>
    <h1 class="text">PassWord: update</h1>
    <h1 class="text">QR enabled /unenabled</h1>
    <h1 class="text">DELETE ACCOUNT</h1>
    
</div>

"<h1><?php  ?></h1>"