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
<form action="Authenticate.php"  >

    <input type=text name="ucid" autocomplete="off">	 Enter ucid				  <br>
    <input type=text name="password" autocomplete="off">Enter password           <br>
    <input type="text" size = 10 name="delay" autocomplete=off >
    What do you want your delay to be?<br>
    <input type=submit >

</form>

<!DOCTYPE html>
<a href = "Logout.php" > Logout </a>
</html>


