<?php session_start();
include "php/connect.php";
if(!isset($_SESSION['tpmb-user'])){
	$loginStatus=0;
} else { $loginStatus=1;}
$currentBook=$_GET['bookid'];
$getBook = "SELECT * FROM book WHERE bookISBN='$currentBook'";
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
	history.go(-1);
}
function forceLogin(){
 $('.tap-target').tapTarget('open');
}
</script>

<body>
<?php //load header
  include "ui/header.php";
  while($book = mysqli_fetch_array($bookArray)){?>
  <main class="container">
    <div class="row" style="margin-top:4%;">
			<?php include "ui/searchUI.php"; ?>
    </div>
    <h4 class="left-align col s12 m6 offset-m3" style="margin-top:4%;"><a href="" onclick="goBack()"><i class="material-icons" style="margin-right:10px;">arrow_back</i></a><?php echo $book['bookname']; ?></h4>
    <div class="divider line"></div>

    <div style="margin-top:1%;" class="chip"><a href="?category=<?php echo $book['bookcategory']; ?>"><?php echo $book['bookcategory']; ?></a></div>
    <div style="margin-top:1%;" class="chip"><a href="search.php?searchterm=<?php echo $book['bookauthor']; ?>"><?php echo $book['bookauthor']; ?></a></div>
    <div style="margin-top:1%;" class="chip"><?php echo $book['bookpages']; ?> pages</div>

    <div class="row section">
      <div class="col s6 m4 l2 offset-m3 offset-s3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" height="250px" src="books/cover/<?php echo $book['bookthumbnail']; ?>">
          </div>
          <div class="card-content">
            <span class="grey-text text-darken-4">RM <?php echo $book['bookprice']; ?></span>
            <p><a href="#">Click me</a></p>
          </div>
        </div>
      </div>
      <div class="col l6">
        <p><?php echo $book['bookdesc']; ?></p>
      </div>
			<?php if($loginStatus==1){ ?>
      	<a class="waves-effect waves-light btn right" onclick="addToCart()"><i class="material-icons left">add_shopping_cart</i>Add to cart</a>
			<?php } else { ?>
				<a class="waves-effect waves-light btn right" onclick="forceLogin()"><i class="material-icons left">add_shopping_cart</i>Add to cart</a>
			<?php } ?>
    </div>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
<?php } ?>
</body>
