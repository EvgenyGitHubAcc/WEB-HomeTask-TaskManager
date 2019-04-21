<?php

require_once 'connection.php';

session_start();

$db = mysqli_connect($host, $user, $password, $database);

//if(isset($_COOKIE['auth']))
//{
//    $_SESSION['Id'] = $_COOKIE['auth'];
//    header('location: index.php');
//    exit();
//}

if(isset($_POST['RegisterBtn']))
{
    header('location: register.php');
}

if(isset($_POST['LogoutBtn']))
{
    if(!isset($_COOKIE['auth']))
    {
        setcookie("auth",'0', time() - 1);
    }
    if (isset($_SESSION['Id']))
    {
        session_destroy();
    }
}

if(isset($_POST['SaveBtn']))
{
    $query ="SELECT * FROM users";
    $result = mysqli_query($db, $query);

    while($row = mysqli_fetch_assoc($result))
    {
        if($_POST['Login'] == $row['Login'] && $_POST['Pass'] == $row['Password'])
        {
            if (!isset($_SESSION['Id']))
            {
                $_SESSION['Id'] = $row['Id'];
            }
            if(isset($_POST['RmbChBox']))
            {
                setcookie("auth", $row['Id'], time() + 60*60*24*7);
            }
            header('location: index.php');
            exit();
        }
    }
    header('location: login.php');
}

mysqli_close($db);

echo '<form action="login.php" method="post">
        <input type="text" name="Login">
        <input type="text" name="Pass">
        <input name="SaveBtn" value="Login" type="submit">
        <input type="checkbox" name="RmbChBox" value="Remember Me" >
        <input name="RegisterBtn" value="Register" type="submit">
        </form>';
