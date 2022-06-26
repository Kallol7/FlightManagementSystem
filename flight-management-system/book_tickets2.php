<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>

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
            padding: 7px 15px;
        }

        input[type=number] {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 15px;
            max-width: 150px;
        }

        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 500px
        }

        input[type=radio] {
            margin-right: 30px;
        }
        
        input[type=text]{
            max-width: 150px;
        }

        select {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 6.5px 15px;
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

        input[type="submit"]:hover {
            cursor: pointer;
            background: #C9CAD9;
            color: #000;
            border: 1.5px solid #030337
        }

        #form {
            width: 100%;
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "navigation.php"; ?>
    <div class="container">

        <?php
			$no_of_pass=$_SESSION['no_of_pass'];
			$class=$_SESSION['class'];
			$count=$_SESSION['count'];
			$flight_no=$_POST['select_flight'];
			$_SESSION['flight_no']=$flight_no;
			//$pass_name=array();
			echo "<h2>ADD PASSENGERS DETAILS</h2>";
			echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
			while($count<=$no_of_pass)
			{
					echo "<p><strong>PASSENGER ".$count."<strong></p>";
					echo "<table cellpadding=\"0\">";
					echo "<tr>";
					echo "<td class=\"fix_table_short\">Passenger's Name</td>";
					echo "<td class=\"fix_table_short\">Passenger's Age</td>";
					echo "<td class=\"fix_table_short\">Passenger's Gender</td>";
					echo "<td class=\"fix_table_short\">Passenger's Inflight Meal</td>";
//					echo "<td class=\"fix_table_short\">Passenger's Frequent Flier ID (if applicable)</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
					echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
					echo "<td class=\"fix_table_short\">";
					echo "<select name=\"pass_gender[]\">";
  					echo "<option value=\"male\">Male</option>";
  					echo "<option value=\"female\">Female</option>";
  					echo "<option value=\"other\">Other</option>";
  					echo "</select>";
  					echo "</td>";
  					echo "<td class=\"fix_table_short\">";
					echo "<select name=\"pass_meal[]\">";
  					echo "<option value=\"yes\">Yes</option>";
  					echo "<option value=\"no\">No</option>";
  					echo "</select>";
  					echo "</td>";
//  					echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_ff_id[]\"></td>";
					echo "</tr>";
					echo "</table>";
					echo "<br><hr>";
					$count=$count+1;
				}
//				echo "<br><h2>ENTER TRAVEL DETAILS</h2>";
//				echo "<table cellpadding=\"5\">";
//				echo "<tr>";
//				echo "<td class=\"fix_table_short\">Do you want access to our Premium Lounge?</td>";
//				echo "<td class=\"fix_table_short\">Do you want to opt for Priority Checkin?</td>";
//				echo "<td class=\"fix_table_short\">Do you want to purchase Travel Insurance?</td>";
//				echo "</tr>";
//				echo "<tr>";
//				echo "<td class=\"fix_table\">";
//				echo "Yes <input type='radio' name='lounge_access' value='yes' checked/> No <input type='radio' name='lounge_access' value='no'/>";
//  				echo "</td>";
//  				echo "<td class=\"fix_table\">";
//				echo "Yes <input type='radio' name='priority_checkin' value='yes' checked/> No <input type='radio' name='priority_checkin' value='no'/>";
//  				echo "</td>";
//  				echo "<td class=\"fix_table\">";
//				echo "Yes <input type='radio' name='insurance' value='yes' checked/> No <input type='radio' name='insurance' value='no'/>";
//  				echo "</td>";
//				echo "</tr>";
//				echo "</table>";
				echo "<br>";
				echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
				echo "</form>";
		?>
    </div>

</body>

</html>
