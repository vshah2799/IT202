<?php
include("Account.php");
include('config.php');
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project );

//Check if the logged entry of $_SESSION is undefined
if (!isset($_SESSION['logged'])){
    print("LOGIN PLEASE");
    header ("refresh: 2 ; url=Form.php");
    exit();
}

//Pin handling code
//Make pin, mail the pin, remember the pin, supply pin form
$pin = mt_rand(1000, 9999);
print("The pin is <br>$pin");//ONLY FOR TESTING
$_SESSION ["pin"] = $pin;
$msg = $pin;
$subj = "Enter pin in form";
$to = "vs598@g.njit.edu" ;
mail ($to, $subj, $msg );
?>
<form action = "PinTwo.php">
    <input type = text name = "pin" autocomplete="off" > Enter pin<br>
    <input type = submit>
</form>

