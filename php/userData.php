<?php
include "connect.php";
checkLoginStatus();

$currentUser = $_SESSION['tpmb-user'];

$getUserData = "SELECT username, fname, lname, pnumber, gender, birthday FROM user WHERE username='$currentUser'";
$userData = mysqli_query($conn,$getUserData);

while($row = mysqli_fetch_assoc($userData)) {
  $fname = $row["fname"];
  $lname = $row["lname"];
  $pnumber = $row["pnumber"];
  $gender = $row["gender"];
  $bday = $row["birthday"];
}
?>
