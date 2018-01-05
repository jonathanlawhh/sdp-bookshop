<?php
include "connect.php";
session_start();
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];

//Update user details
if(isset($_POST['update'])){
  $fname = scanner($_POST["fname"],"../settings.php");
  $lname = scanner($_POST["lname"],"../settings.php");
  $email = scanner($_POST["email"],"../settings.php");
  $pnumber = scanner($_POST["pnumber"],"../settings.php");
  $bday = scanner($_POST["bday"],"../settings.php");
  $gender = scanner($_POST["gender"],"../settings.php");

  $updateUserQuery = "UPDATE user SET fname='$fname', lname='$lname', email='$email', gender='$gender', pnumber='$pnumber', birthday='$bday' WHERE username='$currentUser'";
  $executeUserUpdate=mysqli_query($conn,$updateUserQuery);
  echo "<script>window.location = '../settings.php'; exit();</script>";
}

//Change user password
if(isset($_POST['chgpw'])){
  $opassword = scanner($_POST["opassword"],'../settings.php');
  $pwd = scanner($_POST["pwd"],'../settings.php');
  $pwd2 = scanner($_POST["pwd2"],'../settings.php');

  //Check if first password is same as second password
  if($_POST['pwd'] == $pwd2){
    //Encrypt
    $salt = $currentUser . "tpmb";
    $oldpassword = crypt($opassword, $salt);
    $newpassword = crypt($pwd2, $salt);

    //Check if old password entered is correct
    $checkOldPassword = "SELECT password FROM user WHERE username='$currentUser' AND password='$oldpassword'";
    $oldPasswordResult=mysqli_query($conn,$checkOldPassword);
      if(mysqli_num_rows($oldPasswordResult)>0){
        $changeOldPasswordQuery = "UPDATE user SET password='$newpassword' WHERE username='$currentUser' AND password='$oldpassword'";
        $executePasswordChange=mysqli_query($conn,$changeOldPasswordQuery);
        echo "<script>window.location = '../settings.php'; exit();</script>";
      } else {
        echo "<script>window.location = '../settings.php?status=fail'; exit();</script>";
      }
  } else {
    echo "<script>window.location = '../settings.php?status=fail+passwordnomatch'; exit();</script>";
  }
}
?>
