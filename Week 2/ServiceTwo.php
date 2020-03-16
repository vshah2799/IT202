<?php
include("Account.php");
include("MyFunctions.php");
session_start();
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project );

//Check if user is authorized to enter page
if (!isset($_SESSION['pinCheckSession'])){
    print("You do not have the credentials to access this page");
    header ("refresh: 2 ; url=ServiceOne.php");
    exit();
}

if (safe('choice')=='List'){
    $ucidForFunction = $_SESSION['ucid'];
    $numberForFunction = safe('number');
    listData($ucidForFunction, $numberForFunction, $db);
}

elseif (safe('choice')=='Perform'){
    $accountForFunction = safe('account');
    $amountForFunction = safe('amount');
    $ucidForFunction = $_SESSION['ucid'];
    perform($accountForFunction, $amountForFunction, $ucidForFunction, $db);
}

elseif (safe('choice')=='Clear'){
    $ucidForFunction = $_SESSION['ucid'];
    $accountForFunction = safe('account');
    clear($ucidForFunction, $accountForFunction, $db);
}

else{
    header ("refresh: 2 ; url=ServiceOne.php");
}
?>
<!DOCTYPE html>
<a href = "ServiceOne.php"> Services | </a>
<a href = "Logout.php" > Logout </a>
</html>