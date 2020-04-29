<?php
session_start();

$guess = $_GET["guess"];
$text = $_SESSION["captcha"];

if($guess == $text){
    print("Correct captcha ");
    $_SESSION["captchaVerify"] = 'Correct';
    header("refresh: 3; url=Form.php");
    exit();
}
else{
    print("Wrong captcha. TRY AGAIN");
    header("refresh: 3; url=captchaForm.html");
    exit();
}



