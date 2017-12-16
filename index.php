<?php session_start(); ?>
<head>
	<title>TPM Bookshop</title>
	<link rel="icon" href="images/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link type="text/css" rel="stylesheet" href="css/tpmb.css" media="screen,projection" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script>
  $(document).ready(function(){
    $('.carousel').carousel();
  });
	$(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });

  </script>
</head>

<body background="bg.jpg" style="background-size:cover;">
<?php //load header
  include "ui/header.php" ?>

<main>
	<div class="col hide-on-small-only m3 l2" style="right:6%; margin-top:5%; position:fixed;">
      <ul class="section table-of-contents">
        <li>Fast jump</li>
        <li><a href="#book-new">Newly released books</a></li>
        <li><a href="#book-recc">Reccomended for you</a></li>
        <li><a href="#book-rate">Top rating books</a></li>
      </ul>
    </div>
<div class="container">
  <div class="row margintop4">
    <form>
      <div class="row">
        <div class="input-field col s12 m8 l6">
          <input placeholder="Harry potter" id="searchterm" type="text" class="validate">
          <label for="searchterm">Use me to search</label>
        </div>
      </div>
    </form>
  </div>
  <h4 id="book-new" class="left-align col s12 m6 offset-m3 scrollspy">Newly released books</h4>
  <div class="divider line"></div>
  <div class="carousel">
    <a class="carousel-item" href="#one!"><img src="https://i.pinimg.com/736x/e2/b8/2a/e2b82aded815e80351b929a77519adaa--tropical-wallpapers-tropical-iphone-wallpaper.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="https://wallpaperclicker.com/storage/wallpaper/High-Definition-Ultra-HD-Wallpaper-96262544.jpg"></a>
  </div>

  <h4 id="book-recc" class="left-align col s12 m6 offset-m3 scrollspy">Books reccomended for you</h4>
  Based on your preferences
  <div class="divider line"></div>

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

  <h4 id="book-rate" class="left-align col s12 m6 offset-m3 scrollspy">Top rating books</h4>
  Based on users rating
  <div class="divider line"></div>

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