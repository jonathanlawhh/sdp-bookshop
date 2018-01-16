<?php
session_start();
include "connect.php";
checkLoginStatus();

//Add to cart
if(isset($_POST['bookID'])){
  if(!isset($_SESSION["tpmb-cartItem"])){
    $cartItemArray = array();
  } else {
    foreach($_SESSION["tpmb-cartItem"] as $sessionArray ){
      $cartItemArray[] = $sessionArray;
    }
  }
  $cartItem = scanner($_POST["bookID"], "404.php");
  if(in_array($cartItem, $cartItemArray)){
    echo "Exist";
  } else {
    $cartItemArray[] = $cartItem;
    $_SESSION["tpmb-cartItem"] = $cartItemArray;
    echo "Added";
  }
}

//Delete from cart
if(isset($_POST['deleteCart'])){
  $arrayToDelete = array_search($_POST['deleteCart'], $_SESSION["tpmb-cartItem"]);
  unset($_SESSION["tpmb-cartItem"][$arrayToDelete]);
}

//unset($_SESSION["tpmb-cartItem"]);
?>
