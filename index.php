<?php session_start();
include "php/connect.php";
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
  <script>
  $(document).ready(function(){
    $('.carousel').carousel({padding:250});
  });
	$(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });

  </script>
</head>

<body background="bg.jpg" style="background-size:cover;">
<?php //load header
  include "ui/header.php" ?>

<main>
	<div class="col hide-on-med-and-down m3 l2" style="right:6%; margin-top:5%; position:fixed;">
      <ul class="section table-of-contents">
        <li>Fast jump</li>
        <li><a href="#book-new">Newly released books</a></li>
        <li><a href="#book-recc">Recomended for you</a></li>
        <li><a href="#book-rate">Top rating books</a></li>
      </ul>
    </div>
<div class="container">
  <div class="row margintop4">
    <?php include "ui/searchUI.php"; ?>
  </div>
  <h4 id="book-new" class="left-align col s12 m6 offset-m3 scrollspy">Newly released books</h4>
  <div class="divider line"></div>
  <div class="carousel">
		<?php //Query for new book
		$getNewBook = "SELECT * FROM book ORDER BY bookdateadd DESC LIMIT 6";
		$newBooksQuery=mysqli_query($conn,$getNewBook);
		while($newBook = mysqli_fetch_array($newBooksQuery)){?>
    	<a class="carousel-item" href="book.php?bookid=<?php echo $newBook['bookISBN']; ?>"><img src="books/cover/<?php echo $newBook['bookthumbnail']; ?>"></a>
		<?php } ?>
  </div>

  <h4 id="book-recc" class="left-align col s12 m6 offset-m3 scrollspy">Books recomended for you</h4>
  Based on your preferences
  <div class="divider line"></div>

  <div class="row section">
		<?php
		// Query for Recomended
		// A cache for the book category is made everytime a book is being searched. This cache will be used to reccomend.
		if(isset($_COOKIE['tpmb-recc'])){
			$recc = $_COOKIE['tpmb-recc'];
		} else {
			$recc = "Fantasy";
		}
		$queryRecc = "SELECT bookISBN, bookname, bookthumbnail, bookdateadd FROM book WHERE bookcategory='$recc' ORDER BY RAND() LIMIT 5";
		$executeRecc=mysqli_query($conn, $queryRecc);
		while($reccbook = mysqli_fetch_array($executeRecc)){?>
    <div class="customCardDiv">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" height="250px" src="books/cover/<?php echo $reccbook['bookthumbnail'] ?>">
        </div>
        <div class="card-content">
          <span class="grey-text text-darken-4 truncate"><?php echo $reccbook['bookname'] ?></span>
          <p><a target="_blank" href="book.php?bookid=<?php echo $reccbook['bookISBN']; ?>">Click me</a></p>
        </div>
      </div>
    </div>
	<?php } //End of recomended ?>
  </div>

  <h4 id="book-rate" class="left-align col s12 m6 offset-m3 scrollspy">Top rating books</h4>
  Based on users rating
  <div class="divider line"></div>

  <div class="row section">
		<?php //Query for top rating books
		$queryTopRate = "SELECT b.bookISBN, b.bookname, b.bookthumbnail FROM bookrating AS br, book AS b WHERE br.rating=5 AND br.bookISBN=b.bookISBN GROUP BY b.bookISBN ORDER BY RAND() DESC LIMIT 5";
		$executeTopRate=mysqli_query($conn,$queryTopRate);
		while($topRating = mysqli_fetch_array($executeTopRate)){?>
    <div class="customCardDiv">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" height="250px" src="books/cover/<?php echo $topRating['bookthumbnail'] ?>">
        </div>
        <div class="card-content">
          <span class="grey-text text-darken-4 truncate"><?php echo $topRating['bookname'] ?></span>
          <p><a target="_blank" href="book.php?bookid=<?php echo $topRating['bookISBN']; ?>">Click me</a></p>
        </div>
      </div>
    </div>
		<?php } //End of top rating books ?>
  </div>

  </div>

  <?php //Load footer
    include "ui/footer.html"; ?>
</main>
</body>
