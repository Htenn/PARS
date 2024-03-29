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
		<title>Create User Account - PARS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="icon" href="images/favicon.png">
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<?php
				include 'includes/menubutton.php';
				?>

				<!-- Header -->
					<header id="header">
						<h1>Create User Account</h1>
						<p></p>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">

								<!-- Text -->
								<!-- Form -->
									<section>
										<form method="post" action="add_user-config">
											<div class="row gtr-uniform">
												<div class="col-4 col-12-xsmall">
													<h2>First Name</h2>
													<input type="text" name="userFirstName" id="userFirstName" onchange="saveValue(this)" value="" placeholder="First Name" required/>
												</div>
												<div class="col-4 col-12-xsmall">	
													<h2>Middle Name</h2>
													<input type="text" name="userMiddleName" id="userMiddleName" onchange="saveValue(this)" value="" placeholder="Middle Name" />
												</div>
												<div class="col-4 col-12-xsmall">
													<h2>Last Name</h2>
													<input type="text" name="userLastName" id="userLastName" onchange="saveValue(this)" value="" placeholder="Last Name" required/>
												</div>
												<div class="col-6 col-12-xsmall">
													<h2>Username</h2>
													<input type="text" name="newusername" id="newusername" value="" placeholder="Username" required/>
												</div>
												<div class="col-6 col-12-xsmall">
													<h2>Password</h2>
													<input type="password" name="newpassword" id="newpassword" value="" placeholder="Password" required/>
												</div>
												<div class="col-6 col-12-xsmall">
													<h2>Account Type</h2>
													<select name="userType" id="userType"  >
														<option value="U" selected>User</option>
														<option value="A">Administrator</option>
													</select>
												</div>
											</div>
											<p></p>
											<div class="col-6 col-12-xsmall">
												<input type="submit" value="Confirm" name="add_user" class="button primary fit" />
											</div>
										</form>
									</section>
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