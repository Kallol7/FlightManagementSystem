<?php include_once "header.php"; ?>
<?php include_once "includes/admin.inc.php"; ?>
<?php require_once 'includes/functions.inc.php'; ?>

<html>

<head>
    <title>
        Add Flight Schedule Details
    </title>
    <style>
        input,
        select {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
        }

        input[type="submit"] {
            background-color: #030337;
            color: white;
            border-radius: 7px;
            padding: 7px 30px;
            margin: 0px 200px;
        }

        input[type="submit"] {
            border: none;
            outline: none;
            background: #576490;
            color: white;
            font-size: 18px;
            border-radius: 4px;
            margin-bottom: 40px;
        }

        input[type="submit"]:hover {
            cursor: pointer;
            background: #C9CAD9;
            color: #000;
            border: 0.5px solid #030337
        }

        .left-padding {
            margin-left: 65px;
            margin-right: auto;
            margin-top: 50px;
        }

        h2 {
            text-align: left;
        }

        select {
            min-width: 232px;
        }
        
        strong{
            padding-left: 25px;
        }
        
    </style>
    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 500vh; background-repeat: no-repeat">

    <?php include_once "admin_navigation.php"; ?>

    <div class="left-padding">
        <h2>ENTER THE AIRCRAFT TO BE DEACTIVATED</h2>
        <form action="deactivate_jet_details_form_handler.php" method="post">

            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Aircraft has been successfully activated.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>*Invalid Jet ID entered, please enter again.</strong>
						<br>
						<br>";
				}
			?>
           
            <table cellpadding="5" style="padding-left: 20px;">
                <tr>
                    <td class="fix_table">Enter a valid Jet ID</td>
                </tr>
                <tr>
                    <td class="fix_table">
                        <select list="jet_id" name="jet_id" required>
                            <?php  getAirCraftId(); ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Deactivate" name="Deactivate">
            
        </form>
    </div>
</body>

</html>
