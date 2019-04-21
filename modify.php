<?php

require_once 'read.php';

session_start();

if (isset($_GET['ModLnk']))
{
    fillFields($_GET['ModLnk']);
}

if (isset($_POST['SaveBtn']))
{
    header('location: index.php');
    modifyTask($_POST['RowNumber']);
}

function fillFields($rowNumber)
{
    require_once 'connection.php';
    $db = mysqli_connect($host, $user, $password, $database);

    $query = "SELECT * FROM `tasks` WHERE Id = " . $rowNumber;

    $result = mysqli_fetch_assoc(mysqli_query($db, $query));

    mysqli_close($db);

    echo '<form action="modify.php" method="post">
        <input type="hidden" name="RowNumber" value="' . $rowNumber . '">
        <input type="date" name="Date" value="' . date("Y-m-d", (int)$result['DeadLine']) . '">
        <input type="text" name="Task" value="' . $result['Task'] . '">
        <input name="SaveBtn" value="Сохранить" type="submit">
        </form>';
}

function modifyTask($rowNumber)
{
    require_once 'connection.php';
    $db = mysqli_connect($host, $user, $password, $database);

    $query = "UPDATE `tasks`
            SET DeadLine = " .  strtotime($_POST['Date']) . ", 
                Task = '" .  $_POST['Task'] . "'
            WHERE Id = " . $rowNumber;
    mysqli_query($db, $query);
    mysqli_close($db);
    updateTask();

}