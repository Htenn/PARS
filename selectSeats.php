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
		<link rel="stylesheet" href="assets/css/main.css" />
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
										$selectedFlightNumber = $row["flightNumber"];						
										$selectedFlightQuery = "SELECT flightAircraftModel FROM flight_aircrafts WHERE flightNumber = $selectedFlightNumber";
										$selectedFlightAircraftModel = mysqli_query($conn, $selectedFlightQuery);

										if($selectedFlightAircraftModel = "A320") {
											# business class
											for($column = 'A'; $column <= 'B'; $column++) {
												echo "<div class= \"seatRow\">";
													for ($row = 1; $row <= 3; $column++) {
														echo "<div class=\"seat\" id=\"" . $column . $row . "\"></div>";
													}
												echo "</div>";
											}

											# economy class
											for($column ='A'; $column <= 'F'; $column++ ){
												for($row = 7; $row <= 8; $row++){
													echo "<div class=\"seat\" id=\"" . $column . $row . "\"></div>";
												}
												for($row = 10; $row <= 12; $row++){
													echo "<div class=\"seat\" id=\"" . $column . $row . "\"></div>";
												}
												for($row = 20; $row <= 38; $row++){
													echo "<div class=\"seat\" id=\"" . $column . $row . "\"></div>";
												}
											}
										}
										elseif($selectedFlightAircraftModel = "A330"){
											# business class
											$columnArray = array('K', 'G', 'D', 'A');

											for($cIndex = 0; $cIndex < count($columnArray); $cIndex) {
												echo "<div class= \"seatRow\">";
													for($row = 1; $row <= 6; $row++){
														echo "<div class=\"seat\" id=\"" . $columnArray[$cIndex] . $row . "\"></div>";
													}
												echo "</div>";
											}

											#premium economoy
											$columnArray = array('A', 'C', 'D', 'E', 'G', 'H', 'K');

											for($cIndex = 0; $cIndex < count($columnArray); $cIndex) {
												echo "<div class= \"seatRow\">";
													for($row = 21; $row <= 23; $row++){
														echo "<div class=\"seat\" id=\"" . $columnArray[$cIndex] . $row . "\"></div>";
													}
												echo "</div>";
											}
											
											# economy
											$columnArray = array('A', 'C', 'D', 'E', 'F', 'G', 'H', 'K');

											for($cIndex = 0; $cIndex < count($columnArray); $cIndex) {
												echo "<div class= \"seatRow\">";
													for($row = 31; $row <= 47; $row++){
														echo "<div class=\"seat\" id=\"" . $columnArray[$cIndex] . $row . "\"></div>";
													}
												echo "</div>";
											}
											for($cIndex = 0; $cIndex < count($columnArray); $cIndex) {
												echo "<div class= \"seatRow\">";
													for($row = 51; $row <= 62; $row++){
														echo "<div class=\"seat\" id=\"" . $columnArray[$cIndex] . $row . "\"></div>";
													}
												echo "</div>"
											}
											$columnArray = array('A', 'C', 'D', 'E', 'F', 'H', 'K');
											for($cIndex = 0; $cIndex < count($columnArray); $cIndex) {
												echo "<div class= \"seatRow\">";
													for($row = 63; $row <= 67; $row++){
														echo "<div class=\"seat\" id=\"" . $columnArray[$cIndex] . $row . "\"></div>";
													}
												echo "</div>";
											}
										}
									?>
								</div>
							</section>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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