<?php session_start();
include "php/connect.php";
checkLoginStatus();?>

<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<?php //load header
  include "ui/header.php";?>

  <main class="container">
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Payment</h4>Enter your card details<br /> Please note your default address will be used
    <div class="divider" style="margin-top:2%"></div>
		<form method="POST" action="php/makePayment.php" class="col s12"  style="margin-top:3%;">
				<div class="input-field col s12">
					Total Price : RM <?php echo $GLOBALS['totalPrice']; if(isset($_SESSION['tpmb-point']) && $_SESSION['tpmb-point'] != 0){
					 $pointPrice = $_SESSION["tpmb-point"] / 100;
					 $newPrice = $GLOBALS['totalPrice']-$pointPrice;
					 if($newPrice <=0){ echo "<script>window.location = 'checkout.php?error=1'; exit();</script>"; }
					 echo " - RM " . $pointPrice . " = RM " . $newPrice;
			 }?>
				</div>
				<div class="row margintop4">
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">credit_card</i>
						<input name="creditCardNumber" id="creditCardNumber" type="text" class="validate" <?php if(isset($_COOKIE['tpmb-card'])){ $card=$_COOKIE['tpmb-card']; echo "value=$card"; } ?> required>
						<label for="creditCardNumber">Card number</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">face</i>
						<input name="creditCardName" id="creditCardName" type="text" class="validate" required>
						<label for="creditCardName">Name on card</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6 m4 l2">
						<i class="material-icons prefix">date_range</i>
						<input name="creditCardExpiry" id="creditCardExpiry" type="tel" class="validate" required>
						<label for="creditCardCVV">Expiry Date</label>
					</div>
					<div class="input-field col s6 m4 l2">
						<i class="material-icons prefix">dialpad</i>
						<input name="creditCardCVV" id="creditCardCVV" type="tel" class="validate" required>
						<label for="creditCardCVV">CVV</label>
					</div>
					<p class="col s6 m6 l2">
						<button name="makePayment" type="submit" class="waves-effect waves-light btn"><i class="material-icons left">monetization_on</i>Pay now</button>
					</p>
					<p class="col s12">
						<input name="rememberCard" type="checkbox" id="rmbCard" <?php if(isset($_COOKIE['tpmb-card'])){ echo "checked"; }?>/>
						<label for="rmbCard">Remember Card</label>
					</p>
				</div>
		</form>
  </main>
  <?php //Load footer
		if(isset($_SESSION['tpmb-point']) && $_SESSION['tpmb-point'] != 0){ echo "<script>Materialize.toast('Points applied!!', 3000)</script>"; }
    include "ui/footer.html"; ?>
</body>
