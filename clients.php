<?php
session_start();
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Clients - PARS</title>
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
			<h1>Clients</h1>
			<p></p>
		</header>

		<!-- Main -->
		<div id="main">

			<!-- Introduction -->
			<section id="choose" class="main">
				<div class="col-2 col-12-xsmall" style="position: relative; margin-left: auto; margin: right; display: block; width: 25%;">
					<form action="clients.php#table" method="POST">
						<input type="text" name="search" placeholder="Search" />
						<br>
						<button class="button primary small" name="Sbtn" type="submit">Search</button>
					</form>
				</div>

				<header class="major">
					<h2>Current Clients and Passengers</h2>
				</header>

				<div id='table' class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
								<th>Name</th>
								<th>Gender</th>
								<th>Nationality</th>
								<th>Age</th>
								<th>Birthdate</th>
								<th>Email</th>
								<th>Contact Num</th>
								<th>Passenger Options</th>
							</tr>
						</thead>

						<tbody>
							<!-- SEARCH -->
							<?php
							if (isset($_POST['Sbtn'])) {
								$conn = mysqli_connect("localhost", "root", "", "pars");
								$Ssearch = mysqli_real_escape_string($conn, $_POST['search']);

								$Ssql = "SELECT * FROM client WHERE clientFirstName LIKE '%$Ssearch%' 
																	OR clientMiddleName LIKE '%$Ssearch%' OR clientLastName LIKE '%$Ssearch%' OR clientGender LIKE '%$Ssearch%' OR clientAge LIKE '%$Ssearch%' OR clientEmail LIKE '%$Ssearch%' OR clientContactNum LIKE '%$Ssearch%' OR clientNationality LIKE '%$Ssearch%' ORDER BY clientFirstName";
								$result = mysqli_query($conn, $Ssql);
								$queryResult = mysqli_num_rows($result);

								if ($queryResult > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																			<td>" . $row["clientFirstName"] . " " . $row['clientMiddleName'] . " " . $row['clientLastName'] . "</td>
																			<td>" . $row["clientGender"] . "</td>
																			<td>" . $row["clientNationality"] . "</td>
																			<td>" . $row["clientAge"] . "</td>
																			<td>" . $row["clientBirthday"] . "</td>
																			<td>" . $row["clientEmail"] . "</td>
																			<td>" . $row["clientContactNum"] . "</td>
																			<td>" . $row["clientType"] . "</td>
																			<td>" .
											"<form action='clients.php#conf' method='post'>	
																			<button class='button primary small' name='btn' type='submit' value = " . $row["clientID"] . ">Select</button>" .
											"</form>
																			</td>
																			</tr>";
									}
								} else {
									echo "No results";
								}

								// PASSENGER
								$Ssql = "SELECT * FROM passenger WHERE passengerFirstName LIKE '%$Ssearch%' 
																	OR passengerMiddleName LIKE '%$Ssearch%' OR passengerLastName LIKE '%$Ssearch%' OR passengerGender LIKE '%$Ssearch%' OR passengerAge LIKE '%$Ssearch%' OR passengerEmail LIKE '%$Ssearch%' OR passengerContactNum LIKE '%$Ssearch%' OR passengerNationality LIKE '%$Ssearch%' ORDER BY passengerFirstName";
								$result = mysqli_query($conn, $Ssql);
								$queryResult = mysqli_num_rows($result);

								if ($queryResult > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																			<td>" . $row["passengerFirstName"] . " " . $row['passengerMiddleName'] . " " . $row['passengerLastName'] . "</td>
																			<td>" . $row["passengerGender"] . "</td>
																			<td>" . $row["passengerNationality"] . "</td>
																			<td>" . $row["passengerAge"] . "</td>
																			<td>" . $row["passengerBirthday"] . "</td>
																			<td>" . $row["passengerEmail"] . "</td>
																			<td>" . $row["passengerContactNum"] . "</td>
																			<td>" . $row["passengerType"] . "</td>
																			<td>" .
											"<form action='clients.php#conf' method='post'>	
																			<button class='button primary small' name='pbtn' type='submit' value = " . $row["passengerID"] . ">Select</button>" .
											"</form>
																			</td>
																			</tr>";
									}
								} else {
									echo "No results";
								}
							}


							// NORMAL DISPLAY TABLE
							if (!isset($_POST['Sbtn'])) {
								$conn = mysqli_connect("localhost", "root", "", "pars");

								//clients
								$sql = "SELECT * from client";
								$result = mysqli_query($conn, $sql);
								$resultcheck = mysqli_num_rows($result);

								if ($resultcheck > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																		<td>" . $row["clientFirstName"] . " " . $row['clientMiddleName'] . " " . $row['clientLastName'] . "</td>
																		<td>" . $row["clientGender"] . "</td>
																		<td>" . $row["clientNationality"] . "</td>
																		<td>" . $row["clientAge"] . "</td>
																		<td>" . $row["clientBirthday"] . "</td>
																		<td>" . $row["clientEmail"] . "</td>
																		<td>" . $row["clientContactNum"] . "</td>
																		<td>" . $row["clientType"] . "</td>
																		<td>" .
											"<form action='clients.php#conf' method='post'>
																		<button class='button primary small' name='btn' type='submit' value = " . $row["clientID"] . ">Edit</button>" .
											"</form>
																		</td>
																		</tr>";
									}
								} else {
									echo "No results";
								}

								// passengers
								$sql = "SELECT * from passenger";
								$result = mysqli_query($conn, $sql);
								$resultcheck = mysqli_num_rows($result);

								if ($resultcheck > 0) {
									while ($row = mysqli_fetch_array($result)) {
										echo "<tr>
																		<td>" . $row["passengerFirstName"] . " " . $row['passengerMiddleName'] . " " . $row['passengerLastName'] . "</td>
																		<td>" . $row["passengerGender"] . "</td>
																		<td>" . $row["passengerNationality"] . "</td>
																		<td>" . $row["passengerAge"] . "</td>
																		<td>" . $row["passengerBirthday"] . "</td>
																		<td>" . $row["passengerEmail"] . "</td>
																		<td>" . $row["passengerContactNum"] . "</td>
																		<td>" . $row["passengerType"] . "</td>
																		<td>" .
											"<form action='clients.php#conf' method='post'>
																		<button class='button primary small' name='pbtn' type='submit' value = " . $row["passengerID"] . ">Edit</button>" .
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
			$con = mysqli_connect("localhost", "root", "", "pars");
			if (isset($_POST['btn'])) {
			?>
				<section id="conf" class="main special">
					<div class="spotlight">
						<div class="content">
							<form action='clients.php' method='post'>
								<?php

								$btn = $_POST['btn'];

								$query = "SELECT * FROM client WHERE clientID = $btn LIMIT 1";
								$query_run = mysqli_query($con, $query);

								if (mysqli_num_rows($query_run) > 0) {

									foreach ($query_run as $row) {
								?>
										<input type='hidden' name='id' value="<?php echo $btn; ?>">
										<div class="row">
											<div class="col-4 col-12-xsmall">
												<label for="firstName">
													<h2>First Name</h2>
												</label>
												<input type="text" name="firstName" id="firstName" value="<?= $row["clientFirstName"]; ?>" placeholder="First Name" required />
											</div>
											<div class="col-4 col-12-xsmall">
												<label for="middleName">
													<h2>Middle Name</h2>
												</label>
												<input type="text" name="middleName" id="middleName" value="<?= $row["clientMiddleName"]; ?>" placeholder="Middle Name" />
											</div>
											<div class="col-4 col-12-xsmall">
												<label for="lastName">
													<h2>Last Name</h2>
												</label>
												<input type="text" name="lastName" id="lastName" value="<?= $row["clientLastName"]; ?>" placeholder="Last Name" required />
											</div>
										</div>
										<p></p>
										<div class='row'>
											<div class="col-4 col-12-xsmall">
												<label for="gender">
													<h2>Gender</h2>
												</label>
												<select name="gender" id="gender">
													<option value="M" <?php if ($row['clientGender'] == 'M') {
																			echo 'selected';
																		} ?>>Male</option>
													<option value="F" <?php if ($row['clientGender'] == 'F') {
																			echo 'selected';
																		} ?>>Female</option>
												</select>
											</div>
											<div class="col-4 col-12-xsmall">
												<label for="nationality">
													<h2>Nationality</h2>
												</label>
												<input type="text" name="nationality" id="nationality" value="<?= $row["clientNationality"]; ?>" placeholder="Nationality" required />
											</div>
										</div>
										<p></p>
										<div class="row">
											<div class="col-4 col-12-xsmall">
												<label for="age">
													<h2>Age</h2>
												</label>
												<input type="text" name="age" id="age" value="<?= $row["clientAge"]; ?>" placeholder="Age" />
											</div>

											<div class="col-4 col-12-xsmall">
												<label for="birthdate">
													<h2>Birthdate</h2>
												</label>
												<input type="date" name="birthdate" id="birthdate" value="<?= $row["clientBirthday"]; ?>" placeholder="MM/DD/YYYY" />
											</div>
										</div>
										<p></p>
										<div class="row">
											<div class="col-6 col-12-xsmall">
												<label for="email">
													<h2>Email</h2>
												</label>
												<input type="email" name="email" id="email" value="<?= $row["clientEmail"]; ?>" placeholder="Email" />
											</div>

											<div class="col-6 col-12-xsmall">
												<label for="contactNum">
													<h2>Contact Number</h2>
												</label>
												<input type="text" name="contactNum" id="contactNum" value="<?= $row["clientContactNum"]; ?>" placeholder="************" />
											</div>
										</div>
										<p></p>
										<div class="row">
											<div class="col-4 col-12-xsmall">
												<label for="clientType<?php echo $count; ?>">
													<h2>Passenger Type</h2>
												</label>
												<select name="clientType" id="clientType">
													<option value="N" <?php if ($row['clientType'] == 'N') {
																			echo 'selected';
																		} ?>>Normal</option>
													<option value="U" <?php if ($row['clientType'] == 'U') {
																			echo 'selected';
																		} ?>>Unaccompanied Minor</option>
													<option value="H" <?php if ($row['clientType'] == 'H') {
																			echo 'selected';
																		} ?>>Handicapped</option>
													<option value="M" <?php if ($row['clientType'] == 'M') {
																			echo 'selected';
																		} ?>>Medically OK for travel</option>
												</select>
											</div>
										</div>

							<?php
									}
								} else {
									echo "no result";
								}
							}
							?>

							<!--  PASSENGER  -->
							<?php
							$con = mysqli_connect("localhost", "root", "", "pars");
							if (isset($_POST['pbtn'])) {
							?>
								<section id="conf" class="main special">
									<div class="spotlight">
										<div class="content">
											<form action='clients.php' method='post'>
												<?php

												$btn = $_POST['pbtn'];

												$query = "SELECT * FROM passenger WHERE passengerID = $btn LIMIT 1";
												$query_run = mysqli_query($con, $query);

												if (mysqli_num_rows($query_run) > 0) {

													foreach ($query_run as $row) {
												?>
														<input type='hidden' name='id' value="<?php echo $btn; ?>">
														<div class="row">
															<div class="col-4 col-12-xsmall">
																<label for="firstName">
																	<h2>First Name</h2>
																</label>
																<input type="text" name="firstName" id="firstName" value="<?= $row["passengerFirstName"]; ?>" placeholder="First Name" required />
															</div>
															<div class="col-4 col-12-xsmall">
																<label for="middleName">
																	<h2>Middle Name</h2>
																</label>
																<input type="text" name="middleName" id="middleName" value="<?= $row["passengerMiddleName"]; ?>" placeholder="Middle Name" />
															</div>
															<div class="col-4 col-12-xsmall">
																<label for="lastName">
																	<h2>Last Name</h2>
																</label>
																<input type="text" name="lastName" id="lastName" value="<?= $row["passengerLastName"]; ?>" placeholder="Last Name" required />
															</div>
														</div>
														<p></p>
														<div class='row'>
															<div class="col-4 col-12-xsmall">
																<label for="gender">
																	<h2>Gender</h2>
																</label>
																<select name="gender" id="gender">
																	<option value="M" <?php if ($row['passengerGender'] == 'M') {
																							echo 'selected';
																						} ?>>Male</option>
																	<option value="F" <?php if ($row['passengerGender'] == 'F') {
																							echo 'selected';
																						} ?>>Female</option>
																</select>
															</div>
															<div class="col-4 col-12-xsmall">
																<label for="nationality">
																	<h2>Nationality</h2>
																</label>
																<input type="text" name="nationality" id="nationality" value="<?= $row["passengerNationality"]; ?>" placeholder="Nationality" required />
															</div>
														</div>
														<p></p>
														<div class="row">
															<div class="col-4 col-12-xsmall">
																<label for="age">
																	<h2>Age</h2>
																</label>
																<input type="text" name="age" id="age" value="<?= $row["passengerAge"]; ?>" placeholder="Age" />
															</div>

															<div class="col-4 col-12-xsmall">
																<label for="birthdate">
																	<h2>Birthdate</h2>
																</label>
																<input type="date" name="birthdate" id="birthdate" value="<?= $row["passengerBirthday"]; ?>" placeholder="MM/DD/YYYY" />
															</div>
														</div>
														<p></p>
														<div class="row">
															<div class="col-6 col-12-xsmall">
																<label for="email">
																	<h2>Email</h2>
																</label>
																<input type="email" name="email" id="email" value="<?= $row["passengerEmail"]; ?>" placeholder="Email" />
															</div>

															<div class="col-6 col-12-xsmall">
																<label for="contactNum">
																	<h2>Contact Number</h2>
																</label>
																<input type="text" name="contactNum" id="contactNum" value="<?= $row["passengerContactNum"]; ?>" placeholder="************" />
															</div>
														</div>
														<p></p>
														<div class="row">
															<div class="col-4 col-12-xsmall">
																<label for="passengerType<?php echo $count; ?>">
																	<h2>Passenger Type</h2>
																</label>
																<select name="clientType" id="passengerType">
																	<option value="N" <?php if ($row['passengerType'] == 'N') {
																							echo 'selected';
																						} ?>>Normal</option>
																	<option value="U" <?php if ($row['passengerType'] == 'U') {
																							echo 'selected';
																						} ?>>Unaccompanied Minor</option>
																	<option value="H" <?php if ($row['passengerType'] == 'H') {
																							echo 'selected';
																						} ?>>Handicapped</option>
																	<option value="M" <?php if ($row['passengerType'] == 'M') {
																							echo 'selected';
																						} ?>>Medically OK for travel</option>
																</select>
															</div>
														</div>

											<?php
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

										<p></p>
										<div class="col-6 col-12-xsmall">
											<input type='submit' name='save' class='button primary fit' value='Save' />
										</div>
							</form>
						<?php
									}
						?>


						<!--  PASSENGER  -->
						<?php
						if (isset($_POST['pbtn'])) {
						?>

							<p></p>
							<div class="col-6 col-12-xsmall">
								<input type='submit' name='psave' class='button primary fit' value='Save' />
							</div>
							</form>
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

		<?php
		if (isset($_POST['save'])) {
			$db = mysqli_connect('localhost', 'root', '', 'pars');

			$id = mysqli_real_escape_string($db, $_POST['id']);
			$id = intval($id);
			$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
			$middleName = mysqli_real_escape_string($db, $_POST['middleName']);
			$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
			$gender = mysqli_real_escape_string($db, $_POST['gender']);
			$nationality = mysqli_real_escape_string($db, $_POST['nationality']);
			$age = mysqli_real_escape_string($db, $_POST['age']);
			$birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$contactNum = mysqli_real_escape_string($db, $_POST['contactNum']);
			$clientType = mysqli_real_escape_string($db, $_POST['clientType']);


			$updateQuery = "UPDATE client SET 
					clientFirstName = '" . $firstName . "',
					clientMiddleName = '" . $middleName . "',
					clientLastName = '" . $lastName . "', 
					clientGender = '" . $gender . "', 
					clientNationality = '" . $nationality . "', 
					clientAge = '" . $age . "', 
					clientBirthday = '" . $birthdate . "', 
					clientEmail = '" . $email . "', 
					clientContactNum = '" . $contactNum . "', 
					clientType = '" . $clientType . "' 
					WHERE clientID = " . $id;

			mysqli_query($db, $updateQuery);

			echo "<script>alert('Changes have been saved!');</script>";
			header("Refresh:0");
		}
		?>

		<!--  PASSENGER  -->
		<?php
		if (isset($_POST['psave'])) {
			$db = mysqli_connect('localhost', 'root', '', 'pars');

			$id = mysqli_real_escape_string($db, $_POST['id']);
			$id = intval($id);
			$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
			$middleName = mysqli_real_escape_string($db, $_POST['middleName']);
			$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
			$gender = mysqli_real_escape_string($db, $_POST['gender']);
			$nationality = mysqli_real_escape_string($db, $_POST['nationality']);
			$age = mysqli_real_escape_string($db, $_POST['age']);
			$birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$contactNum = mysqli_real_escape_string($db, $_POST['contactNum']);
			$clientType = mysqli_real_escape_string($db, $_POST['clientType']);


			$updateQuery = "UPDATE passenger SET 
					passengerFirstName = '" . $firstName . "',
					passengerMiddleName = '" . $middleName . "',
					passengerLastName = '" . $lastName . "', 
					passengerGender = '" . $gender . "', 
					passengerNationality = '" . $nationality . "', 
					passengerAge = '" . $age . "', 
					passengerBirthday = '" . $birthdate . "', 
					passengerEmail = '" . $email . "', 
					passengerContactNum = '" . $contactNum . "', 
					passengerType = '" . $clientType . "' 
					WHERE passengerID = " . $id;

			mysqli_query($db, $updateQuery);

			echo "<script>alert('Changes have been saved!');</script>";
			header("Refresh:0");
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