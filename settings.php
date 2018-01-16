<?php //Check if user has login
session_start();
include "php/userData.php";
checkLoginStatus();
?>

<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
          <div class="col s12 m12 l6 offset-l2">
            <div class="section">
            <div class="card-panel">
              <span>
                  <h4><b>Preference</b></h4><br>
                <div class="section">
                  <form method="POST" action="php/changeSettings.php">
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="fname" id="fname" type="text" class="validate" value=<?php echo $fname; ?> pattern="[A-Za-z\s]{2,}" required>
                        <label for="fname">First Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="lname" id="lname" type="text" class="validate" value=<?php echo $lname; ?> pattern="[A-Za-z\s]{2,}"required>
                        <label for="lname">Last Name</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">local_phone</i>
                        <input name="pnumber" id="pnumber" type="tel" class="validate" value=<?php echo $pnumber; ?> required>
                        <label for="pnumber">Phone Number</label>
                      </div>
                    </div>
										<div class="row">
												<i class="material-icons prefix">date_range</i>
												<label for="bday">Birthday</label>
					              <input name="bday" id="bday" type="date" value="<?php echo $bday; ?>" required>
                    </div>
                    <div class="row">
											<div class="col s12">
												<label class="col s12">I identify as</label><br />
													<label>
														<input name="gender" type="radio" id="male" value="male" <?php if($gender=="male"){ echo 'checked'; } ?> required/>
					      						<label for="male">Male</label>
										      </label>
													<label>
														<input name="gender" type="radio" id="female" value="female" <?php if($gender=="female"){ echo 'checked'; } ?> required/>
					      						<label for="female">Female</label>
										      </label>
													<label>
														<input name="gender" type="radio" id="others" value="others" <?php if($gender=="others"){ echo 'checked'; } ?> required/>
					      						<label for="others">Others</label>
										      </label>
					            </div>
                    </div>

                    <button name="update" type="submit" class="waves-effect waves-light btn"><i class="material-icons prefix left">edit</i>Update</button>
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
                    <form method="POST" action="php/changeSettings.php">
                    <div class="row">
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="opassword" id="opassword" type="password" placeholder="********" class="validate" required>
                        <label for="opassword">Old password</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="pwd" id="pwd" type="password" placeholder="********" class="validate" pattern="[0-9A-Za-z_]{7,}" required>
                        <label for="pwd">New password</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">security</i>
                        <input name="pwd2" id="pwd2" type="password" placeholder="********" class="validate" pattern="[0-9A-Za-z_]{7,}" onkeyup="check();" required>
                        <label for="pwd2" id="txtpasswordcheck">Retype new password</label>
                      </div>
                    </div>
                    <button name="chgpw" type="submit" class="waves-effect waves-light btn"><i class="material-icons prefix left">track_changes</i>Change</button>
                  </form>
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
<script>
	var check = function() {
			if (document.getElementById('pwd').value !== document.getElementById('pwd2').value) {
					document.getElementById('txtpasswordcheck').style.color = 'red';
					document.getElementById('txtpasswordcheck').innerHTML = 'Retype password : Password do not match';
			} else {
				document.getElementById('txtpasswordcheck').style.color = '';
				document.getElementById('txtpasswordcheck').innerHTML = 'Retype password';
			}
	}
</script>
