<?php
include "connect.php";

if (isset($_POST['login'])){

  //Prevent unknown symbols and XSS
  function scanner($input){
    if (preg_match('/[\'"^$&%*}{#~?><>,|;]/', $input)){
       $fail = 1;
       echo "<script>window.location = '../login.php?loginfailure=2'; exit();</script>";
    } else {
      return $input;
    }
  }
  $username = scanner($_POST['username']);
  $password = scanner($_POST["password"]);
  //Lets encrypt the Password
  $salt = $username . "tpmb";
  $epassword = crypt($password, $salt);

  //Check if user exist. If yes, do not continue
  $checkUsername = "SELECT username FROM user WHERE username='$username' AND password='$epassword'";
  $checkRows=mysqli_query($conn,$checkUsername);
  if(mysqli_num_rows($checkRows) == 0){
    echo "<script>window.location = '../login.php?loginfailure=1'; exit();</script>";
  } else {
    if(isset($_POST['rememberMe'])){
      setcookie("tpmb-username", $username, time() + 31536000, '/');
    } else {
      setcookie("tpmb-username", "", time() + 31536000, '/');
    }
    session_start();
    $_SESSION['tpmb-user']=$username;
    echo "<script>window.location = '../index.php'; exit();</script>";
  }
}
?>
