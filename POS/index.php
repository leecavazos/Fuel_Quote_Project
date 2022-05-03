<!DOCTYPE html>
<?php
	require_once 'php/config.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Team 16</title>

	<!-- Link to css file -->
	<link rel="stylesheet" type="text/css" href="css/main_page.css">
	<link rel="icon" type="image/x-icon" href="images/fuelpump.jpeg">
</head>

<!-- Set body id = "top", in case want to go to the top of the page smoothly (using smooth behavior in css) -->
<body id="top">
	<header>
		<a href="">
			<img src="images/fuelpump.jpeg">
		</a>
		<!-- Navbar Starts -->
		<nav>
			<ul>
				<li><a href="#top">Home</a></li>
				<li><a href="pages/login.php">User Login</a></li>
			</ul>
		</nav>
		<!-- Navbar End -->
	</header>
	
	<!-- Food Search Section Starts Here -->
	<section class="food-search text-center" style="background-image: url(images/refinery.jpeg);">
		<span class="food-search">
			<h1 style="background-color: transparent;">Get a Fuel Quote</h1>
		</span>
	</section>
	<!-- Food Search Section Ends Here -->

	<!-- Food Menu Section Starts Here -->
	<section class="menu" id="menu-section">
		<div class="container">
			<h2 class="text-center">Get Started</h2>
			<h2 class="text-center" style="text-transform: none; color: black; background-color: transparent;"> <a href="pages/login.php" style="color: black;">Please Login/SignUp</a></h2>
		</div>
	</section>
</body>

<footer>
	<div class="footer-content text-center" style="margin-bottom: 10%">
		<p class="copyright">© Designed by <a href="#">Team 16 COSC 4353 Spring 2022</a>. All rights reserved.</p>
		<a href="#top">Go to top.</a>
	</div>
</footer>

</html>
