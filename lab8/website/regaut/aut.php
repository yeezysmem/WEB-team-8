<?php

require '../config/connect.php';

$login = filter_var(trim($_POST['login']), 
FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), 
FILTER_SANITIZE_STRING);

// $password = md5($password."pass12345");

$result = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

$user = $result->fetch_assoc();
if(count($user) == 0) {
    echo "Пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

header('Location: ../index.php');