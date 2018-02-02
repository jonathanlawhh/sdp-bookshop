<?php
session_start();
include "connect.php";
checkLoginStatus();
$today = date("Ymd");

//Add new rating
if(isset($_POST['rate'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $rating = scanner($_POST['rating'], '404.php');

  $addRatingQuery = "INSERT INTO bookrating (bookISBN, username, rating, date) VALUES ('$bookID', '$currentUser', '$rating', '$today')";
  $executeaddRating=mysqli_query($conn,$addRatingQuery);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Update existing rating
if(isset($_POST['update-rate'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $rating = scanner($_POST['rating'], '404.php');

  $updateRatingQuery = "UPDATE bookrating SET rating = $rating WHERE bookISBN = '$bookID' AND username='$currentUser'";
  $executeUpdateRating=mysqli_query($conn,$updateRatingQuery);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Add feedback
if(isset($_POST['feedback'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $comment = scanner($_POST['comment'], '404.php');

  $addBookFeedback = "INSERT INTO bookcomment (bookISBN, username, comments, date) VALUES ('$bookID', '$currentUser', '$comment', '$today')";
  $executeBookFeedback=mysqli_query($conn,$addBookFeedback);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Add feedback
if(isset($_POST['feedbackID'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $feedbackID = scanner($_POST['feedbackID'], '404.php');
  $feedbackRating = scanner($_POST['feedbackValue'], '404.php');

  $addBookFeedback = "INSERT INTO userfeedbackrating (username, ratingID, feedbackrated )
    VALUES ('$currentUser', '$feedbackID', '$feedbackRating')";
  $executeBookFeedback=mysqli_query($conn,$addBookFeedback);
}

?>
