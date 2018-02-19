<?php session_start();
include "php/userData.php";
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
		<div class="row">
      <div class="col s12">
        <div class="card hoverable">
          <div class="card-content">
            <span class="card-title"><?php echo $currentUser?>'s Profile</span>
            <p class="col s4 m2">First Name</p><p class="col s8 m4">: <?php echo $fname?></p>
            <p class="col s4 m2">Last Name</p><p class="col s8 m4">: <?php echo $lname?></p><br />
            <p class="col s4 m2">Birthday</p><p class="col s8 m4">: <?php echo $bday?></p>
            <p class="col s4 m2">Gender</p><p class="col s8 m4">: <?php echo $gender?></p><br />
						<p class="col s4 m2">Email</p><p class="col s8 m4">: <?php echo $email?></p><br />
						<p class="col s4 m2">Last login</p><p class="col s8 m4">: <?php echo $lastlogin?></p><br />
						<p class="col s4 m2">Current points</p><p class="col s8 m4">: <?php echo $pts?> pts</p><br />
						<?php
						$checkUserRatingQuery = "SELECT COUNT(ufr.feedbackRated) AS feedbackCount,ufr.feedbackRated FROM userfeedbackrating AS ufr, bookcomment AS bc WHERE ufr.ratingID=bc.ratingID AND bc.username = '$currentUser' GROUP BY ufr.feedbackRated";
						$checkUserRatingArray=mysqli_query($conn,$checkUserRatingQuery);
						if(mysqli_num_rows($checkUserRatingArray) > 0){ ?>
						<br /><p class="card-title">Your feedback summary as rated by other users</p>
				    <?php while($returnedRating = mysqli_fetch_array($checkUserRatingArray)){
							$totalScore = $returnedRating['feedbackCount'];
							if($returnedRating['feedbackRated'] === 'veryuseful') { echo "<p class='col s4 m2'>Very useful</p><p class='col s8 m2'>: $totalScore</p>"; }
							if($returnedRating['feedbackRated'] === 'useful') { echo "<p class='col s4 m2'>Useful</p><p class='col s8 m2'>: $totalScore</p>"; }
							if($returnedRating['feedbackRated'] === 'useless') { echo "<p class='col s4 m2'>Useless</p><p class='col s8 m2'>: $totalScore</p>"; }

						}} ?>
						<div class="margintop4"></div>
          </div>
        </div>
      </div>
    </div>
		<div class="row">
		  <ul class="collapsible popout" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header"><i class="material-icons">history</i>Transaction History</div>
		      <div class="collapsible-body"><span>
						<table class="highlight responsive-table">
				      <thead>
				        <tr><th>No</th><th>Transaction ID</th><th>Transaction Amount</th><th>Discount</th><th>Points Earned</th><th>Date</th></tr>
				      </thead>
				      <tbody>
						<?php $historyIndex = 0;
				    //Query for feedback
				    $userTransactionArray=mysqli_query($conn,"SELECT * FROM transaction WHERE transactionUser = '$currentUser' ORDER BY transactionDate DESC LIMIT 4");
				    while($userTransaction = mysqli_fetch_array($userTransactionArray)){
							//Below will remove certain part of the transaction ID for security
							$ti = strstr($userTransaction['transactionID'],'-2'); ?>
				          <tr>
										<td><?php echo $historyIndex+1; ?></td>
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
					</span></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="material-icons">feedback</i>Your feedbacks</div>
		      <div class="collapsible-body"><span>
						<table class="highlight responsive-table">
				      <thead>
				        <tr><th>No</th><th>Book</th><th>Comment</th><th>Date</th></tr>
				      </thead>
				      <tbody>
						<?php $historyIndex = 0;
				    //Query for feedback
				    $userFeedbackArray=mysqli_query($conn,"SELECT b.bookISBN, bc.ratingID, b.bookname, bc.comments, bc.date FROM bookcomment AS bc, book AS b WHERE bc.username = '$currentUser' AND bc.bookISBN=b.bookISBN LIMIT 4");
				    while($userFeedback = mysqli_fetch_array($userFeedbackArray)){ ?>
			          <tr>
									<td><?php echo $historyIndex+1; ?></td>
			            <td><a target="_blank" href="book.php?bookid=<?php echo $userFeedback['bookISBN']; ?>"><?php echo $userFeedback['bookname']; ?></a></td>
			            <td><?php echo $userFeedback['comments']; ?></td>
			            <td><?php echo $userFeedback['date']; ?></td>
			          </tr>
				      <?php $historyIndex++; if($historyIndex >= 3 ){ break ; }}
							viewMore($userFeedbackArray, 'history-more.php?action=feedbacks', 'feedbacks'); ?>
				      </tbody>
				    </table>
					</span></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="material-icons">whatshot</i>Your ratings</div>
		      <div class="collapsible-body"><span>
						<table class="highlight responsive-table">
				      <thead>
								<tr><th>No</th><th>Book</th><th>Ratings </th><th>Date</th></tr>
				      </thead>
				      <tbody>
						<?php $historyIndex = 0;
					    //Query for rating
					    $userRatingArray=mysqli_query($conn,"SELECT b.bookISBN, br.ratingID, b.bookname, br.rating, br.date FROM bookrating AS br, book AS b WHERE br.username = '$currentUser' AND br.bookISBN=b.bookISBN LIMIT 4");
					    while($userRating = mysqli_fetch_array($userRatingArray)){ ?>
			          <tr>
									<td><?php echo $historyIndex+1; ?></td>
			            <td><a target="_blank" href="book.php?bookid=<?php echo $userRating['bookISBN']; ?>"><?php echo $userRating['bookname']; ?></a></td>
			            <td><?php echo $userRating['rating']; ?></td>
			            <td><?php echo $userRating['date']; ?></td>
			          </tr>
				      <?php $historyIndex++; if($historyIndex >= 3 ){ break ; }}
							viewMore($userRatingArray, 'history-more.php?action=rating', 'ratings'); ?>
				      </tbody>
				    </table>
					</span></div>
		    </li>
		  </ul>
		</div>

  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
