<?php
include 'sessionstart.php';
include 'includes/AddingData.php';
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Add Flights - PARS</title>
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
		<?php
		include 'includes/menubutton.php';
		?>

		<!-- Header -->
		<header id="header" class="alt">
			<h1>Add Flights</h1>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- First Section -->
			<section id="first" class="main special">
				<div class="spotlight">
					<div class="content">

						<form action="addflight.php" method="POST">

							<div class="row gtr-uniform">

								<div class="col-6 col-12-xsmall">
									<h2>Origin</h2>
									<input type="text" name="flightOriginN" placeholder="" required />
								</div>
								<div class="col-6 col-12-xsmall">
									<h2>Destination</h2>
									<input type="text" name="flightDestinationN" placeholder="" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2><strong>Date</strong> Depart Origin</h2>
									<input type="date" name="dateDepartOriginN" placeholder="" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2><strong>Time</strong> Depart Origin</h2>
									<input type="text" name="timeDepartOriginN" placeholder="HH:mm" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2><strong>Date</strong> Arrive Destination</h2>
									<input type="date" name="dateArriveDestinationN" placeholder="Select date" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2><strong>Time</strong> Arrive Destination</h2>
									<input type="text" name="timeArriveDestinationN" placeholder="HH:mm" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2>Flight Number</h2>
									<input type="text" name="flightNumberN" placeholder="" required />
								</div>

								<div class="col-6 col-12-xsmall">
									<h2>Aircraft Model</h2>
									<select name="AircraftModelN">
										<option value="A320" selected>A320</option>
										<option value="A330">A330</option>
									</select>
								</div>


								<div class="col-6 col-12-small">
									<input type="radio" id="demo-priority-low" name="flightTypeN" value="D" checked>
									<label for="demo-priority-low">Domestic Flight</label>
								</div>

								<div class="col-6 col-12-small">
									<input type="radio" id="demo-priority-normal" name="flightTypeN" value="I">
									<label for="demo-priority-normal">International Flight</label>
								</div>
							</div>
							<br>
							<input type="submit" name="submit" class="button primary fit" value="Confirm" />
						</form>
					</div>

				</div>




			</section>


		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
		</footer>

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