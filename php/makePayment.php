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
  $tp = $_SESSION['tpmb-total'] * 10;
  //Add transaction
  mysqli_query($conn,"INSERT INTO transaction (transactionID, transactionUser, transactionTotal, transactionPoint, transactionCard, transactionDate)
  VALUES ('$transactionID', '$username', '" . $_SESSION['tpmb-total'] . "' , '$tp' ,'$cardNumber' , '$currentTime')");

  //Retrive user points and email value
  $declareForEmail = mysqli_query($conn,"SELECT fname, email, address, points FROM user WHERE username='$username'");
  while($userDetail = mysqli_fetch_array($declareForEmail)){
    $fname = $userDetail['fname'];
    $email = $userDetail['email'];
    $address = $userDetail['address'];
    $point = $userDetail['points'];
  }

  //Topup user account member points
  $totalPoints = $tp + $point;
  mysqli_query($conn,"UPDATE user SET points = $totalPoints WHERE username = '$username'");

  //Remove some characters from transactionID for security
  $_SESSION['tpmb-temp'] = strstr($transactionID,'-2');


  include "sendPaymentEmail.php";
  //Remove cart item
  unset($_SESSION["tpmb-cartItem"]);
  unset($_SESSION["tpmb-cartItemQty"]);
  unset($_SESSION["tpmb-total"]);
  mysqli_close($conn);
  if($status=='serverfail'){
    echo "<script>window.location = '../transaction-done.php?status=serverfail'; exit();</script>";
  } else {
    echo "<script>window.location = '../transaction-done.php'; exit();</script>";
  }
  exit;
}
?>
