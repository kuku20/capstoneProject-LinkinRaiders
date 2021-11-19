
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
                    echo '<img src="../assets/userdefault.jpg" alt="">';
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