<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>

<html>
<head>
    <title>Register form</title>
    <link href="css/registration.css" rel="stylesheet" type="text/css">
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    
    <style>
        div.register{
            width: 85%;
        }
        
        .register h2{
            padding: 30px;
            margin-left: 49px;
            text-align: left;
            padding-bottom: 22px;
        }
        form#register{
            margin: 8px 85px 45px;
            padding: 0;
            font-weight: bold;
        }
        
        input{
            margin-top: 2px;
        }
    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">
    
    <?php
        if(!($_SESSION["admin"]==="true")){
            include_once "navigation.php";
        } else include_once "admin_navigation.php";
    ?>

    <div class="main">
        <div class="register">
            <h2>Change Password </h2>
            <form id="register" method="post" action="includes/changepass.inc.php">
                <label>Current Password: </label>
                <br />
                <input type="password" name="pwd" placeholder="Enter Password" required>
                <br /><br />
                
                <label>New Password: </label>
                <br />
                <input type="password" name="pwdnew" placeholder="Enter Password" required>
                <br /><br />


                <label>Confirm Password: </label>
                <br />
                <input type="password" name="pwdrepeat" placeholder="Confirm Password" required>
                <br /><br />

                <button type="submit" name='change_pass_submit'>Submit</button>
                <button type="reset" name="reset">Reset</button>

            </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"]=="emptyinput"){
                        echo "<center><b><p>Fill in all the fields!</p></center></b>";
                    }
                    else if($_GET["error"]=="passdontmatch"){
                        echo "<center><b><p>Password did't match!</p></center></b>";
                    }
                    else if($_GET["error"]=="stmtfailed"){
                        echo "<center><b><p>Something went wrong!</p></center></b>";
                    }
                    else if($_GET["error"]=="wrongpass"){
                        echo "<center><b><p>Wrong Password!</p></center></b>";
                    }
                    else if($_GET["error"]=="none"){
                        echo "<center><b><p>Password Changed!</p></center></b>";
                    }

                }
            ?>
        </div>
    </div>


</body>

</html>
