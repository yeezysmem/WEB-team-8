<?php include 'database.php'; ?>

<?php

	$sup_id = $_POST['supplier_id'];
	$med_name = $_POST['med_name'];
	$purpose = $_POST['purpose'];
	$buy_price = $_POST['buy_price'];
	$sell_price = $_POST['sell_price'];
	$prescription = $_POST['prescription'];

mysqli_query($connect, "INSERT INTO Medicines (supplier_id, title, purpose, buy_price, sell_price, prescription)
						VALUES($sup_id, '$med_name', '$purpose', $buy_price, $sell_price, '$prescription')");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>Medicine ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'Medicine NOT ADDED!';
	echo mysqli_errno($connect);
}