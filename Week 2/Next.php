<?php
session_start();
//Check if the logged entry of $_SESSION is undefined
if (!isset($_SESSION['logged'])){
    print("LOGIN PLEASE");
    header ("refresh: 3 ; url=Form.php");
    exit();
}


//Testing script code that you shouldn't see unless they have the right credentials
print("HELLO");