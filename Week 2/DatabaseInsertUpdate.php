<?PHP
include("Account.php");
include("myFunctions.php");
session_start();
//CONNECTS TO DATABASE
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project );
//


//Takes data from Form.php and places it in variables
$ucid = safe("ucid");
$password = safe("password");
//

if (!authenticate($ucid, $password, $db)){
    echo "<br>Invalid credentials.";
    header ("refresh: 2 ; url=Form.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    $_SESSION ["logged"] = true;
    $_SESSION ["ucid"] = $ucid;
    header ("refresh: 2 ; url=PinOne.php");
    outputTransactionsAndAccountInfoToScreen($ucid, $db);
    exit();
}





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

/*General code for retrieving rows from database and printing out how many rows there in the query
$s = "select * from TRANSACTIONS";
($t = mysqli_query ($db, $s)) or die (mysqli_error ($db));
$num = mysqli_num_rows ($t);
echo "Retrieved $num rows. <br>";
*/


