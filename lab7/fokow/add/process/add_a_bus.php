<?php 
require_once __DIR__ . '/../../includes/database.php';

if (isset($_POST['addABus'])) {

	// Getting input
	$model = trim($_POST['model']);
	$prod_year = trim($_POST['prod_year']);

	if (empty($model)) {
		$model = 'NULL';
	} else {
		$model = "'$model'";
	}
	if (empty($prod_year)) {
		$prod_year = 'NULL';
	} else {
		$prod_year = "'$prod_year'";
	}


	// Query
	$sql = "INSERT INTO buses (model, prod_year)
	VALUES ($model, $prod_year)";
	mysqli_query($conn, $sql);


	// Message
	if (mysqli_affected_rows($conn) > 0) {
		echo '<p>Bus Successfully Added!</p>';
	} else {
		echo '<p>Bus was NOT ADDED!</p>';
		echo '<p><b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';
	}
}


echo '<a href="../new_bus.php">Go back</a>';