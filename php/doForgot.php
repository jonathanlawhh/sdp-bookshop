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
  }
}
?>
