<?php

// delete user cookies (by entering already passed expiration time)
setcookie('user', '', time() - 3600, "/");
setcookie('secret_user_cookie', '', time() - 3600, "/");

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('Location: ../../index.php#regaut');
