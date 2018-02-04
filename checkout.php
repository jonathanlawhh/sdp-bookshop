<?php session_start();
include "php/connect.php";
checkLoginStatus();
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
//Auto refresh cart
setInterval("my_function();",5000);
function my_function(){
  $('#updateCartDiv').load(location.href + ' #updateCart');
}

//Delete cart ajax
function deleteCart(a) {
  (a = document.getElementById(a).value) ? $.ajax({type:"post", url:"php/addToCart.php", dataType:"text", data:{deleteCart:a}, success:function(a) {
    my_function();
  }}) : my_function();
}

//Apply member point for discount ajax
function applyPoint() {
  (b = document.getElementById("pointVal").value) ? $.ajax({type:"post", url:"php/addToCart.php", dataType:"text", data:{applyPoint:b}, success:function(a) {
    my_function();
  }}) : my_function();
}
</script>

<body>
<?php //load header
  include "ui/header.php";?>

  <main class="container">
    <div class="row margintop4">
			<?php include "ui/searchUI.php"; ?>
    </div>
    <h4 class="left-align col s12 m6 offset-m3 margintop4">Checkout</h4>This page will update every 5 seconds
    <div class="divider" style="margin-top:2%"></div>
		<div id="updateCartDiv">
    <table id="updateCart" class="highlight responsive-table">
      <thead>
      <tr><th>No</th><th>Book ISBN</th><th>Book Name</th><th>Quantity</th><th>Book Price</th><th>Remove</th></tr>
      </thead>
      <tbody>
				<?php $totalPrice = 0; $cIndex = 1; //Query items in the cart, initialize checkout index
				$cartCombined = array_combine($_SESSION["tpmb-cartItem"], $_SESSION["tpmb-cartItemQty"]);
				foreach($cartCombined as $sessionArray => $sessionQtyArray){
					$bookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN='$sessionArray'");
					while($book = mysqli_fetch_array($bookArray)){ //Fetching book name and price from database?>
						<tr>
								<input name="bookID" id="<?php echo $sessionArray; ?>" value="<?php echo $sessionArray; ?>" type="hidden">
								<td><?php echo $cIndex; ?></td>
								<td><?php echo $sessionArray; ?></td>
								<td><?php echo $book['bookname']; ?></td>
								<td><?php echo $sessionQtyArray; ?></td>
								<td>RM <?php $sumBook = $book['bookprice']*$sessionQtyArray; echo $sumBook; ?></td>
								<td><button name="deleteCart" type="submit" class="btn" onclick="deleteCart('<?php echo $sessionArray; ?>')"><i class="material-icons">delete</i></button></td>
						</tr>
				 <?php $GLOBALS['totalPrice'] += $sumBook; $cIndex++;
				 } //End of fetching book name and price from database
			 } $_SESSION['tpmb-total'] = $GLOBALS['totalPrice'];//End of cart query ?>
			 <tr><td colspan="6"></td></tr>
			 <?php if(isset($_SESSION["tpmb-point"])){
					if($_SESSION["tpmb-point"] != 0){
						 $pointPrice = $_SESSION["tpmb-point"] / 100;
						 $GLOBALS['totalPrice'] -= $pointPrice; ?>
					 		<tr><th colspan="3"></th><th>Discount : </th><td colspan="2">RM <?php echo $pointPrice;?> </td></tr>
			 <?php }} ?>

			 <tr><th colspan="3"></th><th>Total Price : </th><td colspan="2">RM <?php echo $GLOBALS['totalPrice'];?> </td></tr>
      </tbody>
    </table>
		</div>

		<div class="row margintop4">
			<div class="input-field col s12 m3 offset-m5">
				<select id="pointVal" onchange="applyPoint()"><option value="0">Do not deduct points</option>
					<?php //Member apply points
					$currentUser=$_SESSION['tpmb-user']; $userPoint = 0; $storedPts = 0; //Initialize value
					if(isset($_SESSION["tpmb-point"])){ $storedPts = $_SESSION["tpmb-point"]; }
					$checkPoint=mysqli_query($conn,"SELECT points FROM user WHERE username='$currentUser'");
					while($userPtsDetail = mysqli_fetch_array($checkPoint)){ $userPoint = $userPtsDetail['points']; }
					for($i = 1; $i*1000 <= $userPoint; $i++){
							$checkNegative = $_SESSION['tpmb-total'] - $i*10;
							if($checkNegative<0){ break; }
							$givePts = $i * 1000; ?>
				      <option value="<?php echo $givePts; ?>" <?php if($i*1000 == $storedPts){ echo 'selected'; }?>><?php echo $givePts . " pts / RM " . $i*10; ?></option>

					<?php } ?>
				</select>
			<label>Deduct member point</label>
			</div>
			<div class="col s12 m3"><a href="payment.php"><button class="waves-effect waves-light btn right margintop4">Payment</button></a></div>
		</div>

		<?php if(isset($_GET['error']) && $_GET['error']==1){ echo "<script>Materialize.toast('Error in cart, please rectify!', 3000)</script>"; } ?>
		<script>$(document).ready(function() { $('select').material_select(); });</script>
  </main>
  <?php //Load footer
    include "ui/footer.html"; ?>
</body>
