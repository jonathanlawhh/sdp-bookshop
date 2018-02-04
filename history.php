<?php session_start();
include "php/connect.php";
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];

function viewMore($sqlState, $URL, $msg){
	if(mysqli_num_rows($sqlState) > 3){
			echo "<tr><td colspan='5'><a href='$URL' class='deep-orange-text text-darken-3'><i class='material-icons right'>chevron_right</i>View more $msg</a></td></tr>";
	} elseif(mysqli_num_rows($sqlState) == 0) {
			echo "<tr><td colspan='5'><i class='material-icons'>hourglass_empty</i> No results</td></tr>";
	}
}
?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Transaction History</h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
        <tr><th>Transaction ID</th><th>Transaction Amount</th><th>Discount</th><th>Points Earned</th><th>Date</th></tr>
      </thead>
      <tbody>
		<?php $historyIndex = 0;
    //Query for feedback
    $userTransactionArray=mysqli_query($conn,"SELECT * FROM transaction WHERE transactionUser = '$currentUser' ORDER BY transactionDate DESC LIMIT 4");
    while($userTransaction = mysqli_fetch_array($userTransactionArray)){
			//Below will remove certain part of the transaction ID for security
			$ti = strstr($userTransaction['transactionID'],'-2'); ?>
          <tr>
            <td><a target="_blank" href="transaction-slip.php?transID=<?php echo $ti; ?>"><?php echo $ti; ?></a></td>
            <td>RM <?php echo $userTransaction['transactionTotal']; ?></td>
            <td><?php if($userTransaction['transactionDiscount'] == 0){ echo "None"; } else {
						echo "RM " . $userTransaction['transactionDiscount'] . " / " . $userTransaction['transactionDiscount']*100 . " pts";} ?>
						</td>
						<td><?php echo $userTransaction['transactionPoint']; ?></td>
            <td><?php echo $userTransaction['transactionDate']; ?></td>
          </tr>
      <?php $historyIndex++; if($historyIndex >= 3 ){ break ; } }
			viewMore($userTransactionArray, 'transaction-more.php', 'transactions'); ?>
      </tbody>
    </table>

    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your feedbacks</h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
        <tr><th>Book</th><th>Comment</th><th>Date</th></tr>
      </thead>
      <tbody>
		<?php $historyIndex = 0;
    //Query for feedback
    $userFeedbackArray=mysqli_query($conn,"SELECT * FROM bookcomment AS bc, book AS b WHERE bc.username = '$currentUser' AND bc.bookISBN=b.bookISBN LIMIT 4");
    while($userFeedback = mysqli_fetch_array($userFeedbackArray)){ ?>
          <tr>
            <td><a target="_blank" href="book.php?bookid=<?php echo $userFeedback['bookISBN']; ?>"><?php echo $userFeedback['bookname']; ?></a></td>
            <td><?php echo $userFeedback['comments']; ?></td>
            <td><?php echo $userFeedback['date']; ?></td>
          </tr>
      <?php $historyIndex++; if($historyIndex >= 3 ){ break ; }}
			viewMore($userFeedbackArray, 'history-more.php?action=feedbacks', 'feedbacks'); ?>
      </tbody>
    </table>

    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your ratings</h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
				<tr><th style="width:40%;">Book</th><th>Ratings </th><th>Date</th></tr>
      </thead>
      <tbody>
		<?php $historyIndex = 0;
	    //Query for rating
	    $userRatingArray=mysqli_query($conn,"SELECT * FROM bookrating AS br, book AS b WHERE br.username = '$currentUser' AND br.bookISBN=b.bookISBN LIMIT 4");
	    while($userRating = mysqli_fetch_array($userRatingArray)){ ?>
          <tr>
            <td><a target="_blank" href="book.php?bookid=<?php echo $userRating['bookISBN']; ?>"><?php echo $userRating['bookname']; ?></a></td>
            <td><?php echo $userRating['rating']; ?></td>
            <td><?php echo $userRating['date']; ?></td>
          </tr>
      <?php $historyIndex++; if($historyIndex >= 3 ){ break ; }}
			viewMore($userRatingArray, 'history-more.php?action=rating', 'ratings'); ?>
      </tbody>
    </table>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
