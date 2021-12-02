<?php 
require_once __DIR__ . '/../../includes/database.php';

if (isset($_POST['addASchedule'])) {

	// Getting input
	$bus_id = $_POST['bus_id'];
	$route_stop_info = explode ("|", $_POST['route_stop_info']);

	$route_stop_id = $route_stop_info[0];
	$route_stop_route = $route_stop_info[1];
	$route_stop_order = $route_stop_info[2];
	$route_stop_stop_name = $route_stop_info[3];

	$time = $_POST['time'];


	// Query
	$sql = "INSERT INTO schedule (bus_id, route_stop_id, time) 
	VALUES ('$bus_id', '$route_stop_id', '$time')";
	mysqli_query($conn, $sql);


	// Message
	if (mysqli_affected_rows($conn) > 0) {
		echo "<p>Success!</p><br>";
		echo "<p>Now Bus with <u>id $bus_id</u> 
		<br><br>
		is scheduled to arrive to the
		Stop <u>$route_stop_order. '$route_stop_stop_name'</u>
		<br><br>
		of the Route <u>$route_stop_route</u> 
		<br><br>
		at the time <u>" . str_replace("T", ", ", $time) . "</u>.</p>
		<br><br><br>";
	} else {
		echo '<p>Route Stop was NOT ADDED to the Bus!</p>';
		echo '<p><b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';
	}
}


echo '<a href="../new_schedule.php">Go back</a>';