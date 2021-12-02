<?php 
require_once __DIR__ . '/../../includes/database.php';

if (isset($_POST['addARoute'])) {

	// Getting input
	$name = trim($_POST['name']);
	$direction = $_POST['direction'];


	// Query
	$sql = "INSERT INTO routes (name, direction) 
	VALUES ('$name', '$direction')";
	mysqli_query($conn, $sql);


	// Message
	if (mysqli_affected_rows($conn) > 0) {
		echo '<p>Route Successfully Added!</p>';
	} else {
		echo '<p>Route was NOT ADDED!</p>';
		echo '<p><b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';
	}
}


echo '<a href="../new_route.php">Go back</a>';