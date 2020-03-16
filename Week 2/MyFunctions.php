<?php
function authenticate ($ucid, $password, $db)
{
    $query = "SELECT ucid, pass
      FROM USERS
      WHERE ucid = '$ucid' and pass = '$password' 
      ";
    ($queryResult = mysqli_query($db, $query) )or die(mysqli_error($db));
    $numRows = mysqli_num_rows($queryResult);
    if ($numRows == 0){
        return false;
    }
    else{
        return true;
    }
}

function safe($data){
    global $db;
    $temp = $_GET[$data];
    $temp = mysqli_real_escape_string($db, $temp);
    return $temp;
}

function listData($ucid, $number, $db){
    $query = "SELECT *
      FROM ACCOUNTS
      WHERE ucid = '$ucid'
      ";
    ($queryResult = mysqli_query($db, $query) )or die(mysqli_error($db));

    while($queryArray = mysqli_fetch_array($queryResult, MYSQLI_ASSOC)) {
        $account = $queryArray['account'];
        $balance = $queryArray['balance'];
        $recent =  $queryArray['recent'];
        $ucid = $queryArray['ucid'];
        print("<hr></hr>")
        ;      print ("<b>$ucid $account  Balance: \$$balance Most Recent: $recent</b>");

        $queryTwo = "SELECT *
        FROM TRANSACTIONS
        WHERE ucid = '$ucid' and account=$account;
        ";
        ($queryResultTwo = mysqli_query($db, $queryTwo) )or die(mysqli_error($db));
        $count = 0;
        while(($queryArrayTwo = mysqli_fetch_array($queryResultTwo, MYSQLI_ASSOC))&& $count<$number){
            $amount = $queryArrayTwo['amount'];
            $timestamp = $queryArrayTwo['timestamp'];
            $account = $queryArrayTwo['account'];
            $mail = $queryArrayTwo['mail'];
            print("<br></br>");
            print("<i>Amount:\$$amount Timestamp: $timestamp Mail copy:$mail</i>");
            $count++;
        }
    }
}

function clear($ucid, $account, $db){
    $query = " DELETE FROM TRANSACTIONS WHERE account = '$account' AND ucid = '$ucid'";
    ($queryResult = mysqli_query($db, $query) )or die(mysqli_error($db));

    $queryTwo = "UPDATE ACCOUNTS
          SET balance = '0', recent = '0000-01-01 00:00:01'
          WHERE ucid = '$ucid' AND account = '$account'";
    ($queryResult = mysqli_query($db, $queryTwo) ) or die(mysqli_error($db));
    print("SUCCESS ");
}

function perform($account, $amount, $ucid, $db){
    $query = "UPDATE ACCOUNTS 
          SET balance = balance + '$amount', recent = NOW()
          WHERE ucid = '$ucid' AND account = '$account' AND balance + '$amount' >= '0'";
    ($queryResult = mysqli_query($db, $query) ) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        print("SUCCESS ");
    }
    elseif (mysqli_affected_rows($db) == 0){
        print("YOU DO NOT HAVE ENOUGH BALANCE ");
        exit();
    }
}

