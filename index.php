<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'read.php';

//if(!array_key_exists ('auth', $_COOKIE))
//{
//    header('location: login.php');
//}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Расписание</title>
</head>
<body>

<form action="add.php" method="post">
    <input type="date" name="Date" value="2019-01-01">
    <input type="text" name="Task" placeholder="Введите задание">
    <input name="AddBtn" value="Добавить" type="submit">
</form>

<form action="login.php" method="post">
    <input name="LogoutBtn" value="Выйти" type="submit">
</form>

<form action='delete.php' method='post'>
    <input name='DelProfBtn' value='Удалить профиль' type='submit'>
</form>

<table name="TaskTable" border="1">
    <tr>
        <th>Дата</th>
        <th>Задание</th>
        <th>Удаление</th>
        <th>Редактирование</th>
    </tr>

    <?php updateTask();?>

</table>
</body>
</html>