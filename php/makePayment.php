<?php
//This file is still unusable
session_start();
include "php/connect.php";
checkLoginStatus();

$username = $_SESSION['tpmb-user'];
$transactionID = $username . date("YmdHs");
$currentTime = date("Y-m-d H:i");

mysqli_query($conn,"INSERT INTO transaction (transactionID, username, date) VALUES ('$transactionID', '$username', '$currentTime')");

//Insert transaction details
foreach($_SESSION["tpmb-cartItem"] as $sessionArray ){
  $bookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN='$sessionArray'");
  while($book = mysqli_fetch_array($bookArray)){ //Fetching book name and price from database
    $sql = "INSERT INTO transactiondetail (transactionID, bookISBN, quantity)
    VALUES ('$transactionID', '$book[bookISBN]', '$bookQuantity' )";
    mysqli_query($conn, $sql);
    $sessionArray;
  }
}
?>
