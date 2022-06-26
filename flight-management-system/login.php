<?php include_once "header.php"; ?>

<html>
<head>
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh;">

    <?php include_once "navigation.php"; ?>

    <div class="loginbox">
        <img src="img/loginPic.png" class="loginPic" />
        <h2>Log In</h2>
        <form action="includes/login.inc.php" method="post">
            <p>Username</p>
            <input type="text" name="uid" placeholder="Username/Email" required>
            <p>Password</p>
            <input type="password" name="pwd" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login" required>
            <a href="#">Forgot Your Password?</a><br />
            <a href="#">Create New Account?</a><br />
        </form>

        <?php
        if(isset($_GET["error"])){
            if($_GET["error"]=="emptyinput"){
                echo "<center><b><p>Fill in all the fields!</p></center></b>";
            } 
            else if($_GET["error"]=="wronglogin"){
                echo "<center><b><p>Incorrect Username or Password!</p></center></b>";
            }
            else if($_GET["error"]=="loginfirst"){
                echo "<center><b><p>Please log in to book flight</p></center></b>";
            }
        }
        ?>

    </div>
</body>

</html>
