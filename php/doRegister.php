<?php
include "connect.php";

if (isset($_POST['register'])){

  //Prevent unknown symbols and XSS
  function scanner($input){
    if (preg_match('/[\'"^$&%*}{#~?><>,|;]/', $input)){
       $fail = 1;
       echo "<script>window.location = '../register.php?register=2'; exit();</script>";
    } else {
      return $input;
    }
  }
  $username = scanner($_POST['uname']);
  $fname = scanner($_POST['fname']);
  $lname = scanner($_POST['lname']);
  $email = scanner($_POST['email']);
  $gender = scanner($_POST['gender']);
  $pnumber = scanner($_POST['pnumber']);
  $pnumber = scanner($_POST['pnumber']);
  $bday = scanner($_POST["bday"]);
  $date = scanner(date("Ymd"));
  $password = scanner($_POST["pwd"]);
  //Lets encrypt the Password
  $salt = "tpmb_salt";
  $epassword = crypt($password, $salt);

  //Check if user exist. If yes, do not continue
  $checkUsername = "SELECT username FROM user WHERE username='$username'";
  $checkRows=mysqli_query($conn,$checkUsername);
  if(mysqli_num_rows($checkRows) != 0){
    echo "<script>window.location = '../register.php?register=1'; exit();</script>";
  } else {
    if($password !== $_POST["pwd2"]){
      echo "<script>window.location = '../register.php?register=3'; exit();</script>";
    }
    $sql = "INSERT INTO user (username, fname, lname, email, password, gender, pnumber, birthday, status, registerdate)
    VALUES ('$username', '$fname', '$lname', '$email', '$epassword', '$gender', '$pnumber', '$bday', 'member', '$date')";
    mysqli_query($conn, $sql);
  }
}
?>
