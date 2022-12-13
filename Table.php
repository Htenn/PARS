
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
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Archives</h1>
						<p></p>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Available Flights</a></li>
							<li><a href="#first">Archive</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
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
												$conn = mysqli_connect("localhost", "root", "", "pars1");
												$sql = "SELECT * from flight";
												$result = mysqli_query ($conn, $sql);
												$resultcheck = mysqli_num_rows($result);
												
												if ($resultcheck > 0) {
													while ($row = mysqli_fetch_array($result)) {
														echo "<tr><td>" . $row["flightNumber"] . "</td><td>" . $row["flightOrigin"] . "</td><td>" . $row["flightDestination"] . "</td><td>" . $row["dateDepartOrigin"] . "</td><td>"
														. $row["timeDepartOrigin"] . "</td><td>" . $row["dateArriveDestination"] . "</td><td>" . $row["timeArriveDestination"] . 
														"</td><td>" . 
														"<form>" .
														"<button name='btn' type='submit' value = ". $row["flightNumber"] . ">Select</button>" . 
														"</form>" .
														"</td></tr>";
													}
												}
												else {
													echo "No results";
												}
												$conn -> close();
											
											?>

										</tbody>

									</table>								
								</div>
									
							</section>
							
							<?php
							$con = mysqli_connect("localhost", "root", "", "pars1");
							if(isset($_GET['btn'])) {
								$btn = $_GET['btn'];
								
								$query = "INSERT into flightarchive SELECT * FROM flight WHERE flightNumber = '$btn' ";
								$query_run = mysqli_query($con, $query);
								
							}
							?>
							<?php
							$con = mysqli_connect("localhost", "root", "", "pars1");
							if(isset($_GET['btn'])) {
								$btn = $_GET['btn'];
								
								$Dquery = "DELETE from flight WHERE flightNumber = '$btn'";
								$query_run = mysqli_query($con, $Dquery);
								
							}

							if(isset($_GET['btn'])) {
								$btn = $_GET['btn'];
								
								$query = "INSERT into flight_seatarchive SELECT * FROM flight_seat WHERE flightNumber = '$btn' ";
								$query_run = mysqli_query($con, $query);
								
							}
							?>
							<?php
							$con = mysqli_connect("localhost", "root", "", "pars1");
							if(isset($_GET['btn'])) {
								$btn = $_GET['btn'];
								
								$Dquery = "DELETE from flight_seat WHERE flightNumber = '$btn'";
								$query_run = mysqli_query($con, $Dquery);
								header("Location: ../PARS/Table.php");
							}
							
							?>


							<!-- First Section -->
							<section id="first" class="main special">
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
												<th>Apt</th>
												<th>Origin</th>
												<th>Destination</th>
												<th>Date Dep</th>
												<th>Date Arr</th>
												<th>Dep</th>
												<th>Arr</th>
											</tr>
										</thead>
										
										<tbody>

											<?php
												$conn = mysqli_connect("localhost", "root", "", "pars1");
												$sql = "SELECT * from flightarchive ORDER BY 'date' DESC";
												$result = mysqli_query ($conn, $sql);
												$resultcheck = mysqli_num_rows($result);
												
												if ($resultcheck > 0) {
													while ($row = mysqli_fetch_array($result)) {
														echo "<tr><td>" . $row["flightNumber"] . "</td><td>" . $row["flightOrigin"] . "</td><td>" . $row["flightDestination"] . "</td><td>" . $row["dateDepartOrigin"] . "</td><td>"
														. $row["timeDepartOrigin"] . "</td><td>" . $row["dateArriveDestination"] . "</td><td>" . $row["timeArriveDestination"] . 
														"</td></tr>";
													}
												}
												else {
													echo "No results";
												}
												$conn -> close();
											
											?>

										</tbody>

									</table>								
								</div>
											

							</section>
					
				<!-- Footer -->
				<footer id="footer">
					<section>
						
					</section>
					<p class="copyright">&copy; Philippine Cultural College. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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

