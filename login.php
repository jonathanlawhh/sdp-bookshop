<?php //Check if user has login
session_start();
if(isset($_SESSION['tpmb-user'])){
	header("Location: index.php");
}
?>

<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <main>
    <header>
			<?php //load header
			  include "ui/header.php" ?>
		</header>

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
              <input name="username" id="username" type="text" pattern="[0-9A-Za-z_\s]{3,}"
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
              <input name="password" id="password" type="password" placeholder="********" class="validate" pattern="[0-9A-Za-z_]{7,}" required>
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row col s12">
            <p class="col s12 m6 l6 offset-m3 offset-l3" style="margin-top:0;">
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
	<?php //Load footer
    include "ui/footer.html"; ?>
</body>
