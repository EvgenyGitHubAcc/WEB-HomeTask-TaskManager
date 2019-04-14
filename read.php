<?php

function updateTask($arrayStr)
{
    for($i = 0; $i < count($arrayStr); ++$i)
   {
       $data = explode(";", $arrayStr[$i]);
       if(strtotime($data[0]) - time() > 60 * 60 * 24)
       {
           echo "<tr>
                <td>" . $data[0] . "</td>
                <td>" . $data[1] . "</td>
                <td>
                    <a href='delete.php?DelLnk=" . $i . "' >X</a>
                </td>
                 <td>
                    <a href='modify.php?ModLnk=" . $i . "' >M</a>
                </td>
             </tr>";
       }
       else if(strtotime($data[0]) - time() < 60 * 60 * 24 && strtotime($data[0]) - time() > 0)
       {
           echo "<tr>
                <td bgcolor='orange'>" . $data[0] . "</td>
                <td bgcolor='orange'>" . $data[1] . "</td>
                <td bgcolor='orange'>
                    <a href='delete.php?DelLnk=" . $i . "' >X</a>
                </td>
                 <td bgcolor='orange'>
                    <a href='modify.php?ModLnk=" . $i . "' >M</a>
                </td>
             </tr>";
       }
       else
       {
           echo "<tr>
                <td bgcolor='red'>" . $data[0] . "</td>
                <td bgcolor='red'>" . $data[1] . "</td>
                <td bgcolor='red'>
                    <a href='delete.php?DelLnk=" . $i . "' >X</a>
                </td>
                 <td bgcolor='red'>
                    <a href='modify.php?ModLnk=" . $i . "' >M</a>
                </td>
             </tr>";
       }
   }
}

function readTask()
{
    $arrayStr = file('data.txt');
    updateTask($arrayStr);
}