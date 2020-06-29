<?php
$sessionCook = session_set_cookie_params(0, "/~vs598/download/");
session_start();
if (!isset($_SESSION['captchaVerify'])) {
    print("COMPLETE CAPTCHA");
    header("refresh: 5 ; url=captchaForm.html");
    exit();
}
?>

<!DOCTYPE html>
<br>
    <br>FOR TESTING, THE UCID AND PASSWORD ARE:</br>
    <br>UCID: bert</br>
    <br>Password: 267</br>
</div>
<form action="Authenticate.php"  >

    <input type=text name="ucid" autocomplete="off">	        Enter ucid				                       <br>
    <input type=text name="password" autocomplete="off">        Enter password                                 <br>
    <input type=text name="amount" autocomplete="off">          Enter amount. This is for a test. Please enter any dollar amount in the following format, minus the quotes and including the dollar sign. "$xx.xx".<br>
    <input type="text" size = 10 name="delay" autocomplete=off >What do you want your delay to be(in seconds)? This delay is for how long the error or success message will show. <br>
    <input type=submit >

</form>

<!DOCTYPE html>
<a href = "Logout.php" > Logout </a>
</html>


