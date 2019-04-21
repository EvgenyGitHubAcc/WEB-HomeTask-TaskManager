<?php

session_start();

function updateTask()
{
    require_once 'connection.php';

    $db = mysqli_connect($host, $user, $password, $database);

    $query ="SELECT * FROM tasks WHERE UserId = ". $_SESSION['Id'];

//    echo "<pre>";
//    print_r($result);
//    exit();

    if(!$result = mysqli_query($db, $query))
    {
        exit();
    }

    $arrayStr = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $arrayStr[] = $row;
    }

    mysqli_close($db);

    for($i = 0; $i < count($arrayStr); ++$i)
   {
       if($arrayStr[$i]['DeadLine'] - time() > 60 * 60 * 24)
       {
           echo "<tr>
                <td>" . date("d.m.Y", (int)$arrayStr[$i]['DeadLine']) . "</td>
                <td>" . $arrayStr[$i]['Task'] . "</td>
                <td>
                    <a href='delete.php?DelLnk=" . $arrayStr[$i]['Id'] . "' >X</a>
                </td>
                 <td>
                    <a href='modify .php?ModLnk=" . $arrayStr[$i]['Id'] . "' >M</a>
                </td>
             </tr>";
       }
       else if($arrayStr[$i]['DeadLine'] - time() < 60 * 60 * 24 && $arrayStr[$i]['DeadLine'] - time() > 0)
       {
           echo "<tr>
                <td bgcolor='orange'>" . date("d.m.Y", (int)$arrayStr[$i]['DeadLine']) . "</td>
                <td bgcolor='orange'>" . $arrayStr[$i]['Task'] . "</td>
                <td bgcolor='orange'>
                    <a href='delete.php?DelLnk=" . $arrayStr[$i]['Id'] . "' >X</a>
                </td>
                 <td bgcolor='red'>
                    <a href='modify.php?ModLnk=" . $arrayStr[$i]['Id'] . "' >M</a>
                </td>
             </tr>";
       }
       else
       {
           echo "<tr>
                <td bgcolor='red'>" . date("d.m.Y", (int)$arrayStr[$i]['DeadLine']) . "</td>
                <td bgcolor='red'>" . $arrayStr[$i]['Task'] . "</td>
                <td bgcolor='red'>
                    <a href='delete.php?DelLnk=" . $arrayStr[$i]['Id'] . "' >X</a>
                </td>
                 <td bgcolor='red'>
                    <a href='modify.php?ModLnk=" . $arrayStr[$i]['Id'] . "' >M</a>
                </td>
             </tr>";
       }
   }
}
