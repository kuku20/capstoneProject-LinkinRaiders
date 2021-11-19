<style>
    #signUpPopup {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        color: #676767;
    }
    #showForm{

        width: 380px;
	    height: 480px;
	    position:relative;
	    margin: 6% auto;
	    background: #fff;
	    padding: 5px;
	    overflow:hidden;
    }
    #closeform{
        cursor: pointer;
        padding: 10px;
        margin-left: 258px;
    }
    #errors{
    	font-size: 25px;
    	padding: 10px;
    	text-align: center;
    	color: red;
    }
</style>
<?php if (count($errors) > 0) : ?>
	<div id="signUpPopup">
		<!-- <div class="hero"> -->
		<div id="showForm">
			<h1 id="closeform">Close</h1>
		  	<?php foreach ($errors as $error) : ?>
		  	  <p id="errors">&diams;<?php echo $error ?></p>
		  	<?php endforeach ?>
	  	<!-- </div> -->

		</div>

</div>
<!-- </div></div> -->
<?php endif ?>
<script>
$(document).ready(function () {
    $("#signUpPopup").show();
    $("#closeform").click(function(){
        $("#signUpPopup").hide();
    });
});
</script>