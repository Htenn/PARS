<?php
session_start();
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Flights - PARS</title>
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
			<h1>Flights</h1>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="choose" class="main">
				<div class="col-2 col-12-xsmall" style="position: relative; margin-left: auto; margin: right; display: block; width: 25%;">
					<form action="domestic.php#table" method="POST">
						<input type="text" name="search" placeholder="Search" />
						<br>
						<button class="button primary small" name="Sbtn" type="submit">Search</button>
					</form>
				</div>

				<header class="major">
					<h2>Available Flights</h2>
				</header>

				<div id='table' class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
								<th>Flight No.</th>
								<th>Origin</th>
								<th>Destination</th>
								<th>Date Dep</th>
								<th>Time Dep</th>
								<th>Date Arr</th>
								<th>Time Arr</th>
							</tr>
						</thead>

						<tbody>

							<?php
							if (isset($_POST['Sbtn'])) {
								$conn = mysqli_connect("localhost", "root", "", "pars");
								$Ssearch = mysqli_real_escape_string($conn, $_POST['search']);

								$Ssql = "SELECT * FROM flight WHERE flightNumber LIKE '%$Ssearch%' OR  flightOrigin LIKE '%$Ssearch%' 
																	OR flightDestination LIKE '%$Ssearch%' OR dateDepartOrigin LIKE '%$Ssearch%' OR timeDepartOrigin LIKE '%$Ssearch%' 
																	OR dateArriveDestination LIKE '%$Ssearch%' OR timeArriveDestination LIKE '%$Ssearch%' OR flightType LIKE '%$Ssearch%'";
								$result = mysqli_query($conn, $Ssql);
								$queryResult = mysqli_num_rows($result);

								if ($queryResult > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																			<td>" . $row["flightNumber"] . "</td>
																			<td>" . $row["flightOrigin"] . "</td>
																			<td>" . $row["flightDestination"] . "</td>
																			<td>" . $row["dateDepartOrigin"] . "</td>
																			<td>" . $row["timeDepartOrigin"] . "</td>
																			<td>" . $row["dateArriveDestination"] . "</td>
																			<td>" . $row["timeArriveDestination"] . "</td>
																			<td>" .
											"<form action='domestic.php#conf' method='post'>	
																			<button class='button primary small' name='btn' type='submit' value = " . $row["flightNumber"] . ">Select</button>" .
											"</form>
																			</td>
																			</tr>";
									}
								} else {
									echo "No results";
								}
							}


							if (!isset($_POST['Sbtn'])) {
								$conn = mysqli_connect("localhost", "root", "", "pars");
								$sql = "SELECT * from flight";
								$result = mysqli_query($conn, $sql);
								$resultcheck = mysqli_num_rows($result);

								if ($resultcheck > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																		<td>" . $row["flightNumber"] . "</td>
																		<td>" . $row["flightOrigin"] . "</td>
																		<td>" . $row["flightDestination"] . "</td>
																		<td>" . $row["dateDepartOrigin"] . "</td>
																		<td>" . $row["timeDepartOrigin"] . "</td>
																		<td>" . $row["dateArriveDestination"] . "</td>
																		<td>" . $row["timeArriveDestination"] . "</td>
																		<td>" .
											"<form action='domestic.php#conf' method='post'>
																		<button class='button primary small' name='btn' type='submit' value = " . $row["flightNumber"] . ">Select</button>" .
											"</form>
																		</td>
																		</tr>";
									}
								} else {
									echo "No results";
								}
							}

							?>

						</tbody>

					</table>
				</div>

			</section>

			<!-- First Section -->
			<section id="conf" class="main special">
				<div class="spotlight">
					<div class="content">

						<?php
						$con = mysqli_connect("localhost", "root", "", "pars");
						if (isset($_POST['btn'])) {
							$btn = $_POST['btn'];
							$_SESSION['selectedFlightNum'] = $btn;

							$query = "SELECT * FROM flight WHERE flightNumber = '$btn' ";
							$query_run = mysqli_query($con, $query);

							echo "<header class='major'><h2>" . $btn . "</h2></header>";

							if (mysqli_num_rows($query_run) > 0) {

								foreach ($query_run as $row) {
						?>
									<div class="row gtr-uniform">

										<div class="col-6 col-12-xsmall">
											<h2>Origin</h2>
											<input type="text" disabled="disabled" value="<?= $row["flightOrigin"]; ?>" />
										</div>
										<div class="col-6 col-12-xsmall">
											<h2>Destination</h2>
											<input type="text" disabled="disabled" value="<?= $row["flightDestination"]; ?>" />
										</div>

										<div class="col-6 col-12-xsmall">
											<h2>Date Depart Origin</h2>
											<input type="text" disabled="disabled" value="<?= $row["dateDepartOrigin"]; ?>" />
										</div>

										<div class="col-6 col-12-xsmall">
											<h2>Time Depart Origin</h2>
											<input type="text" disabled="disabled" value="<?= $row["timeDepartOrigin"]; ?>" />
										</div>

										<div class="col-6 col-12-xsmall">
											<h2>Date Arrive Destination</h2>
											<input type="text" disabled="disabled" value="<?= $row["dateArriveDestination"]; ?>" />
										</div>

										<div class="col-6 col-12-xsmall">
											<h2>Time Arrive Destination</h2>
											<input type="text" disabled="disabled" value="<?= $row["timeArriveDestination"]; ?>" />
										</div>
									</div>


						<?php
									// save to session variables
									$_SESSION['flightOrigin'] = $row["flightOrigin"];
									$_SESSION['flightDestination'] = $row["flightDestination"];
									$_SESSION['dateDepartOrigin'] = $row["dateDepartOrigin"];
									$_SESSION['timeDepartOrigin'] = $row["timeDepartOrigin"];
									$_SESSION['dateArriveDestination'] = $row["dateArriveDestination"];
									$_SESSION['timeArriveDestination'] = $row["timeArriveDestination"];
								}
							} else {
								echo "no result";
							}
						}
						?>

					</div>

				</div>

				<?php
				if (isset($_POST['btn'])) {
				?>
					<a class='button primary' style='text-decoration:none;' href='selectSeats.php'>Confirm</a>
				<?php
				}
				?>


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
		<script>
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		</script>

</body>

</html>