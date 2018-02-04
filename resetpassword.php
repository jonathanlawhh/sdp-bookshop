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

<body>
  <main>
    <header>
			<?php //load header
			  include "ui/header.php" ?>
		</header>

    <div class="container" >
      <div class="row" style="margin-top:5%;">
				<div class="col s12 m6 offset-m3 card-panel hoverable">
	         <p><a href="login.php"><i class="material-icons left">arrow_back</i> Go back to login</a></p>
	      </div>
        <h4 class="left-align col s12 m6 offset-m3">Reset password</h4>
				<?php //Display login failure
				if(isset($_GET['search'])){
					if($_GET['search'] == 0){
						echo "<p class='col s12 offset-m3'>Wrong details</p>";
					} elseif($_GET['search'] == 1) {
						echo "<p class='col s12 offset-m3'>An error occured with our email server... Please contact our admin</p>";
					} elseif($_GET['search'] == 3){
						echo "<p class='col s12 offset-m3'>A recovery email has been sent to you</p>";
					}
				}
				?>
  			<div class="divider col s12 m6 offset-m3"></div>
        <form action="php/doForgot.php" method="POST" class="col s12"  style="margin-top:3%;">
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <input name="username" id="username" type="text" placeholder="mary1234" pattern="[0-9A-Za-z_]{3,}" class="validate">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <input name="pnumber" id="pnumber" type="tel" placeholder="0123456789" class="validate">
              <label for="pnumber">Phone number used to register</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <input name="email" id="email" type="email" placeholder="mary_had@alittle.lamb.com" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <button type="submit" data-target="confirmation" class="waves-effect waves-light btn" name="resetMe">Send me my reset!!</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>
	<?php //Load footer
    include "ui/footer.html"; ?>
</body>
