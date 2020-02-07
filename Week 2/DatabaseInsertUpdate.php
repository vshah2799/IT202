<?php

include("Account.php");

$db = mysqli_connect($hostname, $username, $password, $project);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

print "Successfully connected to MySQL.<br><br><br>";

mysqli_select_db( $db, $project );


function authenitcate ($ucid, $password, $db)
{
    $p = "SELECT ucid, pass
      FROM USERS
      WHERE ucid = '$ucid' and pass = '$password' 
      ";

    ($t = mysqli_query($db, $p) )or die(mysqli_error($db));
    $numRows = mysqli_num_rows($t);
    if ($numRows == 0){
        return false;
    }
    else{ return true;
    }
}

$ucid = $_GET["ucid"]; print "<br>The ucid is: $ucid";
$password = $_GET["password"]; print "<br>The password is: $password";
$account = $_GET["account"]; print "<br>The account is: $account";
$amount = $_GET["amount"]; print "<br>The amount is: $amount";
$mail = $_GET["mail"]; print "<br>The mail is: $mail";

if (!authenitcate($ucid, $password, $db)){
    echo "<br>Invalid credentials.";
    header ("refresh: 6 ; url=Form.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    header ("refresh: 6 ; url=Next.php");
    exit();
};

print("BYE");






/*
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
*/

