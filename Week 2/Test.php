<?php

include (  "account.php"     ) ;

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";

mysqli_select_db( $db, $project );

//define and execute and sql statement

$s = "INSERT INTO TRANSACTIONS VALUES('dave1', '001', '500.00', NOW(), 'N')";

print "<br>SQL insert: $s";

mysqli_query($db, $s) or die(mysqli_error($db));