<?php include_once "header.php"; ?>
<?php include_once "includes/admin.inc.php"; ?>

<html>

<head>
    <link href="css/bookflight.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "admin_navigation.php"; ?>

    <div class="container">
        <form class="form-group">

            <!--            <h1 style="text-align: center">Book Flight</h1>-->

            <div id="form">
                <h2>Welcome Administrator!</h2>
                <table cellpadding="5">

                    <tr>
                        <td class="admin_func"><a href="admin_view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View List of Booked Tickets for a Flight</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="add_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Add Flight Schedule Details</a>
                        </td>
                    </tr>
                    <!-- <tr>
				<td class="admin_func"><a href="modify_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Modify Flight Schedule Details</a>
				</td>
			</tr> -->
                    <tr>
                        <td class="admin_func"><a href="delete_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Delete Flight Schedule Details</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="add_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Add Aircrafts Details</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="activate_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Activate Aircraft</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="deactivate_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Deactivate Aircraft</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="admin_func"><a href="add_admin.php"><i class="fa fa-plane" aria-hidden="true"></i> Add another Admin</a>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

</body>

</html>
