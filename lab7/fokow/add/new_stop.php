<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../styles.css">
	<title>Add a stop</title>
</head>

<body>
	<h1>Add a new Stop:</h1>
	<form action="process/add_a_stop.php" method="POST" autocomplete="off">
		*
		<label for="address">Stop Address: </label>
		<input type="text" name="address" id="address" placeholder="address" required />
		<br>

		&nbsp;&nbsp;
		<label for="name">Stop Name: </label>
		<input type="text" name="name" id="name" placeholder="name" />
		<br>
		
		<input type="submit" name="addAStop" value="Add a stop" />
	</form>

	<a href="../index.php">Go back</a>


</body>
</html>

