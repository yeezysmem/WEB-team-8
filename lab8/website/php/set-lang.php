<?php


if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
} else {
    $lang = 'en';
}


setcookie('lang', $lang, time() + 3600, '/');

header("Location: ../index.php");
