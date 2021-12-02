<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Show Route Stops</title>
</head>

<body>
    <a href="../index.php">Go back</a>

    <?php 
    require_once __DIR__ . '/../includes/database.php';
    require_once __DIR__ . '/../includes/helper_functions.php';


    if (isset($_GET['showRouteStops'])) {

        // Getting input
        $route_id = $_GET['route_id'];

        heading($conn, $route_id);


        // Query
        $sql = "SELECT
        route_stops.stop_order,
        IFNULL(stops.name, stops.address) AS name

        FROM 
        route_stops, stops

        WHERE
        route_stops.route_id = '$route_id' AND 
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
                        <th>Stop order</th>
                        <th>Stop name (or address)</th>
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
function heading($conn, $route_id) {
    $route_info_sql = "SELECT name, direction
    FROM routes 
    WHERE id = '$route_id'";

    $route_info = mysqli_fetch_assoc(mysqli_query($conn, $route_info_sql));
    $route_show = $route_info['name'] . ": " 
    . $route_info['direction'];

    echo "<h2> All stops of the route 
    <u>$route_show</u> </h2>";
} ?>