<?php
function authenticate ($ucid, $password, $db)
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
    $m = "SELECT *
      FROM ACCOUNTS
      WHERE ucid = '$ucid'
      ";
    ($b = mysqli_query($db, $m) )or die(mysqli_error($db));

    while($j = mysqli_fetch_array($b, MYSQLI_ASSOC)) {
        $account = $j['account'];
        $balance = $j['balance'];
        $recent =  $j['recent'];
        $ucid = $j['ucid'];
        print("<hr></hr>")
        ;      print ("<b>$ucid $account  Balance: \$$balance Most Recent: $recent</b>");

        $p = "SELECT *
        FROM TRANSACTIONS
        WHERE ucid = '$ucid' and account=$account;
        ";
        ($t = mysqli_query($db, $p) )or die(mysqli_error($db));
        $count = 0;
        while(($r = mysqli_fetch_array($t, MYSQLI_ASSOC))&& $count<$number){
            $amount = $r['amount'];
            $timestamp = $r['timestamp'];
            $account = $r['account'];
            $mail = $r['mail'];
            print("<br></br>");
            print("<i>Amount:\$$amount Timestamp: $timestamp Mail copy:$mail</i>");
            $count++;
        }
    }
}

function clear($ucid, $account, $db){
    $m = " DELETE FROM TRANSACTIONS WHERE account = '$account' AND ucid = '$ucid'";
    ($b = mysqli_query($db, $m) )or die(mysqli_error($db));

    $p = "UPDATE ACCOUNTS
          SET balance = '0', recent = '0000-01-01 00:00:01'
          WHERE ucid = '$ucid' AND account = '$account'";
    ($b = mysqli_query($db, $p) ) or die(mysqli_error($db));
}

function perform($account, $amount, $ucid, $db){
    $k = "UPDATE ACCOUNTS 
          SET balance = balance + '$amount', recent = NOW()
          WHERE ucid = '$ucid' AND account = '$account' AND balance + '$amount' >= '0'";
    ($b = mysqli_query($db, $k) ) or die(mysqli_error($db));

    if(mysqli_affected_rows($db) == 1){
        print("SUCCESS");
    }
    elseif (mysqli_affected_rows($db) == 0){
        print("YOU DO NOT HAVE ENOUGH BALANCE");
        exit();
    }
}

