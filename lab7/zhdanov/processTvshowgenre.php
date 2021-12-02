<?php include 'database.php'; ?>

<?php

	$genre = $_POST['genre'];
 


mysqli_query($connect, "INSERT INTO tv_programs (genre)
						VALUES('$genre'");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>tv_programs ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'tv_programs NOT ADDED!';
	echo mysqli_errno($connect);
}