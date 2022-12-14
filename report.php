<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Reports - PARS</title>
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
					<h1>PCC QC Airline Reservation System</h1>
					<p>Reports</p>
				</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Client and Passenger List</a></li>
							<li><a href="#first">Booking List</a></li>
							<li><a href="#second">Reserved Seats</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
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
													<!--
													<tr>
														<td>ID</td>
														<td>Jonas Anthony</td>
														<td>Pagcanlungan</td>
														<td>Napiza</td>
														<td>Male</td>
														<td>21/3/00</td>
														<td>22</td>
														<td>napiza@gmail.com</td>
														<td>09215984382</td>
														<td>filipino</td>
														<td><a href="#" class="button primary small">Edit</a></td>	
													</tr>
													-->

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

														mysqli_free_result($clientQuery);
														mysqli_free_result($passengerQuery);
														mysqli_close($db);
													?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</section>

						<!-- First Section -->
							<section id="first" class="main special">
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
													$bookingQuery = mysqli_query($db, "SELECT booking.clientID, booking.bookingID, booking.flightNumber, client.clientFirstName, client.clientMiddleName, client.clientLastName, booking.bookingOrigin, booking.bookingDestination, booking.bookingNumOfSeats, booking.addBookingDate, booking.addBookingTime FROM booking INNER JOIN client ON booking.clientID = client.clientID");
													

													while($row = mysqli_fetch_array($bookingQuery)) {
														echo "<tr>";
															echo "<td>" . $row['bookingID'] . "</td>";
															echo "<td>" . $row['flightNumber'] . "</td>";
															echo "<td>" . $row['clientFirstName'] . " " . $row['clientMiddleName'] . " " . $row['clientLastName'] . "</td>";
															echo "<td>" . $row['bookingOrigin'] . " " . $row['addBookingDate'] . " " . $row['addBookingTime'] . "</td>";
															echo "<td>" . $row['bookingDestination'] . " " . $row['addBookingDate'] . " " . $row['addBookingTime'] . "</td>";
															echo "<td>" . $row['bookingNumOfSeats'] . "</td>";
														echo "</tr>";
													}
													mysqli_free_result($bookingQuery);
													mysqli_close($db);
												?>

											</tbody>
										</table>
									</div>
								
								
							</section>

						<!-- Second Section -->
							<section id="second" class="main special">
								<header class="major">
									<h2>Reserved Seats</h2>
								</header>
								<div class="table-wrapper">
									<table class="alt">
										<thead>
											<tr>
												<th>Flight Number</th>
												<th>Name</th>
												<th>Seat Number</th>
												<th>Class</th>
												<th>Remarks</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
								</div>
							</section>
					</div>
					
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