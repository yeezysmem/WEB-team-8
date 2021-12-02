<?php

/// Подключение

$connect = mysqli_connect('localhost', 'root', '', 'radio');

if (!$connect) {
    die(error);
}