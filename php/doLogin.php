<?php
include "connect.php";

if (isset($_POST['login'])){

  $username = scanner($_POST['username'],'../login.php?loginfailure=2');
  $password = scanner($_POST["password"],'../login.php?loginfailure=2');
  //Lets encrypt the Password
  $salt = $username . "tpmb";
  $epassword = crypt($password, $salt);

  //Check if user exist. If yes, do not continue
  $s = mysqli_query($conn,"SELECT username, status FROM user WHERE username='$username' AND password='$epassword'");
  if(mysqli_num_rows($s) == 0){
    echo "<script>window.location = '../login.php?loginfailure=1'; exit();</script>";
  } else {
    if(isset($_POST['rememberMe'])){ setcookie("tpmb-username", $username, time() + 31536000, '/'); }
    else { setcookie("tpmb-username", "", time() + 31536000, '/'); }
    session_start();
    while($userStatus = mysqli_fetch_array($s)){
      if($userStatus['status'] == 'admin'){ $_SESSION['tpmb-userstatus']='admin'; }
      elseif ($userStatus['status'] == 'member'){ $_SESSION['tpmb-userstatus']='member'; }
      elseif ($userStatus['status'] == 'restricted'){ echo "<script>window.location = '../login.php?loginfailure=restricted'; exit();</script>"; }
    }
    $timestamp = date('Y F d h:iA');
    mysqli_query($conn,"UPDATE user SET lastlogin='$timestamp' WHERE username='$username'");
    $_SESSION['tpmb-user']=$username;
    echo "<script>window.location = '../index.php'; exit();</script>";
  }
}
?>
