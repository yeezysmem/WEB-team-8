<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles.css">
	<title>Add a route</title>
</head>

<body>
	<h1>Add a new Route:</h1>
	<form action="process/add_a_route.php" method="POST" autocomplete="off">
		*
		<label for="name">Route Name: </label>
		<input type="text" name="name" id="name" placeholder="route name" required/>
		<br>
		
		*
		<label for="direction">Route Direction: (forward?) </label>
		<input type="checkbox" name="direction" id="direction"/>
		<br>
		
		<input type="submit" name="addARoute" value="Add a route" />
	</form>

	<a href="../index.php">Go back</a>


</body>
</html>

