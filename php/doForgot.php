<?php
include "connect.php";

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

if (isset($_POST['resetMe'])){

  $username = scanner($_POST['username'],'../resetpassword.php?search=0');
  $pnumber = scanner($_POST["pnumber"],'../resetpassword.php?search=0');
  $email = scanner($_POST["email"],'../resetpassword.php?search=0');

  //Check if user exist. If no, do not continue
  $checkUsername = "SELECT fname, username,pnumber,email FROM user WHERE username='$username' AND pnumber='$pnumber' AND email='$email'";
  $checkRows=mysqli_query($conn,$checkUsername);
  if(mysqli_num_rows($checkRows) == 0){
    echo "<script>window.location = '../resetpassword.php?search=0'; exit();</script>";
  } else {

    //Set user details into variables
    while($userInfo = mysqli_fetch_array($checkRows)){
      $username=$userInfo['username'];
      $fname=$userInfo['fname'];
      $email=$userInfo['email'];
    }

    //Generate new password
    $newpassword = rand(00000000,9999999999);
    //Encrypt new password for database
    $salt = $username . "tpmb";
    $enewpassword = crypt($newpassword, $salt);

    //SMTP server config
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = "mail.vivaldi.net";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'TLS';

    //Email credentials
    $mail->Username = $adminEmail;
    $mail->Password = $adminEmailPassword;
    $mail->setFrom($adminEmail, 'TPMB Admin');
    $mail->addReplyTo($adminEmail, 'TPMB Admin');
    //Send to ??
    $mail->addAddress($email, $username);
    $mail->Subject = 'Request to reset TPMB password';
    $emailContent = "
    <main>
      <body>
        <div style='max-width:92%; margin:auto;'>
          <h1 style='text-align: left; font-size: 2em; font-weight: bold;'>TPMB</h1>
        </div>
        <div style='border-style:solid;border-color:#BDBDBD;;border-width:1px; max-width:92%; margin:auto;'>
          <div style='padding: 2px 16px;'>
            <h4>Hello $fname,</h4>
            <p>Your password has been changed to <b>$newpassword</b>, <br /> Please change your password as soon as possible</p>
            <div style='height:1px;overflow:hidden;background-color:#e0e0e0;'></div>
              <p>Quick Links : <br /><br />
                <a href='localhost/TPM/' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Home Page</a>
                <a href='localhost/TPM/login.php' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Login</a>
              </p>
            </div>
        </div>
        <div style='margin-top:3%;'></div>
        <div style='border-style:solid;border-color:#BDBDBD; border-width:1px; margin:auto; max-width:92%;'>
          <div style='padding: 2px 16px;'>
            <h4>Some Notes</h4>
            <ul>
             <li>If you did not request to reset your password, please login with the given password and change it immediately.</li><br />
             <li>Always remember to sign out after you are done browsing</li>
            </ul>
          </div>
        </div>
      </body>
    </main>";

    //Send the email. If fail, redirect to resetpassword.php and show error
    $mail->msgHTML($emailContent);
    if (!$mail->send()) {
        echo "<script>window.location = '../resetpassword.php?search=1'; exit();</script>";
    }

    //Update password at database
    $updatePassword=mysqli_query($conn,"UPDATE user SET password = '$enewpassword' WHERE username='$username' AND email='$email'");
    echo "<script>window.location = '../resetpassword.php?search=3'; exit();</script>";
  }
}
?>
