<?php include 'database.php'; ?>

<?php

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$patronymic = $_POST['patronymic'];
	$emp_phone_number = $_POST['emp_phone_number'];
	$tin = $_POST['tin'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];

mysqli_query($connect, "INSERT INTO Employees (first_name, last_name, patronymic, phone_number, tin, position, salary)
						VALUES('$first_name', '$last_name', '$patronymic', '$emp_phone_number', $tin, '$position', $salary)");

if(mysqli_affected_rows($connect) > 0){
	echo '<p>Employee ADDED!</p>';
	echo '<a href="index.php">Go back</a>';
} else {
	echo 'Employee NOT ADDED!';
	echo mysqli_errno($connect);
}