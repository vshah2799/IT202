<?php
$sessionCook = session_set_cookie_params(0, "/~vs598/download");
session_start();
print("session key is : ". session_id() . "<br> <br>");