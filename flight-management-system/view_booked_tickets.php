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
        }

        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 390px
        }

        table {
            border-collapse: collapse;
            margin-left: 10%;
            margin-right: 10%;
        }
        
        td{
            text-align: center;
        }

        tr

        /*:nth-child(3)*/
            {
            border: solid thin;
        }

        .set_nice_size {
            font-size: 17pt;
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

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "navigation.php"; ?>
    <div style="text-align:center; margin-top:50px;">
        <div class="container">
            <h3 class='set_nice_size'>
                <center><u>Upcoming Trips</u></center>
            </h3>
            <?php
			$todays_date=date('Y-m-d',strtotime('+6 hours'));
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			$customer_id=$_SESSION['username'];
			require_once('Database Connection file/mysqli_connect.php');
			$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ss",$customer_id,$todays_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>No upcoming trips!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
                <th>Departure Time</th>
				<th>Class</th>
				<th>Booking Status</th>
				<th>No. of Passengers</th>
				<th>Payment ID</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)) {
                $departure_time=getDepartureTime($flight_no,$journey_date);
        			echo "<tr>
        			<td>".$pnr."</td>
        			<td>".$date_of_reservation."</td>
					<td>".$flight_no."</td>
					<td>".$journey_date."</td>
					<td>".$departure_time."</td>
					<td>".$class."</td>
					<td>".$booking_status."</td>
					<td>".$no_of_passengers."</td>
					<td>".$payment_id."</td>
        			</tr>";
    			}
    			echo "</table> <br>";
			}
			echo "<br><h3 class=\"set_nice_size\"><center><u>Completed Trips</u></center></h3>";

			$query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? and journey_date<? and journey_date>=? ORDER BY  journey_date";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"sss",$customer_id,$todays_date,$thirty_days_before_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no,$journey_date,$class,$booking_status,$no_of_passengers,$payment_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>No trips completed in the past 30 days!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr><th>PNR</th>
				<th>Date of Reservation</th>
				<th>Flight No.</th>
				<th>Journey Date</th>
				<th>Class</th>
				<th>Booking Status</th>
				<th>No. of Passengers</th>
				<th>Payment ID</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<tr>
        			<td>".$pnr."</td>
        			<td>".$date_of_reservation."</td>
					<td>".$flight_no."</td>
					<td>".$journey_date."</td>
					<td>".$class."</td>
					<td>".$booking_status."</td>
					<td>".$no_of_passengers."</td>
					<td>".$payment_id."</td>
        			</tr>";
    			}
    			echo "</table> <br>";
			}
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		?>
        </div>
    </div>
</body>

</html>
