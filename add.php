<?php

if (isset($_POST['AddBtn']))
{
    if($_POST)
    {
        header('location: index.php');
        addTask();
    }
}

function addTask()
{
    if(isset($_POST['Date']) && isset($_POST['Task']))
    {
        if(strtotime($_POST['Date']))
        {
            $arrayStr = [];
            $arrayStr = file('data.txt');
            array_push($arrayStr, $_POST['Date'] . ";" .  $_POST['Task'] . PHP_EOL);
            file_put_contents("data.txt", $arrayStr);
            updateTask($arrayStr);
        }
    }
}
