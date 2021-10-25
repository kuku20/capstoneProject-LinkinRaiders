<?php 
	require ('../vendor/autoload.php');
	require_once ('../config.php');
	require_once ('../session.php');
$collection = $client->datattu->ttu;
$document = $collection->findOne(['username' => $_SESSION['username']]);
$_SESSION['google_require']=$document['google_require'];
$_SESSION['secret'] = $document['google_secret'];
$_SESSION['page'] = "thispage";
 ?>
<?php 

	
require('../components/inc/head.php');
require('../components/inc/sideBar.php');
require('../components/inc/footer.php'); 
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/usersetting.css">
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
    <h1 class="text">my php: <?php $_SESSION['google_require'] ?></h1>
    <h1 class="text">2FA <?php echo $_SESSION['secret'] ?> <p id="demo"></p>enabled /unenabled</h1>
	<label class="switch">
		<?php  
		if ($_SESSION['google_require']==true) { 
			echo '<input type="checkbox" id = "myQR" checked>';}
			else{
				echo '<input type="checkbox" id = "myQR" >';
			}
			?>
			<!-- <input type="checkbox" id = "myQR" checked> -->
	  	<span class="slider round"></span>
	</label>
	<button onClick="parent.location='test.php'">Change</button>
	
    <div class="result">
    
     
	    
	  	
	

<?php 
    
    // if ($_SESSION['google_require']==true) {
    // 	echo '<label class="switch">';
	   //  echo '<input type="checkbox" id = "myQR" checked>';
	   //  echo '<span class="slider round"></span>;';
	   //  echo '</label>';
	   //  echo '<div class="result"></div>';
    // 	# code...
    // }else{
    // 	echo '<div class="result"></div>';
	   //  echo '<label class="switch">';
	   //  echo '<input type="checkbox" id = "myQR" >';
	   //  echo '<span class="slider round"></span>';
	   //  echo '</label>';
    // }
	// echo '<script type="text/javascript">';
	// echo ' let BtnEle = document.querySelector("#myQR");';   
	// echo ' let resEle = document.querySelector(".result");';  
	// echo ' let boolVal = false ;';
  
	// echo ' resEle.innerHTML = boolVal;';  
	// echo ' BtnEle.addEventListener("click", () => {';  
	// echo ' boolVal = !boolVal;'; 
	// echo ' resEle.innerHTML = boolVal;';  

	// echo ' });';   
	// echo '</script>'; 
 ?>
<script >
	
	let BtnEle = document.querySelector("#myQR");
	let resEle = document.querySelector(".result");
	let boolVal = "<?php echo $_SESSION['google_require'] ?>";
	resEle.innerHTML = boolVal;
	BtnEle.addEventListener("click", () => {
		boolVal = !boolVal;
		resEle.innerHTML = boolVal;
		"<?php $_SESSION['google_require'] = !$_SESSION['google_require'] ?>";
	});
</script>


		</div>
    <h1 class="text">DELETE ACCOUNT</h1>
</div>
