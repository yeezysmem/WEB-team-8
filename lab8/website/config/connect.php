<?php

/// Подключение

$connect = mysqli_connect('localhost', 'root', '', 'sysadmin');

if (!$connect) {
    die(error);
}