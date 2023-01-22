<?php
include '../sessionstart.php';
require '../db.php';
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
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<link rel="icon" href="../images/favicon.png">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
			<?php
				if($_SESSION['session'] == 'A') {
					$menu = '../adminmenu.php';
				} else {
					$menu = '../mainmenu.php';
				}

				echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 15px; color: grey;'>
				<ul class='actions'>
					<li><a href=" . $menu . " class='button primary small'>Menu</a></li>
				</ul>
				</div>";
			?>

				<!-- Header -->
				<header id="header">
					<h1>Reservations</h1>
					<p></p>
				</header>

				<!-- Nav -->
				<nav id="nav">
						<ul>
							<li><a href="#OW" class="active">One-Way</a></li>
							<li><a href="#RT">Round Trip</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- First Section -->
							<section id="OW" class="main special">
								<header class="major">
									<h2>One-Way</h2>
								</header>
								<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Client</th>
													<th>Flight Number</th>
													<th>Origin</th>
													<th>Destination</th>
													<th>Passengers</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php
													$bookingQuery = mysqli_query($db, "SELECT * FROM pnr INNER JOIN booking ON pnr.ID = booking.clientID INNER JOIN flight ON booking.flightNumber = flight.flightNumber ORDER BY booking.addDate DESC, booking.addTime DESC");
													

													while($row = mysqli_fetch_array($bookingQuery)) {
														echo "<tr>";
															echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
															echo "<td>" . $row['flightNumber'] . "</td>";
															echo "<td>" . $row['Origin'] . "<br/>" . $row['dateDepartOrigin'] . "<br/>" . $row['timeDepartOrigin'] . "</td>";
															echo "<td>" . $row['Destination'] . "<br/>" . $row['dateArriveDestination'] . "<br/>" . $row['timeArriveDestination'] . "</td>";
															echo "<td>" . $row['NumOfSeats'] . "</td>";
															echo "<td>
																<form action='ow' method='get'>
																<div>
																	<button class='button primary fit small' name='view' type='submit' value = " . $row['bookingID'] . ">View</button>
																</div>
																</form>
																</td>
															";
														echo "</tr>";
													}
													
												?>

											</tbody>
										</table>
									</div>
							</section>

						<!-- Second Section -->
							<section id="RT" class="main special">
								<header class='major'>
									<h2>Round Trip</h2>
								</header>
								<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Client</th>
													<th>Flight Number</th>
													<th>Origin</th>
													<th>Destination</th>
													<th>Passengers</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												
												<?php
													$bookingQuery = mysqli_query($db, "SELECT * FROM bookingr INNER JOIN pnr ON pnr.ID = bookingr.clientID ORDER BY bookingr.addDate DESC, bookingr.addTime DESC");
													

													while($row = mysqli_fetch_array($bookingQuery)) {

														$flight1Query = "SELECT dateDepartOrigin as dateDepartOrigin1, timeDepartOrigin as timeDepartOrigin1, dateArriveDestination as dateArriveDestination1, timeArriveDestination as timeArriveDestination1 FROM flight WHERE flightNumber = '" . $row['flightNumber1'] . "'";
														$flight1Result = mysqli_query($db, $flight1Query);
														$flight1 = mysqli_fetch_array($flight1Result);

														$flight2Query = "SELECT dateDepartOrigin as dateDepartOrigin2, timeDepartOrigin as timeDepartOrigin2, dateArriveDestination as dateArriveDestination2, timeArriveDestination as timeArriveDestination2 FROM flight WHERE flightNumber = '" . $row['flightNumber2'] . "'";
														$flight2Result = mysqli_query($db, $flight2Query);
														$flight2 = mysqli_fetch_array($flight2Result);

														
														echo "<tr>";
															echo "<td rowspan='2'>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
															echo "<td>" . $row['flightNumber1'] . "</td>";
															echo "<td>" . $row['Origin1'] . "<br/>" . $flight1['dateDepartOrigin1'] . "<br/>" . $flight1['timeDepartOrigin1'] . "</td>";
															echo "<td>" . $row['Destination1'] . "<br/>" . $flight1['dateArriveDestination1'] . "<br/>" . $flight1['timeArriveDestination1'] . "</td>";
															echo "<td rowspan='2'>" . $row['NumOfSeats'] . "</td>";
															echo "<td rowspan='2'>
																<form action='rt' method='get'>
																<div>
																	<button class='button primary fit small' name='view' type='submit' value = " . $row['bookingID'] . ">View</button>
																</div>
																</form>
																</td>
															";
															// <div>
															//		<button style='margin-top: 10px;' class='button fit small' name='edit' type='submit' value = " . $row['bookingID'] . ">Edit</button>
															//		</div>
														echo "</tr>";
														echo "<tr>";
															echo "<td>" . $row['flightNumber2'] . "</td>";
															echo "<td>" . $row['Origin2'] . "<br/>" . $flight2['dateDepartOrigin2'] . "<br/>" . $flight2['timeDepartOrigin2'] . "</td>";
															echo "<td>" . $row['Destination2'] . "<br/>" . $flight2['dateArriveDestination2'] . "<br/>" . $flight2['timeArriveDestination2'] . "</td>";
														echo "</tr>";
													}
													
												?>

											</tbody>
										</table>
									</div>
							</section>
					
			</div>

			<!-- Footer -->
				<footer id="footer">
					<p class="copyright">&copy; Philippine Cultural College</p>
				</footer>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../ssets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>