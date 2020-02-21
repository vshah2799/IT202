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

//Pin handling code
//Make pin, mail the pin, remember the pin, supply pin form

$pin = mt_rand(1000, 9999);
print("<br>$pin");//ONLY FOR TESTING
$_SESSION ["pin"] = $pin;
$msg = $pin;
$subj = "Enter pin in form";
$to = "vs598@g.njit.edu" ;
mail ($to, $subj, $msg );

?>

<form action = "Pin.php">
    <input type = text name = "pin" > Enter pin<br>
    <input type = submit>
</form>

