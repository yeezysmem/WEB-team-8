<!-- 
The root folder for the image paths from the database is:
website/images/goods
-->

<?php

// Начинаем сессию
session_start([
  // Stay logged in for an hour
  'cookie_lifetime' => 3600,
]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose goods</title>

    <!-- CSS: -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css  " />

    <link rel="stylesheet" type="text/css" href="jQuery/jquery-ui.css">
    <link rel="stylesheet" href="../../styles/styles.css" />
    <!-- CSS for Flags: -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css" integrity="sha512-UwbBNAFoECXUPeDhlKR3zzWU3j8ddKIQQsDOsKhXQGdiB5i3IHEXr9kXx82+gaHigbNKbTDp3VY/G6gZqva6ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts: -->
    <script src="../../script/languages/en.js"></script>
    <script src="../../script/languages/ru.js"></script>
    <script src="../../script/languages/uk.js"></script>

    <script src="../../script/lang.js"></script>
    <!-- ----- -->
</head>


<body>
  <?php include 'includes/choose-lang.php' ?>

  <a href="../../index.php">Back to the Main page</a>

  <?php 
  require_once __DIR__ . '/../config/connect.php';
  require_once __DIR__ . '/includes/helper_functions.php';


  if (isset($_GET['category'])) {

    $category = $_GET['category'];

    // heading($connect, $category);
    echo "<br><br><br>";
    echo "<h2> All goods by the category: <u>$category</u> </h2>";
    echo "<br><br>";


    // Query
    $sql = "
    SELECT goods.id, images.`path`, goods.name, goods.quantity
    FROM goods, categories, images

    WHERE goods.category_id = categories.id AND
    categories.name = '$category' AND
    images.good_id = goods.id AND
    images.id IN 
    (
        SELECT min(images_id)
        FROM 
        (
            SELECT goods.id AS goods_id, images.id AS images_id
            FROM goods, images
            WHERE goods.id = images.good_id
            ) AS T

        GROUP BY goods_id
    )";

    $result = mysqli_query($connect, $sql);


    // Output
    if (! $result) {
        echo "<p> <b>ERROR!</b> Could not execute: <br> $sql </p>";
        echo '<p> <b>MySQL Error:</b> ' . mysqli_error($connect) . '</p>';

    } elseif (mysqli_num_rows($result) == 0) {
        echo "<p> Sorry! No suitable results were found in the database for your request. </p>";

    } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td> 
                            <img src="../../images/goods/<?= $row['path']; ?>" alt="">
                        </td>

                        <td> 
                            <?= $row['name']; ?>
                        </td>

                        <td> 
                            <?= $row['quantity']; ?>
                        </td>

                        <td>
                          <form action="show-a-good.php?good_id=<?= $row['id'] ?>">
                            <input type="submit" name="more_info" value="More info"
                            class="button" style="margin: 15px 30px" /></form>

                        </td>

                    </tr> 
                <?php }?>


            </tbody>
        </table>
    <?php }
} ?>

</body>
</html>








<?php // implode('</td><td>', array_values($row)); ?>


<?php //goods_table_with_buttons($result); ?>


<!-- <form action="<?php // post_the_id('add-to-cart.php', $row['id'])?>">
    <input type="submit" name="add_to_cart" value="Add to cart" />
</form> -->


<!-- 
Returns the HTML code of the table body with two more buttons:
show more info, add to cart.

$result - a mysqli object
-->







<?php 
// Heading function
// function heading($connect, $category) {

// } 

?>


