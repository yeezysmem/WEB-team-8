<?php include 'database.php'; ?>

<?php

	$specialization = $_POST['specialization'];


mysqli_query($connect, "INSERT INTO Orders (specialization)
						VALUES('$specialization')");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>specialization ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'specialization NOT ADDED!';
	echo mysqli_errno($connect);
}