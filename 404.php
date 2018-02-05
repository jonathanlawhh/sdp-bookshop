<?php session_start();
include "php/connect.php";
?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<script type="text/javascript" src="js/materialize.min.js"></script>
  <link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<?php //load header
  include "ui/header.php" ?>

<main>
  <div class="container">
    <div class="row" style="margin-top:10%;">
      <h4>Is this a 404 page unknown error?</h4>
        <div class="col s12">
          <div class="card hoverable">
            <div class="card-content">
              <span class="card-title"><i class="material-icons">error</i> Oops !?</span>
                <p>You may have reached a dead link or you are not authorized to view this page. <br />
                Follow any of the links below to get back on track. </p>
            </div>
            <div class="card-action">
              <a href="index.php">Home</a>
              <a href="login.php">Login</a>
              <a href="register.php">Register</a>
            </div>
          </div>
        </div>
      </div>
  </div>
</main>
<?php //Load footer
  include "ui/footer.html"; ?>
</body>
