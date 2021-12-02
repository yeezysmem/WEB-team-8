<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles.css">
	<title>Add a bus</title>
</head>

<body>
	<h1>Add a new Bus:</h1>
	<form action="process/add_a_bus.php" method="POST" autocomplete="off">
		&nbsp;&nbsp;
		<label for="model">Bus Model: </label>
		<input type="text" name="model" id="model" placeholder="model name" />
		<br>
		
		&nbsp;&nbsp;
		<label for="prod_year">Production Year: </label>
		<input type="text" name="prod_year" id="prod_year" placeholder="year (1901 to 2155)" />
		<br>
		
		<input type="submit" name="addABus" value="Add a bus" />
	</form>

	<a href="../index.php">Go back</a>


</body>
</html>

