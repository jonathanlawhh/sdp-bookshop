<?php session_start();
include "php/connect.php";
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];
$currentAction = scanner($_GET['transID'],"404.php");

//Get action and perform query accordingly
$query = "SELECT * FROM transaction WHERE transactionUser = '$currentUser' AND transactionID = '$currentAction'";
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
  <main class="container">
    <h4 class="left-align col s12 m6 offset-m3 margintop4">TPMB Transcation Invoice</h4>
		<?php
    //Query for feedback
    $userTransactionArray=mysqli_query($conn,$query);
    while($userTransaction = mysqli_fetch_array($userTransactionArray)){ ?>
		<span>Transaction ID &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $userTransaction['transactionID']; ?></span><br />
		<span>Transaction Date : <?php echo $userTransaction['transactionDate']; ?></span>
    <div class="divider"></div>
		<table>
			<thead>
        <tr><th>Book ISBN</th><th>Book Title</th><th>Quantity</th><th>Price</th></tr>
      </thead>
      <tbody>
				<?php $bookDetailArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN=''");
				while($bookDetail = mysqli_fetch_array($bookDetailArray)){?>
				<tr>
					<td><a><?php echo $userTransaction['transactionID']; ?></a></td>
					<td>RM <?php echo $userTransaction['transactionTotal']; ?></td>
					<td><?php echo $userTransaction['transactionDate']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
    <?php } ?>
  </main>
</body>
