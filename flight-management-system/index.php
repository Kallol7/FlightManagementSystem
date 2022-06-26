<?php include_once "header.php"; ?>

<html>

<head>

    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles.css" type="text/css">

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <style>
        body {
            min-width: 862px;
        }

        .home_table {
            display: inline-grid;
            /*            height: 180px;*/
            margin-right: auto;
            /*            border-collapse: collapse;*/
            text-align: center;
            max-width: 100%;
            overflow: auto;
            /* color: #fdfefe; */
            margin-left: 3.4721%;
        }

        h3 {
            text-align: center;
            color: #2c3348;
        }

        tr

        /*:nth-child(3)*/
            {
            border: solid thin;
        }

        td {
            text-transform: capitalize;
        }

        th:nth-child(1) {
            text-align: center;
        }

        td:nth-child(1) {
            text-align: center;
        }

        .set_nice_size {
            font-size: 17pt;
        }

        div.left {
            float: left;
            margin: 85px;
            margin-top: 115px;
        }

        h2,
        h4,
        th {
            color: #2c3348;
        }

        .newspart a {
            color: #030337;
            display: inline-block;
        }

        .more {
            margin-top: 15px;
        }

        .newspart a:hover {
            color: #030337;
            font-style: italic;
            text-decoration: underline
        }

        center.ml {
            margin-left: -15px;
        }

        .indent {
            display: inline-block;
            margin-top: 1px;
            margin-bottom: 1px;
            padding-left: 40px;
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:4900px 120%;">

    <?php include_once "navigation.php"; ?>
    <div class="clearfix">
        <div class="left">
            <h1 class="hero" style="overflow: auto">Welcome to Bangladesh Airways</h1>
            <marquee direction='up' scrollamount='4' height='150px'>
                <h3 class='set_nice_size'>Flights In Next 4 Hours</h3>
                <?php
            $d=strtotime("09:00am March 25 2021");
            $t=strtotime("01:20pm March 25 2021");
			$todays_date=date('Y-m-d', strtotime('+6 hours'));
            $todays_date=date('Y-m-d', $d);
            $time_ahead=date('H:i:s', strtotime('+10 hours'));
            $time_ahead=date('H:i:s', $t);
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			require_once('Database Connection file/mysqli_connect.php');
			
            $query="SELECT flight_no,from_city,to_city,departure_date,arrival_date,price_economy,price_business,jet_id FROM flight_details where departure_date=? and departure_time<? ORDER BY departure_time";
            
//            $query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($dbc,$query);
			mysqli_stmt_bind_param($stmt,"ss",$todays_date,$time_ahead);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$arrival_date,$price_economy,$price_business,$jet_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>No upcoming flights!</center></h3>";
			}
			else
			{
//                echo "<marquee direction='up' scrollamount='4' height='200px'>";
                echo "<center class='ml'><table class='home_table' cellpadding=\"7\"";
				echo "<tr>
				<th>Origin</th>
				<th>Destination</th>
				<th>Price (Economy)</th>
                <th>Price (Business)</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<tr>
        			<td>".$from_city."</td>
					<td>".$to_city."</td>
					<td>".$price_economy."</td>
                    <td>".$price_business."</td>
        			</tr>";
    			}
    			echo "</table></center>";
                echo "</marquee>";
			}
			
			mysqli_stmt_close($stmt);
			mysqli_close($dbc);
		    ?>
            </marquee>
        </div>

        <div class="newspart">
            <h2> News & Announcements </h2>
            <div class="news">

                <marquee direction="up" height="150px" scrollamount="2">
                    <h4>How to Book Tickets </h4>
                    <p> Step 1: Register/Sign Up.<br>
                        Step 2: Then Login with your credetials (ie. Username and Password).<br>
                        Step 3: Enter Station between which you want to travel and date of journey<br>
                        Step 4: Select Departure Date
                        Step 5: Enter No. Of Passangers and Class ( Economy or Business) .<br>
                        Step 5: Select preferrable flight :<br>
                        <span class="indent">a)Make payemnt</span><br>
                        <span class="indent">b)After payment you get PNR Number</span><br>
                        Step 6: View booked tickets <a href="http://localhost/flight-management-system/view_booked_tickets.php">here</a>
                    </p>

                    <hr>
                </marquee>
                <a class="more" href="">more news...</a>
            </div>
        </div>
    </div>

    <?php include_once "footer.php"; ?>
    
</body>

</html>
