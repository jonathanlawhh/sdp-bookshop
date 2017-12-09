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
        <a href="#" class="brand-logo center">TPM Bookshop Member Area</a>
      </div>
    </nav>

    <div class="container" >
      <div class="row" style="margin-top:4%;">
				<div class="col s12 m6 offset-m3 card-panel hoverable">
	         <p><a href="login.php"><i class="material-icons left">arrow_back</i> Go back to login</a></p>
	      </div>
        <form class="col s12" style="margin-top:4%;">
          <div class="row col s12 ">
            <div class="input-field col s12 m3 offset-m3">
              <input name="fname" id="r-fname" type="text" placeholder="Jonathan" class="validate" required>
              <label for="fname">First Name</label>
            </div>
            <div class="input-field col s12 m3">
              <input name="lname" id="r-lname" type="text" placeholder="Law" class="validate">
              <label for="lname">Last Name</label>
            </div>
          </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m4 offset-m3">
              <input name="uname" id="uname" type="text" placeholder="jonathanlawhh" class="validate" required>
              <label for="uname">Username</label>
            </div>
            <div class="input-field col s12 m2">
              <input name="bday" id="bday" type="date" required>
            </div>
          </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <input name="email" id="email" type="email" placeholder="jonathanlawhh@mail.com" class="validate" required>
              <label for="pwd">Email</label>
            </div>
          </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <input name="pwd" id="pwd" type="password" placeholder="********" class="validate" required>
              <label for="pwd">Password</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <input name="pwd2" id="pwd2" type="password" placeholder="********" class="validate" required>
              <label for="pwd2">Retype password</label>
            </div>
          </div>
          <div class="row col s12">
            <p class="col s12 offset-m3" style="margin-top:0;">
              <input type="checkbox" id="tnc" required/>
              <label for="tnc">I agree to the terms and condition <a href="tnc">here</a></label>
            </p>
					<div class="row col s12 offset-m3">
						<button type="reset" class="waves-effect waves-light btn orange darken-4"><i class="material-icons left">autorenew</i>Reset</button>
						<button type="submit" class="waves-effect waves-light btn"><i class="material-icons left">create</i>Register</button>
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
