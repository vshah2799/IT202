<?php
session_start();
if($_SESSION['admin']){
    $ucid = $_GET["ucid"];
    $number = $_GET["number"];
    print("You have selected " . $number . " transaction(s) from ". $ucid);
    exit();
    ?>

    <!DOCTYPE html>
    <a href = "ServiceOneMidterm.php"> Services | </a>
    <a href = "LogOutMidterm.php" > Logout </a>
    </html>

    <?php
}

else{
    if ($_GET['choice']=='List'){
        $ucidForFunction = $_SESSION['ucid'];
        $numberForFunction = $_GET['number'];
        print("You have selected the \"List\" operation. The ucid and number of transactions are: " . $ucidForFunction . " || " . $numberForFunction);
    }

    elseif ($_GET['choice']=='Perform'){
        $accountForFunction = $_GET['account'];
        $amountForFunction = $_GET['amount'];
        $ucidForFunction = $_SESSION['ucid'];
        print("You have selected the \"Perform\" operation. The account, amount, and ucid are: " . $accountForFunction . " || " . $amountForFunction . " || " . $ucidForFunction);
    }

    elseif ($_GET['choice'] =='Clear'){
        $ucidForFunction = $_SESSION['ucid'];
        $accountForFunction = $_GET['account'];
        print("You have selected the \"Clear\" operation. The ucid and account are: " . $ucidForFunction . " || " . $accountForFunction);
    }

    else{
        header ("refresh: 2 ; url=ServiceOne.php");
    }
    ?>

    <!DOCTYPE html>
    <a href = "ServiceOneMidterm.php"> Services | </a>
    <a href = "LogOutMidterm.php" > Logout </a>
    </html>

    <?php
}
?>
