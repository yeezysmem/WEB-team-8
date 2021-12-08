<?php

require_once __DIR__ . '/../config/connect.php';

$name = filter_var(
    trim($_POST['name']),
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

// $password = md5($password."pass12345");

mysqli_query(
    $connect,
    "INSERT INTO `users` (`id`, `name`, `login`, `password`) 
VALUES (NULL, '$name', '$login', '$password')"
);

header('Location: ../../index.php');
