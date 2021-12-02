<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Show Buses Arriving</title>
</head>

<body>
    <a href="../index.php">Go back</a>

    <?php 
    require_once __DIR__ . '/../includes/database.php';
    require_once __DIR__ . '/../includes/helper_functions.php';


    if (isset($_GET['showBusesArriving'])) {

        // Getting input
        $stop_id = $_GET['stop_id'];
        $time_from = $_GET['time_from'];
        $time_to = $_GET['time_to'];

        heading($conn, $stop_id, $time_from, $time_to);


        // Query
        $sql = "SELECT 
        `schedule`.time,
        CONCAT(routes.name, ': ', routes.direction) AS route,
        buses.id AS bus_id,
        buses.model AS bus_model, 
        buses.prod_year AS bus_prod_year

        FROM 
        buses, route_stops, `schedule`, routes

        WHERE 
        route_stops.stop_id = $stop_id AND
        routes.id = route_stops.route_id AND

        `schedule`.route_stop_id = route_stops.id AND 
        (`schedule`.time BETWEEN '$time_from' AND '$time_to') AND
        buses.id = schedule.bus_id" ;


        $result = mysqli_query($conn, $sql);


        // Output
        if (! $result) {
            echo "<p> <b>ERROR!</b> Could not execute: <br> $sql </p>";
            echo '<p> <b>MySQL Error:</b> ' . mysqli_error($conn) . '</p>';

        } elseif (mysqli_num_rows($result) == 0) {
            echo "<p> No suitable results were found in the database for your request. </p>";

        } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Route</th>
                        <th>Bus id</th>
                        <th>Bus model</th>
                        <th>Bus production year</th>
                    </tr>
                </thead>

                <tbody>
                    <?php table_body_from($result); ?>
                </tbody>
            </table>
        <?php }
    }?>

</body>
</html>




<?php 
// Heading function
function heading($conn, $stop_id, $time_from, $time_to) {
    $stop_info_sql = "SELECT IFNULL(name, address) AS name
    FROM stops 
    WHERE id = '$stop_id'";

    $stop_info = mysqli_fetch_assoc(mysqli_query($conn, $stop_info_sql));
    $stop_show = $stop_info['name'];

    $time_show = "between <u>" 
    . str_replace('T', ', ', $time_from) . ""
    . "</u> and <u>"
    . str_replace('T', ', ', $time_to) . "</u>";

    echo "<h2> Schedule of buses arriving to
    the <u>bus stop '$stop_show</u>'</h2>
    <h3>($time_show)</h3>";
} ?>