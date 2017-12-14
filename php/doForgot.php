<?php
include "connect.php";

if (isset($_POST['resetMe'])){

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
  $pnumber = scanner($_POST["pnumber"]);
  $email = scanner($_POST["email"]);

  //Check if user exist. If yes, do not continue
  $checkUsername = "SELECT username,pnumber,email FROM user WHERE username='$username' AND pnumber='$pnumber' AND email='$email'";
  $checkRows=mysqli_query($conn,$checkUsername);
  if(mysqli_num_rows($checkRows) == 0){
    echo "<script>window.location = '../resetpassword.php?search=0'; exit();</script>";
  } else {
    echo "Resetting password...";
    //Generate new password
    $newpassword = rand(00000000,9999999999);
    //Encrypt new password for database
    $salt = $username . "tpmb";
    $enewpassword = crypt($newpassword, $salt);
    //Email msg
    $msg = "Your password has been reset to" . $newpassword . ". Please change it as soon as possible";
    echo $newpassword;
    mail("$email","Request to reset TPMB password",$msg);
  }
}
?>
