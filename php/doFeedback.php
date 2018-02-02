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
  mysqli_query($conn,$addRatingQuery);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Update existing rating
if(isset($_POST['update-rate'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $rating = scanner($_POST['rating'], '404.php');

  $updateRatingQuery = "UPDATE bookrating SET rating = $rating WHERE bookISBN = '$bookID' AND username='$currentUser'";
  mysqli_query($conn,$updateRatingQuery);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Add feedback
if(isset($_POST['feedback'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $comment = scanner($_POST['comment'], '404.php');

  $addBookFeedback = "INSERT INTO bookcomment (bookISBN, username, comments, date) VALUES ('$bookID', '$currentUser', '$comment', '$today')";
  mysqli_query($conn,$addBookFeedback);
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Add feedback
if(isset($_POST['feedbackID'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $feedbackID = scanner($_POST['feedbackID'], '404.php');
  $feedbackRating = scanner($_POST['feedbackValue'], '404.php');
  //Prevent modified data
  if(!($feedbackRating == 'veryuseful' || $feedbackRating == 'useful' || $feedbackRating == 'useless')){
    echo "Materialize.toast('An error occured. Please reload the page', 3000)";
    exit;
  }

  //Check if user gave any feedback for the comment before
  $checkUserGaveRatingQuery = "SELECT * FROM userfeedbackrating WHERE username = '$currentUser' AND ratingID = $feedbackID";
  $userGaveRating = mysqli_query($conn,$checkUserGaveRatingQuery);
  if(mysqli_num_rows($userGaveRating) == 0){
    $addBookFeedback = "INSERT INTO userfeedbackrating (username, ratingID, feedbackrated )
      VALUES ('$currentUser', '$feedbackID', '$feedbackRating')";
    mysqli_query($conn,$addBookFeedback);
    echo "Materialize.toast('Added comment rating', 3000, 'rounded')";
  } else {
    $updateBookFeedback = "UPDATE userfeedbackrating SET feedbackrated = '$feedbackRating' WHERE username = '$currentUser' AND ratingID = $feedbackID";
    mysqli_query($conn,$updateBookFeedback);
    echo "Materialize.toast('Updated comment rating', 3000, 'rounded')";
  }
}

?>
