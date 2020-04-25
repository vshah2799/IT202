<?PHP
include("Account.php");
include("MyFunctions.php");
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

//Takes data from FormMidterm.php and places it in variables
$ucid = safe("ucid");
$password = safe("password");

if (!authenticate($ucid, $password, $db)){
    echo "<br>Invalid credentials.";
    header ("refresh: 2 ; url=FormMidterm.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    $_SESSION ["logged"] = true;
    $_SESSION ["ucid"] = $ucid;
    header ("refresh: 2 ; url=PinOne.php");
    exit();
}


