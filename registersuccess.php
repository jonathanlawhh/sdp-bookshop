<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<main>
	<?php //load header
	  include "ui/header.php" ?>

    <div class="container" >
			<h4 class="left-align" style="margin-top:4%;">Registration successful!!</h4>
			<div class="divider"></div>
			<div class="section">
	      Your account has been created!!
				<br /><br />
				Move to the <a href="index.php">homepage</a><br />
				Move to the <a href="login.php">login page</a> or <br />
				move to the <a href="register.php">registration page</a>
			</div>
		</div>

  </main>
	<?php //Load footer
    include "ui/footer.html"; ?>
</body>
