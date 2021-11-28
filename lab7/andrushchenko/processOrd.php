<?php include 'database.php'; ?>

<?php

	$med_id = $_POST['medicine_id'];
	$emp_id = $_POST['employee_id'];
	$order_date = $_POST['order_date'];
	$order_time = $_POST['order_time'];
	$total_cost = $_POST['total_cost'];

mysqli_query($connect, "INSERT INTO Orders (medicine_id, employee_id, order_date, order_time, total_cost)
						VALUES('$med_id', '$emp_id', '$order_date', '$order_time', $total_cost)");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>Order ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'Order NOT ADDED!';
	echo mysqli_errno($connect);
}