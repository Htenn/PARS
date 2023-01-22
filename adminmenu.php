<?php
include 'sessionstart.php';
require 'unset.php';
unsetpnr();
unsetseats();
unsetetc();
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Admin Menu - PARS</title>
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
			<h3>Welcome, <?php echo $_SESSION['user']; ?></h3>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="intro" class="main">
				<div class="spotlight">
					<div class="content">

						<header class="major">
							<h2>One-Way Trip</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="D/OW/reserve.php" class="button fit">Domestic</a></li>
								<li><a href="I/OW/reserve.php" class="button fit">International</a>
							</ul>
						</div>

						<header class="major">
							<h2>Return/Round Trip</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="D/RT/reserve.php?citypair=1" class="button fit">Domestic</a></li>
								<li><a href="I/RT/reserve.php?citypair=1" class="button fit">International</a>
							</ul>
						</div>

						<header class="major">
							<h2>Reservations</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="reservations/userlist.php" class="button fit">Per User Reservations</a></li>
								<li><a href="reservations/adminlist.php" class="button fit">All Reservations</a></li>
							</ul>
						</div>

						<header class="major">
							<h2>Manage Flights</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="addflight.php" class="button fit">Add Flight</a></li>
								<li><a href="archive.php" class="button fit">Archive Flight</a></li>
							</ul>
						</div>

						<header class="major">
							<h2>Users</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions fit">
								<li><a href="adduser.php" class="button fit">Add User</a></li>
								<li><a href="users.php" class="button fit">Manage User</a></li>
							</ul>
						</div>

						<p><br></p>
						<div class="col-6 col-12-medium">
							<ul class="actions stacked">
								<li><a href="index.php?logout=1" class="button primary fit">LOGOUT</a></li>
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