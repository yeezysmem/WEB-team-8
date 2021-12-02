<?php

require_once '../config/connect.php';

$id_book = $_POST['id_book'];
$id_author = $_POST['id_author'];

mysqli_query($connect, "INSERT INTO `authors-books` (`ID`, `ID-book`, `ID-author`) VALUES (NULL, '$id_book', '$id_author')");

header('Location: /');