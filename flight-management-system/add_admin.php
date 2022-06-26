<?php include_once "header.php"; ?>
<?php include_once "includes/admin.inc.php"; ?>

<html>
<head>
    <title>Register form</title>
    <link href="css/registration.css" rel="stylesheet" type="text/css">
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "admin_navigation.php"; ?>

    <div class="main">
        <div class="register">
            <h2>Register</h2>
            <form id="register" method="post" action="includes/admin.signup.inc.php">

                <label>First Name: </label>
                <br />
                <input type="text" name="fname" id="name" placeholder="Enter your First Name" required>
                <br /><br />

                <label>Last Name: </label>
                <br />
                <input type="text" name="lname" id="name" placeholder="Enter your Last Name" required>
                <br /><br />

                <!--
                <label>Birthdate: </label>
                <br />
                <input type="date" name="Birthdate">
                <br /><br />
-->

                <label>Email: </label>
                <br />
                <input type="text" name="email" id="name" placeholder="Enter Your Valid Email" required>
                <br /><br />

                <label>Username: </label>
                <br />
                <input type="text" name="uid" id="name" placeholder="Enter Your Username" required>
                <br /><br />

                <!--
                <label>Phone: </label>
                <br />
                <input type="number" name="Phone" id="name" placeholder="Enter Your phone number?">
                <br /><br />
-->

                <label>Gender: </label>
                <input type="Radio" Name="gender" Value="male" required> Male
                <input type="Radio" Name="gender" Value="female" required> Female <br /><br>

                <!--
                <label>Known Language: </label>
                <br />
                <input type="Checkbox" name="lang" id="Hindi">
                <span id="hindi">Hindi</span>
                <input type="Checkbox" name="lang" id="Eng">
                <span id="eng">English</span>
                <input type="Checkbox" name="lang" id="urdu">
                <span id="urdu">Urdu</span>
                <br> <br>
-->

                <label>Password: </label>
                <br />
                <input type="password" name="pwd" placeholder="Enter Password" required>
                <br /><br />

                <label>Confirm Password: </label>
                <br />
                <input type="password" name="pwdrepeat" placeholder="Confirm Password" required>
                <br /><br />

                <button type="submit" name='admin_submit'>Submit</button>
                <button type="reset" name="reset">Reset</button>

            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo "<center><b><p>Fill in all the fields!</p></center></b>";
                    }
                    else if($_GET["error"]=="invaliduid"){
                        echo "<center><b><p>Choose a proper username!</p></center></b>";
                    }
                    else if($_GET["error"]=="invalidemail"){
                        echo "<center><b><p>Choose a proper email!</p></center></b>";
                    }
                    else if($_GET["error"]=="passdontmatch"){
                        echo "<center><b><p>Password didn't match!</p></center></b>";
                    }
                    else if($_GET["error"]=="stmtfailed"){
                        echo "<center><b><p>Something went wrong!</p></center></b>";
                    }
                    else if($_GET["error"]=="usernametaken"){
                        echo "<center><b><p>Username/Email already Taken!</p></center></b>";
                    }
                    else if($_GET["error"]=="none"){
                        echo "<center><b><p>Admin Registration Complete!</p></center></b>";
                    }

                }
            ?>
        </div>
    </div>


</body>

</html>
