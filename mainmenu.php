<?php
include 'unset.php';
include 'sessionstart.php';
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Main Menu - PARS</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header" class="alt">
			<span class="logo"><img src="images/logo.svg" alt="" /></span>
			<h1>PCC QC Airline Reservation System</h1>
			<h3>Main Menu</h3>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="intro" class="main">
				<div class="spotlight">
					<div class="content">

						<header class="major">
							<h2>Book Flights</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="domestic.php" class="button primary fit">Domestic</a></li>
								<li><a href="#" class="button primary fit">International</a>
							</ul>
						</div>

						<header class="major">
							<h2>Options</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions stacked">
								<li><a href="clients.php" class="button primary fit">Manage Clients</a></li>
								<li><a href="report.php" class="button primary fit">View Reports</a></li>
							</ul>
						</div>

						<p></p>
						<p></p>
						<div class="col-6 col-12-medium">
							<ul class="actions stacked">
								<li><a href="login.php?logout=1" class="button fit">LOGOUT</a></li>
							</ul>
						</div>

					</div>
				</div>
			</section>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>