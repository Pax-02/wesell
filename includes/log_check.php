<?php
require_once 'db_connect.php';

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "bathan@02";
$dbname = "Wesell";

function CheckUserAndPaswdBuyer($username,$password){
    
    $conn = DBConnect($GLOBALS['dbhost'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['dbname']);
    $hashedpassword = HashWithMD5($password);
    $query="SELECT * FROM register_buyers Where username='$username' AND password='$hashedpassword'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count==1){
        print("successfuly loged in");
    }
    else{
        print("wrong credentials".mysqli_error($conn));
    }

}

function CheckUserAndPaswdSeller($username,$password){
    $conn = DBConnect($GLOBALS['dbhost'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['dbname']);
    $hashedpassword = HashWithMD5($password);
    $query="SELECT * FROM register_sellers Where username='$username' And password='$hashedpassword'";
    $result = mysqli_query($conn, $query);
    // count the numbers of rows provided by the query
    $count = mysql_num_rows($result);
    if ($count==1){
        print("incorrect password".mysqli_error($conn));
    }
    elseif ($count==1){
        print("successfull loged in");
    }
    else{
        print("wrong credentials".mysqli_error($conn));
    }
}

function HashWithMD5($text) {
    $hashedpassword = MD5($text);
    return $hashedpassword;
}


?>