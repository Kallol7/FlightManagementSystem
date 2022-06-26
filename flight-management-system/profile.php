<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>

<html>

<head>


    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">

    <style>
        a:hover {
            background-color: transparent;
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php
        if(!($_SESSION["admin"]==="true")){
            include_once "navigation.php";
        } else include_once "admin_navigation.php";
    ?>

    <div class="container">
        <div class="form-group">

            <!--            <h1 style="text-align: center">Book Flight</h1>-->

            <div id="form">
                <?php
			echo "<h2>Username: ",ucfirst($_SESSION['username']),"</h2>";

		?>
                <table cellpadding="5">
                    <tr>
                        <td class="admin_func"><a href="change_pass.php"><i class="fa fa-plane" aria-hidden="true"></i> Change Password</a>
                        </td>
                    </tr>
                    
                    
                </table>
            </div>
        </div>
    </div>

</body>

</html>
