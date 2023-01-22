<?php
include '../../sessionstart.php';
require '../../db.php';
include '../../unset.php';
unsetpnr();
unsetseats();
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Domestic Flights City Pair 2 - PARS</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../../assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="../../assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">
		<?php
			if($_SESSION['session'] == 'A') {
				$menu = '../../adminmenu.php';
			} else {
				$menu = '../../mainmenu.php';
			}

			echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 15px; color: grey;'>
			<ul class='actions'>
				<li><a href=" . $menu . " class='button primary small'>Menu</a></li>
			</ul>
			</div>";

			echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 60px; color: grey;'>
            <ul class='actions'>
                <li><a href='reserve.php?citypair=1' class='button primary small'>Back</a></li>
            </ul>
            </div>";
		?>

		<!-- Header -->
		<header id="header">
			<h1></h1>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="choose" class="main">
				<div class="col-2 col-12-xsmall" style="position: relative; margin-left: auto; margin: right; display: block; width: 25%;">
					<form action="citypair2" method="POST">
						<input type="text" name="search" placeholder="Search" />
						<br>
						<button class="button small" name="Sbtn" type="submit">Search</button>
					</form>
				</div>

				<header class="major">
					<h2>Select City Pair 2</h2>
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
							if (isset($_POST['Sbtn'])) { // Search table display
								$Ssearch = mysqli_real_escape_string($db, $_POST['search']);

								$Ssql = "SELECT * FROM flight WHERE (flightNumber LIKE '%$Ssearch%' OR  Origin LIKE '%$Ssearch%' 
																	OR Destination LIKE '%$Ssearch%' OR dateDepartOrigin LIKE '%$Ssearch%' OR timeDepartOrigin LIKE '%$Ssearch%' 
																	OR dateArriveDestination LIKE '%$Ssearch%' OR timeArriveDestination LIKE '%$Ssearch%') AND Type = 'D'";
								$result = mysqli_query($db, $Ssql);
								$queryResult = mysqli_num_rows($result);

								if ($queryResult > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																			<td>" . $row["flightNumber"] . "</td>
																			<td>" . $row["Origin"] . "</td>
																			<td>" . $row["Destination"] . "</td>
																			<td>" . $row["dateDepartOrigin"] . "</td>
																			<td>" . $row["timeDepartOrigin"] . "</td>
																			<td>" . $row["dateArriveDestination"] . "</td>
																			<td>" . $row["timeArriveDestination"] . "</td>
																			<td>" .
											"<form action='citypair2' method='post'>	
																			<button class='button primary small' name='btn' type='submit' value = " . $row["flightNumber"] . ">Select</button>" .
											"</form>
																			</td>
																			</tr>";
									}
								}
							}


							if (!isset($_POST['Sbtn'])) { // Standard table display
								$sql = "SELECT * from flight WHERE Type = 'D'";
								$result = mysqli_query($db, $sql);
								$resultcheck = mysqli_num_rows($result);

								if ($resultcheck > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																		<td>" . $row["flightNumber"] . "</td>
																		<td>" . $row["Origin"] . "</td>
																		<td>" . $row["Destination"] . "</td>
																		<td>" . $row["dateDepartOrigin"] . "</td>
																		<td>" . $row["timeDepartOrigin"] . "</td>
																		<td>" . $row["dateArriveDestination"] . "</td>
																		<td>" . $row["timeArriveDestination"] . "</td>
																		<td>" .
											"<form action='citypair2' method='post'>
																		<button class='button primary small' name='btn' type='submit' value = " . $row["flightNumber"] . ">Select</button>" .
											"</form>
																		</td>
																		</tr>";
									}
								}
							}

							?>

						</tbody>

					</table>
				</div>

			</section>

			<!-- First Section -->
			<?php
			if (isset($_POST['btn'])) {
				$btn = $_POST['btn'];
				$_SESSION['selectedFlightNum2'] = $btn;

				$query = "SELECT * FROM flight WHERE flightNumber = '$btn' AND Type = 'D'";
				$query_run = mysqli_query($db, $query);

				if (mysqli_num_rows($query_run) > 0) {

					foreach ($query_run as $row) {
						// save to session variables
						$_SESSION['flightOrigin2'] = $row["Origin"];
						$_SESSION['flightDestination2'] = $row["Destination"];
						$_SESSION['dateDepartOrigin2'] = $row["dateDepartOrigin"];
						$_SESSION['timeDepartOrigin2'] = $row["timeDepartOrigin"];
						$_SESSION['dateArriveDestination2'] = $row["dateArriveDestination"];
						$_SESSION['timeArriveDestination2'] = $row["timeArriveDestination"];
					}
					header('location: seatmap?plane=1', true, 301);
				}
			}
			?>
		</div>
	</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
		</footer>

		<!-- Scripts -->
		<script src="../../assets/js/jquery.min.js"></script>
		<script src="../../assets/js/jquery.scrollex.min.js"></script>
		<script src="../../assets/js/jquery.scrolly.min.js"></script>
		<script src="../../assets/js/browser.min.js"></script>
		<script src="../../assets/js/breakpoints.min.js"></script>
		<script src="../../assets/js/util.js"></script>
		<script src="../../assets/js/main.js"></script>
		<script>
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		</script>

</body>

</html>