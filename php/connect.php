<?php
//Use to prevent people from coming in
function checkLoginStatus($tpmbUserStatus = 'basic'){
  if(!isset($_SESSION['tpmb-user'])){
  	header("Location: 404.php");
  }
  if($tpmbUserStatus ==='staff' && $_SESSION['tpmb-userstatus'] != 'staff'){
    header("Location: 404.php");
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$db = "tpmb";

//Use Vivaldi Email as SMTP are configured for Vivaldi properly
$adminEmail = "jonathanlawhh@vivaldi.net";
$adminEmailPassword = "jonjon98";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

//Prevent unknown symbols and XSS
function scanner($input,$url){
  if (preg_match('/[\'"^$&%*}{#~?><>|;]/', $input)){
     $fail = 1;
     echo "<script>window.location = '$url'; exit();</script>";
  } else {
    return $input;
  }
}
?>
