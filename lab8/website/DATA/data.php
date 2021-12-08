<?php

require '../config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Login</th>
            <th>Password</th>
        </tr>

        <?php

        /*
         * Делаем выборку всех строк из таблицы "authors"
         */

        $users = mysqli_query($connect, "SELECT * FROM `users`");
        
        /*
         * Преобразовываем полученные данные в нормальный массив
         */

        $users = mysqli_fetch_all($users);

        /*
         * Перебираем массив и рендерим HTML с данными из массива
         */

        foreach ($users as $users) {
            ?>
            <tr>
                <td><?= $users[0] ?></td>
                <td><?= $users[1] ?></td>
                <td><?= $users[2] ?></td>
                <td><?= $users[3] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <a href="../index.php">НАЗАД</a>
</body>
</html>