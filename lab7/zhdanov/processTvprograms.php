<?php include 'database.php'; ?>

<?php

	$date = $_POST['date'];
	$start_time = $_POST['start_time'];
	$finish_time = $_POST['finish_time'];
	$num_program = $_POST['num_program'];
	$num_channel = $_POST['num_channel'];

mysqli_query($connect, "INSERT INTO `tv_programs` (`id`, `date`, `start_time`, `finish_time`, `num_program`, `num_channel`) VALUES (NULL, '$date', '$start_time', '$finish_time', NULL, NULL)");


