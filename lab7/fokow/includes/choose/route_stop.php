<label for="route_stop_list">Choose the Route Stop:</label>

<select name="route_stop_info" id="route_stop_list" required>

    <option hidden disabled selected value > --- select --- </option>
    <?php include __DIR__ . "/options/route_stops.php"; ?>

</select>
<br>