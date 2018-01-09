<?php session_start();
include "php/connect.php";
if(!isset($_SESSION['tpmb-user'])){
	$loginStatus=0;
} else { $currentUser = $_SESSION['tpmb-user']; $loginStatus=1;}
$currentBook=$_GET['bookid'];
?>

<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
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

	//Query for book details
	$getBook = "SELECT * FROM book WHERE bookISBN='$currentBook'";
	$bookArray=mysqli_query($conn,$getBook);
  while($book = mysqli_fetch_array($bookArray)){
	setcookie("tpmb-recc", $book['bookcategory'], time() + 31536000, '/');
	?>
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

		<h5>Users feedbacks and ratings</h5>
		<div class="divider line"></div>
    <div class="row section">
			<?php //Make rating into a nice chart
			$checkBookRatingQuery = "SELECT rating, COUNT(rating) AS result FROM bookrating WHERE bookISBN='$currentBook' GROUP BY rating";
			$executeBookRating = mysqli_query($conn,$checkBookRatingQuery);
			$rating01 = $rating02 = $rating03 = $rating04 = $rating05 = 0;
			while($bookRating = mysqli_fetch_array($executeBookRating)){
				if($bookRating['rating'] == 1){
					$rating01=$bookRating['result'];
				} elseif ($bookRating['rating'] == 2){
					$rating02=$bookRating['result'];
				} elseif ($bookRating['rating'] == 3){
					$rating03=$bookRating['result'];
				} elseif ($bookRating['rating'] == 4){
					$rating04=$bookRating['result'];
				} elseif ($bookRating['rating'] == 5){
					$rating05=$bookRating['result'];
				}
			}

			//Check if this book has any rating. If no, do not show empty chart
			if($rating01 == 0  && $rating02 == 0  && $rating03 == 0 && $rating04 == 0 && $rating05 == 0){
				echo "<p class='center-align'>No user gave any feedback for this book yet. Be the first! :)</p>";
			} else { ?>
			<canvas id="myChart" width="500" height="100"></canvas>
			<script>
			var ctx = document.getElementById("myChart");
			var myChart = new Chart(ctx, {
			    type: 'doughnut',
			    data: {
			        labels: ["Very Bad", "Bad", "Average", "Good", "Reccomended"],
			        datasets: [{
			            label: '# of Votes',
									data: [<?php echo "$rating01,$rating02,$rating03,$rating04,$rating05"; ?>],
									backgroundColor: ["#ff6384", "#ffb74d", "#36a2eb", "#7986cb", "#4db6ac"]
			        }]
			    }
			});
			</script>
		<?php } //End of rating chart ?>
    </div>

		<ul class="collapsible" data-collapsible="expandable" style="margin-bottom:5%;">
		<?php //If user is not logged in, do not allow them to give rating or feedback
		if($loginStatus==1){ ?>
    <li class="hoverable">
			<?php //Check if user has rated this book before
			$checkIfRatedQuery = "SELECT * FROM bookrating WHERE bookISBN='$currentBook' AND username='$currentUser'";
			$executeRateCheck = mysqli_query($conn,$checkIfRatedQuery);
			if(mysqli_num_rows($executeRateCheck) > 0){
				while($rateCheck = mysqli_fetch_array($executeRateCheck)){ ?>
					<div class="collapsible-header"><i class="material-icons">rate_review</i>You rated this book a <?php echo $rateCheck['rating']; ?> out of 5</div>
					<div class="collapsible-body">
						<form action="php/doFeedback.php" method="POST">
							<label for="slider1">Please rate this book. <br /> 1 is very bad and 5 is extremely good</label>
					    <p id="slider1" class="range-field">
					      <input name="rating" type="range" min="1" max="5" value="<?php echo $rateCheck['rating']; ?>" />
								<input name="bookID" type="hidden" value="<?php echo $currentBook; ?>" />
								<button name="update-rate" type="submit" class="waves-effect waves-light btn">Update!</button>
					    </p>
					  </form>
					</div>
		<?php } } else { ?>
      		<div class="collapsible-header"><i class="material-icons">rate_review</i>Rate this book</div>
		      <div class="collapsible-body">
						<form action="php/doFeedback.php" method="POST">
							<label for="slider1">Please rate this book. <br /> 1 is very bad and 5 is extremely good</label>
					    <p id="slider1" class="range-field">
					      <input name="rating" type="range" min="1" max="5" />
								<input name="bookID" type="hidden" value="<?php echo $currentBook; ?>" />
								<button name="rate" type="submit" class="waves-effect waves-light btn">Rate!</button>
					    </p>
					  </form>
					</div>
		<?php } //End of making sure user do not give rating 2 times ?>
    </li>
    <li class="hoverable">
      <div class="collapsible-header"><i class="material-icons">feedback</i>Provide Feedback</div>
      <div class="collapsible-body">
				<form action="php/doFeedback.php" method="POST">
		      <div class="row">
		        <div class="input-field">
		          <textarea name="comment" id="comment" class="materialize-textarea"></textarea>
		          <label for="commment">Enter your feedback</label>
							<input name="bookID" type="hidden" value="<?php echo $currentBook; ?>" />
		        </div>
						<button name="feedback" type="submit" class="waves-effect waves-light btn">Submit!!</button>
		      </div>
		    </form>
			</div>
    </li>
	<?php } //End of preventing non login users from giving feedbacks and rating ?>

    <li class="hoverable">
      <div class="collapsible-header active"><i class="material-icons">chat</i>Users feedback</div>
      <div class="collapsible-body">
				<?php //Select all user comments for this book
				$queryForComments = "SELECT * FROM bookcomment WHERE bookISBN='$currentBook'";
				$arrayComments = mysqli_query($conn,$queryForComments);
				while($feedbacks = mysqli_fetch_array($arrayComments)){ ?>
				<div class="section">
					<span><?php echo $feedbacks['username'] . " on " . $feedbacks['date'] ?> says :</span>
					<p><?php echo $feedbacks['comments'] ?></p>
					<div class="divider"></div>
				</div>
			<?php } //End of user comments?>
			</div>
    </li>
  </ul>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
<?php } ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
