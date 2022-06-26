<?php include_once "header.php"; ?>
<?php include_once "includes/admin.inc.php"; ?>

<html>

<head>
    <title>
        View Aircraft List
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
            text-align: center;
            max-width: 80%;
            overflow: auto;
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
        
        .container{
            width: 60%;
            margin-left: 20px;
        }

    </style>
</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "admin_navigation.php"; ?>
    <div style="margin-top:35px;">
        <div class="container">
            <h2 class='set_nice_size'>
                <u>Aircraft List</u>
            </h2>
            <?php
			$todays_date=date('Y-m-d',strtotime('+6 hours'));
			$thirty_days_before_date=date_create(date('Y-m-d'));
			date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); 
			$thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
			
			require_once('Database Connection file/mysqli_connect.php');
			
            $query="SELECT jet_id,jet_type,total_capacity,active FROM jet_details where total_capacity>=? ORDER BY jet_id";
			$stmt=mysqli_prepare($dbc,$query);
            $zero=0;
			mysqli_stmt_bind_param($stmt,"i",$zero);
			mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$jet_id,$jet_type,$total_capacity,$active);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				echo "<h3><center>No upcoming flights!</center></h3>";
			}
			else
			{
				echo "<table cellpadding=\"10\"";
				echo "<tr>
                <th>Aircraft ID</th>
				<th>Type</th>
				<th>Capacity</th>
				<th>Active</th>
				</tr>";
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<tr>
        			<td>".$jet_id."</td>
        			<td>".$jet_type."</td>
					<td>".$total_capacity."</td>
					<td>".$active."</td>
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
