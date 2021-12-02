<?php 
require_once __DIR__ . '/../../database.php';

$sql_routes = "SELECT * FROM routes";
$routes = mysqli_query($conn, $sql_routes);


while ($row = mysqli_fetch_assoc($routes)) {
    echo "<option value=" . $row['id'] . ">"
    . $row['name'] . ": " . $row['direction']
    . "</option>";
}