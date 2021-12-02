<?php

require_once '../config/connect.php';

$name = $_POST['name'];
$year = $_POST['year'];

mysqli_query($connect, "INSERT INTO `books` (`ID-book`, `Name`, `Year`) VALUES (NULL, '$name', $year)");

header('Location: /');