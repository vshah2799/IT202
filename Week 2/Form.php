<!DOCTYPE html>
<form action="Authenticate.php"  >

    <input type=text name="ucid" autocomplete="off">	 Enter ucid				  <br>
    <input type=text name="password" autocomplete="off">Enter password           <br><br>
    <input type=submit >

</form>
<?php
session_start();
if (!isset($_SESSION['captchaVerify'])){
    print("COMPLETE CAPTCHA");
    header ("refresh: 6 ; url=captchaForm.html");
    exit();
}
?>



