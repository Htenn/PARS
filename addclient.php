
<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Client Information - PARS</title>
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
						<h1>P.A.R.S.</h1>
						<p>Client Registration Form</p>
					</header>

				<!-- Main -->
				<div id="main">

					<!-- Content -->
						<section id="content" class="main">

							<!-- Text -->
							<!-- Form -->
								<section>
									<form method="post" action="add_client-config.php">
										<div class="row gtr-uniform">
											<div class="col-4 col-12-xsmall">
												<h2>First Name</h2>
												<input type="text" name="clientFirstName" id="clientFirstName" onchange="saveValue(this)"  value="" placeholder="First Name" required/>
											</div>
											<div class="col-4 col-12-xsmall">	
												<h2>Middle Name</h2>
												<input type="text" name="clientMiddleName" id="clientMiddleName" onchange="saveValue(this)" value="" placeholder="Middle Name" />
											</div>
											<div class="col-4 col-12-xsmall">
												<h2>Last Name</h2>
												<input type="text" name="clientLastName" id="clientLastName" onchange="saveValue(this)" value="" placeholder="Last Name" required/>
											
											</div>
											
											<div class="col-6">
												<h2>Gender</h2>
												<select name="clientGender" onchange="saveValue(this)" id="clientGender">
													<option value="Male">Male</option>
													<option value="Female">Female</option>
													
												</select>
											</div>

											
											<div class="col-6 col-12-xsmall">
												<h2>Birthdate</h2>
												<input type="date" name="clientBirthday" onchange="saveValue(this)" id="clientBirthday" value="" placeholder="MM/DD/YY" />
											</div>

											
											<div class="col-6 col-12-xsmall">
												<h2>Age</h2>
												<input type="text" name="clientAge" id="clientAge" onchange="saveValue(this)" value="" placeholder="Age" />
											</div>

											<div class="col-6 col-12-xsmall">
												<h2>Email</h2>
												<input type="email" name="clientEmail" id="clientEmail" onchange="saveValue(this)" value="" placeholder="Email" />
											</div>

											<div class="col-6 col-12-xsmall">
												<h2>Contact Number</h2>
												<input type="text" name="clientContactNum" id="clientContactNum" onchange="saveValue(this)" value="" placeholder="************" />
											</div>
											<div class="col-6 col-12-xsmall">
												<h2>Nationality</h2>
												<input type="text" name="clientNationality" id="clientNationality" onchange="saveValue(this)" value="" placeholder="Nationality" required/>
											</div>
											
											<div class="col-6 col-12-xsmall">
												<h2>Remarks</h2>
												<input type="text" name="clientRemarks" id="clientRemarks" onchange="saveValue(this)" value="" placeholder="Remarks" />
											</div>
											<div class="col-6 col-12-xsmall">
												<h2>Passenger Type</h2>
												<select name="clientType" onchange="saveValue(this)" id="clientType">
													<option value="Normal">Normal</option>
													<option value="Unaccompanied Minor">Unaccompanied Minor</option>
													<option value="Handicapped">Handicapped</option>
													<option value="Medically OK for travel">Medically OK for travel</option>
													<option value="Senior Citizen">Senior Citizen</option>
													
												</select>
											</div>

											

											
											
										
									</form>
									

                                    <div class="col-12">
										<ul class="actions">
											
											<li><input type="submit" onclick="add_client()" value="Submit" name="add_client" class="primary" /></li>
													
										</ul>
									</div>
									</div>
                                  
								</section>
						</section>
				</div>

				<script type="text/javascript">
					document.getElementById("clientFirstName").value = getSavedValue("clientFirstName");    // set the value to this input
					document.getElementById("clientMiddleName").value = getSavedValue("clientMiddleName");   // set the value to this input
					document.getElementById("clientLastName").value = getSavedValue("clientLastName");    // set the value to this input
					document.getElementById("clientGender").value = getSavedValue("clientGender");   // set the value to this input
					document.getElementById("clientBirthday").value = getSavedValue("clientBirthday");    // set the value to this input
					document.getElementById("clientAge").value = getSavedValue("clientAge");   // set the value to this input
					document.getElementById("clientEmail").value = getSavedValue("clientEmail");   // set the value to this input
					document.getElementById("clientContactNum").value = getSavedValue("clientContactNum");   // set the value to this input
					document.getElementById("clientNationality").value = getSavedValue("clientNationality");   // set the value to this input
					document.getElementById("clientType").value = getSavedValue("clientType");   // set the value to this input
					document.getElementById("clientRemarks").value = getSavedValue("clientRemarks");   // set the value to this input
					
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

					function getdata(Event){
 					 Event.preventDefault()
 					 let chatInput = $('#chat-input').val(); 
 					 $('#result').text(chatInput)
											}
					 // $('#message-send').click(getdata);
					 




				</script>
				
				<!-- Footer -->
					<footer id="footer">
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

