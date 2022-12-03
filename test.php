<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Generic - Stellar by HTML5 UP</title>
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
        <header id="header">
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <?php
                    date_default_timezone_set("Asia/Manila");
                    echo "The time is " . date("h:i:sa");

                    $elements = json_decode($_POST['str'], true);
                    
                    echo "<form method=\"post\" action=\"\">";
                    foreach ($elements as $items) {
                        $count = 1;
                        ?>

                        <div class="row gtr-uniform">
                            <div class="col-4 col-12-xsmall">
                                <h2>First Name</h2>
                                <input type="text" name="firstName<?php echo $count; ?>" id="firstName" value="" placeholder="First Name" required />
                            </div>
                            <div class="col-4 col-12-xsmall">
                                <h2>Middle Name</h2>
                                <input type="text" name="middleName" id="middleName" value="" placeholder="Middle Name" />
                            </div>
                            <div class="col-4 col-12-xsmall">
                                <h2>Last Name</h2>
                                <input type="text" name="lastName" id="lastName" value="" placeholder="Last Name" required />
                            </div>
                        </div>

                        <div class="col-6">
                            <h2>Gender</h2>
                            <select name="gender" id="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Birthdate</h2>
                            <input type="date" name="bithdate" id="birthdate" value="" placeholder="MM/DD/YYYY" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Age</h2>
                            <input type="text" name="age" id="age" value="" placeholder="Age" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Email</h2>
                            <input type="email" name="email" id="email"
                            value="" placeholder="Email" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Contact Number</h2>
                            <input type="text" name="contactNum" id="contactNum" value="" placeholder="************" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Nationality</h2>
                            <input type="text" name="nationality" id="nationality" value="" placeholder="Nationality" required />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Remarks</h2>
                            <input type="text" name="remarks" id="remarks" value="" placeholder="Remarks" />
                        </div>

                        <div class="col-6 col-12-xsmall">
                            <h2>Passenger Type</h2>
                            <select name="passengerType" id="passengerType">
                                <option value="normal">Normal</option>
                                <option value="minor">Unaccompanied Minor</option>
                                <option value="handicapped">Handicapped</option>
                                <option value="med">Medically OK for travel</option>
                                <option value="sc">Senior Citizen</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <input type="submit" value="Submit" name="submit" class="button primary fit" />
                        </div>

                    <?php
                    }
                    ?>
            </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            
            <p class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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