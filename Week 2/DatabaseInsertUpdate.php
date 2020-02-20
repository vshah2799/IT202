
<?PHP
include("Account.php");
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

function safe($data){
    global $db;
    $temp = $_GET[$data];
    $temp = mysqli_real_escape_string($db, $temp);
    print "<br>The $data is: $temp";
    return $temp;
}
//Takes data from Form.php and places it in variables
$ucid = safe("ucid");
$password = safe("password");
$account = safe("account");
$amount = safe("amount");
$mail = safe("mail");
//

if (!authenitcate($ucid, $password, $db)){
    echo "<br>Invalid credentials.";
    header ("refresh: 6 ; url=Form.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    $_SESSION ["logged"] = true;
    $_SESSION ["ucid"] = $ucid;
    header ("refresh: 6 ; url=Next.php");
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

$p = "SELECT *
      FROM TRANSACTIONS
      WHERE ucid = '$ucid' and account = '$account' 
      ";
($t = mysqli_query($db, $p) )or die(mysqli_error($db));
while($r = mysqli_fetch_array($t, MYSQLI_ASSOC)){
    $amount = $r['amount'];
    $timestamp = $r['timestamp'];
    echo "<br>amount: $amount  timestamp: $timestamp";
}



