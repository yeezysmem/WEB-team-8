<?php include 'database.php'; ?>

<?php

	$tv_show = $_POST['tv_show'];
	$genre = $_POST['genre'];
	$description = $_POST['description'];

mysqli_query($connect, "INSERT INTO `tv_shows` (`id`,`tv_show`, `genre`, `description`) VALUES(NULL, '$tv_show', '$genre', '$description')");
