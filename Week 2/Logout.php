<?php
$sessionCook = session_set_cookie_params(0, "/~vs598/download");
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('diplasy_errors',1);
$sidvalue = session_id();
echo "<br>session id was: " . $sidvalue . "<br>";
$_SESSION = array();
session_destroy();
setcookie("PHPSESSID", "", time()-3600, '/~vs598/download', "", 0, 0);
echo "Your session has been terminated";
header ("refresh: 3 ; url=captchaForm.html");