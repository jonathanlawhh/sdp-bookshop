<?php session_start();
include "php/connect.php";
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];
//Add back removed characters for database query. This is a security feature
$currentAction = scanner($_GET['transID'],"404.php");
$queryID = $currentUser . $currentAction;

//Get action and perform query accordingly
$query = "SELECT * FROM transaction WHERE transactionUser = '$currentUser' AND transactionID = '$queryID'";
?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="js/materialize.min.js"></script>
</head>

<body>
  <main class="container">
    <h4 class="left-align col s12 m6 offset-m3 margintop4">TPMB Transaction Invoice</h4>
		<?php
    $userTransactionArray=mysqli_query($conn,$query);
		if(mysqli_num_rows($userTransactionArray) > 0){
    while($userTransaction = mysqli_fetch_array($userTransactionArray)){ ?>
		<span>User &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $currentUser; ?></span><br />
		<span>Transaction ID &nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $currentAction; ?></span><br />
		<span>Transaction Date : <?php echo $userTransaction['transactionDate']; ?></span>
    <div class="divider margintop4"></div>
		<table class="responsive-table">
			<thead>
        <tr><th>No.</th><th>Book ISBN</th><th>Book Title</th><th>Quantity</th><th>Price per book</th><th>Total Price</th></tr>
      </thead>
      <tbody>
				<?php $ti = $userTransaction['transactionID'];
				$bookDetailArray=mysqli_query($conn,"SELECT td.bookISBN, td.quantity, b.bookname, b.bookprice FROM book as b, transactiondetail as td WHERE td.transactionID='$ti' AND b.bookISBN=td.bookISBN");
				$indexNum = 1;
				$totalPrice = 0;
				while($bookDetail = mysqli_fetch_array($bookDetailArray)){?>
				<tr>
					<td><?php echo $indexNum; ?></td>
					<td><?php echo $bookDetail['bookISBN']; ?></td>
					<td><?php echo $bookDetail['bookname']; ?></td>
					<td><?php echo $bookDetail['quantity']; ?></td>
					<td>RM <?php echo $bookDetail['bookprice']; ?></td>
					<td>RM <?php $totalPerBook = $bookDetail['quantity'] * $bookDetail['bookprice']; echo $totalPerBook; ?></td>
				</tr>
			<?php $indexNum++; $totalPrice += $totalPerBook;} //Check for discount
			if($userTransaction['transactionDiscount'] != 0){ ?>
				<tr><td colspan="4" class="right-align">Applied Discount : </td><td></td><td>RM <?php echo $userTransaction['transactionDiscount']; ?></td></tr>
			<?php $totalPrice-=$userTransaction['transactionDiscount']; }?>
			<tr><td colspan="4" class="right-align">Total Price : </td><td></td><td>RM <?php echo $totalPrice; ?></td></tr>
			</tbody>
		</table>
	<?php }} else { ?>
		<div class="divider"></div>
		<h5 class="margintop4">Either you have no transactions, or you are not authorized to view this page.<br />
		If you believe this is an error, please email us at <u>jonathanlawhh@vivaldi.net</u></h5>
		<p>Click <a href="index.php">here</a> to go back to the home screen</p>
	<?php } ?>
  </main>
</body>
