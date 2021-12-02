<label for="route_list">Choose the Route:</label>

<select name="route_id" id="route_list" required>

    <option hidden disabled selected value > --- select --- </option>
    <?php include __DIR__ . "/options/routes.php"; ?>

</select>
<br>