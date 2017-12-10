<?php session_start(); ?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
  </script>
</head>

<body background="bg.jpg" style="background-size:cover;">
<?php //load header
  include "ui/header.php" ?>

<main>
<div class="container">
  <div class="row" style="margin-top:4%;">
    <form>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Harry potter" id="searchterm" type="text" class="validate">
          <label for="searchterm">Use me to search</label>
        </div>
      </div>
    </form>
  </div>

  <h4 class="left-align col s12 m6 offset-m3">Newly released books</h4>
  <div class="divider col s12 m6 offset-m3"></div>
  <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="https://i.pinimg.com/736x/e2/b8/2a/e2b82aded815e80351b929a77519adaa--tropical-wallpapers-tropical-iphone-wallpaper.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="https://wallpaperclicker.com/storage/wallpaper/High-Definition-Ultra-HD-Wallpaper-96262544.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="https://lorempixel.com/250/250/nature/3"></a>
    <a class="carousel-item" href="#four!"><img src="https://lorempixel.com/250/250/nature/4"></a>
    <a class="carousel-item" href="#five!"><img src="https://lorempixel.com/250/250/nature/5"></a>
  </div>

  <h4 class="left-align col s12 m6 offset-m3">Books reccomended for you</h4>
  Based on your preferences
  <div class="divider col s12 m6 offset-m3"></div>

  <?php //Use loop here ?>
  <div class="row section">
    <div class="col s6 m3 l2">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" height="200px" src="https://i.pinimg.com/736x/e2/b8/2a/e2b82aded815e80351b929a77519adaa--tropical-wallpapers-tropical-iphone-wallpaper.jpg">
        </div>
        <div class="card-content">
          <span class="grey-text text-darken-4">Book name</span>
          <p><a href="#">Click me</a></p>
        </div>
      </div>
    </div>
  </div>

  <h4 class="left-align col s12 m6 offset-m3">Top rating books</h4>
  Based on users rating
  <div class="divider col s12 m6 offset-m3"></div>

  <?php //Use loop here ?>
  <div class="row section">
    <div class="col s6 m3 l2">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" height="200px" src="https://i.pinimg.com/736x/e2/b8/2a/e2b82aded815e80351b929a77519adaa--tropical-wallpapers-tropical-iphone-wallpaper.jpg">
        </div>
        <div class="card-content">
          <span class="grey-text text-darken-4">Book name</span>
          <p><a href="#">Click me</a></p>
        </div>
      </div>
    </div>
  </div>


  </div>

  <?php //Load footer
    include "ui/footer.html"; ?>
</main>
</body>
