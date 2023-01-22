<?php
include 'sessionstart.php';
require 'db.php';
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Archives - PARS</title>
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
		<header id="header">
			<h1>Archives</h1>
			<p></p>
		</header>

		<!-- Nav -->
		<nav id="nav">
			<ul>
				<li><a href="#avail" class="active">Available Flights</a></li>
				<li><a href="#archive">Archive</a></li>
			</ul>
		</nav>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="avail" class="main">
				<header class="major">
					<h2>Available Flights</h2>
				</header>

				<div class="table-wrapper">
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
							
							$sql = "SELECT * from flight";
							$result = mysqli_query($db, $sql);
							$resultcheck = mysqli_num_rows($result);

							if ($resultcheck > 0) {
								while ($row = mysqli_fetch_array($result)) {
									echo "<tr><td>" . $row["flightNumber"] . "</td><td>" . $row["Origin"] . "</td><td>" . $row["Destination"] . "</td><td>" . $row["dateDepartOrigin"] . "</td><td>"
										. $row["timeDepartOrigin"] . "</td><td>" . $row["dateArriveDestination"] . "</td><td>" . $row["timeArriveDestination"] .
										"</td><td>" .
										"<form>" .
										"<button name='btn' type='submit' value = " . $row["flightNumber"] . ">Archive</button>" .
										"</form>" .
										"</td></tr>";
								}
							}

							?>

						</tbody>

					</table>
				</div>

			</section>

			<?php
			
			if (isset($_GET['btn'])) {
				$btn = $_GET['btn'];

				$query = "INSERT into flightarchive SELECT * FROM flight WHERE flightNumber = '$btn' ";
				$query_run = mysqli_query($db, $query);
			}
			?>
			<?php
			
			if (isset($_GET['btn'])) {
				$btn = $_GET['btn'];

				$Dquery = "DELETE from flight WHERE flightNumber = '$btn'";
				$query_run = mysqli_query($db, $Dquery);
			}

			if (isset($_GET['btn'])) {
				$btn = $_GET['btn'];

				$query = "INSERT into flight_seatarchive SELECT * FROM flight_seat WHERE flightNumber = '$btn' ";
				$query_run = mysqli_query($db, $query);
			}
			?>
			<?php
			
			if (isset($_GET['btn'])) {
				$btn = $_GET['btn'];

				$Dquery = "DELETE from flight_seat WHERE flightNumber = '$btn'";
				$query_run = mysqli_query($db, $Dquery);
				echo "<script> alert('Flight and its seats have been archived!'); window.location= 'archive.php'</script>";
			}

			?>


			<!-- First Section -->
			<section id="archive" class="main special">
				<div class="spotlight">
					<div class="content">
						<header class="major">
							<h2>Archive</h2>
						</header>

						<div class="table-wrapper">
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
									
									$sql = "SELECT * from flightarchive";
									$result = mysqli_query($db, $sql);
									$resultcheck = mysqli_num_rows($result);

									if ($resultcheck > 0) {
										while ($row = mysqli_fetch_array($result)) {
											echo "<tr><td>" . $row["flightNumber"] . "</td><td>" . $row["Origin"] . "</td><td>" . $row["Destination"] . "</td><td>" . $row["dateDepartOrigin"] . "</td><td>"
												. $row["timeDepartOrigin"] . "</td><td>" . $row["dateArriveDestination"] . "</td><td>" . $row["timeArriveDestination"] .
												"</td></tr>";
										}
									}

									?>

								</tbody>

							</table>
						</div>
				</div>
			</section>
		</div>
		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
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