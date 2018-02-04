<?php session_start();
include "php/connect.php";
checkLoginStatus();
$currentUser = $_SESSION['tpmb-user'];
$currentAction = scanner($_GET['action'],"404.php");

//Get action and perform query accordingly
if($currentAction == "feedbacks"){
	$query = "SELECT * FROM bookcomment AS bc, book AS b WHERE bc.username = '$currentUser' AND bc.bookISBN=b.bookISBN";
	$queryParam = "comments";
} else if ($currentAction == "rating"){
	$query = "SELECT * FROM bookrating AS br, book AS b WHERE br.username = '$currentUser' AND br.bookISBN=b.bookISBN";
	$queryParam = "rating";
} else { //else redirect unknown GET
	header("Location: 404.php");
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
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Your <?php echo $currentAction; ?></h4>
    <div class="divider"></div>
    <table class="highlight responsive-table">
      <thead>
        <tr>
            <th>Book</th>
            <th><?php echo $currentAction; ?></th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
		<?php
    //Query for feedback
    $userHistoryArray=mysqli_query($conn,$query);
    while($userHistory = mysqli_fetch_array($userHistoryArray)){ ?>
          <tr>
            <td><a target="_blank" href="book.php?bookid=<?php echo $userHistory['bookISBN']; ?>"><?php echo $userHistory['bookname']; ?></a></td>
            <td><?php echo $userHistory[$queryParam]; ?></td>
            <td><?php echo $userHistory['date']; ?></td>
          </tr>
      <?php } ?>
      </tbody>
    </table>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
