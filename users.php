<?php
include 'sessionstart.php';
require 'db.php';
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Users - PARS</title>
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
			<h1>Users</h1>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="choose" class="main">
				<div class="col-2 col-12-xsmall" style="position: relative; margin-left: auto; margin: right; display: block; width: 25%;">
					<form action="users#table" method="POST">
						<input type="text" name="search" placeholder="Search" />
						<br>
						<button class="button primary small" name="Sbtn" type="submit">Search</button>
					</form>
				</div>

				<header class="major">
					<h2>Current Users</h2>
				</header>

				<div id='table' class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Username</th>
							</tr>
						</thead>

						<tbody>
							<!-- SEARCH -->
							<?php
							if (isset($_POST['Sbtn'])) {
								$Ssearch = mysqli_real_escape_string($db, $_POST['search']);

								$Ssql = "SELECT * FROM user WHERE userFirstName LIKE '%$Ssearch%' 
																	OR userMiddleName LIKE '%$Ssearch%' OR userLastName LIKE '%$Ssearch%' OR username LIKE '%$Ssearch%' AND userType = 'U' ORDER BY userLastName";
								$result = mysqli_query($db, $Ssql);
								$queryResult = mysqli_num_rows($result);

								if ($queryResult > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																			<td>" . $row["userLastName"] . "</td>
																			<td>" . $row["userFirstName"] . "</td>
																			<td>" . $row["userMiddleName"] . "</td>
																			<td>" . $row["username"] . "</td>
																			<td>" .
											"<form action='users#conf' method='post'>	
																			<button class='button primary small' name='btn' type='submit' value = " . $row["userID"] . ">Select</button>" .
											"</form>
																			</td>
																			</tr>";
									}
								} else {
									echo "No results";
								}
							}


							if (!isset($_POST['Sbtn'])) {
								$sql = "SELECT * from user WHERE userType = 'U' ORDER BY userLastName";
								$result = mysqli_query($db, $sql);
								$resultcheck = mysqli_num_rows($result);

								if ($resultcheck > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																		<td>" . $row["userLastName"] . "</td>
																		<td>" . $row["userFirstName"] . "</td>
																		<td>" . $row["userMiddleName"] . "</td>
																		<td>" . $row["username"] . "</td>
																		<td>" .
											"<form action='users#conf' method='post'>
																		<button class='button primary small' name='btn' type='submit' value = " . $row["userID"] . ">Edit</button>" .
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
			<?php
			if (isset($_POST['btn'])) {
			?>
				<section id="conf" class="main special">
					<div class="spotlight">
						<div class="content">
							<form action='users' method='post'>
								<?php

								$btn = $_POST['btn'];

								$query = "SELECT * FROM user WHERE userID = $btn AND userType = 'U'";
								$query_run = mysqli_query($db, $query);

								if (mysqli_num_rows($query_run) > 0) {

									foreach ($query_run as $row) {
								?>
										<input type='hidden' name='id' value="<?php echo $btn; ?>">
										<div class="row">
											<div class="col-4 col-12-xsmall">
												<label for="firstName">
													<h2>First Name</h2>
												</label>
												<input type="text" name="firstName" id="firstName" value="<?= $row["userFirstName"]; ?>" placeholder="First Name" required />
											</div>
											<div class="col-4 col-12-xsmall">
												<label for="middleName">
													<h2>Middle Name</h2>
												</label>
												<input type="text" name="middleName" id="middleName" value="<?= $row["userMiddleName"]; ?>" placeholder="Middle Name" />
											</div>
											<div class="col-4 col-12-xsmall">
												<label for="lastName">
													<h2>Last Name</h2>
												</label>
												<input type="text" name="lastName" id="lastName" value="<?= $row["userLastName"]; ?>" placeholder="Last Name" required />
											</div>
										</div>
										<p></p>
										<div class='row'>
											<div class="col-6 col-12-xsmall">
												<label for="userName">
													<h2>Username</h2>
												</label>
												<input type="text" name="username" id="username" value="<?= $row["username"]; ?>" placeholder="Username" required />
											</div>
											<div class="col-6 col-12-xsmall">
												<label for="password">
													<h2>Password</h2>
												</label>
												<input type="password" name="password" id="password" value="" placeholder="Enter new password" />
											</div>
										</div>


							<?php
									}
								}
							}
							?>

						</div>

					</div>

					<?php
					if (isset($_POST['btn'])) {
					?>

						<p></p>
						<div class="row">
							<div class="col-6 col-12-xsmall">
								<input type='submit' name='save' class='button primary fit' value='Save' />
							</div>

							<div class="col-6 col-12-xsmall">
								<input type='submit' name='delete' class='button fit' value='Delete' />
							</div>
						</div>
						</form>
					<?php
					}
					?>


				</section>
		</div>

		<!-- Footer -->
		<footer id="footer">
			<p class="copyright">&copy; Philippine Cultural College</p>
		</footer>

		<?php
		if (isset($_POST['save'])) {
			$id = mysqli_real_escape_string($db, $_POST['id']);
			$id = intval($id);
			$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
			$middleName = mysqli_real_escape_string($db, $_POST['middleName']);
			$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
			$username = mysqli_real_escape_string($db, $_POST['username']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			$password = md5($password);

			$updateQuery = "UPDATE user SET 
					userFirstName = '" . $firstName . "',
					userMiddleName = '" . $middleName . "',
					userLastName = '" . $lastName . "', 
					username = '" . $username . "', 
					password = '" . $password . "'
					WHERE userID = " . $id;

			mysqli_query($db, $updateQuery);

			$selectQuery = "SELECT userID FROM user WHERE (userFirstName = '$firstName' AND userMiddleName = '$middleName' AND userlastName = '$lastName' AND username = '$username')";
			$selectResult = mysqli_query($db, $selectQuery);
			$ID = mysqli_fetch_assoc($selectResult);
			$ID = intval($ID['userID']);

			$checkQuery = "SELECT userID FROM user_1stpass WHERE userID = $ID";
			$checkResult = mysqli_query($db, $selectQuery);
			if (mysqli_num_rows($checkResult) > 0) {
				$passQuery = "INSERT INTO user_1stpass (userID) VALUES ($ID)";
				mysqli_query($db, $passQuery);

				echo "<script> alert('Changes has been saved!'); window.location= 'users.php'</script>";
			}
			else {
				echo "<script> alert('Changes has been saved!'); window.location= 'users.php'</script>";
			}
		}

		if (isset($_POST['delete'])) {
			$id = mysqli_real_escape_string($db, $_POST['id']);
			$id = intval($id);

			$deleteQuery = "DELETE FROM user WHERE userID = " . $id;
			mysqli_query($db, $deleteQuery);

			echo "<script> alert('User has been deleted!'); window.location= 'users.php'</script>";
		}
		?>

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