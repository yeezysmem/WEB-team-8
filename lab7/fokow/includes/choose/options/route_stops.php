<?php 
require_once __DIR__ . '/../../database.php';


// Query
$sql_route_stops = "SELECT
route_stops.id,
CONCAT(routes.name, ': ', routes.direction) AS route,
route_stops.stop_order,
IFNULL(stops.name, stops.address) AS stop_name

FROM 
routes, stops, route_stops

WHERE
routes.id = route_stops.route_id AND
stops.id = route_stops.stop_id

ORDER BY 
route ASC,
stop_order ASC" ;


$route_stops = mysqli_query($conn, $sql_route_stops);


while ($row = mysqli_fetch_assoc($route_stops)) {
    echo "<option 
    value='$row[id]|$row[route]|$row[stop_order]|$row[stop_name]' >

    route: $row[route], &emsp; 
    stop $row[stop_order]. $row[stop_name]

    </option>";
}