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
					<h1>All Users</h1>
					<p></p>
				</header>

				<!-- Main -->
					<div id="main">

						<!-- First Section -->
							<section id="OW" class="main special">
								
								<div class="spotlight">
									<div class='content'>
										<div class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>User</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php
														$userQuery = mysqli_query($db, "SELECT * FROM user ORDER BY username");
														

														while($row = mysqli_fetch_array($userQuery)) {
															echo "<tr>";
																echo "<td style='width: 80%; text-align: left;'>" . $row['username'] . "</td>";
																echo "<td>
																	<form action='userlistview' method='get'>
																	<div>
																		<button class='button primary fit small' name='view' type='submit' value = " . $row['username'] . ">View</button>
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
									</div>
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