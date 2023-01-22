<?php
include '../../sessionstart.php';
include '../../unset.php';

unsetpassengerID();

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
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="../../assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">
        <?php
			if($_SESSION['session'] == 'A') {
				$menu = '../../adminmenu.php';
			} else {
				$menu = '../../mainmenu.php';
			}

			echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 15px; color: grey;'>
			<ul class='actions'>
				<li><a href=" . $menu . " class='button primary small'>Menu</a></li>
			</ul>
			</div>";
            echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 60px; color: grey;'>
            <ul class='actions'>
                <li><a href='seatmap.php?plane=1' class='button primary small'>Back</a></li>
            </ul>
            </div>";
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
                    echo "<h3><strong>" . $_SESSION['selectedFlightNum1'] . " seats selected:</strong> "; foreach($_SESSION['seats1'] as $seat) { echo $seat . " ";} echo "</h3>";
                    echo "<h3><strong>" . $_SESSION['selectedFlightNum2'] . " seats selected:</strong> "; foreach($_SESSION['seats2'] as $seat) { echo $seat . " ";} echo "</h3><br>";

                    if (isset($_SESSION['seats1'])) {
                        if (isset(($_GET['passenger']))) {
                            $_SESSION['seatcount'] = $_GET['passenger'];
                            $seatcount = $_SESSION['seatcount'];
                        }
                        else {
                            $seatcount = count($_SESSION['seats1']);
                            $_SESSION['seatcount'] = $seatcount;
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
                                        <input type="text" name="middleName<?php echo $count; ?>" id="middleName" value="<?php if(isset($_SESSION['middleName' . $count])) {echo $_SESSION['middleName' . $count];} ?>" placeholder="Middle Name" />
                                    </div>
                                    <div class="col-4 col-12-xsmall">
                                        <label for="lastName<?php echo $count; ?>">
                                            <h2>Last Name *</h2>
                                        </label>
                                        <input type="text" name="lastName<?php echo $count; ?>" id="lastName" value="<?php if(isset($_SESSION['lastName' . $count])) {echo $_SESSION['lastName' . $count];} ?>" placeholder="Last Name" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="gender<?php echo $count; ?>">
                                            <h2>Gender *</h2>
                                        </label>
                                        <select name="gender<?php echo $count; ?>" id="gender">
                                            <option value="M" 
                                            <?php 
                                                if(isset($_SESSION['gender' . $count])) {
                                                    if ($_SESSION['gender' . $count] == 'M') {
                                                        echo 'selected';
                                                    }
                                                }
                                                else {
                                                    echo 'selected';
                                                }
                                            ?>
                                            >Male</option>
                                            
                                            <option value="F" 
                                            <?php 
                                                if(isset($_SESSION['gender' . $count])) {
                                                    if ($_SESSION['gender' . $count] == 'F') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >Female</option>
                                        </select>
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="nationality<?php echo $count; ?>">
                                            <h2>Nationality *</h2>
                                        </label>
                                        <input type="text" name="nationality<?php echo $count; ?>" id="nationality" value="<?php if(isset($_SESSION['nationality' . $count])) {echo $_SESSION['nationality' . $count];} ?>" placeholder="3-letter code" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-4 col-12-xsmall">
                                        <label for="age<?php echo $count; ?>">
                                            <h2>Age *</h2>
                                        </label>
                                        <input type="text" name="age<?php echo $count; ?>" id="age" value="<?php if(isset($_SESSION['age' . $count])) {echo $_SESSION['age' . $count];} ?>" placeholder="Age" required/>
                                    </div>

                                    <div class="col-4 col-12-xsmall">
                                        <label for="birthdate<?php echo $count; ?>">
                                            <h2>Birthdate *</h2>
                                        </label>
                                        <input type="date" name="birthdate<?php echo $count; ?>" id="birthdate" value="<?php if(isset($_SESSION['birthday' . $count])) {echo $_SESSION['birthday' . $count];} ?>" placeholder="MM/DD/YYYY" required />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-6 col-12-xsmall">
                                        <label for="email<?php echo $count; ?>">
                                            <h2>Email *</h2>
                                        </label>
                                        <input type="email" name="email<?php echo $count; ?>" id="email" value="<?php if(isset($_SESSION['email' . $count])) {echo $_SESSION['email' . $count];} ?>" placeholder="Email" />
                                    </div>

                                    <div class="col-6 col-12-xsmall">
                                        <label for="contactNum<?php echo $count; ?>">
                                            <h2>Contact Number *</h2>
                                        </label>
                                        <input type="text" name="contactNum<?php echo $count; ?>" id="contactNum" value="<?php if(isset($_SESSION['contactNum' . $count])) {echo $_SESSION['contactNum' . $count];} ?>" placeholder="************" />
                                    </div>
                                </div>
                                <br />
                                <div class="row gtr-uniform">
                                    <div class="col-3 col-12-xsmall">
                                        <label for="passengerType<?php echo $count; ?>">
                                            <h2>Passenger Type *</h2>
                                        </label>
                                        <select name="passengerType<?php echo $count; ?>" id="passengerType">
                                            <option value="ADT" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'ADT') {
                                                        echo 'selected';
                                                    }
                                                }
                                                else {
                                                    echo 'selected';
                                                }
                                            ?>
                                            >ADT</option> <!--Adult-->

                                            <option value="CHD" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'CHD') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >CHD</option> <!--Child-->

                                            <option value="SRC" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'SRC') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >SRC</option> <!--Senior Citizen-->

                                            <option value="UNN" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'UNN') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >UNN</option> <!--Unaccompanied Child-->

                                            <option value="UAM" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'UAM') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >UAM</option> <!--Unaccompanied Minor-->

                                            <option value="INF" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'INF') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >INF</option> <!--Infant without a seat-->

                                            <option value="INS" 
                                            <?php 
                                                if(isset($_SESSION['type' . $count])) {
                                                    if ($_SESSION['type' . $count] == 'INS') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >INS</option> <!--Infant with a seat-->
                                        </select>
                                    </div>
                                    <!--SEAT 1-->
                                    <div class="col-3 col-12-xsmall">
                                        <label for="seat1<?php echo $count; ?>">
                                            <h2>Seat for <?php echo $_SESSION['selectedFlightNum1']; ?> *</h2>
                                        </label>
                                        <select name="seat1<?php echo $count; ?>" id="seat1">
                                            <option value ="NULL" 
                                            <?php 
                                                if(!isset($_SESSION['seat1' . $count])) {
                                                    echo 'selected';
                                                }
                                            ?>
                                             hidden>Select seat</option>

                                            <?php
                                                foreach ($_SESSION['seats1'] as $seat) {
                                                    echo "<option value='$seat' ";
                                                    if(isset($_SESSION['seat1' . $count])) {
                                                        if ($_SESSION['seat1' . $count] == "$seat") {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    echo ">" . $seat . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <!--SEAT 2-->
                                    <div class="col-3 col-12-xsmall">
                                        <label for="seat2<?php echo $count; ?>">
                                            <h2>Seat for <?php echo $_SESSION['selectedFlightNum2']; ?> *</h2>
                                        </label>
                                        <select name="seat2<?php echo $count; ?>" id="seat2">
                                            <option value ="NULL" 
                                            <?php 
                                                if(!isset($_SESSION['seat2' . $count])) {
                                                    echo 'selected';
                                                }
                                            ?>
                                             hidden>Select seat</option>

                                            <?php
                                                foreach ($_SESSION['seats2'] as $seat) {
                                                    echo "<option value='$seat' ";
                                                    if(isset($_SESSION['seat2' . $count])) {
                                                        if ($_SESSION['seat2' . $count] == "$seat") {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    echo ">" . $seat . "</option>";
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
                                            <option value="" disabled hidden 
                                            <?php 
                                                if(!isset($_SESSION['ssrA' . $count])) {
                                                    echo 'selected';
                                                }
                                            ?>
                                            >Disability</option>

                                            <option value="">None</option>
                                            <option value="BLND" 
                                            <?php 
                                                if(isset($_SESSION['ssrA' . $count])) {
                                                    if ($_SESSION['ssrA' . $count] == 'BLND') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >BLND</option> <!--Blind-->

                                            <option value="DEAF" 
                                            <?php 
                                                if(isset($_SESSION['ssrA' . $count])) {
                                                    if ($_SESSION['ssrA' . $count] == 'DEAF') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >DEAF</option> <!--Deaf-->

                                            <option value="BLND DEAF" 
                                            <?php 
                                                if(isset($_SESSION['ssrA' . $count])) {
                                                    if ($_SESSION['ssrA' . $count] == 'BLND DEAF') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >BLND DEAF</option> <!--Blind and deaf-->

                                            <option value="DPNA" 
                                            <?php 
                                                if(isset($_SESSION['ssrA' . $count])) {
                                                    if ($_SESSION['ssrA' . $count] == 'DPNA') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >DPNA</option> <!--Disabled passenger with intellectual or developmental disability needing assistance-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrB<?php echo $count; ?>">
                                            <option value="" disabled hidden 
                                            <?php 
                                                if(!isset($_SESSION['ssrB' . $count])) {
                                                    echo 'selected';
                                                }
                                            ?>
                                            >Wheelchair</option>

                                            <option value="">None</option>

                                            <option value="WCHC" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCHC') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCHC</option> <!--Wheelchair is needed - traveler is completely immobile-->

                                            <option value="WCHR" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCHR') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCHR</option> <!--Wheelchair is needed - traveler can ascend/descend stairs-->

                                            <option value="WCHS" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCHS') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCHS</option> <!--Wheelchair is needed - traveler can walk short distances, but not up or down stairs-->

                                            <option value="WCMP" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCMP') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCMP</option> <!--Passenger is traveling with a manual wheelchair-->

                                            <option value="WCBD" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCBD') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCBD</option> <!--Passenger is traveling with a dry cell battery-powered wheelchair-->

                                            <option value="WCBW" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCBW') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCBW</option> <!--Passenger is traveling with a wet cell battery-powered wheelchair-->

                                            <option value="WCOB" 
                                            <?php 
                                                if(isset($_SESSION['ssrB' . $count])) {
                                                    if ($_SESSION['ssrB' . $count] == 'WCOB') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >WCOB</option> <!--On-board aisle wheelchair requested-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall">
                                        <select name="ssrC<?php echo $count; ?>">
                                            <option value="" disabled hidden 
                                            <?php 
                                                if(!isset($_SESSION['ssrC' . $count])) {
                                                    echo 'selected';
                                                }
                                            ?>
                                            >Meal</option>

                                            <option value="">None</option>

                                            <option value="AVML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'AVML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >AVML</option> <!--Vegetarian Hindu-->

                                            <option value="BBML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'BBML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >BBML</option> <!--Baby-->

                                            <option value="BLML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'BLML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >BLML</option> <!--Bland-->

                                            <option value="CHML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'CHML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >CHML</option> <!--Child-->

                                            <option value="CNML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'CHML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >CNML</option> <!--Chicken-->

                                            <option value="DBML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'DBML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >DBML</option> <!--Diabetic-->

                                            <option value="FPML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'FPML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >FPML</option> <!--Fruit platter-->

                                            <option value="FSML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'FSML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >FSML</option> <!--Fish-->

                                            <option value="GFML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'GFML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >GFML</option> <!--Gluten Intolerant-->

                                            <option value="HNML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'HNML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >HNML</option> <!--Hindu (non-vegetarian)-->
                                            <option value="IVML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'IVML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >IVML</option> <!--Indian vegetarian-->
                                            
                                            <option value="JPML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'JPML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >JPML</option> <!--Japanese-->

                                            <option value="KSML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'KSML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >KSML</option> <!--Kosher-->

                                            <option value="LCML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'LCML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >LCML</option> <!--Low calorie-->

                                            <option value="LFML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'LFML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >LFML</option> <!--Low fat-->

                                            <option value="LSML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'LSML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >LSML</option> <!--Low salt-->

                                            <option value="MOML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'MOML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >MOML</option> <!--Muslim-->

                                            <option value="NFML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'NFML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >NFML</option> <!--No fish-->

                                            <option value="NLML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'NLML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >NLML</option> <!--Low lactose-->

                                            <option value="OBML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'OBML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >OBML</option> <!--Japanese Obento-->

                                            <option value="RVML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'RVML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >RVML</option> <!--Vegetarian raw-->

                                            <option value="SFML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'SFML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >SFML</option> <!--Seafood-->

                                            <option value="SPML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'SPML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >SPML</option> <!--Special Meal-->

                                            <option value="VGML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'VGML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >VGML</option> <!--Vegetarian vegan-->

                                            <option value="VJML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'VJML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >VJML</option> <!--Vegetarian Jain-->

                                            <option value="VLML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'VLML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >VLML</option> <!--Vegetarian Oriental-->

                                            <option value="VOML" 
                                            <?php 
                                                if(isset($_SESSION['ssrC' . $count])) {
                                                    if ($_SESSION['ssrC' . $count] == 'VOML') {
                                                        echo 'selected';
                                                    }
                                                }
                                            ?>
                                            >VOML</option> <!--Vegetarian lacto-ovo-->
                                        </select>
                                    </div>
                                    <div class="col-3 col-12-xsmall tooltip">
                                        <span class='tooltiptext'>Separate codes with a space</span>
                                        <input type="text" name="ssrD<?php echo $count; ?>" value="<?php if(isset($_SESSION['ssrD' . $count])) {echo $_SESSION['ssrD' . $count];} ?>" placeholder="Others" />
                                    </div>
                                </div>
                                <br />
                                <div class="col-4 col-12-xsmall">
                                    <label for="remarks<?php echo $count; ?>">
                                        <h2>Remarks</h2>
                                    </label>
                                    <input type="text" name="remarks<?php echo $count; ?>" id="remarks" value="<?php if(isset($_SESSION['remarks' . $count])) {echo $_SESSION['remarks' . $count];} ?>" placeholder="Remarks" />
                                </div>
                            </section>

                    <?php
                        }
                        
                    }

                    ?>
                    <?php
                    if (isset($_SESSION['seats1']) && isset($_SESSION['seats2'])) {
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
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/jquery.scrollex.min.js"></script>
    <script src="../../assets/js/jquery.scrolly.min.js"></script>
    <script src="../../assets/js/browser.min.js"></script>
    <script src="../../assets/js/breakpoints.min.js"></script>
    <script src="../../assets/js/util.js"></script>
    <script src="../../assets/js/main.js"></script>

    <script type="text/javascript">
        $('select[id*="seat1"]').change(function(){
            $('select[id*="seat1"] option').attr('disabled',false);

            $('select[id*="seat1"]').each(function(){
                var $this = $(this);
                $('select[id*="seat1"]').not($this).find('option').each(function(){
                if($(this).attr('value') == $this.val())
                    $(this).attr('disabled',true);
                });
            });

        });
        $('select[id*="seat2"]').change(function(){
            $('select[id*="seat2"] option').attr('disabled',false);

            $('select[id*="seat2"]').each(function(){
                var $this = $(this);
                $('select[id*="seat2"]').not($this).find('option').each(function(){
                if($(this).attr('value') == $this.val())
                    $(this).attr('disabled',true);
                });
            });

        });
    </script>
</body>

</html>