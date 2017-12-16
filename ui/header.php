<header>
      <nav class="top-nav">
        <div class="nav-wrapper brown darken-4">
          <div class="container">
          <a href="index.php" class="brand-logo header col s12 m10 offset-m1"><i class="material-icons">book</i>TPM Bookshop</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="category.php">Browse by category</a></li>
            <?php if(isset($_SESSION['tpmb-user'])){ ?>
              <li><a href="cart.php">Cart</a></li>
              <li><a class="dropdown-button" data-belowOrigin="true" data-alignment="right" data-constrainWidth="false" data-activates="userDropdown"><?php echo $_SESSION['tpmb-user']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
              <ul id="userDropdown" class="dropdown-content">
                <li><a href="#!"><i class="material-icons left">hourglass_emptys</i>History</a></li>
                <li><a href="settings.php"><i class="material-icons left">settings</i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="php/logout.php"><i class="material-icons left">directions_walk</i>Logout</a></li>
              </ul>
            <?php } else { ?>
              <li><a href="login.php">Login</a></li>
            <?php } ?>
          </ul>
          </div>
        </div>
      </nav>
</header>