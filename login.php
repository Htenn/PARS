<?php
	include 'config_login.php';
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Sign In - PARS</title>
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
						<h1>PCC QC Airline Reservation System</h1>
						<p>User Login</p>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<form method="post" action="login">
									<div class="row gtr-uniform">
										<div class="col-6 col-12-xsmall">
											<label for="userID">Username</label>
											<input type="text" name="username" id="username" value="" placeholder="Username" />
										</div>
										<div class="col-6 col-12-xsmall">
											<label for="password">Passcode</label>
											<input type="password" name="password" id="password" value="" placeholder="Passcode" />
										</div>
									</div>
									<p><?php if($errors) {
											echo $errors[0];
									} ?></p>
									<input type="submit" value="LOGIN" name="login" class="button primary fit">
								</form>
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
			<script>
				if (window.history.replaceState) {
					window.history.replaceState(null, null, window.location.href);
				}
			</script>

	</body>
</html>