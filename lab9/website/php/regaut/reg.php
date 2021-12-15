<?php

require_once __DIR__ . '/../config/connect.php';

$name = filter_var(
    trim($_POST['name']),
    FILTER_SANITIZE_STRING
);
$surname = filter_var(
    trim($_POST['surname']),
    FILTER_SANITIZE_STRING
);
$login = filter_var(
    trim($_POST['login']),
    FILTER_SANITIZE_STRING
);
$password = filter_var(
    trim($_POST['password']),
    FILTER_SANITIZE_STRING
);

// Encrypt the password:
// $password = md5($password."pass12345");

$sql = "INSERT INTO `users` 
(`login`, `password`, `name`, `surname`)
VALUES ('$login', '$password', '$name', '$surname')";

mysqli_query($connect, $sql);

// Message
if (mysqli_affected_rows($connect) > 0) {
    header('Location: ../../index.php?registered=success#regaut');
} else {
    header('Location: ../../index.php?registered=failed&error=' 
    . str_replace(' ', '|', mysqli_error($connect))
    . '#regaut');
}
