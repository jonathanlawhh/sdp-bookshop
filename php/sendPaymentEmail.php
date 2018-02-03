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
$totalAmount = $_SESSION['tpmb-total'];
$ti = $_SESSION['tpmb-temp'];
$emailContent = "
<main>
  <body>
    <div style='max-width:92%; margin:auto;'>
      <h1 style='text-align: left; font-size: 2em; font-weight: bold;'>TPMB</h1>
    </div>
    <div style='border-style:solid;border-color:#BDBDBD;border-width:1px; max-width:92%; margin:auto;'>
      <div style='padding: 2px 16px;'>
        <h4>Hello $fname,</h4>
        <p>A transaction of RM $totalAmount just took place.
        Your order with transaction ID $ti will be sent to the following address :<br />
        <span><u>$address</u></span><br /><br />
        You can view the transaction details from the history page after logging in.<br />
        Current member points : $totalPoints pts</p>
        <div style='height:1px;overflow:hidden;background-color:#e0e0e0;'></div>
          <p>Quick Links : <br /><br />
            <a href='localhost/TPM/' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Home Page</a>
            <a href='localhost/TPM/login.php' style='margin-left:10px;border-style:solid;border-width:1px;text-decoration:none; padding: 2px 16px'>Login Page</a>
          </p>
        </div>
    </div>
    <div style='margin-top:3%;'></div>
    <div style='border-style:solid;border-color:#BDBDBD; border-width:1px; margin:auto; max-width:92%;'>
      <div style='padding: 2px 16px;'>
        <h4>Some Notes</h4>
        <ul>
         <li>If you did not make any purchase recently, please alert your bank and do email us.</li><br />
         <li>Always remember to sign out after you are done browsing</li>
        </ul>
      </div>
    </div>
  </body>
</main>";

//Send the email. If fail, redirect to transaction-done.php and show error
$mail->msgHTML($emailContent);
$status = 'success';
if (!$mail->send()) {
  $status = 'serverfail';
}
?>
