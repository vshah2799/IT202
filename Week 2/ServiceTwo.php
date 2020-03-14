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
if (!isset($_SESSION['pinCheckSession'])){
    print("You do not have the credentials to access this page");
    header ("refresh: 3 ; url=ServiceOne.php");
    exit();
}

print($_SESSION['choice']);