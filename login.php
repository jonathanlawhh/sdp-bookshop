<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }
  </style>
</head>

<body>
  <main>
    <nav>
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">TPM Bookshop</a>
      </div>
    </nav>

    <div class="container" >
      <div class="row" style="margin-top:5%;">
        <h4 class="left-align col s12 m6 offset-m3">Login page</h4>
				<?php //Display login failure
				if(isset($_GET['loginfailure'])){
					if($_GET['loginfailure'] == 1){
						echo "<p class='col s12 offset-m3'>Wrong username or password</p>";
					} elseif ($_GET['loginfailure'] == 2){
						echo "<p class='col s12 offset-m3'>Please do not enter special characters</p>";
					}
				}
				?>
  			<div class="divider col s12 m6 offset-m3"></div>
        <form method="POST" action="php/doLogin.php" class="col s12"  style="margin-top:3%;">
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">account_circle</i>
              <input name="username" id="username" type="text"
							<?php //Do cookie
							if(isset($_COOKIE['tpmb-username'])){
								echo "value=" . "'" . $_COOKIE['tpmb-username'] . "'";
							} else {
								echo "placeholder='mary1234'";
							} ?> class="validate" required>
              <label for="username">Username</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <i class="material-icons prefix">security</i>
              <input name="password" id="password" type="password" placeholder="********" class="validate" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row col s12">
            <p class="col s12 m3 offset-m3" style="margin-top:0;">
              <input name="rememberMe" type="checkbox" id="rmbMe" <?php if(isset($_COOKIE['tpmb-username'])){ echo "checked"; }?>/>
              <label for="rmbMe">Remember Me</label>
              <button name="login" type="submit" class="waves-effect waves-light btn" style="margin-left:10%;">Login</button>
            </p>

            <div class="col s12 m4 offset-m3">
              <a href="resetpassword.php">I have forgotten my password</a>
            </div>
            <div class="col s12 m4 offset-m3">
              Not a member yet? Register <a href="register.php">here</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>
  <footer class="page-footer grey darken-3">
    <div class="footer-copyright grey darken-4">
      <div class="container">
      © 2017 SDP TPM Bookshop
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>
</body>
