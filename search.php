<?php session_start();
include "php/connect.php";
$searchterm = "noresult";
if(isset($_GET['searchterm'])){
	$searchterm = scanner($_GET['searchterm'],'404.php');
}

//Query for book
$searchBookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN LIKE '%$searchterm%' OR bookname LIKE '%$searchterm%' OR bookauthor LIKE '%$searchterm%' LIMIT 10");
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
<script>
function goBack() {
	window.history.back();
}
</script>

<body>
<?php //load header
  include "ui/header.php";?>

  <main class="container">
    <div class="row margintop4">
			<?php include "ui/searchUI.php"; ?>
    </div>
    <h4 class="left-align col s12 m6 offset-m3 margintop4"><a href="" onclick="goBack()"><i class="material-icons" style="margin-right:10px;">arrow_back</i></a>Search results</h4>
    <div class="divider line"></div>
		<?php if(mysqli_num_rows($searchBookArray) == 0){ ?>
			<div class="row section">
				<h5>Sorry there were no results found...</h5>
				<p>Try searching for either the author name or book title</p>
	    </div>
		<?php } else { $i = 1; while($searchedBook = mysqli_fetch_array($searchBookArray)){ ?>
	    <div class="row section">
				<img style="float:left;" height="150px" src="books/cover/<?php echo $searchedBook['bookthumbnail']; ?>">
				<div style="float:left; margin-left:4%;">
	      <h5><a href="book.php?bookid=<?php echo $searchedBook['bookISBN']; ?>"><?php echo $i . " . " . $searchedBook['bookname']; ?></a></h5>
				<div class="chip"><a href="category-more.php?cat=<?php echo $searchedBook['bookcategory']; ?>"><?php echo $searchedBook['bookcategory']; ?></a></div>
		    <div class="chip"><a href="?searchterm=<?php echo $searchedBook['bookauthor']; ?>"><?php echo $searchedBook['bookauthor']; ?></a></div>
		    <div class="chip"><?php echo $searchedBook['bookpages']; ?> pages</div>
				</div>
	    </div>
			<div class="divider"></div>
		<?php $i += 1; } } ?>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
