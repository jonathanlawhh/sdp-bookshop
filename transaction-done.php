<?php session_start();
include "php/connect.php";
checkLoginStatus();
?>
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
			<h4 class="left-align margintop4">Transaction information</h4>
			<div class="divider"></div>
			<div class="section">
				<?php if(isset($_SESSION['tpmb-temp'])){ if(isset($_GET['status']) && $_GET['status']=='serverfail'){ echo "Email server failed. <br />"; } ?>
	      Your transaction for <?php echo $_SESSION['tpmb-temp']; ?> is successful!! <br />
				Your books will arrived at your doorstep within 7 working days.
				<p>Click <a target="_blank" href="transaction-slip.php?transID=<?php echo $_SESSION['tpmb-temp']; ?>">here</a>
					to review and print your transaction invoice.
				</p>
			<?php } else { ?>
				You are not authorized to view this page or you are loading outdated data.
			<?php } ?>
				<br /><br />
				Move to the <a href="index.php">homepage</a> or<br />
				Move to the <a href="history.php">history page</a>
			</div>
		</div>

  </main>
	<?php //Load footer
    include "ui/footer.html";
		unset($_SESSION['tpmb-temp']); ?>
</body>
