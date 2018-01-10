<?php session_start();
include "php/connect.php";
?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
<?php //load header
  include "ui/header.php" ?>
<main>
	<div class="container">
		<div class="row margintop4">
	    <?php include "ui/searchUI.php"; ?>
	  </div>
	<?php
	// Query for categories
	$executeCategories=mysqli_query($conn, "SELECT bookcategory FROM book GROUP BY bookcategory");
	while($bookCat = mysqli_fetch_array($executeCategories)){?>
  <a href="category-more.php?cat=<?php echo $bookCat['bookcategory'] ?>"><h4 class="left-align col s12 m6"><?php echo $bookCat['bookcategory'] ?><i class="material-icons">chevron_right</i></h4></a>
  <div class="divider line"></div>
	<div class="row section">
		<?php //Query for 5 books of that category
		$currentCat = $bookCat['bookcategory'];
		$getCatBooks=mysqli_query($conn, "SELECT * FROM book WHERE bookcategory = '$currentCat' ORDER BY RAND() LIMIT 5");
		while($bookInCat = mysqli_fetch_array($getCatBooks)){ ?>
    <div class="customCardDiv">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" height="250px" src="books/cover/<?php echo $bookInCat['bookthumbnail']; ?>">
        </div>
        <div class="card-content">
          <span class="grey-text text-darken-4 truncate"><?php echo $bookInCat['bookname']; ?></span>
          <p><a target="_blank" href="book.php?bookid=<?php echo $bookInCat['bookISBN']; ?>">Click me</a></p>
        </div>
      </div>
    </div>
	<?php } //End of query for category books ?>
  </div>
<?php } // End of query for category?>

  </div>
</main>
<?php //Load footer
	include "ui/footer.html"; ?>
</body>
