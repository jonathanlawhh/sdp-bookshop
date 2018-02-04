<?php session_start();
include "php/connect.php";
$currentAction = scanner($_GET['cat'], "404.php");
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
		<?php //Query for bookcategory
		$executeCategories=mysqli_query($conn, "SELECT bookcategory FROM book WHERE bookcategory = '$currentAction' GROUP BY bookcategory");
		if(mysqli_num_rows($executeCategories) == 0){ //If search return no results ?>
			<h4 class="left-align col s12 m6 margintop4">There is no results for your query</h4>
		<?php } else { while($bookCat = mysqli_fetch_array($executeCategories)){
		?>
    <h4 class="left-align col s12 m6 margintop4"><?php echo $bookCat['bookcategory'] ?></h4>
    <div class="divider"></div>
		<div class="row" >
		<?php
		$currentCat = $bookCat['bookcategory'];
		$getCatBooks=mysqli_query($conn, "SELECT * FROM book WHERE bookcategory = '$currentCat'");
		while($bookInCat = mysqli_fetch_array($getCatBooks)){ ?>
			<div class="customCardDiv">
	      <div class="card">
	        <div class="card-image waves-effect waves-block waves-light">
	          <img class="activator" height="250px" src="books/cover/<?php echo $bookInCat['bookthumbnail']; ?>">
	        </div>
	        <div class="card-content">
	          <span class="grey-text text-darken-4 truncate"><?php echo $bookInCat['bookname']; ?></span>
	          <p><a href="book.php?bookid=<?php echo $bookInCat['bookISBN']; ?>">Click me</a></p>
	        </div>
	      </div>
	    </div>
		<?php } //End of query for category books ?>
	  </div>
	<?php }} // End of query for category?>

  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
