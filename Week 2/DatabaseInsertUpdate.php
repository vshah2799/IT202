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

function outputTransactionsAndAccountInfoToScreen($ucid, $db){

    $m = "SELECT *
      FROM ACCOUNTS
      WHERE ucid = '$ucid'
      ";
    ($b = mysqli_query($db, $m) )or die(mysqli_error($db));

    while($j = mysqli_fetch_array($b, MYSQLI_ASSOC)){
       $account = $j['account'];
       $balance = $j['balance'];
       $recent =  $j['recent'];
       $ucid = $j['ucid'];
       print("<hr></hr>")
;      print ("<b>$ucid $account  Balance: \$$balance Most Recent: $recent</b>");

        $p = "SELECT *
        FROM TRANSACTIONS
        WHERE ucid = '$ucid' and account=$account;
        ";
        ($t = mysqli_query($db, $p) )or die(mysqli_error($db));

       while($r = mysqli_fetch_array($t, MYSQLI_ASSOC)){
            $amount = $r['amount'];
            $timestamp = $r['timestamp'];
            $account = $r['account'];
            $mail = $r['mail'];
           print("<br></br>");
           print("<i>Amount:\$$amount Timestamp: $timestamp Mail copy:$mail</i>");
       }
    }
}


/*General code for retrieving rows from database and printing out how many rows there in the query
$s = "select * from TRANSACTIONS";
($t = mysqli_query ($db, $s)) or die (mysqli_error ($db));
$num = mysqli_num_rows ($t);
echo "Retrieved $num rows. <br>";
*/


