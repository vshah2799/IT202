<?PHP
session_start();

function authenticate ($ucid, $password)
{
    if (($ucid == 'bert' && $password =='888') || ($ucid == 'admin' && $password =='007') ){
        $_SESSION["admin"] = false;
        return true;
    }
    else{
        return false;
    }
}

//Takes data from FormMidterm.php and places it in variables
$ucid = $_GET["ucid"];
$password = $_GET["password"];

if (!authenticate($ucid, $password)){
    echo "<br>Invalid credentials.";
    header ("refresh: 3 ; url=FormMidterm.php");
    exit();
}
else {
    echo "<br>Valid credentials.";
    $_SESSION ["logged"] = true;
    $_SESSION ["ucid"] = $ucid;
    if($_SESSION['ucid'] == 'admin'){
        $_SESSION['admin'] = true;
    }
    header ("refresh: 3 ; url=ServiceOneMidterm.php");
    exit();
}




