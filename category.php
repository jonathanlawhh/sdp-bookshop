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
	<header>
		<?php include "ui/header.php"; ?>
		<div class="container"><a href="#" data-target="nav-mobile" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a></div>
		<ul id="nav-mobile" class="sidenav sidenav-fixed">
			<li class="logo"><a id="logo-container" href="/" class="brand-logo">
					<object id="front-page-logo" type="image/svg+xml" data="res/materialize.svg">Your browser does not support SVG</object></a></li>
			<li class="search">
				<div class="search-wrapper">
					<input id="search" placeholder="Search"><i class="material-icons">search</i>
					<div class="search-results"></div>
				</div>
			</li>
			<li class="bold"><a href="about.html" class="waves-effect waves-teal">About</a></li>
			<li class="bold"><a href="getting-started.html" class="waves-effect waves-teal">Getting Started</a></li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li class="bold"><a class="collapsible-header waves-effect waves-teal">CSS</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="color.html">Color</a></li>
								<li><a href="grid.html">Grid</a></li>
								<li><a href="helpers.html">Helpers</a></li>
								<li><a href="media-css.html">Media</a></li>
							</ul>
						</div>
					</li>
					<li class="bold"><a class="collapsible-header waves-effect waves-teal">Forms</a>
						<div class="collapsible-body">
							<ul>
								<li><a href="autocomplete.html">Autocomplete</a></li>
								<li><a href="checkboxes.html">Checkboxes</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
			<li class="bold"><a href="mobile.html" class="waves-effect waves-teal">Mobile</a></li>
			<li class="bold"><a href="showcase.html" class="waves-effect waves-teal">Showcase</a></li>
			<li class="bold"><a href="themes.html" class="waves-effect waves-teal">Themes</a></li>
		</ul>
	</header>
<main class="col s9">
	<div class="container">
		<div class="row">
			<div class="col s12 m8 offset-m1 xl7 offset-xl1" >
				<h1>SOme texr</h1>
			</div>

		</div>
	</div>

  <?php //Load footer
    include "ui/footer.html"; ?>
</main>
</body>
