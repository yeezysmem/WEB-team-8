<label for="stop_list">Choose the Bus Stop:</label>

<select name="stop_id" id="stop_list" required>

    <option hidden disabled selected value > --- select --- </option>
    <?php include __DIR__ . "/options/stops.php"; ?>

</select>
<br>