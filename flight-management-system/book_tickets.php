<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>
<?php require_once 'includes/functions.inc.php'; ?>

<html>

<head>
    <title>
        View Available Flights
    </title>

    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">

    <style>
        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
            min-width: 240px;
            max-width: 240px;
        }

        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 127px;
            max-width: none;
        }

        input[type=date] {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 5.5px 44.5px;
        }

        select {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
            min-width: 240px;
            max-width: 232px;
        }

        input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            background: #576490;
            color: white;
            font-size: 18px;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        select[type="submit"] {
            cursor: pointer;
            background: #C9CAD9;
            color: #000;
            border: 1.5px solid #030337
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "navigation.php"; ?>
    <div class="container">
        <div class="form-group">
            <div id="form">
                <form action="view_flights_form_handler.php" method="post" autocomplete="off">
                    <h2>SEARCH FOR AVAILABLE FLIGHTS</h2>
                    <table cellpadding="5">
                        <tr>
                            <td class="fix_table">Enter the Origin</td>
                            <td class="fix_table">Enter the Destination</td>
                        </tr>
                        <tr>
                            <td class="fix_table">
                                <input list="origins" name="origin" placeholder="From" required>
                                <datalist id="origins">
                                    <option value="Chittagong">Shah Amanat International Airport</option>
                                    <option value="Dhaka">Shahjalal International Airport</option>
                                    <option value="Khulna">Khan Jahan Ali Airport</option>
                                    <option value="Barishal">Barishal Airport</option>
                                    <option value="Rajshahi">Shah Makhdum Airport</option>
                                    <option value="Sylhet">Osmani International Airport</option>
<!--                                    <?php getOrigin(); ?>-->
                                </datalist>
                                <!-- <input type="text" name="origin" placeholder="From" required> -->
                            </td>
                            <td class="fix_table">
                                <select list="destinations" name="destination" placeholder="To" required>
<!--
                                    <option value="dhaka">Dhaka</option>
                                    <option value="khulna">Khulna</option>
                                    <option value="barishal">Barishal</option>
                                    <option value="rajshahi">Rajshahi</option>
                                    <option value="sylhet">Sylhet</option>
                                    <option value="dubai">Dubai (UAE)</option>
                                    <option value="beijing">Beijing (China)</option>
                                    <option value="khulna">Khulna</option>
                                    <option value="barishal">Barishal</option>
                                    <option value="rajshahi">Rajshahi</option>
                                    <option value="sylhet">Sylhet</option>
                                    <option value="dubai">Dubai (UAE)</option>
-->
                                    <?php getDestination(); ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table cellpadding="5">
                        <tr>
                            <td class="fix_table">Enter the Departure Date</td>
                            <td class="fix_table">Enter the No. of Passengers</td>
                        </tr>
                        <tr>
                            <td class="fix_table"><input type="date" name="dep_date" min=<?php 
							$todays_date=date('Y-m-d', strtotime('+6 hours')); 
							echo $todays_date;
						?> max=<?php 
							$max_date=date_create(date('Y-m-d'));
							date_add($max_date,date_interval_create_from_date_string("90 days")); 
							echo date_format($max_date,"Y-m-d");
						?> required></td>
                            <td class="fix_table"><input type="number" name="no_of_pass" placeholder="Eg. 5" required></td>
                        </tr>
                    </table>
                    <br>
                    <table cellpadding="5">
                        <tr>
                            <td class="fix_table">Enter the Class</td>
                        </tr>
                        <tr>
                            <td class="fix_table">
                                <select name="class">
                                    <option value="economy">Economy</option>
                                    <option value="business">Business</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Search for Available Flights" name="Search">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
