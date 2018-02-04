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

  mysqli_query($conn,"INSERT INTO bookrating (bookISBN, username, rating, date) VALUES ('$bookID', '$currentUser', '$rating', '$today')");
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Update existing rating
if(isset($_POST['update-rate'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $rating = scanner($_POST['rating'], '404.php');

  mysqli_query($conn,"UPDATE bookrating SET rating = $rating WHERE bookISBN = '$bookID' AND username='$currentUser'");
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Add feedback
if(isset($_POST['feedback'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $bookID = scanner($_POST['bookID'], '404.php');
  $comment = $_POST['comment'];

  mysqli_query($conn,"INSERT INTO bookcomment (bookISBN, username, comments, date) VALUES ('$bookID', '$currentUser', '$comment', '$today')");
  echo "<script>window.location = '../book.php?bookid=$bookID'; exit();</script>";
}

//Delete own feedback
if(isset($_POST['deleteThis'])){
  $currentUser = scanner($_SESSION['tpmb-user'], '404.php');
  $feedbackID = scanner($_POST['deleteThis'], '404.php');
  $bookID = scanner($_POST['bookISBN'], '404.php');
  //Check if feedback really exist
  $check = mysqli_query($conn,"SELECT ratingID, username FROM bookcomment WHERE username='$currentUser' AND ratingID='$feedbackID' AND bookISBN='$bookID'");
  if(mysqli_num_rows($check) == 0){
    echo "Materialize.toast('Something went wrong, please reload the page', 3000)";
    exit;
  }

  //Remove feedback
  mysqli_query($conn,"DELETE FROM bookcomment WHERE username='$currentUser' AND ratingID='$feedbackID' AND bookISBN='$bookID'");
  //Remove feedback ratings
  mysqli_query($conn,"DELETE FROM userfeedbackrating WHERE ratingID='$feedbackID'");
  echo "Materialize.toast('Feedback deleted', 3000)";
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
  $userGaveRating = mysqli_query($conn,"SELECT username, ratingID FROM userfeedbackrating WHERE username = '$currentUser' AND ratingID = $feedbackID");
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
