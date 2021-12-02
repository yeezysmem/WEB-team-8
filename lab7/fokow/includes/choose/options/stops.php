<?php 
require_once __DIR__ . '/../../database.php';

$sql_stops = "SELECT * FROM stops";
$stops = mysqli_query($conn, $sql_stops);


while ($row = mysqli_fetch_assoc($stops)) {
    echo "<option value=" . $row['id'] . ">"
    . ($row['name'] ? $row['name'] : $row['address'])
    . "</option>";
}