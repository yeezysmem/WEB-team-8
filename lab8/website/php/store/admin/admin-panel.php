<?php

// Начинаем сессию
session_start([
  // Stay logged in for an hour
  'cookie_lifetime' => 3600,
]);


// Check if user is not the admin:
if (!((isset($_SESSION['user_is_admin']) and $_SESSION["user_is_admin"]))) {
    // Impostor came here!
    header('Location: ../../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <!-- CSS: -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css  " />

    <link rel="stylesheet" type="text/css" href="jQuery/jquery-ui.css">
    <link rel="stylesheet" href="../../../styles/styles.css" />
    <!-- CSS for Flags: -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css" integrity="sha512-UwbBNAFoECXUPeDhlKR3zzWU3j8ddKIQQsDOsKhXQGdiB5i3IHEXr9kXx82+gaHigbNKbTDp3VY/G6gZqva6ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Scripts: -->
    <script src="../../../script/languages/en.js"></script>
    <script src="../../../script/languages/ru.js"></script>
    <script src="../../../script/languages/uk.js"></script>

    <script src="../../../script/lang.js"></script>
    <!-- ----- -->
</head>


<body>
    <?php include '../includes/choose-lang.php' ?>

    <center><h1>Admin panel</h1></center>

    <a href="../../../index.php" class="button">
        Back to the Main page
    </a>

    <?php
    require_once __DIR__ . '/../../config/connect.php';
    require_once __DIR__ . '/../includes/helper_functions.php';
    ?>



    <div style="width: 30%; margin: auto; padding: 0px; text-align: center;">
        <br><br><br>
        <h2>Add a new Category:</h2>
        <br>
        <form action="add-a-category.php" method="POST" autocomplete="off">
            &nbsp;&nbsp;
            <label for="name"> Name: </label> <br> <br>
            <input type="text" name="name" id="name" placeholder="category name.." required />
            <br><br><br>

            <input type="submit" class="button" name="addACategory" value="Add a category" />
        </form>
    </div>

    <?php
    if (isset($_GET['add'])) {
        $thing = $_GET['add'];
        if ($_GET['result'] == 'success') {
            echo "<h2 style=\"color: lightgreen;\">
            A new $thing was Successfully Added!
            </h2>";
        } else {
            echo "<h2 style=\"color: pink;\">
            New $thing was NOT ADDED!
            </h2>";
            echo "<p><b>MySQL Error:</b> "
            . str_replace('|', ' ', $_GET['error'])
            . "</p>";
        }
    } ?>


    <div class="empty-space"></div>
    <div class="empty-space"></div>

</body>

</html>
