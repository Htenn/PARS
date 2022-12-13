<?php
if (isset($_SESSION['selectedFlightNum']))
	unset($_SESSION['selectedFlightNum']);
if (isset($_SESSION['flightOrigin']))
	unset($_SESSION['flightOrigin']);
if (isset($_SESSION['flightDestination']))
	unset($_SESSION['flightDestination']);
if (isset($_SESSION['dateDepartOrigin']))
	unset($_SESSION['dateDepartOrigin']);
if (isset($_SESSION['timeDepartOrigin']))
	unset($_SESSION['timeDepartOrigin']);
if (isset($_SESSION['dateArriveDestination']))
	unset($_SESSION['dateArriveDestination']);
if (isset($_SESSION['timeArriveDestination']))
	unset($_SESSION['timeArriveDestination']);
if (isset($_SESSION['a320j']))
	unset($_SESSION['a320j']);
if (isset($_SESSION['a320p']))
	unset($_SESSION['a320p']);
if (isset($_SESSION['a320y']))
	unset($_SESSION['a320y']);
if (isset($_SESSION['a330j']))
	unset($_SESSION['a330j']);
if (isset($_SESSION['a330p']))
	unset($_SESSION['a330p']);
if (isset($_SESSION['a330y']))
	unset($_SESSION['a330y']);
if (isset($_SESSION['clientID']))
	unset($_SESSION['clientID']);
if (isset($_SESSION['clientFirstName']))
	unset($_SESSION['clientFirstName']);
if (isset($_SESSION['clientMiddleName']))
	unset($_SESSION['clientMiddleName']);
if (isset($_SESSION['clientLastName']))
	unset($_SESSION['clientLastName']);
if (isset($_SESSION['clientGender']))
	unset($_SESSION['clientGender']);
if (isset($_SESSION['clientBirthday']))
	unset($_SESSION['clientBirthday']);
if (isset($_SESSION['clientAge']))
	unset($_SESSION['clientAge']);
if (isset($_SESSION['clientEmail']))
	unset($_SESSION['clientEmail']);
if (isset($_SESSION['clientContactNum']))
	unset($_SESSION['clientContactNum']);
if (isset($_SESSION['clientNationality']))
	unset($_SESSION['clientNationality']);
if (isset($_SESSION['clientType']))
	unset($_SESSION['clientType']);
if (isset($_SESSION['clientRemarks']))
	unset($_SESSION['clientRemarks']);
if (isset($_SESSION['flightOrigin']))
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
			<h3>Admin Menu</h3>
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
								<li><a href="#" class="button primary fit">Manage Clients</a></li>
								<li><a href="report.php" class="button primary fit">View Reports</a></li>
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