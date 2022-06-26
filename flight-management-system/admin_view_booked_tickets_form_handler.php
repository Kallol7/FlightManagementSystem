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

        h2,
        h3 {
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

        .container td {
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
        <h2>LIST OF BOOKED TICKETS FOR THE FLIGHT</h2>

        <div style="text-align:center; margin-top:0px;">
            <div class="container">

                <?php
			if(isset($_POST['Submit']))
			{
				$data_missing=array();
				if(empty($_POST['flight_no']))
				{
					$data_missing[]='Flight No.';
				}
				else
				{
					$flight_no=trim($_POST['flight_no']);
				}
				if(empty($_POST['departure_date']))
				{
					$data_missing[]='Departure Date';
				}
				else
				{
					$departure_date=$_POST['departure_date'];
				}

				if(empty($data_missing))
				{
					require_once('Database Connection file/mysqli_connect.php');
					$query="SELECT pnr,date_of_reservation,flight_no,class,no_of_passengers,payment_id,customer_id FROM Ticket_Details where journey_date=? and booking_status='CONFIRMED' ORDER BY class";
					$stmt=mysqli_prepare($dbc,$query);
					mysqli_stmt_bind_param($stmt,"s",$departure_date);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$pnr,$date_of_reservation,$flight_no_db,$class,$no_of_passengers,$payment_id,$customer_id);
					mysqli_stmt_store_result($stmt);
					if(mysqli_stmt_num_rows($stmt)==0)
					{
						echo "<h3>No booked tickets information is available!</h3>";
					}
					else
					{
                        $x=0;
						while(mysqli_stmt_fetch($stmt)) {
                            if($flight_no_db!=$flight_no and $flight_no!="ALL"){
                                continue;
                            }
                            $x++;
                            if($x==1){
                                echo "<table cellpadding=\"10\"";
                                echo "<tr><th>PNR</th>
                                <th>Date of Reservation</th>
                                <th>Class</th>
                                <th>No. of Passengers</th>
                                <th>Payment ID</th>
                                <th>Customer ID</th>
                                </tr>";
                            }
        					echo "<tr>
							<td>".$pnr."</td>
							<td>".$date_of_reservation."</td>
							<td>".$class."</td>
							<td>".$no_of_passengers."</td>
							<td>".$payment_id."</td>
							<td>".$customer_id."</td>
        					</tr>";
    					}
                        if($x!=0){
    					   echo "</table> <br>";
                        }
                        else{
                            echo "<h3>No tickets booked</h3>";
                        }
    				}
					mysqli_stmt_close($stmt);
					mysqli_close($dbc);
					// else
					// {
					// 	echo "Submit Error";
					// 	echo mysqli_error();
					// }
				}
				else
				{
					echo "The following data fields were empty! <br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
		?>
            </div>
        </div>
    </div>


</body>

</html>
