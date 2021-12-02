<?php include 'database.php'; ?>

<?php

	$channel = $_POST['channel'];
	$specialization = $_POST['specialization'];

mysqli_query($connect, "INSERT INTO `channels` (`channel`, `specialization`) VALUES ('$channel', '$specialization')");

