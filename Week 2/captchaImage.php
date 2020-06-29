<?php
$sessionCook = session_set_cookie_params(0, "/~vs598/download");
session_start();

$font = 'LaBelleAurore.ttf';
$font2 = 'Xerox Sans Serif Narrow.ttf';
header("Content-Type: image/png");
$im = imagecreatetruecolor(550, 190);

$green = imagecolorallocate($im, 0, 128, 0);
$blue = imagecolorallocate($im, 0, 0, 255);
$yellow = imagecolorallocate($im, 255,255, 0);
$black = imagecolorallocate($im, 0,0, 0);

imagefilledrectangle($im, 10, 10, 540, 180, $yellow);

$length = 2;
$text = substr(str_shuffle(md5(time())) , 0, $length);
$text2 = substr(str_shuffle(md5(time())) , 0, $length);

$_SESSION["captcha"] = $text . $text2;
imagettftext($im, 35, 15, 25, 80, $blue, $font, $text );
imagettftext($im, 35, -15, 110, 80, $green, $font, $text2 );

$sessionID = 'The session ID is: ' . session_id();
$text3 = 'The captcha is: ' . $text . $text2;

imagettftext($im, 22, 0, 15, 130, $black, $font2, $sessionID);
imagettftext($im, 22, 0, 15, 160, $black, $font2, $text3);

imagepng($im);
imagedestroy($im);