
<ul class="nav_list">
            <li>
                <a href = "homepage.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class = "links_name">Dashboard</span>
                </a>
                <span class = "tooltip">Dashboard</span>
            </li>
            <li>
                <a href="googlemap.php">
                    <i class='bx bx-map-alt' ></i>
                    <span class="links_name">Campus Map</span>
                </a>
                <span class = "tooltip">Campus Map</span>
            </li>
            <li>
                <a href = "chatpage.php">
                    <i class='bx bxs-group'></i>
                    <span class="links_name">Group Matcher</span>
                </a>
                <span class = "tooltip">Group Matcher</span>
            </li>
            <li>
                <a href="eventpage.php">
                    <i class='bx bx-calendar-event' ></i>
                    <span class="links_name">Student Events</span>
                </a>
                <span class = "tooltip">Student Events</span>
            </li>
            <li>
                <a href="Translator.php">
                    <i class='bx bx-globe'></i>
                    <span class="links_name">Translator</span>
                </a>
                <span class = "tooltip">Translator</span>
            </li>
            <li>
                <a href="usersetting.php">
                    <i class='bx bxs-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
                <span class = "tooltip">Setting</span>
            </li>
            <!-- admin option display -->
            <?php 
            if($_SESSION['role']!='user'){
                    echo '<li>';
                    echo '<a href = "ad_mod_hp.php">';
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
