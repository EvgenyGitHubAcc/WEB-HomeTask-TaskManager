<?php

if(isset($_POST['RegisterBtn']))
{
    if(isset($_POST['Login']) && isset($_POST['Pass']))
    {
        register();
    }
}

function register()
{
    require_once 'connection.php';
    $link = mysqli_connect($host, $user, $password, $database);

    $query ="INSERT INTO `users` (`Login`, `Password`) VALUES  ('" . $_POST['Login'] . "', '" . $_POST['Pass'] ."')";
    $result = mysqli_query($link, $query);

    if($link->errno)
    {
        header('location: register.php');
        echo 'Some error occured, try again';
    }
    else
    {
        header('location: index.php');
    }
    mysqli_close($link);
}

echo '<form action="register.php" method="post">
        <input type="text" name="Login">
        <input type="text" name="Pass">
        <input name="RegisterBtn" value="Register" type="submit">
        </form>';

