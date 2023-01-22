<?php
	session_start();
    require 'db.php';
    $errors = array();

    if (isset($_POST['confirm'])) {
        $password1 = mysqli_real_escape_string($db, $_POST['password1']);
        $password2 = mysqli_real_escape_string($db, $_POST['password2']);

        if ($password1 != $password2) {
            array_unshift($errors, "The two passwords do not match");
        }
        elseif (empty($password1) || empty($password2)){
            array_unshift($errors, "Password is required");
        }
        elseif ($password1 == $password2) {
			$password = md5($password2);
            $updateQuery = "UPDATE user SET password = '$password' WHERE userID = " . $_SESSION['changepassID'];
            mysqli_query($db, $updateQuery);

            $deleteQuery = "DELETE FROM user_1stpass WHERE userID = " . $_SESSION['changepassID'];
            mysqli_query($db, $deleteQuery);
			unset($_SESSION['changepassID']);

            header('location: mainmenu.php');
        }

    }
?>
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Change Password - PARS</title>
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
						<h1>Enter A New Password</h1>
						<p></p>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Content -->
							<section id="content" class="main">
								<form method="post" action="changepassword">
									<div class="row">
										<div class="col-12 col-12-xsmall">
											<label for="password1">New Password</label>
											<input type="password" name="password1" id="password1" value="" placeholder="Username" />
										</div>
                                    </div>
									<br/>
                                    <div class="row">
										<div class="col-12 col-12-xsmall">
											<label for="password2">Confirm New Password</label>
											<input type="password" name="password2" id="password2" value="" placeholder="Passcode" />
										</div>
									</div>
									<p><?php if($errors) {
											echo $errors[0];
									} ?></p>
									<input type="submit" value="CONFIRM" name="confirm" class="button fit">
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