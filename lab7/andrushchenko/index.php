<!DOCTYPE html>
<html>
<head>
<style>
	label{
		display: inline-block;
		width: 100px;
		margin-bottom: 10px;
	}
</style>
<title>Lab 7</title>
</head>
<body>
<a href="suppliers.html"><h1>Add Suppliers</h1></a>
<a href="medicines.html"><h1>Add Medicines</h1></a>
<a href="employees.html"><h1>Add Employee</h1></a>
<a href="orders.html"><h1>Add Orders</h1></a>

<form method="get" action="representSup.php">
<label>Check all suppliers from Ukraine</label>
<input type="submit" name="show_suppliers" value="Show">
</form>
<form method="get" action="representMed.php">
<label>Check all medicine which request no prescription</label>
<input type="submit" name="show_medicine" value="Show">
</form>
<form method="get" action="representEmp.php">
<label>Check all employees</label>
<input type="submit" name="show_employees" value="Show">
</form>
<form method="get" action="representOrd.php">
<label>Check all orders with total cost greater than 100 UAH</label>
<input type="submit" name="show_orders" value="Show">
</form>

</body>
</html>