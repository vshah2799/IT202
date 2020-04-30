<?php
include('config.php');
if (!isset($_SESSION['captchaVerify'])) {
    print("COMPLETE CAPTCHA");
    header("refresh: 5 ; url=captchaForm.html");
    exit();
}
?>
<!DOCTYPE html>
<form action="Authenticate.php"  >

    <input type=text name="ucid" autocomplete="off">	 Enter ucid				  <br>
    <input type=text name="password" autocomplete="off">Enter password           <br><br>
    <input type=submit >

</form>

<!DOCTYPE html>
<a href = "Logout.php" > Logout </a>
</html>


