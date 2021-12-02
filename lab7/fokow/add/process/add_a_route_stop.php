<?php 
require_once __DIR__ . '/../../includes/database.php';

if (isset($_POST['addARouteStop'])) {

	// Getting input
	$route_id = $_POST['route_id'];
	$stop_id = $_POST['stop_id'];
	$stop_order = $_POST['stop_order'];


	// Query
	$sql = "INSERT INTO route_stops (route_id, stop_id, stop_order) 
	VALUES ('$route_id', '$stop_id', '$stop_order')";
	mysqli_query($conn, $sql);


	// Message
	if (mysqli_affected_rows($conn) > 0) {
		echo "<p>Success!</p>";
		echo "<p>Now the Route (with id $route_id) has the Stop (with id $stop_id) in it, as the Stop №$stop_order.</p>";
	} else {
		echo '<p>Stop was NOT ADDED to the Route!</p>';
		echo '<p><b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';
	}
}


echo '<a href="../new_route_stop.php">Go back</a>';