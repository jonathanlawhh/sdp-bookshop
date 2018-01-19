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
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your feedbacks</h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
        <tr>
            <th>Book</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
		<?php
    //Query for feedback
    $userFeedbackArray=mysqli_query($conn,"SELECT * FROM bookcomment AS bc, book AS b WHERE bc.username = '$currentUser' AND bc.bookISBN=b.bookISBN LIMIT 3");
    $userFeedbackCount=mysqli_query($conn,"SELECT * FROM bookcomment AS bc, book AS b WHERE bc.username = '$currentUser' AND bc.bookISBN=b.bookISBN");
    while($userFeedback = mysqli_fetch_array($userFeedbackArray)){ ?>
          <tr>
            <td><a target="_blank" href="book.php?bookid=<?php echo $userFeedback['bookISBN']; ?>"><?php echo $userFeedback['bookname']; ?></a></td>
            <td><?php echo $userFeedback['comments']; ?></td>
            <td><?php echo $userFeedback['date']; ?></td>
          </tr>
      <?php } if(mysqli_num_rows($userFeedbackCount) > 3){
        echo "<tr><td colspan='3'><a href='history-more.php?action=feedbacks'><i class='material-icons right'>chevron_right</i>View more feedbacks you gave</a></td></tr>";
      } ?>
      </tbody>
    </table>

    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your ratings</h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
        <tr>
            <th>Book</th>
            <th>Rating</th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
		<?php
    //Query for rating
    $userRatingArray=mysqli_query($conn,"SELECT * FROM bookrating AS br, book AS b WHERE br.username = '$currentUser' AND br.bookISBN=b.bookISBN LIMIT 3");
    $userRatingCount=mysqli_query($conn,"SELECT * FROM bookrating AS br, book AS b WHERE br.username = '$currentUser' AND br.bookISBN=b.bookISBN");
    while($userRating = mysqli_fetch_array($userRatingArray)){ ?>
          <tr>
            <td><a target="_blank" href="book.php?bookid=<?php echo $userRating['bookISBN']; ?>"><?php echo $userRating['bookname']; ?></a></td>
            <td><?php echo $userRating['rating']; ?></td>
            <td><?php echo $userRating['date']; ?></td>
          </tr>
      <?php } if(mysqli_num_rows($userRatingCount) > 3){
        echo "<tr><td colspan='3'><a href='history-more.php?action=rating'><i class='material-icons right'>chevron_right</i>View more ratings you gave</a></td></tr>";
      } ?>
      </tbody>
    </table>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>