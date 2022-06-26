<?php include_once "header.php"; ?>
<?php include_once "includes/admin.inc.php"; ?>
<?php require_once 'includes/functions.inc.php'; ?>

<html>

<head>
    <title>
        Add Flight Schedule Details
    </title>
    <style>
        input,select {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
        }

        input[type="submit"] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 200px;
        }

        input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
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
            border: 1.5px solid #030337
        }

        .left-padding {
            margin-left: 65px;
            margin-right: auto;
            margin-top: 50px;
        }

        h2 {
            text-align: left;
        }
        
        strong{
            margin-left: 6px;
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
        <h2>ENTER AIRCRAFT DETAILS</h2>
        <form action="add_jet_details_form_handler.php" method="post" autocomplete="off">

            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Aircraft has been successfully added.</strong>
						<br><br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>*Jet ID already exists, please enter a new Jet ID.</strong>
						<br><br>";
				}
			?>
            <table cellpadding="5">
				<tr>
					<td class="fix_table">Enter a valid Jet ID</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="jet_id" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the Jet Type/Model</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="jet_type" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Enter the total capacity of the Jet</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="number" name="jet_capacity" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Submit" name="Submit">
        </form>
    </div>
</body>

</html>
