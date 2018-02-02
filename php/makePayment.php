<?php
//This file is still unusable
session_start();
include "connect.php";
checkLoginStatus();

if(isset($_POST['makePayment'])){
  $username = $_SESSION['tpmb-user'];
  $cardNumber = $_POST['creditCardNumber'];
  $transactionID = $username . "-" . date("YmdHis");
  $currentTime = date("Y-m-d H:i");

if(isset($_POST['rememberCard'])){
  setcookie("tpmb-card", "$cardNumber", time() + 31536000, '/');
} else {
  setcookie("tpmb-card", "", time() + 31536000, '/');
}

  //Insert transaction details
  $cartCombined = array_combine($_SESSION["tpmb-cartItem"], $_SESSION["tpmb-cartItemQty"]);
  foreach($cartCombined as $sessionArray => $sessionQtyArray){
    $bookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN='$sessionArray'");
    while($book = mysqli_fetch_array($bookArray)){ //Fetching book name and price from database
      if($book['bookQty']>0){
        //Add transaction table
        mysqli_query($conn, "INSERT INTO transactiondetail (transactionID, bookISBN, quantity)
        VALUES ('$transactionID', '$sessionArray', '$sessionQtyArray' )");
        //Deduct book amount
        $newBookQty = $book['bookQty'] - $sessionQtyArray;
        mysqli_query($conn, "UPDATE book SET bookQty = $newBookQty WHERE bookISBN = '$sessionArray'");
      } else {
        echo "SHIT HAPPENS";
        exit;
      }

    }
  }
  mysqli_query($conn,"INSERT INTO transaction (transactionID, transactionUser, transactionTotal, transactionCard, transactionDate)
  VALUES ('$transactionID', '$username', '" . $_SESSION['tpmb-total'] . "' ,'$cardNumber' , '$currentTime')");
}
?>
