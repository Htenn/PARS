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
    <title>Passenger Name Record - PARS</title>
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
            <h1>Passenger Name Record</h1>
            <p></p>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                
                    <?php
                    echo "<h2><strong>Seats selected:</strong> "; foreach($_SESSION['seats'] as $seat) { echo $seat . " ";} echo "</h2><br>";

                    if (isset($_POST['str'])) {
                        $_SESSION['seats'] = json_decode($_POST['str'], true);
                        $_SESSION['minSeatCount'] = count($_SESSION['seats']);
                    }

                    if (isset($_SESSION['seats'])) {
                        if (isset(($_GET['passenger']))) {
                            $seatcount = $_GET['passenger'];
                        }
                        else {
                            $seatcount = count($_SESSION['seats']);
                        }

                        $minSeatCount = $_SESSION['minSeatCount'];
                        echo "<form method='get' action='pnr'>";
                            echo "<div class='row'>";
                                echo "<div class='col-3 col-12-xsmall'>";
                                    echo "<label for='passenger'>Number of Passenger/s</label><input type='number' name='passenger' id='numcount' value='$seatcount' min='$minSeatCount'/>";
                                echo "</div>";
                                echo "<div class='col-1 col-12-xsmall'>";
                                    echo "<label><br></label><input type='submit' class='button fit' value='OK'>";
                                echo "</div>";
                            echo "</div>";
                        echo "</form>";

                        echo "<p><br></p>";

                        echo "<form method='post' action='pnrprocess'>";
                        
                        $count = 1;

                        for ($count = 1; $count <= $seatcount; $count++) {
                            if ($count !== 1) {
                                echo "<br /><hr /><br />";
                            }
                    ?>
                            
                            <section>
                                <h1>Passenger <?php echo $count; if($count == 1) { echo " / Client"; }?></h1>

                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="firstName<?php echo $count; ?>">
                                            <h2>First Name *</h2>
                                        </label>
                                        <input type="text" name="firstName<?php echo $count; ?>" id="firstName" value="" placeholder="First Name" required />
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="middleName<?php echo $count; ?>">
                                            <h2>Middle Name</h2>
                                        </label>
                                        <input type="text" name="middleName<?php echo $count; ?>" id="middleName" value="" placeholder="Middle Name" />
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="lastName<?php echo $count; ?>">
                                            <h2>Last Name *</h2>
                                        </label>
                                        <input type="text" name="lastName<?php echo $count; ?>" id="lastName" value="" placeholder="Last Name" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="gender<?php echo $count; ?>">
                                            <h2>Gender *</h2>
                                        </label>
                                        <select name="gender<?php echo $count; ?>" id="gender">
                                            <option value="M" selected>Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="nationality<?php echo $count; ?>">
                                            <h2>Nationality *</h2>
                                        </label>
                                        <input type="text" name="nationality<?php echo $count; ?>" id="nationality" value="" placeholder="Nationality" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="age<?php echo $count; ?>">
                                            <h2>Age *</h2>
                                        </label>
                                        <input type="text" name="age<?php echo $count; ?>" id="age" value="" placeholder="Age" required/>
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="birthdate<?php echo $count; ?>">
                                            <h2>Birthdate *</h2>
                                        </label>
                                        <input type="date" name="birthdate<?php echo $count; ?>" id="birthdate" value="" placeholder="MM/DD/YYYY" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label for="email<?php echo $count; ?>">
                                            <h2>Email *</h2>
                                        </label>
                                        <input type="email" name="email<?php echo $count; ?>" id="email" value="" placeholder="Email" />
                                    </div>

                                    <div class="col-6 col-12-xsmall">
                                        <label for="contactNum<?php echo $count; ?>">
                                            <h2>Contact Number *</h2>
                                        </label>
                                        <input type="text" name="contactNum<?php echo $count; ?>" id="contactNum" value="" placeholder="************" />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>">
                                            <h2>Passenger Type *</h2>
                                        </label>
                                        <select name="passengerType<?php echo $count; ?>" id="passengerType">
                                            <option value="N" selected>Normal</option>
                                            <option value="U">Unaccompanied Minor</option>
                                            <option value="H">Handicapped</option>
                                            <option value="M">Medically OK for travel</option>
                                        </select>
                                    </div>
                                </div>
                                <br />
                                <div class="col-4 col-12-xsmall">
                                    <label for="remarks<?php echo $count; ?>">
                                        <h2>Remarks</h2>
                                    </label>
                                    <input type="text" name="remarks<?php echo $count; ?>" id="remarks" value="" placeholder="Remarks" />
                                </div>
                            </section>
                            <br>

                    <?php
                        }
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['seats'])) {
                    ?>
                        <div class="col-12">
                            <input type="submit" value="Continue" name="seatSubmit" class="button primary fit" />
                        </div>
                    <?php
                    }
                    ?>

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