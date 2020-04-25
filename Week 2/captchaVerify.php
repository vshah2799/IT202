<?php
session_start();

$guess = $_GET["guess"];
$ucid = $_GET["ucid"];
$text = $_SESSION["captcha"];

if($guess == $text){
    print("Correct captcha ");
}
else{
    print("Wrong captcha. TRY AGAIN");
    header("refresh: 3; url=captchaForm.html");
    exit();
}

if($ucid == "bert"){
    print("The ucid was right");
}
else{
    print("Wrong ucid. TRY AGAIN");
    header("refresh: 3; url=captchaForm.html");
    exit();

}

