<?php
    session_start();
?>

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
            <h1>Assign to Seats</h1>
            <p></p>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <form method="post" action="assign2seatprocess.php">
                    <?php
                        date_default_timezone_set("Asia/Manila");
                        echo "The time is " . date("h:i:sa");

                        $count = 1;
                        $_SESSION['elements'] = json_decode($_POST['str'], true);
                        
                        echo "";
                        foreach ($_SESSION['elements'] as $items) {
                            if ($count !== 1) {
                                echo "<br /><hr /><br />";
                            }
                            echo "<h1>" . $items . "</h1>";

                            ?>
                            
                            <section>
                                <div class="row">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="firstName<?php echo $count; ?>"><h2>First Name</h2></label>
                                        <input type="text" name="firstName<?php echo $count; ?>" id="firstName" value="" placeholder="First Name" required />
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="middleName<?php echo $count; ?>"><h2>Middle Name</h2></label>
                                        <input type="text" name="middleName<?php echo $count; ?>" id="middleName" value="" placeholder="Middle Name" />
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="lastName<?php echo $count; ?>"><h2>Last Name</h2></label>
                                        <input type="text" name="lastName<?php echo $count; ?>" id="lastName" value="" placeholder="Last Name" required />
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="gender<?php echo $count; ?>"><h2>Gender</h2></label>
                                        <select name="gender<?php echo $count; ?>" id="gender">
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="nationality<?php echo $count; ?>"><h2>Nationality</h2></label>
                                        <input type="text" name="nationality<?php echo $count; ?>" id="nationality" value="" placeholder="Nationality" required />
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="age<?php echo $count; ?>"><h2>Age</h2></label>
                                        <input type="text" name="age<?php echo $count; ?>" id="age" value="" placeholder="Age" />
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="birthdate<?php echo $count; ?>"><h2>Birthdate</h2></label>
                                        <input type="date" name="birthdate<?php echo $count; ?>" id="birthdate" value="" placeholder="MM/DD/YYYY" />
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-6 col-12-xsmall">
                                        <label for="email<?php echo $count; ?>"><h2>Email</h2></label>
                                        <input type="email" name="email<?php echo $count; ?>" id="email"
                                        value="" placeholder="Email" />
                                    </div>

                                    <div class="col-6 col-12-xsmall">
                                        <label for="contactNum<?php echo $count; ?>"><h2>Contact Number</h2></label>
                                        <input type="text" name="contactNum<?php echo $count; ?>" id="contactNum" value="" placeholder="************" />
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>"><h2>Passenger Type</h2></label>
                                        <select name="passengerType<?php echo $count; ?>" id="passengerType">
                                            <option value="N">Normal</option>
                                            <option value="U">Unaccompanied Minor</option>
                                            <option value="H">Handicapped</option>
                                            <option value="M">Medically OK for travel</option>
                                        </select>
                                    </div>
                                </div>
                                <br/>
                                <div class="col-4 col-12-xsmall">
                                    <label for="remarks<?php echo $count; ?>"><h2>Remarks</h2></label>
                                    <input type="text" name="remarks<?php echo $count; ?>" id="remarks" value="" placeholder="Remarks" />
                                </div>
                            </section>
                            
                        <?php
                        $count++;
                        }
                        ?>

                    <br>
                    <div class="col-12">
                        <input type="submit" value="Submit" name="seatSubmit" class="button primary fit" />
                    </div>
                </form>
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