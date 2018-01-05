<?php session_start();
include "php/connect.php";

//$i is for index number beside book name
$i = 1;
if(isset($_GET['searchterm'])){
	$searchterm = scanner($_GET['searchterm'],'404.php');
} else {
	$searchterm = "";
}

//Query for book
$getBook = "SELECT * FROM book WHERE bookISBN LIKE '%$searchterm%' OR bookname LIKE '%$searchterm%' OR bookauthor LIKE '%$searchterm%' LIMIT 10";
$bookArray=mysqli_query($conn,$getBook);
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
<script>
function goBack() {
	window.history.back();
}
</script>

<body>
<?php //load header
  include "ui/header.php";?>

  <main class="container">
    <div class="row" style="margin-top:4%;">
			<?php include "ui/searchUI.php"; ?>
    </div>
    <h4 class="left-align col s12 m6 offset-m3" style="margin-top:4%;"><a href="" onclick="goBack()"><i class="material-icons" style="margin-right:10px;">arrow_back</i></a>Search results</h4>
    <div class="divider line"></div>
		<?php while($book = mysqli_fetch_array($bookArray)){ ?>
    <div class="row section">
			<img style="float:left;" height="150px" src="books/cover/<?php echo $book['bookthumbnail']; ?>">
			<div style="float:left; margin-left:4%;">
      <h5><a href="book.php?bookid=<?php echo $book['bookISBN']; ?>"><?php echo $i . " . " . $book['bookname']; ?></a></h5>
			<div class="chip"><a href="?category=<?php echo $book['bookcategory']; ?>"><?php echo $book['bookcategory']; ?></a></div>
	    <div class="chip"><a href="?searchterm=<?php echo $book['bookauthor']; ?>"><?php echo $book['bookauthor']; ?></a></div>
	    <div class="chip"><?php echo $book['bookpages']; ?> pages</div>
			</div>
    </div>
		<div class="divider"></div>
		<?php $i += 1; } ?>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
