<?php
//This file is still unusable
session_start();
include "connect.php";
checkLoginStatus();

if(isset($_POST['makePayment'])){
  $username = $_SESSION['tpmb-user'];
  $cardNumber = $_POST['creditCardNumber'];
  $transactionID = $username . "-" . date("YmdHs");
  $currentTime = date("Y-m-d H:i");

if(isset($_POST['rememberCard'])){
  setcookie("tpmb-card", "$cardNumber", time() + 31536000, '/');
} else {
  setcookie("tpmb-card", "", time() + 31536000, '/');
}


  mysqli_query($conn,"INSERT INTO transaction (transactionID, transactionUser, transactionCard, transactionDate)
  VALUES ('$transactionID', '$username', '$cardNumber' , '$currentTime')");

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
}
?>
