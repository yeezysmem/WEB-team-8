<?php

require_once '../config/connect.php';

$fname = $_POST['fname'];
$sname = $_POST['sname'];

mysqli_query($connect, "INSERT INTO `authors` (`ID-author`, `Fname`, `Sname`) VALUES (NULL, '$fname', '$sname')");

header('Location: /');