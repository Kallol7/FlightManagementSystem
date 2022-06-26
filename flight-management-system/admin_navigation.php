<div class="navigation">
    <ul>
        <li><a href="admin_homepage.php">Dashboard</a></li>
        <li><a href="admin_flight_details.php">Flight Details</a></li>
        <li><a href="admin_aircraft_details.php">Aircraft</a></li>
        <?php
            if(isset($_SESSION["useruid"])){
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
            }
            else{
                echo "<li><a href='registration.php'>Registration</a></li>";
                echo "<li><a href='login.php'>Login</a></li>";
            }
        ?>
    </ul>
</div>
