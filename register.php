<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript">
	function checkUsername() {
	  var a = document.getElementById("uname").value;
	  a ? $.ajax({type:"post", url:"php/doRegister.php", dataType:"text", data:{uname:a}, success:function(a) {
	    $("#uname-result").html(a);
	    document.getElementById("uname-result").innerHTML = a;
	  }}) : document.getElementById("uname-result").innerHTML = "Username";
	}
	</script>
</head>

<body>
  <main>
    <header>
			<?php //load header
			  include "ui/header.php" ?>
		</header>

    <div class="container" >
      <div class="row margintop4">
				<div class="col s12 m6 offset-m3 card-panel hoverable">
	         <p><a href="login.php"><i class="material-icons left">arrow_back</i> Go back to login</a></p>
	      </div>
				<h4 class="left-align col s12 m6 offset-m3">Registration</h4>

				<?php //Display register failure
				if (isset($_GET['register'])){
					if($_GET['register'] == 1){
						echo "<p class='col s12 offset-m3'>Username exists, please choose another one</p>";
					} elseif ($_GET['register'] == 2){
						echo "<p class='col s12 offset-m3'>Please do not enter special characters</p>";
					} elseif ($_GET['register'] == 3){
						echo "<p class='col s12 offset-m3'>Passwords do not match. Please re-enter password</p>";
					} elseif ($_GET['register'] == 4){
						echo "<p class='col s12 offset-m3'>Email exist! Please use another email</p>";
					}
				}
				?>
				<div class="divider col s12 m6 offset-m3"></div>
        <form action="php/doRegister.php" method="POST" class="col s12 margintop4">
          <div class="row col s12">
            <div class="input-field col s12 m3 offset-m3">
              <input name="fname" id="fname" type="text" placeholder="Jonathan" class="validate" pattern="[A-Za-z\s]{2,}" required>
              <label for="fname">First Name</label>
            </div>
            <div class="input-field col s12 m3">
              <input name="lname" id="lname" type="text" placeholder="Law" class="validate" pattern="[A-Za-z\s]{2,}">
              <label for="lname">Last Name</label>
            </div>
          </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m3 offset-m3">
              <input name="pnumber" id="pnumber" type="tel" placeholder="0123456789" class="validate" required>
              <label for="pnumber">Phone Number</label>
            </div>
            <div class="col s12 m3">
							<label class="col s12">I identify as</label><br />
								<label>
									<input name="gender" type="radio" id="male" value="male" required/>
      						<label for="male">Male</label>
					      </label>
								<label>
									<input name="gender" type="radio" id="female" value="female" required/>
      						<label for="female">Female</label>
					      </label>
								<label>
									<input name="gender" type="radio" id="others" value="others" required/>
      						<label for="others">Others</label>
					      </label>
            </div>
          </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m4 offset-m3">
              <input name="uname" id="uname" type="text" placeholder="jonathanlawhh" class="validate" onkeyup="checkUsername();" pattern="[0-9A-Za-z_]{3,}" required>
							<label id="uname-result" for="uname">Username</label>
            </div>
            <div class="col s12 m2">
							<label for="bday">Birthday</label>
							<input type="text" name="bday" id='bday' class="datepicker" required>
            </div>
          </div>
          <div class="row col s12">
            <div class="input-field col s12 m6 offset-m3">
              <input name="email" id="email" type="email" placeholder="jonathanlawhh@mail.com" class="validate" required>
              <label for="email">Email</label>
            </div>
          </div>
				  <div class="row col s12">
		        <div class="input-field col s12 m6 offset-m3">
		          <textarea id="address" class="materialize-textarea" name="address" required></textarea>
		          <label for="address">Address</label>
		        </div>
				  </div>
          <div class="row col s12 ">
            <div class="input-field col s12 m6 offset-m3">
              <input name="pwd" id="pwd" type="password" placeholder="********" class="validate" pattern="[0-9A-Za-z_]{7,}" required>
              <label for="pwd">Password</label>
            </div>
          </div>
          <div class="row col s12 " style="margin-bottom:0;">
            <div class="input-field col s12 m6 offset-m3">
              <input name="pwd2" id="pwd2" type="password" placeholder="********" class="validate" pattern="[0-9A-Za-z_]{7,}" onkeyup="check();" required>
              <label id="txtpasswordcheck" for="pwd2">Retype password</label>
            </div>
          </div>
          <div class="row col s12">
            <p class="col s12 offset-m3" style="margin-top:0;">
							<input type="checkbox" id="tnc" required/>
				      <label for="tnc">I agree to the terms and condition <a href="tnc.html" target="_blank">here</a></label>
            </p>
						<div class="row col s12 offset-m3">
							<button type="reset" class="waves-effect waves-light btn orange darken-4"><i class="material-icons left">autorenew</i>Reset</button>
							<button name="register" value="register" type="submit" class="waves-effect waves-light btn"><i class="material-icons left">create</i>Register</button>
						</div>
          </div>
        </form>
      </div>
    </div>

  </main>

	<?php //Load footer
    include "ui/footer.html"; ?>
</body>


<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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


  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
		format: 'yyyy-mm-dd',
    closeOnSelect: false // Close upon selecting a date,
  });

</script>
