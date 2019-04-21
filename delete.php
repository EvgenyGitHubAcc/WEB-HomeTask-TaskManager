<?php

session_start();

if (isset($_GET['DelLnk']))
{
    header('location: index.php');
    removeTask($_GET['DelLnk']);
}

if (isset($_POST['DelProfBtn']))
{
    header('location: login.php');
    removeUser($_SESSION['Id']);
}

function removeTask($rowNumber)
{
//    $arrayStr = file('data.txt');
//    unset($arrayStr[$rowNumber]);
//    file_put_contents("data.txt", $arrayStr);

    require_once 'connection.php';

    $db = mysqli_connect($host, $user, $password, $database);

    $query ="DELETE FROM `tasks` WHERE Id = " . $rowNumber . " AND UserId = " . $_SESSION['Id'];

    $result = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        $arrayStr[] = $row;
    }

    updateTask();
    mysqli_close($db);
}

function removeUser($Id)
{
    require_once 'connection.php';
    $db = mysqli_connect($host, $user, $password, $database);

    $query ="DELETE FROM `users` WHERE Id = " . $Id;
    mysqli_query($db, $query);
}