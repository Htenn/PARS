<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic - Stellar by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/seats.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1>Select Seats</h1>
						<p></p>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<div class="container">
									<?php
										/*
										$selectedFlightNumber = $row["flightNumber"];						
										$selectedFlightQuery = "SELECT flightAircraftModel FROM flight_aircrafts WHERE flightNumber = $selectedFlightNumber";
										$selectedFlightAircraftModel = mysqli_query($conn, $selectedFlightQuery);
										*/
										date_default_timezone_set("Asia/Manila");
										echo "The time is " . date("h:i:sa");

										$selectedFlightAircraftModel = "A330";
										$conn = mysqli_connect("localhost","root","","pars");
										$selectedFlightNumber = 'TG621';
										echo $selectedFlightAircraftModel;
										# query to check the availability of a seat
										$seatCheckQuery = "SELECT * from flight_seat WHERE flightNumber = '$selectedFlightNumber'";
										$seatCheck = mysqli_query($conn, $seatCheckQuery);

										switch($selectedFlightAircraftModel) {
											case 'A320':
											# business class
											foreach (range('F', 'E') as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 1; $row <= 3; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";
											foreach (range('B', 'A') as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 1; $row <= 3; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";

											# economy plus
											foreach (range('F', 'A') as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 7; $row <= 8; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
													for ($row = 10; $row <= 12; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
													for ($row = 20; $row <= 21; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
												if($column == 'D'){
													echo "</br>";
												}
											}
											echo "</br>";

											# economy
											foreach (range('F', 'A') as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 22; $row <= 38; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
												if($column == 'D'){
													echo "</br>";
												}
											}
											break;

											case "A330":
											# business class
											$columnArray = array('K', 'G', 'D', 'A');

											foreach ($columnArray as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 1; $row <= 6; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";
											
											#premium economoy
											$columnArray = array('K', 'H', 'G', 'E', 'D', 'C', 'A');

											foreach ($columnArray as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 21; $row <= 23; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";
											
											# economy
											$columnArray = array('K', 'H', 'G', 'F', 'E', 'D', 'C', 'A');

											foreach ($columnArray as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 31; $row <= 47; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
													for ($row = 51; $row <= 62; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";
											
											$columnArray = array('K', 'H', 'F', 'E', 'D', 'C', 'A');

											foreach ($columnArray as $column) {
												echo "<div class= \"seatRow\">";
													for ($row = 63; $row <= 67; $row++) {
														$seatNumber = $column . $row;
														$seatSold = false;

														foreach ($seatCheck as $data) {
															if ($data['flightSeatNumber'] == $seatNumber) { # sold if the seat is logged in the database
																$seatSold = true;
															}
														}

														if ($seatSold == true) {
															echo "<div class=\"seat sold\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														} else {
															echo "<div class=\"seat\" id=\"" . $seatNumber . "\">"  . $seatNumber .  "</div>";
														}
													}
												echo "</div>";
											}
											echo "</br>";
											break;
										}
									?>
								</div>
								<!--
								<form method="post">
									<input type="submit" name="continue" id="continue" value="continue" />
								</form>
									-->
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="selectSeatsScript.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>