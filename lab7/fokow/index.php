<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles.css">
	<title>Bus Scheduling System</title>
</head>

<body>
	<div class="add_menu">
		<h2>Add data to the database</h2>
		<ul>
			<li> <a href="add/new_bus.php">Add a new Bus</a> </li>
			<li> <a href="add/new_stop.php">Add a new Bus Stop</a> </li>
			<li> <a href="add/new_route.php">Add a new Bus Route</a> </li> 
			<br>

			<li> <a href="add/new_route_stop.php">Link Stops to the Route</a> (add route_stops) </li>
			<li> <a href="add/new_schedule.php"> Link Route Stops to the Bus</a> (add schedule) </li>
		</ul>
		<br><br><br><br><br>
	</div>

	<div class="inf_model">
		<img src="img/inf.png" alt="Infological model">
	</div>

	<div class="clear"></div>



	<h2>Display data</h2>


	<!-- Show 1 -->
	<hr>
	<p class="instruction">
		Show <b><u>all stops</u></b> of a the <u>selected route</u>:
	</p>

	<form action="show/route_stops.php" method="GET">
		<?php include __DIR__ . "/includes/choose/route.php"; ?>

		<input type="submit" name="showRouteStops" value="Show" />
	</form>
	<br><br>


	<!-- Show 2 -->
	<hr>
	<p class="instruction">
		Show a <b><u>shedule of all buses arriving</u></b> to the <u>selected bus stop</u>:
	</p>

	<form action="show/buses_arriving.php" method="GET">
		<?php include __DIR__ . "/includes/choose/stop.php"; ?>

		<label for="time_from">Time FROM: </label>
		<input type="datetime-local" name="time_from" id="time_from" 
		value="2000-01-01T00:00" required />
		<br>

		<label for="time_to">Time TO: </label>
		<input type="datetime-local" name="time_to" id="time_to" 
		value="2030-01-01T00:00" required/>
		<br>

		<input type="submit" name="showBusesArriving" value="Show" />
	</form>
	<br><br>


	<!-- Show 3 -->
	<hr>
	<p class="instruction">
		Show a <b><u>schedule</u></b> of the <u>selected bus</u>:
	</p>

	<form action="show/bus_schedule.php" method="GET">
		<?php include __DIR__ . "/includes/choose/bus.php"; ?>

		<label for="time_from">Time FROM: </label>
		<input type="datetime-local" name="time_from" id="time_from" 
		value="2000-01-01T00:00" required />
		<br>

		<label for="time_to">Time TO: </label>
		<input type="datetime-local" name="time_to" id="time_to" 
		value="2030-01-01T00:00" required/>
		<br>

		<input type="submit" name="showBusSchedule" value="Show" />
	</form>



	<div class="long_break"></div>
</body>
</html>