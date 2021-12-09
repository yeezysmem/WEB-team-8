<?php

// Начинаем сессию
session_start([
  // Stay logged in for an hour
	'cookie_lifetime' => 3600,
]);


// Check if user is not the admin:
if (! ((isset($_SESSION['user_is_admin']) and $_SESSION["user_is_admin"]))) {
    // Impostor came here!
	header('Location: ../../../index.php');
	exit();
}


require_once __DIR__ . '/../../config/connect.php';
require_once __DIR__ . '/../includes/helper_functions.php';


if (isset($_POST['addACategory'])) {

	// Getting input
	$name = trim($_POST['name']);


	// Query
	$sql = "INSERT INTO categories (name)
	VALUES ('$name')";
	mysqli_query($connect, $sql);


	// Message
	if (mysqli_affected_rows($connect) > 0) {
		header('Location: admin-panel.php?add=Category&result=success');
	} else {
		header('Location: admin-panel.php?add=Category&result=failure&error=' 
		. str_replace(' ', '|', mysqli_error($connect)));
	}
}