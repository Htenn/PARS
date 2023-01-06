<?php
include 'sessionstart.php';

if (isset($_POST['str'])) {
    $_SESSION['seats'] = json_decode($_POST['str'], true);
    $_SESSION['minSeatCount'] = count($_SESSION['seats']);
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

                        echo "<form method='post' action='pnrprocess' id='pnrform'>";

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
                                        <input type="text" name="firstName<?php echo $count; ?>" id="firstName" value="<?php if(isset($_SESSION['firstName' . $count])) {echo $_SESSION['firstName' . $count];} ?>" placeholder="First Name" required />
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
                                    <div class="col-3 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>">
                                            <h2>Passenger Type *</h2>
                                        </label>
                                        <select name="passengerType<?php echo $count; ?>" id="passengerType">
                                            <option value="ADT" selected>ADT</option> <!--Adult-->
                                            <option value="CHD">CHD</option> <!--Child-->
                                            <option value="SRC">SRC</option> <!--Senior Citizen-->
                                            <option value="UNN">UNN</option> <!--Unaccompanied Child-->
                                            <option value="UAM">UAM</option> <!--Unaccompanied Minor-->
                                            <option value="INF">INF</option> <!--Infant without a seat-->
                                            <option value="INS">INS</option> <!--Infant with a seat-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>">
                                            <h2>Seat *</h2>
                                        </label>
                                        <select name="seat<?php echo $count; ?>" id="seat">
                                            <option value ="" selected hidden>Select seat</option>
                                            <?php
                                                foreach ($_SESSION['seats'] as $seat) {
                                                    echo "<option value='$seat'>" . $seat . "</option>";
                                                }
                                            ?>
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
                                            <option value="DPNA">DPNA</option> <!--Disabled passenger with intellectual or developmental disability needing assistance-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrB<?php echo $count; ?>">
                                            <option value="" disabled selected hidden>Wheelchair</option>
                                            <option value="">None</option>
                                            <option value="WCHC">WCHC</option> <!--Wheelchair is needed - traveler is completely immobile-->
                                            <option value="WCHR">WCHR</option> <!--Wheelchair is needed - traveler can ascend/descend stairs-->
                                            <option value="WCHS">WCHS</option> <!--Wheelchair is needed - traveler can walk short distances, but not up or down stairs-->
                                            <option value="WCMP">WCMP</option> <!--Passenger is traveling with a manual wheelchair-->
                                            <option value="WCBD">WCBD</option> <!--Passenger is traveling with a dry cell battery-powered wheelchair-->
                                            <option value="WCBW">WCBW</option> <!--Passenger is traveling with a wet cell battery-powered wheelchair-->
                                            <option value="WCOB">WCOB</option> <!--On-board aisle wheelchair requested-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrC<?php echo $count; ?>">
                                            <option value="" disabled selected hidden>Meal</option>
                                            <option value="">None</option>
                                            <option value="AVML">AVML</option> <!--Vegetarian Hindu-->
                                            <option value="BBML">BBML</option> <!--Baby-->
                                            <option value="BLML">BLML</option> <!--Bland-->
                                            <option value="CHML">CHML</option> <!--Child-->
                                            <option value="CNML">CNML</option> <!--Chicken-->
                                            <option value="DBML">DBML</option> <!--Diabetic-->
                                            <option value="FPML">FPML</option> <!--Fruit platter-->
                                            <option value="FSML">FSML</option> <!--Fish-->
                                            <option value="GFML">GFML</option> <!--Gluten Intolerant-->
                                            <option value="HNML">HNML</option> <!--Hindu (non-vegetarian)-->
                                            <option value="IVML">IVML</option> <!--Indian vegetarian-->
                                            <option value="JPML">JPML</option> <!--Japanese-->
                                            <option value="KSML">KSML</option> <!--Kosher-->
                                            <option value="LCML">LCML</option> <!--Low calorie-->
                                            <option value="LFML">LFML</option> <!--Low fat-->
                                            <option value="LSML">LSML</option> <!--Low salt-->
                                            <option value="MOML">MOML</option> <!--Muslim-->
                                            <option value="NFML">NFML</option> <!--No fish-->
                                            <option value="NLML">NLML</option> <!--Low lactose-->
                                            <option value="OBML">OBML</option> <!--Japanese Obento-->
                                            <option value="RVML">RVML</option> <!--Vegetarian raw-->
                                            <option value="SFML">SFML</option> <!--Seafood-->
                                            <option value="SPML">SPML</option> <!--Special Meal-->
                                            <option value="VGML">VGML</option> <!--Vegetarian vegan-->
                                            <option value="VJML">VJML</option> <!--Vegetarian Jain-->
                                            <option value="VLML">VLML</option> <!--Vegetarian Oriental-->
                                            <option value="VOML">VOML</option> <!--Vegetarian lacto-ovo-->
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

                    <?php
                        }

                        $_SESSION['seatcount'] = $seatcount;
                    }

                    ?>
                    <?php
                    if (isset($_SESSION['seats'])) {
                    ?>
                        <p></p>
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

    <script type="text/javascript">
        $('select[id*="seat"]').change(function(){
            $('select[id*="seat"] option').attr('disabled',false);

            $('select[id*="seat"]').each(function(){
                var $this = $(this);
                $('select[id*="seat"]').not($this).find('option').each(function(){
                if($(this).attr('value') == $this.val())
                    $(this).attr('disabled',true);
                });
            });

        });
    </script>
</body>

</html>