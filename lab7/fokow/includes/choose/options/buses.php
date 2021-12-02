<?php 
require_once __DIR__ . '/../../database.php';

$sql_buses = "SELECT * FROM buses";
$buses = mysqli_query($conn, $sql_buses);


while ($row = mysqli_fetch_assoc($buses)) {
    echo "<option value=" . $row['id'] . ">"
    . "id: " . $row['id']
    . ($row['model'] ? (", model: " . $row['model']) : "")
    . ($row['prod_year'] ? (", produced in: " . $row['prod_year']) : "")
    . "</option>";
}