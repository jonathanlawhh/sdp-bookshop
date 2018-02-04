<?php
include "connect.php";

if (isset($_POST['register'])){

  $username = scanner($_POST['uname'],'../register.php?register=2');
  $fname = scanner($_POST['fname'],'../register.php?register=2');
  $lname = scanner($_POST['lname'],'../register.php?register=2');
  $email = scanner($_POST['email'],'../register.php?register=2');
  $gender = scanner($_POST['gender'],'../register.php?register=2');
  $pnumber = scanner($_POST['pnumber'],'../register.php?register=2');
  $pnumber = scanner($_POST['pnumber'],'../register.php?register=2');
  $bday = scanner($_POST["bday"],'../register.php?register=2');
  $date = scanner(date("Ymd"),'../register.php?register=2');
  $password = scanner($_POST["pwd"],'../register.php?register=2');
  $address = $_POST["address"];
  //Lets encrypt the Password
  $salt = $username . "tpmb";
  $epassword = crypt($password, $salt);

  //Check if user or email exist. If yes, do not continue
  $checkUsername = "SELECT username FROM user WHERE username='$username'";
  $checkEmail = "SELECT email FROM user WHERE email='$email'";
  $checkUserRows=mysqli_query($conn,$checkUsername);
  $checkEmailRows=mysqli_query($conn,$checkEmail);
  if(mysqli_num_rows($checkUserRows) != 0){
    echo "<script>window.location = '../register.php?register=1'; exit();</script>";
  } else {
    if(mysqli_num_rows($checkEmailRows) != 0){
      echo "<script>window.location = '../register.php?register=4'; exit();</script>";
    }
    if($password !== $_POST["pwd2"]){
      echo "<script>window.location = '../register.php?register=3'; exit();</script>";
    }
    $sql = "INSERT INTO user (username, fname, lname, email, password, gender, pnumber, birthday, address, status, registerdate)
    VALUES ('$username', '$fname', '$lname', '$email', '$epassword', '$gender', '$pnumber', '$bday', '$address', 'member', '$date')";
    mysqli_query($conn, $sql);
    echo "<script>window.location = '../registersuccess.php'; exit();</script>";
    mysqli_close($conn);
  }
}

//For ajax check
if(isset($_POST['uname'])){
  $username = $_POST["uname"];
  $checkUsername = "SELECT username FROM user WHERE username='$username'";
  $checkUserRows=mysqli_query($conn,$checkUsername);
  if (preg_match('/[\'"^$&%*}{#~?><>,|;]/', $username)){
       echo "Invalid characters detected";
  } elseif(mysqli_num_rows($checkUserRows) == 0){
      echo "Username is available";
    } else {
      echo "Username is being used :(";
    }
}
?>
