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
      <div class="row" style="margin-top:10%;">
        <form class="col s12">
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <input name="username" id="username" type="text" placeholder="mary1234" class="validate">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <input name="password" id="password" type="password" placeholder="********" class="validate">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row col s12">
            <p class="col s12 m4 offset-m3" style="margin-top:0;">
              <input name="rememberMe" type="checkbox" id="rmbMe" />
              <label for="rmbMe">Remember Me</label>
              <button type="submit" class="waves-effect waves-light btn" style="margin-left:10%;">Login</button>
            </p>

            <div class="col s12 m4 offset-m3">
              <a href="register.php">I have forgotten my password</a>
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
