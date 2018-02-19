<?php
include 'connect.php';
checkLoginStatus();

$currentUser = $_SESSION['tpmb-user'];
$userData = mysqli_query($conn,"SELECT username, fname, lname, email, pnumber, gender, address, birthday, points, lastlogin FROM user WHERE username='$currentUser'");

while($row = mysqli_fetch_assoc($userData)) {
  $fname = $row['fname'];
  $lname = $row['lname'];
  $email = $row['email'];
  $pnumber = $row['pnumber'];
  $gender = $row['gender'];
  $address = $row['address'];
  $bday = $row['birthday'];
  $pts = $row['points'];
  $lastlogin = $row['lastlogin'];
} ?>
