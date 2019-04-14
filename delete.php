<?php

if (isset($_GET['DelLnk']))
{
    header('location: index.php');
    removeTask($_GET['DelLnk']);
}

function removeTask($rowNumber)
{
    $arrayStr = file('data.txt');
    unset($arrayStr[$rowNumber]);
    file_put_contents("data.txt", $arrayStr);
    updateTask($arrayStr);
}