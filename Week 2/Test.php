

<?php

include ("account.php") ;

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";

mysqli_select_db( $db, $project );

//define and execute and sql statement
$ucid = $_GET["ucid"]; print "<br>The ucid is: $ucid";
$account = $_GET["account"]; print "<br>The account is: $account";
$amount = $_GET["amount"]; print "<br>The amount is: $amount";
$mail = $_GET["mail"]; print "<br>The mail is: $mail";
$s = "INSERT INTO TRANSACTIONS VALUES('$ucid', '$account', '$amount', NOW(), '$mail')";
print "<br>SQL insert: $s";
mysqli_query($db, $s) or die(mysqli_error($db));

$k =
    "UPDATE ACCOUNTS
    SET balance = balance + '$amount', recent = NOW()
    WHERE  ucid = '$ucid' and account = '$account'
";
print "<br>SQL update: $k";
mysqli_query($db, $k) or die(mysqli_error($db));