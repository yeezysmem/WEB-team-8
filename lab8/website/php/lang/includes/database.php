<?php

// Params to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "root";
$dbName = "bus_schedule";

// Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if connection has failed
if (! $conn) {
	die("Database connection failed!");
}

?>