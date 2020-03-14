<?php
function authenticate ($ucid, $password, $db)
{
    $p = "SELECT ucid, pass
      FROM USERS
      WHERE ucid = '$ucid' and pass = '$password' 
      ";
    ($t = mysqli_query($db, $p) )or die(mysqli_error($db));
    $numRows = mysqli_num_rows($t);
    if ($numRows == 0){
        return false;
    }
    else{
        return true;
    }
}

function safe($data){
    global $db;
    $temp = $_GET[$data];
    $temp = mysqli_real_escape_string($db, $temp);
    return $temp;
}
