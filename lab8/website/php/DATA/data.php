<?php

require_once __DIR__ . '/../config/connect.php';
require_once __DIR__ . '/../store/includes/helper_functions.php';


?>

<!DOCTYPE html>
<html lang="$lang">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    th,
    td {
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
            <th>Login</th>
            <th>Password</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Is admin?</th>
        </tr>

        <?php

        // 
        //  Делаем выборку всех строк из таблицы "authors"
        //  
        $sql = "SELECT id, login, password, name, surname, is_admin
        FROM `users`";
        $users = mysqli_query($connect, $sql);

        // Используем функцию, определённую в файле 
        // '../store/includes/helper_functions.php'
        table_body_from($users);



        // (и этого тогда не нужно делать)
        // 
        //  Преобразовываем полученные данные в нормальный массив
        //  
        // $users = mysqli_fetch_all($users);



        // (и этого тоже)
        //
        // Перебираем массив и рендерим HTML с данными из массива
        // 
        // foreach ($users as $users) {
        ?>
        <!-- <tr>
                <td><?php //echo $users[0] 
                    ?></td>
                <td><?php //echo $users[1] 
                    ?></td>
                <td><?php //echo $users[2] 
                    ?></td>
                <td><?php //echo $users[3] 
                    ?></td>
            </tr> -->
        <?php
        // }
        ?>





    </table>

    <p><a href="../../index.php#regaut">НАЗАД</a></p>
</body>

</html>