<?php
session_start();
include "connect.php";
checkLoginStatus();
//Add to cart
if(isset($_POST['bookID'])){
  //If array does not exist, initalize one. Else load cartSESSION into array
  if(!isset($_SESSION["tpmb-cartItem"])){
    $cartItemArray = array();
    $cartItemQtyArray = array();
  } else {
    foreach($_SESSION["tpmb-cartItem"] as $sessionArray ){
      $cartItemArray[] = $sessionArray;
    }
    foreach($_SESSION["tpmb-cartItemQty"] as $sessionArrayQty ){
      $cartItemQtyArray[] = $sessionArrayQty;
    }
  }
  $cartItem = scanner($_POST["bookID"], "404.php");
  $cartItemQty = scanner($_POST["bookQty"], "404.php");

  $bookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN='$cartItem'");
  while($book = mysqli_fetch_array($bookArray)){ //Fetching book name and price from database
    $afterDeduct = $book['bookQty'] - $cartItemQty; //Make sure there is enough books
    if($afterDeduct>0){
      if(in_array($cartItem, $cartItemArray)){
        echo "Exist";
      } else {
        $cartItemArray[] = $cartItem;
        $cartItemQtyArray[] = $cartItemQty;
        $_SESSION["tpmb-cartItem"] = $cartItemArray;
        $_SESSION["tpmb-cartItemQty"] = $cartItemQtyArray;
        echo "Added";
      }
    } else {
      echo "Out of stock";
    }
  }
}
//Delete from cart
if(isset($_POST['deleteCart'])){
  $arrayToDelete = array_search($_POST['deleteCart'], $_SESSION["tpmb-cartItem"]);
  unset($_SESSION["tpmb-cartItem"][$arrayToDelete]);
  unset($_SESSION["tpmb-cartItemQty"][$arrayToDelete]);
}

//unset($_SESSION["tpmb-cartItem"]);
?>
