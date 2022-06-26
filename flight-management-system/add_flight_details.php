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

    </style>
    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 500vh; background-repeat: no-repeat">

    <?php include_once "admin_navigation.php"; ?>

    <div class="left-padding">
        <h2>ENTER THE FLIGHT SCHEDULE DETAILS</h2>
        <form action="add_flight_details_form_handler.php" method="post">

            <?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong>
						<br>
						<br>";
				}
			?>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Flight Id</td>
                </tr>
                <tr>
                    <td class="fix_table">
                        <input type="text" list="flight_no" name="flight_no" required>
                        <datalist id="flight_no">
                            <?php getFlightId(); ?>
                        </datalist>
                    </td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Origin</td>
                    <td class="fix_table">Destination</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="text" name="origin" required></td>
                    <td class="fix_table"><input type="text" name="destination" required></td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Departure Date</td>
                    <td class="fix_table">Arrival Date</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="date" name="dep_date" required></td>
                    <td class="fix_table"><input type="date" name="arr_date" required></td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Departure Time</td>
                    <td class="fix_table">Arrival Time</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="time" name="dep_time" required></td>
                    <td class="fix_table"><input type="time" name="arr_time" required></td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Number of Seats in Economy Class</td>
                    <td class="fix_table">Number of Seats in Business Class</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="number" name="seats_eco" required></td>
                    <td class="fix_table"><input type="number" name=" seats_bus" required></td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Ticket Price(Economy Class)</td>
                    <td class="fix_table">Ticket Price(Business Class)</td>
                </tr>
            </table>
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">
                        <input type="number" name="price_eco" required>
                    </td>
                    <td class="fix_table">
                        <input type="number" name="price_bus" required>
                    </td>
                </tr>
            </table>
            <br>

            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Aircraft ID</td>
                </tr>
                <tr>
                    <td class="fix_table">
                        <select list="jet_id" name="jet_id" required>
                            <?php getAirCraftId(); ?>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Submit" name="Submit">
        </form>
    </div>
</body>

</html>
