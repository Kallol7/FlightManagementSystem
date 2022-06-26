<?php include_once "header.php"; ?>
<?php include_once "includes/bookflight.inc.php"; ?>


<html>
<head>

    <link href="css/navigation.css" rel="stylesheet" type="text/css">
    <link href="css/bookflight.css" rel="stylesheet" type="text/css">

</head>

<body style="background:url(img/planePhoto.jpg); background-size:400% 400vh; background-repeat: no-repeat">

    <?php include_once "navigation.php"; ?>

    <div class="container">
        <form class="form-group">

            <!--            <h1 style="text-align: center">Book Flight</h1>-->

            <div id="form">
                <h3 style="color:black;">Booking Details</h3>
                <div id="input">
                    <input type="text" id="input-group" placeholder="From">
                    <input type="text" id="input-group" placeholder="To">
                    <input type="text" id="input-group" placeholder="Departure Date">
                    <input type="text" id="input-group" placeholder="Departure Time">
                    <select id="input-group" style="background: black" ;>
                        <option value=""> preffered Airline </option>
                        <option value=""> Bangladesh Biman </option>
                        <option value=""> US bangla</option>
                    </select>
                    <select id="input-group" style="background: black" ;>
                        <option value=""> preffered seating </option>
                        <option value=""> Economy Class </option>
                        <option value=""> Business Class</option>
                        <option value=""> First Class</option>
                    </select>
                </div>

                <div id="input2">
                    <input type="number" id="input-group" placeholder="Adult">
                    <input type="number" id="input-group" placeholder="Children(2-11 year)">
                    <input type="number" id="input-group" placeholder="Infant(under 2 year)">
                </div>

                <div id="input3">
                    <span id="input-group" class="text-primary">Select Your Fare </span>

                    <input type="radio" id="input-group" name="r">

                    <label style="color:white;" class="text-white" for="input-group">One Way</label>

                    <input type="radio" id="input-group" name="r">
                    <label style="color:white;" class="text-white" for="input-group">Round Trip</label>
                </div>

                <div id="input4">
                    <input type="text" id="input-group" placeholder="Return Date">
                    <input type="text" id="input-group" placeholder="Return Time">
                    <input type="text" id="input-group1" placeholder="Any Message">
                </div>

                <div id="input5">
                    <h3 style="color:Black;">Personal Details</h3>

                </div>

                <div id="input6">
                    <input type="text" id="input-group" placeholder="Full Name">
                    <input type="number" id="input-group" placeholder="Phone Number">
                    <input type="Email" id="input-group1" placeholder="Email">
                </div>

                <button type="submit" class="btn-warning text-white"> Submit Form</button>
                <button type="Reset" class="btn-primary "> Clear Form</button>



            </div>
        </form>
    </div>

</body>

</html>
