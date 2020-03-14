<?php
include("Account.php");
include("myFunctions.php");
session_start();
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project );

//Check if the logged entry of $_SESSION and/or pin is undefined
if (!isset($_SESSION['logged']) && !isset($_SESSION['pin'])){
    print("LOGIN OR START PIN PROCEDURE PLEASE");
    header ("refresh: 3 ; url=PinOne.php");
    exit();
}

//Verifies if pin is correct. If it is, then the user will be sent to ServiceOne.php. If it isn't the user will be sent back to PinOne.php
$pinCheck = safe("pin");
if($pinCheck == $_SESSION["pin"]){
    $_SESSION ["pinCheckSession"] = $pinCheck;
    print("SUCCESSFUL PIN ENTRY");
    header ("refresh: 2 ; url=ServiceOne.php");
}
else{
    print("Incorrect pin. You will be redirected");
    header ("refresh: 2 ; url=PinOne.php");
}