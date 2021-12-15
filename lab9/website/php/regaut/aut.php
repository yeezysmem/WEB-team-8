<?php

require_once __DIR__ . '/../config/connect.php';

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


$sql = "SELECT * FROM `users` 
WHERE `login` = '$login' AND 
`password` = '$password'";

$result = mysqli_query($connect, $sql);
$user = $result->fetch_assoc();

if (is_null($user) or count($user) == 0) {
    // Login info doesn't match
    header('Location: ../../index.php?login-attempt=failed#regaut');
    exit();
} else {
    session_start([
        // Stay logged in for an hour
        'cookie_lifetime' => 3600,
    ]);
    // Set session variables
    $_SESSION["last_entered_login"] = $login;
    $_SESSION["last_entered_password"] = $password;

    $_SESSION["user_id"] = $user['id'];
    $_SESSION["user_is_admin"] = $user['is_admin'];
    $_SESSION["secret_user_cookie"] = generateRandomString(32);

    // Set user cookies
    setcookie('secret_user_cookie', $_SESSION["secret_user_cookie"], time() + 3600, "/");
    setcookie('user', $user['name'], time() + 3600, "/");
}

header('Location: ../../index.php?login-attempt=success#regaut');



// Random secret cookie generator
function generateRandomString($length = 16)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
