<?PHP
include("Account.php");
include("MyFunctions.php");
$sessionCook = session_set_cookie_params(0, "/~vs598/download");
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

$flag = true;
$flagAmount = true;
$flagPassword = true;
//Takes data from Form.php and places it in variables
$ucid = safe("ucid");
$password = safe("password");
$amount = safe("amount");
$delay = $_GET["delay"];

if(!$flag){
    print("The UCID not in correct format");
    header ("refresh: $delay ; url=Form.php");
    exit();
}
else{
    print("The ucid was in the correct format <br> <br>");
}

if(!$flagAmount){
    print("The amount not in correct format");
    header ("refresh: $delay ; url=Form.php");
    exit();
}
else{
    print("The amount was in the correct format <br> <br>");
}

if(!$flagPassword){
    print("The password not in correct format");
    header ("refresh: $delay ; url=Form.php");
    exit();
}
else{
    print("The password was in the correct format <br> <br>");
}

if (!authenticateNew($ucid, $password, $db)){
    echo "<br>Invalid credentials.";
    header ("refresh: $delay ; url=Form.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    $_SESSION ["logged"] = true;
    $_SESSION ["ucid"] = $ucid;
    header ("refresh: $delay ; url=PinOne.php");
    exit();
}
?>

<!DOCTYPE html>
<a href = "Logout.php" > Logout </a>
</html>
