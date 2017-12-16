<?php
include "connect.php";
$currentUser = $_SESSION['tpmb-user'];

$getUserData = "SELECT username, fname, lname, email FROM user WHERE username='$currentUser'";
$userData = mysqli_query($conn,$getUserData);

while($row = mysqli_fetch_assoc($userData)) {
  $fname = $row["fname"];
  $lname = $row["lname"];
  $email = $row["email"];
}
?>
