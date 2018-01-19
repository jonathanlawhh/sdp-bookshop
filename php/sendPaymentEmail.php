<?php
checkLoginStatus();
use PHPMailer\PHPMailer\PHPMailer;
require '../mail/src/Exception.php';
require '../mail/src/PHPMailer.php';
require '../mail/src/SMTP.php';

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
$mail->Subject = 'Your order today';
$emailContent = "
<main>
  <body>
    <div style='max-width:92%; margin:auto;'>
      <h1 style='text-align: left; font-size: 2em; font-weight: bold;'>TPMB</h1>
    </div>
    <div style='border-style:solid;border-color:#BDBDBD;;border-width:1px; max-width:92%; margin:auto;'>
      <div style='padding: 2px 16px;'>
        <h4>Hello $fname,</h4>
        <p>Your password was just changed. <br /> If you did not request to change your password, please reset your password immediately.</p>
        <div style='height:1px;overflow:hidden;background-color:#e0e0e0;'></div>
          <p>Quick Links : <br /><br />
            <a href='localhost/TPM/' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Home Page</a>
            <a href='localhost/TPM/resetpassword.php' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Reset Password</a>
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
    echo "<script>window.location = '../settings.php?status=serverfail'; exit();</script>";
}
?>
