<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Show the Bus Schedule</title>
</head>

<body>
    <a href="../index.php">Go back</a>

    <?php 
    require_once __DIR__ . '/../includes/database.php';
    require_once __DIR__ . '/../includes/helper_functions.php';


    if (isset($_GET['showBusSchedule'])) {

        // Getting input
        $bus_id = $_GET['bus_id'];
        $time_from = $_GET['time_from'];
        $time_to = $_GET['time_to'];

        heading($conn, $bus_id, $time_from, $time_to);


        // Query
        $sql = "SELECT 
        `schedule`.time,
        CONCAT(routes.name, ': ', routes.direction) AS route,
        route_stops.stop_order,
        IFNULL(stops.name, stops.address) AS name

        FROM 
        routes, stops, route_stops, `schedule`

        WHERE
        `schedule`.bus_id = $bus_id AND 
        (`schedule`.time BETWEEN '$time_from' AND '$time_to') AND

        `schedule`.route_stop_id = route_stops.id AND
        routes.id = route_stops.route_id AND
        stops.id = route_stops.stop_id" ;


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
                        <th>Stop order</th>
                        <th>Stop</th>
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
function heading($conn, $bus_id, $time_from, $time_to) {
    $bus_info_sql = "SELECT *
    FROM buses 
    WHERE id = '$bus_id'";

    $bus_info = mysqli_fetch_assoc(mysqli_query($conn, $bus_info_sql));

    $bus_show = "id: " . $bus_id
    . ($bus_info['model'] ? 
        (", model: " . $bus_info['model']) : "")
    . ($bus_info['prod_year'] ? 
        (", production year: " . $bus_info['prod_year']) : "");

    echo "<h2> A schedule of the bus with the: <br> <u>$bus_show</u> </h2>";
} ?>