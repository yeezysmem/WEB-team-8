<?php

require '../config/connect.php';

$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];

mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password')");

header('Location: /');