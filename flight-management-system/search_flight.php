<?php include_once "header.php"; ?>

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
            margin: 0px 390px;
        }

        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            text-align: center;
        }

        tr

        /*:nth-child(3)*/
            {
            border: solid thin;
        }

        td:not(:first-child) {
            text-transform: capitalize;
        }

        .set_nice_size {
            font-size: 17pt;
        }

        th:nth-child(1) {
            text-align: center;
        }

        td:nth-child(1) {
            text-align: center;
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
    <div style="text-align:center; margin-top:40px;">
        <div class="container">
            <h3 class='set_nice_size'>
                <center>Upcoming Flights</center>
            </h3>
            <?php
			$todays_date=date('Y-m-d',strtotime('+6 hours'));
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			require_once('Database Connection file/mysqli_connect.php');
			
            $query="SELECT flight_no,from_city,to_city,departure_date,arrival_date,price_economy,price_business,jet_id FROM flight_details where departure_date>=? ORDER BY departure_date";
            
//            $query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"s",$todays_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$arrival_date,$price_economy,$price_business,$jet_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>No upcoming flights!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr>
                <th>Flight No.</th>
				<th>Origin</th>
				<th>Destination</th>
				<th>Journey Date</th>
				<th>Price (Economy)</th>
                <th>Price (Business)</th>
                
				</tr>";
//                <th>arrival_date</th>
//                <th>Jet Id</th>
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<tr>
        			<td>".$flight_no."</td>
        			<td>".$from_city."</td>
					<td>".$to_city."</td>
					<td>".$departure_date."</td>
					<td>".$price_economy."</td>
                    <td>".$price_business."</td>
                    
        			</tr>";
    			}
//                <td>".$arrival_date."</td>
//                <th>$jet_id</th>
    			echo "</table> <br>";
			}
			
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		?>
        </div>
    </div>
</body>

</html>
