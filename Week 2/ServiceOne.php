<?php
include("Account.php");
include("MyFunctions.php");
include('config.php');
$db = mysqli_connect($hostname, $username, $password, $project);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
print "Successfully connected to MySQL.<br><br><br>";
mysqli_select_db( $db, $project );

//Check if the logged entry of $pinCheckSession is undefined
if (!isset($_SESSION['pinCheckSession'])) {
    print("You do not have the credentials to access this page");
    header("refresh: 2 ; url=PinOne.php");
    exit();
}
?>

<style>
    #number, #account, #ucid, #ucid, #amount2{
        display: none;
    }
</style>

<form action = "ServiceTwo.php">
    <select name="choice" id="choice">
        <option value="">        Choose </option>
        <option value="List">    List Amount Of Transactions You Want To Show</option>
        <option value="Perform"> Deposit or Withdraw Money From An Account</option>
        <option value="Clear">   Clear Transactions and Balance On The Account</option>
    </select>

    <div id = "number" > <input type="text" name="number"  autocomplete="off">  Enter number<br><br></div>
    <div id = "account"> <input type="text" name="account" autocomplete="off">  Enter Account (The two accounts for bert are "1" and "2" minus the quotes.)<br><br></div>
    <div id = "amount2" > <input type="text" name="amount2"  autocomplete="off" > Enter amount (Format: "xx.xx". No "$" sign.)<br></div>
    <div id = "ucid"   > <input type="text" name="ucid"    autocomplete="off">  Enter ucid<br><br></div>
    <input type = submit>
</form>

<script>
    var ptrChoice = document.getElementById("choice");
    ptrChoice.addEventListener("change", F);
    var ptrNumber = document.getElementById("number");
    var ptrAmount = document.getElementById("amount2");
    var ptrUcid = document.getElementById("ucid");
    var ptrAccount = document.getElementById("account");
    function F(){
        ptrNumber.style.display = "none";
        ptrAmount.style.display = "none";
        ptrUcid.style.display = "none";
        ptrAccount.style.display = "none";

        if (ptrChoice.value == "List" ){
            ptrNumber.style.display = "block";
        }
        if (ptrChoice.value == "Perform" ){
            ptrAccount.style.display = "block";
            ptrAmount.style.display = "block";
        }
        if (ptrChoice.value == "Clear" ){
            ptrAccount.style.display = "block";
        }
    }
</script>