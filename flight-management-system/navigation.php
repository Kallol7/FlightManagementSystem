<div class="navigation">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="search_flight.php">Search Flight</a></li>
        <li><a href='customer_homepage.php'>Book Flight</a></li>
        <li><a href="aboutUs.php">About Us </a></li>

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
