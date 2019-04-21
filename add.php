<?php

session_start();

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
            require_once 'connection.php';
            $db = mysqli_connect($host, $user, $password, $database);

            $query ="SELECT COUNT(*) AS `COUNT` FROM tasks";
            $taskNumber = mysqli_fetch_row(mysqli_query($db, $query))[0];

//            echo "<pre>";
//            print_r($taskNumber);
//            exit();

            $query ="INSERT INTO `tasks` (`UserId`, `DeadLine`, `Task`) 
                    VALUES  (
                    '" . $_SESSION['Id'] . "', 
                    '" . strtotime($_POST['Date']) . "',
                    '" . $_POST['Task'] . "')";
                    
            mysqli_query($db, $query);
            mysqli_close($db);
            updateTask();
        }
    }
}
