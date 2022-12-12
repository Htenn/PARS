<?php
unset($_SESSION['selectedFlightNum']);
unset($_SESSION['flightOrigin']);
unset($_SESSION['flightDestination']);
unset($_SESSION['dateDepartOrigin']);
unset($_SESSION['timeDepartOrigin']);
unset($_SESSION['dateArriveDestination']);
unset($_SESSION['timeArriveDestination']);
unset($_SESSION['a320j']);
unset($_SESSION['a320p']);
unset($_SESSION['a320y']);
unset($_SESSION['a330j']);
unset($_SESSION['a330p']);
unset($_SESSION['a330y']);
unset($_SESSION['clientID']);
unset($_SESSION['clientFirstName']);
unset($_SESSION['clientMiddleName']);
unset($_SESSION['clientLastName']);
unset($_SESSION['clientGender']);
unset($_SESSION['clientBirthday']);
unset($_SESSION['clientAge']);
unset($_SESSION['clientEmail']);
unset($_SESSION['clientContactNum']);
unset($_SESSION['clientNationality']);
unset($_SESSION['clientType']);
unset($_SESSION['clientRemarks']);
unset($_SESSION['clientSeat']);

if (isset($_SESSION['pcounter'])) {
	for ($u = 1; $u <= $_SESSION['pcounter']; $u++) {
		unset($_SESSION['passengerID' . $u]);
		unset($_SESSION['passengerFirstName' . $u]);
		unset($_SESSION['passengerMiddleName' . $u]);
		unset($_SESSION['passengerLastName' . $u]);
		unset($_SESSION['passengerGender' . $u]);
		unset($_SESSION['passengerBirthday' . $u]);
		unset($_SESSION['passengerAge' . $u]);
		unset($_SESSION['passengerEmail' . $u]);
		unset($_SESSION['passengerContactNum' . $u]);
		unset($_SESSION['passengerNationality' . $u]);
		unset($_SESSION['passengerType' . $u]);
		unset($_SESSION['passengerRemarks' . $u]);
		unset($_SESSION['passengerSeat' . $u]);
	}
}
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Main Menu - Pars</title>
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

		<!-- Nav 
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">First Section</a></li>
							<li><a href="#second">Second Section</a></li>
							<li><a href="#cta">Get Started</a></li>
						</ul>
					</nav>
				-->

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
								<li><a href="domestic.php" class="button primary fit">DOMESTIC</a></li>
								<li><a href="#" class="button primary fit">INTERNATIONAL</a>
							</ul>
						</div>

						<header class="major">
							<h2>Options</h2>
						</header>
						<div class="col-6 col-12-medium">
							<ul class="actions stacked">
								<li><a href="#" class="button primary fit">MANAGE CLIENTS</a></li>
								<li><a href="report.php" class="button primary fit">VIEW REPORTS</a></li>
							</ul>
						</div>

					</div>
				</div>
			</section>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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