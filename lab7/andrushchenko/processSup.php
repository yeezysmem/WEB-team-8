<?php include 'database.php'; ?>

<?php

	$sup_name = $_POST['sup_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$representative = $_POST['representative'];
	$sup_phone_number = $_POST['sup_phone_number'];

mysqli_query($connect, "INSERT INTO suppliers (name, address, city, country, representative, phone_number)
						VALUES('$sup_name', '$address', '$city', '$country', '$representative', '$sup_phone_number')");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>Supplier ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'Supplier NOT ADDED!';
	echo mysqli_errno($connect);
}