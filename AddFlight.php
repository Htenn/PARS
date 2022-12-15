
<!DOCTYPE HTML>

<html>
	<head>
		<title>Flights - PARS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

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

												<form action="addflight.php" method = "POST">

															<div class="row gtr-uniform">

																<div class="col-6 col-12-xsmall">
																	<h2>Origin</h2>
																	<input type="text" name = "flightOriginN" placeholder = "flight Origin" />
																</div>	
																<div class="col-6 col-12-xsmall">
																	<h2>Destination</h2>
																	<input type="text"  name="flightDestinationN" placeholder = "flight Destination"/>
																</div>

																<div class="col-6 col-12-xsmall">
																	<h2>Date Depart Origin</h2>
																	<input type="text"  name="dateDepartOriginN" placeholder = "date Depart Origin"/>
																</div>

																<div class="col-6 col-12-xsmall">
																	<h2>Time Depart Origin</h2>
																	<input type="text"  name="timeDepartOriginN" placeholder = "time Depart Origin"/>
																</div>		

																<div class="col-6 col-12-xsmall">
																	<h2>Date Arrive Destination</h2>
																	<input type="text"  name="dateArriveDestinationN" placeholder = "date Arrive Destination"/>
																</div>

																<div class="col-6 col-12-xsmall">
																	<h2>Time Arrive Destination</h2>
																	<input type="text"  name="timeArriveDestinationN" placeholder = "time Arrive Destination"/>
																</div>

																<div class="col-6 col-12-xsmall">
																	<h2>Flight Number</h2>
																	<input type="text"  name="flightNumberN" placeholder = "Flight Number"/>
																</div>

																<div class="col-6 col-12-xsmall">
																	<h2>Aircraft Model</h2>
																	<select name="AircraftModelN">
																		<option value="A320">A320</option>
																		<option value="A330">A330</option>
																	</select>
																</div>
												
													
																<div class="col-6 col-12-small">
																	<input type="radio" id="demo-priority-low" name="flightTypeN" value = "D" checked>
																	<label for="demo-priority-low">Domestic Flight</label>
																</div>

																<div class="col-6 col-12-small">
																	<input type="radio" id="demo-priority-normal" name="flightTypeN" value = "I">
																	<label for="demo-priority-normal">International Flight</label>
																</div>

																

															</div>
									</div>
						
								</div>
								<?php
									include 'includes/AddingData.php';
								?>
								<br>
								<input type = "submit" name = "submit" class="button primary fit" value="Confirm" />

								</form>

							</section>
				

			</div>
				
				<!-- Footer -->
				<footer id="footer">
					<section>
						
					</section>
					<p class="copyright">&copy; Philippine Cultural College. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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

