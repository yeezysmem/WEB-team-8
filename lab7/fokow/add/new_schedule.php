<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles.css">
	<title>Add a Route Stop to the Bus</title>
</head>

<body>
	<h1>Add a Route Stop to the Bus:</h1>

	<form action="process/add_a_schedule.php" method="POST" autocomplete="off">
		*
		<?php include __DIR__ . "/../includes/choose/bus.php"; ?>
		<br>

		*
		<?php include __DIR__ . "/../includes/choose/route_stop.php"; ?>
		<br>

		*
		<label for="time">Date and Time: </label>
		<input type="datetime-local" name="time" id="time" required/>
		<br>
		
		<input type="submit" name="addASchedule" value="Add route stop to the bus" />
	</form>


	<a href="../index.php">Go back</a>
</body>
</html>

