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
                                    echo "<label><br></label><input type='submit' class='button fit' value='Apply'>";
                                echo "</div>";
                            echo "</div>";
                        echo "</form>";

                        echo "<p><br></p>";

                        echo "<form method='post' action='pnrprocess'>";

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
                                            <option value="ADT" selected>ADT</option> <!--Adult-->
                                            <option value="CHD">CHD</option> <!--Child-->
                                            <option value="SRC">SRC</option> <!--Senior Citizen-->
                                            <option value="UNN">UNN</option> <!--Unaccompanied Child-->
                                            <option value="UNMR">UNMR</option> <!--Unaccompanied Minor-->
                                            <option value="INF">INF</option> <!--Infant without a seat-->
                                            <option value="INS">INS</option> <!--Infant with a seat-->
                                        </select>
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>">
                                            <h2>Specific Passenger Option</h2>
                                        </label>
                                        <select name="passengerOption<?php echo $count; ?>" id="passengerOption">
                                            <option value="" disabled selected hidden></option>
                                            <option value="">None</option> <!--None-->
                                            <option value="PWD">PWD</option> <!--Person with disability-->
                                            <option value="M">M</option> <!--Medically OK for travel-->
                                        </select>
                                    </div>
                                </div>
                                <br />
                                    <label><h2>Special Service Requests</h2></label>
                                <div class="row gtr-uniform">
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrA<?php echo $count; ?>">
                                            <option value="" disabled selected hidden>Disability</option>
                                            <option value="">None</option>
                                            <option value="BLND">BLND</option> <!--Blind-->
                                            <option value="DEAF">DEAF</option> <!--Deaf-->
                                            <option value="BLND DEAF">BLND DEAF</option> <!--Blind and deaf-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrB<?php echo $count; ?>">
                                            <option value="" disabled selected hidden>Wheelchair</option>
                                            <option value="">None</option>
                                            <option value="WCHC">WCHC</option> <!--Wheelchair is needed - traveler is completely immobile-->
                                            <option value="WCHR">WCHR</option> <!--Wheelchair is needed - traveler can ascend/descend stairs-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrC<?php echo $count; ?>">
                                            <option value="" disabled selected hidden>Meal</option>
                                            <option value="">None</option>
                                            <option value="AVML">AVML</option>
                                            <option value="BBML">BBML</option>
                                            <option value="BLML">BLML</option>
                                            <option value="CHML">CHML</option>
                                            <option value="DBML">DBML</option>
                                            <option value="FPML">FPML</option>
                                            <option value="GFML">GFML</option>
                                            <option value="HFML">HFML</option>
                                            <option value="HNML">HNML</option>
                                            <option value="KSML">KSML</option>
                                            <option value="LCML">LCML</option>
                                            <option value="LFML">LFML</option>
                                            <option value="LPML">LPML</option>
                                            <option value="LSML">LSML</option>
                                            <option value="MOML">MOML</option>
                                            <option value="NLML">NLML</option>
                                            <option value="ORML">ORML</option>
                                            <option value="PRML">PRML</option>
                                            <option value="RVML">RVML</option>
                                            <option value="SFML">SFML</option>
                                            <option value="SPML">SPML</option>
                                            <option value="VGML">VGML</option>
                                            <option value="VLML">VLML</option>
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall tooltip">
                                        <span class='tooltiptext'>Separate codes with a space</span>
                                        <input type="text" name="ssrD<?php echo $count; ?>" value="" placeholder="Others" />
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

                        $_SESSION['seatcount'] = $seatcount;
                    }

                    ?>
                    <?php
                    if (isset($_SESSION['seats'])) {
                    ?>
                        <div class="col-12">
                            <input type="submit" value="Continue" name="pnrSubmit" class="button primary fit" />
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