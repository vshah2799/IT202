<?php
session_start();
//Check if the logged entry of $_SESSION is undefined
if (!isset($_SESSION['pin'])){
    print("LOGIN PLEASE");
    header ("refresh: 3 ; url=Next.php");
    exit();
}

print("HELLO. IT WORKED");