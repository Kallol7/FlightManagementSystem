<?php

$serverName="localhost";
$dBUserName="root";
$dBPassword="";
$dBName="flightmanagement";

$dbc=mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

if (!$dbc) {
    die("Connection failed: ".mysqli_connect_error());
}
