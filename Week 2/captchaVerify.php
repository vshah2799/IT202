<?php
$sessionCook = session_set_cookie_params(0, "/~vs598/download");
session_start();

$guess = $_GET["guess"];
$text = $_SESSION["captcha"];
$delay = $_GET["delay"];
if($guess == $text){
    print("Correct captcha ");
    $_SESSION["captchaVerify"] = 'Correct';
    header("refresh: $delay; url=Form.php");
    exit();
}
else{
    print("Wrong captcha. TRY AGAIN");
    header ("refresh: 1 ; url=Logout.php");
    exit();
}



