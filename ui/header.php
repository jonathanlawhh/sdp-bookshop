<header>
  <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper brown darken-4">
          <div class="container">
          <a href="#!" class="brand-logo" style="margin-left:50px;"><i class="material-icons">book</i>TPM Bookshop</a>
          <ul class="right hide-on-med-and-down">
            <li><a href="category.php">Browse by category</a></li>
            <?php if(isset($_SESSION['tpmb-user'])){ ?>
              <li><a class="dropdown-button" data-alignment="right" data-constrainWidth="false" data-beloworigin="true" data-activates="userDropdown"><?php echo $_SESSION['tpmb-user']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
              <ul id="userDropdown" class="dropdown-content">
                <li><a href="#!"><i class="material-icons left">hourglass_emptys</i>History</a></li>
                <li><a href="#!"><i class="material-icons left">settings</i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="#!"><i class="material-icons left">directions_walk</i>Logout</a></li>
              </ul>
            <?php } else { ?>
              <li><a href="login.php">Login</a></li>
            <?php } ?>
          </ul>
          </div>
        </div>
      </nav>
    </div>
</header>
