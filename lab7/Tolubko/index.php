<?php

require 'config/connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Engineering</title>
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
    <h3>Add New Author</h3>
        <form action="create/create_a.php" method="post">
            <p>First name</p>
            <input type="text" name="fname">
            <p>Surname name</p>
            <input type="text" name="sname"> <br><br>
            <button type="submit">Add new author</button>
        </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Surname</th>
        </tr>

        <?php

        /*
         * Делаем выборку всех строк из таблицы "authors"
         */

        $authors = mysqli_query($connect, "SELECT * FROM `authors`");

        /*
         * Преобразовываем полученные данные в нормальный массив
         */

        $authors = mysqli_fetch_all($authors);

        /*
         * Перебираем массив и рендерим HTML с данными из массива
         */

        foreach ($authors as $authors) {
            ?>
            <tr>
                <td><?= $authors[0] ?></td>
                <td><?= $authors[1] ?></td>
                <td><?= $authors[2] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>


    <h3>Add New Book</h3>
    <form action="create/create_b.php" method="post">
        <p>Name</p>
        <input type="text" name="name">
        <p>Year</p>
        <input type="numer" name="year"> <br><br>
        <button type="submit">Add new book</button>
    </form>
    <br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Year</th>
        </tr>

        <?php

        /*
         * Делаем выборку всех строк из таблицы "authors"
         */

        $books = mysqli_query($connect, "SELECT * FROM `books`");

        /*
         * Преобразовываем полученные данные в нормальный массив
         */

        $books = mysqli_fetch_all($books);

        /*
         * Перебираем массив и рендерим HTML с данными из массива
         */

        foreach ($books as $books) {
            ?>
            <tr>
                <td><?= $books[0] ?></td>
                <td><?= $books[1] ?></td>
                <td><?= $books[2] ?> p.</td>
            </tr>
            <?php
        }
        ?>
    </table>


    <h3>Add New Connect</h3>
    <form action="create/create_c.php" method="post">
        <p>Book</p>
        <textarea type="text" name="id_book"></textarea>
        <p>Author</p>
        <textarea type="text" name="id_author"></textarea> <br><br>
        <button type="submit">Add new connect</button>
    </form>

</body>
</html>
