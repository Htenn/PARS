<?php
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
	<title>Select Seats - PARS</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/seats.css" />
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
					$_SESSION['a320j'] = array();
					$_SESSION['a320p'] = array();
					$_SESSION['a320y'] = array();
					$_SESSION['a330j'] = array();
					$_SESSION['a330p'] = array();
					$_SESSION['a330y'] = array();

					$selectedFlightNumber = $_SESSION["selectedFlightNum"];

					$selectedFlightQuery = "SELECT flightAircraftModel FROM flight WHERE flightNumber = '$selectedFlightNumber' LIMIT 1";
					$db = mysqli_connect('localhost', 'root', '', 'pars');
					$selectedFlightAircraftModel = mysqli_query($db, $selectedFlightQuery);
					$selectedFlightAircraftModel = mysqli_fetch_assoc($selectedFlightAircraftModel);
					$selectedFlightAircraftModel = $selectedFlightAircraftModel['flightAircraftModel'];

					echo "<h1>" . $selectedFlightAircraftModel . "</h1><p></p>";

					# query to check the availability of a seat
					$seatCheckQuery = "SELECT * from flight_seat WHERE flightNumber = '$selectedFlightNumber'";
					$seatCheck = mysqli_query($db, $seatCheckQuery);

					switch ($selectedFlightAircraftModel) {
						case 'A320':
							# business class
							echo "<h2>Business</h2>";

							foreach (range('F', 'E') as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 1; $row <= 3; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a320j'], $seatNumber);

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

							echo "<div style='margin-top: 20px;'></div>";

							foreach (range('B', 'A') as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 1; $row <= 3; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a320j'], $seatNumber);

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
							echo "<p></p>";

							# economy plus
							echo "<h2>Premium Economy</h2>";

							foreach (range('F', 'A') as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 7; $row <= 8; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a320p'], $seatNumber);

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

									array_push($_SESSION['a320p'], $seatNumber);

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

									array_push($_SESSION['a320p'], $seatNumber);

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
								if ($column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							echo "<p></p>";

							# economy
							echo "<h2>Economy</h2>";

							foreach (range('F', 'A') as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 22; $row <= 38; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a320y'], $seatNumber);

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
								if ($column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							break;

						case "A330":
							# business class
							$columnArray = array('K', 'G', 'D', 'A');

							echo "<h2>Business</h2>";

							foreach ($columnArray as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 1; $row <= 5; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a330j'], $seatNumber);

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
								if ($column == 'K' || $column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							echo "<p></p>";

							#premium economoy
							$columnArray = array('K', 'H', 'G', 'E', 'D', 'C', 'A');

							echo "<h2>Premium Economy</h2>";

							foreach ($columnArray as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 21; $row <= 23; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a330p'], $seatNumber);

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
								if ($column == 'H' || $column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							echo "<p></p>";

							# economy
							$columnArray = array('K', 'H', 'G', 'F', 'E', 'D', 'C', 'A');

							echo "<h2>Economy</h2>";

							foreach ($columnArray as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 31; $row <= 47; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a330y'], $seatNumber);

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

									array_push($_SESSION['a330y'], $seatNumber);

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
								if ($column == 'H' || $column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							echo "<p></p>";

							$columnArray = array('K', 'H', 'F', 'E', 'D', 'C', 'A');

							foreach ($columnArray as $column) {
								echo "<div class= \"seatRow\">";
								for ($row = 63; $row <= 67; $row++) {
									$seatNumber = $column . $row;

									array_push($_SESSION['a330j'], $seatNumber);

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
								if ($column == 'H' || $column == 'D') {
									echo "<div style='margin-top: 20px;'></div>";
								}
							}
							echo "<p></p>";
							break;
					}
					?>
				</div>

				<p></p>
				<form id="inviForm" action="pnr" method="POST">
					<input type="hidden" id="str" name="str" value="" />
					<input type="submit" class="button primary fit" id="btn" name="submit" value="Continue" />
				</form>

			</section>

		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
		</footer>

	</div>

	<!-- Scripts
			<script src="selectSeatsScript.js"></script>-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	<script language="javascript" type="text/javascript">
		const container = document.querySelector(".container");
		const seats = document.querySelectorAll(".row .seat:not(.sold)");
		var ids = [];

		populateUI();

		// Update total and count
		function updateSelectedCount() {
			const selectedSeats = document.querySelectorAll(".row .seat.selected");

			const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

			localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

			// an algorithm to get id of seats
			ids = $('.seat.selected').map(function() {
				return this.id;
			}).get(); // put into array the divs that contain "seat" and "selected" classes

			console.log(ids);
		}

		function populateUI() {
			const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

			if (selectedSeats !== null && selectedSeats.length > 0) {
				seats.forEach((seat, index) => {
					if (selectedSeats.indexOf(index) > -1) {
						console.log(seat.classList.add("selected"));
					}
				});
			}
		}

		function writeElement(ids) {
			if (ids.length !== 0) {
				for (var i = 0; i < ids.length; i++) {
					let newDiv = document.createElement("div");
					newDiv.innerText = ids[i];
					document.body.appendChild(newDiv);
				}


			}
		}

		// Seat click event
		container.addEventListener("click", (e) => {
			if (
				e.target.classList.contains("seat") &&
				!e.target.classList.contains("sold")
			) {
				e.target.classList.toggle("selected");

				updateSelectedCount();
			}


		});

		//initial count and total set
		updateSelectedCount();

		$(document).ready(function() {
			$("#btn").click(function() {
				$.post($("#inviForm").attr("action"),
					$("#str").val(JSON.stringify(ids)),
					function(info) {
						$("#result").html(info);
					});
			});
		});
	</script>

	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>

</body>

</html>