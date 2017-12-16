<?php //Check if user has login
session_start();
if(!isset($_SESSION['tpmb-user'])){
	header("Location: index.php");
}
include "php/userData.php";
?>

<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <main>
    <header>
			<?php //load header
			  include "ui/header.php" ?>
		</header>

    <div class="container" >
        <div class="row margintop4">
          <div class="col m12 l6 offset-l2">
            <div class="section">
            <div class="card-panel">
              <span>
                  <h4><b>Preference</b></h4><br>
                <div class="section">
                  <form method="POST" action="php/changeSettings.php">
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="fname" id="fname" type="text" class="validate" value=<?php echo $fname; ?> required>
                        <label for="fname">First Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="lname" id="lname" type="text" class="validate" value=<?php echo $lname; ?> required>
                        <label for="lname">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">email</i>
                        <input name="email" id="email" type="text" class="validate" value=<?php echo $email; ?> required>
                        <label for="email">Email</label>
                      </div>
                    </div>
                  </form>
                </div>
              </span>
            </div>
          </div>

            <div class="section">
              <div class="card-panel">
                <span>
                  <div class="section">
                    <h4><b>Password</b></h4><br>
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="opassword" id="opassword" type="password" placeholder="********" class="validate" required>
                        <label for="opassword">Old password</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="npassword" id="npassword" type="password" placeholder="********" class="validate" required>
                        <label for="npassword">New password</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="valpassword" id="valpassword" type="password" placeholder="********" class="validate" required>
                        <label for="valpassword">Retype new password</label>
                      </div>
                    </div>
                  </div>
                </span>
              </div>
              </div>
          </div>
      </div>
    </div>

  </main>
	<?php //Load footer
    include "ui/footer.html"; ?>
</body>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
