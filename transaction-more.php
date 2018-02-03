<?php session_start();
include "php/connect.php";
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];
?>
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
    <div class="row margintop4">
			<?php include "ui/searchUI.php"; ?>
    </div>
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your transaction history</h4>
    <div class="divider"></div>
		<table class="highlight responsive-table">
      <thead>
        <tr><th>Transaction ID</th><th>Transaction Amount</th><th>Points Earned</th><th>Date</th></tr>
      </thead>
      <tbody>
		<?php
    //Query for feedback
    $userTransactionArray=mysqli_query($conn,"SELECT * FROM transaction WHERE transactionUser = '$currentUser' ORDER BY transactionDate DESC");
		while($userTransaction = mysqli_fetch_array($userTransactionArray)){
			//Below will remove certain part of the transaction ID for security
			$ti = strstr($userTransaction['transactionID'],'-2'); ?>
			<tr>
				<td><a target="_blank" href="transaction-slip.php?transID=<?php echo $ti; ?>"><?php echo $ti; ?></a></td>
				<td>RM <?php echo $userTransaction['transactionTotal']; ?></td>
				<td><?php echo $userTransaction['transactionPoint']; ?></td>
				<td><?php echo $userTransaction['transactionDate']; ?></td>
			</tr>
      <?php } ?>
      </tbody>
    </table>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
