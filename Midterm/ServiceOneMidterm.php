<?php
session_start();

if($_SESSION['admin'] == true){
    ?>

    <form action = "ServiceTwoMidterm.php">
    <select name="choice" id="choice">
        <option value="List">    List </option>
    </select>

    <div id = "number" > <input type="text" name="number"  autocomplete="off">  Enter number<br><br></div>
    <div id = "ucid"   > <input type="text" name="ucid"    autocomplete="off">  Enter ucid<br><br></div>
    <input type = submit>
    </form>

    <!DOCTYPE html>
    <a href = "LogOutMidterm.php" > Logout </a>
    </html>

    <?php
    exit();
}
else{
    ?>

    <style>
        #number, #account, #ucid, #ucid, #amount{
            display: none;
        }
    </style>

    <form action = "ServiceTwoMidterm.php">
        <select name="choice" id="choice">
            <option value="">        Choose </option>
            <option value="List">    List </option>
            <option value="Perform"> Perform </option>
            <option value="Clear">   Clear </option>
        </select>

        <div id = "number" > <input type="text" name="number"  autocomplete="off">  Enter number<br><br></div>
        <div id = "account"> <input type="text" name="account" autocomplete="off">  Enter Account<br><br></div>
        <div id = "ucid"   > <input type="text" name="ucid"    autocomplete="off">  Enter ucid<br><br></div>
        <div id = "amount" > <input type="text" name="amount"  autocomplete="off" > Enter amount<br></div>
        <input type = submit>
    </form>

    <script>
        var ptrChoice = document.getElementById("choice")
        ptrChoice.addEventListener("change", F)
        var ptrNumber = document.getElementById("number")
        var ptrAmount = document.getElementById("amount")
        var ptrUcid = document.getElementById("ucid")
        var ptrAccount = document.getElementById("account")
        function F(){
            ptrNumber.style.display = "none"
            ptrAmount.style.display = "none"
            ptrUcid.style.display = "none"
            ptrAccount.style.display = "none"

            if (ptrChoice.value == "List" ){
                ptrNumber.style.display = "block"
            }
            if (ptrChoice.value == "Perform" ){
                ptrAccount.style.display = "block"
                ptrAmount.style.display = "block"
            }
            if (ptrChoice.value == "Clear" ){
                ptrAccount.style.display = "block"

            }
        }
    </script>
    <!DOCTYPE html>
    <a href = "LogOutMidterm.php" > Logout </a>
    </html>

    <?php
    exit();
}
?>

