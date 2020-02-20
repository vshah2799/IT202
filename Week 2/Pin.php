<?php
session_start();
//Check if the logged entry of $_SESSION is undefined
if (!isset($_SESSION['logged'])){
    print("LOGIN PLEASE");
    header ("refresh: 3 ; url=Next.php");
    exit();
}
//ACTUALLY VERIFY IF THE PIN WAS CORRECT> IT DOESN'T YET
print("HELLO. IT WORKED");