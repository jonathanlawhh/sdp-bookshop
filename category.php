<?php session_start(); ?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
  </script>
</head>

<body background="bg.jpg" style="background-size:cover;">
<header>
<?php //load header
  include "ui/header.php" ?>
</header>
<main class="col s9">
	<div class="container">
		<div class="row">
				<h1>SOme texr</h1>
		</div>
	</div>

  <?php //Load footer
    include "ui/footer.html"; ?>
</main>
</body>
