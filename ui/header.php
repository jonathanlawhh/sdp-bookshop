<script>
//Initalize cart popup
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>
<header>
      <nav class="top-nav">
        <div class="nav-wrapper brown darken-4">
          <div class="container">
          <a href="index.php" class="brand-logo header col s12 m10 offset-m1"><i class="material-icons">book</i>TPM Bookshop</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="category.php">Browse by category</a></li>
            <?php if(isset($_SESSION['tpmb-user'])){ ?>
              <li><a class="modal-trigger" href="#cartPopup">Cart</a></li>
              <li><a class="dropdown-button" data-belowOrigin="true" data-alignment="right" data-constrainWidth="false" data-activates="userDropdown"><?php echo $_SESSION['tpmb-user']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
              <ul id="userDropdown" class="dropdown-content">
                <li><a href="history.php"><i class="material-icons left">hourglass_emptys</i>History</a></li>
                <li><a href="settings.php"><i class="material-icons left">settings</i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="php/logout.php"><i class="material-icons left">directions_walk</i>Logout</a></li>
              </ul>
            <?php } else { ?>
              <li><a id="menu" href="login.php">Login</a></li>
              <div class="tap-target deep-purple darken-4" data-activates="menu">
                <div class="tap-target-content ">
                  <h5>Hey there!!</h5>
                  <p>Do consider registering or logging in :)</p>
                </div>
              </div>
            <?php } ?>
          </ul>
          </div>
        </div>
      </nav>
</header>

<?php if(isset($_SESSION['tpmb-user'])){ //Only load popup if user is logged in. This is to save loading time for users who are not logged in and prevent exploits ?>
 <!-- Modal Structure -->
 <div id="cartPopup" class="modal bottom-sheet">
   <div class="modal-content">
     <h4>Cart</h4>
     <?php
     if(empty($_SESSION["tpmb-cartItem"])){ //Check if the cart is empty
       echo "<p>There is nothing your cart right now! Start by adding some books :)</p>";
     } else { //If not empty, list the content of the cart ?>
     <table class="highlight">
       <thead>
         <tr><th>Book ISBN</th><th>Book Name</th><th>Book Price</th><th>Remove</th></tr>
       </thead>
       <tbody>
         <?php //Query items in the cart
         $totalPrice = 0;
         foreach($_SESSION["tpmb-cartItem"] as $sessionArray ){
         	 $bookArray=mysqli_query($conn,"SELECT * FROM book WHERE bookISBN='$sessionArray'");
           while($book = mysqli_fetch_array($bookArray)){ ?>
             <tr><td><?php echo $sessionArray; ?></td><td><?php echo $book['bookname']; ?></td><td>RM <?php echo $book['bookprice']; ?></td><td><a onclick="deleteCart()" href="#"><i class="material-icons">delete</i></a></td></tr>
          <?php $totalPrice += $book['bookprice']; } //End of fetching book name and price from database
        } //End of cart query
      } //End of checking whether the cart is empty ?>
      <tr><td></td></tr>
      <tr><td colspan="2">Book Price :</td><td>RM <?php echo $totalPrice; ?></td></tr>
     </tbody>
   </table>
   </div>
   <div class="modal-footer">
     <a href="checkout.php" class="modal-action modal-close waves-effect waves-green btn-flat">Checkout</a>
   </div>
 </div>

<?php } ?>
