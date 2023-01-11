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
		<title>Reservations - PARS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<?php 
					include 'includes/menubutton.php';
				?>

				<!-- Header -->
				<header id="header">
					<h1>PCC QC Airline Reservation System</h1>
					<p>Reports</p>
				</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#cp" class="active">Client and Passenger List</a></li>
							<li><a href="#reservations">Reservations</a></li>
							<li><a href="#reserved">Reserved Seats</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="cp" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Clients and Passengers</h2>
										</header>
										<div class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>FirstName</th>
														<th>MiddleName</th>
														<th>LastName</th>
														<th>Gender</th>
														<th>Birthday</th>
														<th>Age</th>
														<th>Email</th>
														<th>Contact no.</th>
														<th>Nationality</th>
														
													</tr>
												</thead>
												<tbody>

													<?php
														$db = mysqli_connect('localhost', 'root', '', 'pars');
														$clientQuery = mysqli_query($db, "SELECT * FROM client");
														
														while($row = mysqli_fetch_array($clientQuery)) {
															echo "<tr>";
																echo "<td>" . $row['clientFirstName'] . "</td>";
																echo "<td>" . $row['clientMiddleName'] . "</td>";
																echo "<td>" . $row['clientLastName'] . "</td>";
																echo "<td>" . $row['clientGender'] . "</td>";
																echo "<td>" . $row['clientBirthday'] . "</td>";
																echo "<td>" . $row['clientAge'] . "</td>";
																echo "<td>" . $row['clientEmail'] . "</td>";
																echo "<td>" . $row['clientContactNum'] . "</td>";
																echo "<td>" . $row['clientNationality'] . "</td>";
															echo "</tr>";
														}

														$passengerQuery = mysqli_query($db, "SELECT * FROM passenger");
														while($row = mysqli_fetch_array($passengerQuery)) {
															echo "<tr>";
																echo "<td>" . $row['passengerFirstName'] . "</td>";
																echo "<td>" . $row['passengerMiddleName'] . "</td>";
																echo "<td>" . $row['passengerLastName'] . "</td>";
																echo "<td>" . $row['passengerGender'] . "</td>";
																echo "<td>" . $row['passengerBirthday'] . "</td>";
																echo "<td>" . $row['passengerAge'] . "</td>";
																echo "<td>" . $row['passengerEmail'] . "</td>";
																echo "<td>" . $row['passengerContactNum'] . "</td>";
																echo "<td>" . $row['passengerNationality'] . "</td>";
															echo "</tr>";
														}
													?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</section>

						<!-- First Section -->
							<section id="reservations" class="main special">
								<header class="major">
									<h2>Reservations</h2>
								</header>
								
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>ID</th>
													<th>Flight Number</th>
													<th>Client Name</th>
													<th>Origin</th>
													<th>Destination</th>
													<th>Reserved Seats Count</th>

												</tr>
											</thead>
											<tbody>
												
												<?php
													$db = mysqli_connect('localhost', 'root', '', 'pars');
													$bookingQuery = mysqli_query($db, "SELECT * FROM client INNER JOIN booking ON client.clientID = booking.clientID INNER JOIN flight ON booking.flightNumber = flight.flightNumber ORDER BY booking.addBookingDate DESC, booking.addBookingTime DESC");
													

													while($row = mysqli_fetch_array($bookingQuery)) {
														echo "<tr>";
															echo "<td>" . $row['bookingID'] . "</td>";
															echo "<td>" . $row['flightNumber'] . "</td>";
															echo "<td>" . $row['clientFirstName'] . " " . $row['clientMiddleName'] . " " . $row['clientLastName'] . "</td>";
															echo "<td>" . $row['bookingOrigin'] . " " . $row['dateDepartOrigin'] . " " . $row['timeDepartOrigin'] . "</td>";
															echo "<td>" . $row['bookingDestination'] . " " . $row['dateArriveDestination'] . " " . $row['timeArriveDestination'] . "</td>";
															echo "<td>" . $row['bookingNumOfSeats'] . "</td>";
														echo "</tr>";
													}
													
												?>

											</tbody>
										</table>
									</div>
								
								
							</section>

						<!-- Second Section -->
							<section id="reserved" class="main special">
								<header class='major'>
									<h2>Reserved Seats</h2>
								</header>
								<?php

									$flightQuery = mysqli_query($db, "SELECT flightNumber FROM flight");

									while($flights = mysqli_fetch_assoc($flightQuery)) {
										$seatQuery = "SELECT * FROM flight_seat WHERE flightNumber = '" . $flights['flightNumber'] . "' ORDER BY flightSeatNumber";
												$seatQuery = mysqli_query($db, $seatQuery);

												$seatQueryResult = mysqli_num_rows($seatQuery);
												if ($seatQueryResult > 0 ){
													echo "
														<h2>Flight Number <strong>" . $flights['flightNumber'] . "</strong></h2>
														<p></p>
													";
									
								?>
								<div class="table-wrapper">
									<table class="alt">
										<thead>
											<tr>
												<th>Seat Number</th>
												<th>Class</th>
												<th>Name</th>
												<th>Remarks</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
													while($row = mysqli_fetch_assoc($seatQuery)) {
														echo "<tr>";
														echo "<td>" . $row['flightSeatNumber'] . "</td>";
														echo "<td>" . $row['flightSeatClass'] . "</td>";

															if (is_null($row['passengerID'])) {
																$getNameQuery = "SELECT clientFirstName, clientMiddleName, clientLastName FROM client WHERE clientID = " . $row['clientID'];
																$getNameQuery = mysqli_query($db, $getNameQuery);
																$getName = mysqli_fetch_assoc($getNameQuery);

																echo "<td>" . $getName['clientFirstName'] . " " . $getName['clientMiddleName'] . " " . $getName['clientLastName'] . "</td>";
															} else {
																$getNameQuery = "SELECT passengerFirstName, passengerMiddleName, passengerLastName FROM passenger WHERE passengerID = " . $row['passengerID'];
																$getNameQuery = mysqli_query($db, $getNameQuery);
																$getName = mysqli_fetch_assoc($getNameQuery);

																echo "<td>" . $getName['passengerFirstName'] . " " . $getName['passengerMiddleName'] . " " . $getName['passengerLastName'] . "</td>";
															}
														echo "<td>" . $row['remarks'] . "</td>";
														echo "</tr>";
														}
												
											?>
										</tbody>
									</table>
								</div>
								<?php
												}
								} // end of while ($flights = mysqli_fetch_assoc)
								?>
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