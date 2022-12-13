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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

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
										<form method="post" action="add_user-config.php">
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
													<input type="text" name="username" id="username" value="" placeholder="Username" required/>
												</div>
												<div class="col-6 col-12-xsmall">
													<h2>Password</h2>
													<input type="text" name="password" id="password" value="" placeholder="Password" required/>
												</div>
												<div class="col-6">
													<h2>Account Type</h2>
													<select name="userType" onchange="saveValue(this)" id="userType"  >
														<option value="U">User</option>
														<option value="A">Administrator</option>
													</select>
												</div>
												
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" value="Submit" name="add_user"  class="primary" /></li>
														
													</ul>
												</div>
											</div>
										</form>
									</section>
							</section>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Philippine Cultural College. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>

			</div>
			<script type="text/javascript">
				document.getElementById("userFirstName").value = getSavedValue("userFirstName");    // set the value to this input
				document.getElementById("userMiddleName").value = getSavedValue("userMiddleName");   // set the value to this input
				document.getElementById("userLastName").value = getSavedValue("userLastName");    // set the value to this input
				document.getElementById("userType").value = getSavedValue("userType");    // set the value to this input
				
				
				/* Here you can add more inputs to set value. if it's saved */
		
				//Save the value function - save it to localStorage as (ID, VALUE)
				function saveValue(e){
					var id = e.id;  // get the sender's id to save it . 
					var val = e.value; // get the value. 
					localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
				}
		
				//get the saved value function - return the value of "v" from localStorage. 
				function getSavedValue  (v){
					if (!localStorage.getItem(v)) {
						return "";// You can change this to your defualt value. 
					}
					return localStorage.getItem(v);
				}
		</script>
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