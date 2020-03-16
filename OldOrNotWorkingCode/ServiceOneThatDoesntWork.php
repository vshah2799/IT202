////TO GET THE CHOICE (LIST, CLEAR, PERFORM) PUT IN SESSION ARRAY THEN CHECK IT IN SERVICETWO
////
////
////
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

//Check if the logged entry of $_SESSION and/or pin is undefined
if (!isset($_SESSION['pinCheckSession'])){
    print("You do not have the credentials to access this page");
    header ("refresh: 3 ; url=PinOne.php");
    exit();
}
?>

<style>
    #number, #account, #ucid, #ucid, #test{
        display: none;
    }
</style>

<form action = "../Week%202/ServiceTwo.php">
    <input type="radio" id="List" name="choice" onclick="F(0);" >
    <label for="List">List</label><br>
    <input type="radio" id="Clear" name="choice" onclick="F(1);">
    <label for="Clear">Clear</label><br>
    <input type="radio" id="Perform" name="choice" onclick="F(2);">
    <label for="Perform">Perform</label>

    <div id = "number"><input type="text" name="number">  Enter number<br><br></div>
    <div id = "account"> <input type="text" name="account" >  Enter Account<br><br></div>
    <div id = "ucid" >  <input type="text" name="ucid"    >  Enter ucid<br><br></div>
    <div id = "test">    <input type="text" name="test"    >  Enter test<br></div>
    <input type = submit>
</form>

<script>

    var ptrNumber = document.getElementById("number")
    var ptrAmount = document.getElementById("account")
    var ptrUcid = document.getElementById("ucid")
    var ptrTest = document.getElementById("test")

    function F(x){
        ptrNumber.style.display = "none"
        ptrAmount.style.display = "none"
        ptrUcid.style.display = "none"
        ptrTest.style.display = "none"

        if (x==0){
            ptrNumber.style.display = "block"
        }
        if (x==1){
            ptrAmount.style.display = "block"
        }
        if (x==2){
            ptrUcid.style.display = "block"
        }
    }

</script>
