<?php

if(isset($_POST['LogoutBtn']))
{
    setcookie("auth",'0', time() - 1);
}

if(isset($_POST['SaveBtn']))
{
    if($_POST['Login'] == "Login" && $_POST['Pass'] == "Pass")
    {
        if(isset($_POST['RmbChBox']))
        {
            setcookie("auth",'ok', time() + 60*60*24*7);
        }
        else
        {
            setcookie("auth",'ok', time() + 60*60);
        }
        header('location: index.php');
    }
    else
    {
        header('location: login.php');
    }
}

echo '<form action="login.php" method="post">
        <input type="text" name="Login">
        <input type="text" name="Pass">
        <input name="SaveBtn" value="Login" type="submit">
        <input type="checkbox" name="RmbChBox" value="Remember Me" >
        </form>';
