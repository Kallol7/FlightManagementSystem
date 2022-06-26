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
            min-width: 240px;
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
        
        .container table {
            border-collapse: collapse;
            
            margin-right: auto;
            text-align: center;
            max-width: 80%;
            overflow: auto;
        }

        .container tr

        /*:nth-child(3)*/
            {
            border: solid thin;
        }
        
        .container td{
            text-transform: capitalize;
        }
        
        .container th:nth-child(1) {
            text-align: center;
        }

        .container td:nth-child(1) {
            text-align: center;
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
        <h2>VIEW LIST OF BOOKED TICKETS FOR A FLIGHT</h2>
        <form action="admin_view_booked_tickets_form_handler.php" method="post">
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color:green; padding-left:20px;'>The Flight Schedule has been successfully deleted.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red; padding-left:20px;'>*Invalid Flight No./Departure Date, please enter again.</strong>
						<br>
						<br>";
				}
			?>
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Enter a valid Flight No.</td>
					<td class="fix_table">Enter the Departure Date</td>
				</tr>
				<tr>
<!--					<td class="fix_table"><input type="text" name="flight_no" required></td>-->
                    <td class="fix_table">
                        <select list="flightnum" type="text" name="flight_no" required>
<!--                        <datalist id="flightnum">-->
                            <option>ALL</option>
                            <?php getFligtNo(); ?>
<!--                        </datalist>-->
                        </select>
                    </td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Submit" name="Submit">
			</div>
		</form>
    </div>
    
    
</body>

</html>
