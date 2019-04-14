<?php

require_once 'read.php';

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
    $arrayStr = file('data.txt');
    $data = explode(";", $arrayStr[$rowNumber]);
    echo '<form action="modify.php" method="post">
        <input type="hidden" name="RowNumber" value="' . $rowNumber . '">
        <input type="date" name="Date" value="' . $data[0] . '">
        <input type="text" name="Task" value="' . $data[1] . '">
        <input name="SaveBtn" value="Сохранить" type="submit">
        </form>';
}

function modifyTask($rowNumber)
{
    $arrayStr = file('data.txt');
    $arrayStr[$rowNumber] = $_POST['Date'] . ";" . $_POST['Task'] . PHP_EOL;
    file_put_contents("data.txt", $arrayStr);
    updateTask($arrayStr);
}