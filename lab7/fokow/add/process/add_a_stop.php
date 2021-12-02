<?php 
require_once __DIR__ . '/../../includes/database.php';

if (isset($_POST['addAStop'])) {

	// Getting input
	$address = trim($_POST['address']);
	$name = trim($_POST['name']);

	if (empty($name)) {
		$name = 'NULL';
	} else {
		$name = "'$name'";
	}


	// Query
	$sql = "INSERT INTO stops (address, name) 
	VALUES ('$address', $name)";
	mysqli_query($conn, $sql);


	// Message
	if (mysqli_affected_rows($conn) > 0) {
		echo '<p>Stop Successfully Added!</p>';
	} else {
		echo '<p>Stop was NOT ADDED!</p>';
		echo '<p><b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';
	}
}


echo '<a href="../new_stop.php">Go back</a>';