<?php
session_start();
include "connect.php";
checkLoginStatus();

if(isset($_POST['bookID'])){
  if(!isset($_SESSION["tpmb-cartItem"])){
    $cartItemArray = array();
  } else {
    foreach($_SESSION["tpmb-cartItem"] as $sessionArray ){
      $cartItemArray[] = $sessionArray;
    }
  }
  $cartItem = $_POST["bookID"];
  if(in_array($cartItem, $cartItemArray)){
    echo "Exist";
  } else {
    $cartItemArray[] = $cartItem;
    $_SESSION["tpmb-cartItem"] = $cartItemArray;
    echo "Added";
  }
}

//unset($_SESSION["tpmb-cartItem"]);
?>
