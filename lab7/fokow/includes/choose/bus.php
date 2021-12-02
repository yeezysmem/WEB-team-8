<label for="bus_list">Choose the Bus:</label>

<select name="bus_id" id="bus_list" required>

    <option hidden disabled selected value > --- select --- </option>
    <?php include __DIR__ . "/options/buses.php"; ?>

</select>
<br>