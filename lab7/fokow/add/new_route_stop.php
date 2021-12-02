<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles.css">
	<title>Add a Stop to the Route</title>
</head>

<body>
	<h1>Add a Stop to the Route:</h1>
	
	<form action="process/add_a_route_stop.php" method="POST" autocomplete="off">
		*
		<?php include __DIR__ . "/../includes/choose/route.php"; ?>
		<br>

		*
		<?php include __DIR__ . "/../includes/choose/stop.php"; ?>
		<br>

		*
		<label for="stop_order">Stop Order: </label>
		<input type="text" name="stop_order" id="stop_order" placeholder="number" required/>
		<br>
		
		<input type="submit" name="addARouteStop" value="Add stop to the route" />
	</form>


	<a href="../index.php">Go back</a>
</body>
</html>

