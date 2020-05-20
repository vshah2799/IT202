<?php

//1. This needs an API key for free services from openweathermap.org

//2. Eventually get ajax data named "zip"
//BUT
//you can temporarily use query string when requesting PHP version of this file:     ?zip=SomeValidZipcode

$z = $_GET["zip"];			//from query string, or AJAX, here suggest hardcode
//$z = "07828";
//3. Sleep delay to slow down the effects.
sleep (2);

//4. Define your url to openweathermap site with ***  YOUR  API key  ***  etc

$url = "http://api.openweathermap.org/data/2.5/weather?zip=$z,us&units=metric&appid=a90d511752c627b3198fd7bf08d756be";

//5. Retrieve url response
$fp = fopen ( $url , "r" );

//6.  Convert response to string
$contents = "";
while ( $more = fread ( $fp, 1000  ) ) {
    $contents .=  $more ;
}

//8.  Transmit string to ajax  -- NO NO NO extra characters like <br> or other text!!!
echo $contents ;

