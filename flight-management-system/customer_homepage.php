<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>


<html>

<head>


    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">

    <style>
        a:hover {
            background-color: transparent;
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "navigation.php"; ?>

    <div class="container">
        <div class="form-group">

            <!--            <h1 style="text-align: center">Book Flight</h1>-->

            <div id="form">
                <?php
			echo "<h2>Welcome ",ucfirst($_SESSION['username']),"</h2>";
//			require_once('Database Connection file/mysqli_connect.php');
//			$query="SELECT count(*),frequent_flier_no,mileage FROM Frequent_Flier_Details WHERE customer_id=?";
//			$stmt=mysqli_prepare($dbc,$query);
//			mysqli_stmt_bind_param($stmt,"s",$_SESSION['username']);
//			mysqli_stmt_execute($stmt);
//			mysqli_stmt_bind_result($stmt,$cnt,$frequent_flier_no,$mileage);
//			mysqli_stmt_fetch($stmt);
//			if($cnt==1)
//			{
//				echo "<h4 style='padding-left: 20px;'>Frequent Flier No.: ".$frequent_flier_no."&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Mileage: ".$mileage." points</h4><br>";
//			}
//			mysqli_stmt_close($stmt);
//			mysqli_close($dbc);
		?>
                <table cellpadding="5">
                    <tr>
                        <td class="admin_func"><a href="book_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Book Flight Tickets</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View Booked Flight Tickets</a>
                        </td>
                    </tr>
<!--
                    <tr>
                        <td class="admin_func"><a href="mailto:admin@bangladeshairways.com?Subject=cancel%20ticket" target="_top"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Ticket</a>
                        </td>
                    </tr>
                    
-->
                    <!--
                    <tr>
                        <td class="admin_func"><a href="pnr.php"><i class="fa fa-plane" aria-hidden="true"></i> Print Booked Ticket</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="cancel_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Cancel Booked Flight Tickets</a>
                        </td>
                    </tr>
-->
                </table>
                <!--Following data fields were empty!
			...
			
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
			PREDEFINED LOCATION WHEN BOOKING TICKETS

		-->
            </div>
        </div>
    </div>

</body>

</html>
