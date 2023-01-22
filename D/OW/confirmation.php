<?php
include '../../sessionstart.php';
include '../../unset.php';
date_default_timezone_set("Asia/Manila");

require '../../db.php';
?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Confirmation - PARS</title>
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
		?>

        <!-- Header -->
        <header id="header">
            <h1>Confirmation</h1>
            <p></p>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <?php
                $seatcount = $_SESSION['seatcount'];

                echo "
                        <div class='col-6 col-12-xsmall'>
                            <h3><strong>Flight Number: </strong>" . $_SESSION['selectedFlightNum'] . "</h3>
                        </div>
                    ";
                echo "
                        <div class='row'>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Origin: </strong>" . $_SESSION['flightOrigin'] . "</h3>
                            </div>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Destination: </strong>" . $_SESSION['flightDestination'] . "</h3>
                            </div>
                        </div>
                    ";
                echo "
                        <div class='row'>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Departure Date: </strong>" . $_SESSION['dateDepartOrigin'] . "</h3>
                            </div>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Arrival Date: </strong>" . $_SESSION['dateArriveDestination'] . "</h3>
                            </div>
                        </div>
                    ";
                echo "
                        <div class='row'>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Departure Time: </strong>" . $_SESSION['timeDepartOrigin'] . "</h3>
                            </div>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Arrival Time: </strong>" . $_SESSION['timeArriveDestination'] . "</h3>
                            </div>
                        </div>
                    ";
                echo "<p></p>";
                echo "
                        <div class='row'>
                            <div class='col-12 col-12-xsmall'>
                                <h3><strong>Seats:</strong> " . count($_SESSION['seats']);
                                echo "<br/>";
                                foreach ($_SESSION['seats'] as $seat) {
                                    // check for seat class
                                    if ($_SESSION['AircraftModel'] == 'A320') {
                                        if (in_array($seat, $_SESSION['a320j'], true)) {
                                            $seatClass = 'J';
                                        }
                                        elseif (in_array($seat, $_SESSION['a320p'], true)) {
                                            $seatClass = 'P';
                                        }
                                        elseif (in_array($seat, $_SESSION['a320y'], true)) {
                                            $seatClass = 'Y';
                                        }
                                    }
                                    elseif ($_SESSION['AircraftModel'] == 'A330') {
                                        if (in_array($seat, $_SESSION['a330j'], true)) {
                                            $seatClass = 'J';
                                        }
                                        elseif (in_array($seat, $_SESSION['a330p'], true)) {
                                            $seatClass = 'P';
                                        }
                                        elseif (in_array($seat, $_SESSION['a330y'], true)) {
                                            $seatClass = 'Y';
                                        }
                                    }
                                    
                                    echo $seatClass;
                                    echo "\t";
                                    echo $seat;
                                    echo "<br/>";
                                }
                            echo "</h3></div>
                        </div>
                    ";
                echo "<br/><hr/><br/>";

                for ($i = 1; $i <= $seatcount; $i++) {

                        echo "  <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Name: </strong>" . $_SESSION['firstName' . $i] . " " . $_SESSION['middleName' . $i] . " " . $_SESSION['lastName' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Seat: </strong>" . $_SESSION['seat' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Gender: </strong>" . $_SESSION['gender' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Nationality: </strong>" . $_SESSION['nationality' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Age: </strong>" . $_SESSION['age' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Birthdate: </strong>" . $_SESSION['birthday' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Email: </strong>" . $_SESSION['email' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Contact Number: </strong>" . $_SESSION['contactNum' . $i] . "</h3>
                                    </div>
                                </div>
                            ";

                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Passenger Type: </strong>" . $_SESSION['type' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>SSR: </strong>" . $_SESSION['ssr' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-12 col-12-xsmall'>
                                        <h3><strong>Remarks: </strong>" . $_SESSION['remarks' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                    
                    if ($i < $seatcount) {
                        echo "<br/><hr/><br/>";
                    }
                }
                ?>
                <p><br></p>
                <div class='row gtr-uniform'>
                    <div class='col-12 col-12-xsmall'>
                        <ul class='actions fit'>
                            <li><a href='pnr.php?passenger=<?php echo $_SESSION['seatcount']; ?>' class='button fit'>MAKE CHANGES</a></li>
                        </ul>
                    </div>                    
                </div>
                <br>
                <div class='row gtr-uniform'>
                    <div class='col-12 col-12-xsmall'>
                        <form method='post' action='confirmation'>
                            <input type='submit' class='button primary fit' name='exeConfirm' value='CONFIRM' />
                        </form>
                    </div>
                </div>
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

    <?php
    function insertBooking(int $clientID, int $seatcount) {
        
        $insertBookingQuery = "INSERT INTO booking (clientID, flightNumber, Origin, Destination, NumOfSeats, addDate, addTime, user) VALUES ('" .  $clientID . "', '" .
            $_SESSION['selectedFlightNum'] . "', '" .
            $_SESSION['flightOrigin'] . "', '" .
            $_SESSION['flightDestination'] . "', " .
            $seatcount . ", curdate(), curtime(), '" . $_SESSION['user'] . "')";

        mysqli_query($GLOBALS['db'], $insertBookingQuery);
    }

    function seatClassCheck($seat) {
        if (!empty($seat)) {
            if ($_SESSION['AircraftModel'] == 'A320') {
                if (in_array($seat, $_SESSION['a320j'], true)) {
                    $seatClass = 'J';
                }
                elseif (in_array($seat, $_SESSION['a320p'], true)) {
                    $seatClass = 'P';
                }
                elseif (in_array($seat, $_SESSION['a320y'], true)) {
                    $seatClass = 'Y';
                }
            }
            elseif ($_SESSION['AircraftModel'] == 'A330') {
                if (in_array($seat, $_SESSION['a330j'], true)) {
                    $seatClass = 'J';
                }
                elseif (in_array($seat, $_SESSION['a330p'], true)) {
                    $seatClass = 'P';
                }
                elseif (in_array($seat, $_SESSION['a330y'], true)) {
                    $seatClass = 'Y';
                }
            }
    
            return $seatClass;
        }
    }

    if (array_key_exists('exeConfirm', $_POST)) {
        $seatcount = $_SESSION['seatcount'];

        for ($j = 1; $j <= $seatcount; $j++) {
            if (isset($_SESSION['passengerID' . $j])) {

                $updatePNRQuery = "UPDATE pnr SET 
                    Age = " . $_SESSION['age' . $j] . ", 
                    Email = '" . $_SESSION['email' . $j] . "', 
                    ContactNum = '" . $_SESSION['contactNum' . $j] . "' 
                    WHERE ID = " . $_SESSION['passengerID' .$j] . " AND user = '" . $_SESSION['user'] ."'";
                mysqli_query($db, $updatePNRQuery);

                if ( !empty($_SESSION['type' . $j]) || !empty($_SESSION['ssr' . $j]) || !empty($_SESSION['remarks' . $j]) ) {
                    // check if pnr_flight exists with same ID and user
                    $selectIDquery = "SELECT ID FROM pnr_flight WHERE 
                        ID = " . $_SESSION['passengerID' . $j]
                        . " AND flightNumber = '" . $_SESSION['selectedFlightNum']
                        . "' AND user = '" . $_SESSION['user'] . "'";
                    $selectIDResult = mysqli_query($db, $selectIDquery);
                    
                    if ($selectIDResult) { // if pnr_flight record exists, execute the ff:
                        $updatePNRFlightQuery = "UPDATE pnr_flight SET 
                            Type = '" . $_SESSION['type' . $j] . "', 
                            ssr = '" . $_SESSION['ssr' . $j] . "', 
                            remarks = '" . $_SESSION['remarks' . $j] . "' 
                            WHERE (flightNumber = '" . $_SESSION['selectedFlightNum'] . "') AND (ID = " . $_SESSION['passengerID' .$j] . ") AND (user ='" . $_SESSION['user'] . "')";
                        mysqli_query($db, $updatePNRFlightQuery);    
                    }
                    else { // if record doesnt exist
                        $insertPNRFlightQuery = "INSERT INTO pnr_flight (ID, flightNumber, Type, ssr, remarks, user) VALUES (" .
                            $_SESSION['passengerID' . $j] . ", '" .
                            $_SESSION['selectedFlightNum'] . "', '" .
                            $_SESSION['type' . $j] . "', '" .
                            $_SESSION['ssr' . $j] . "', '" .
                            $_SESSION['remarks' . $j] . "', '" .
                            $_SESSION['user'] . "')";
                        mysqli_query($db, $insertPNRFlightQuery);
                    }
                }

            } else {
                $insertPNRQuery = "INSERT INTO pnr (FirstName, MiddleName, LastName, Gender, Nationality, Age, Birthday, Email, ContactNum, addDate, addTime, user) VALUES ('" .
                    $_SESSION['firstName' . $j] . "', '" .
                    $_SESSION['middleName' . $j] . "', '" .
                    $_SESSION['lastName' . $j] . "', '" .
                    $_SESSION['gender' . $j] . "', '" .
                    $_SESSION['nationality' . $j] . "', " .
                    $_SESSION['age' . $j] . ", '" .
                    $_SESSION['birthday' . $j] . "', '" .
                    $_SESSION['email' . $j] . "', '" .
                    $_SESSION['contactNum' . $j] . "', curdate(), curtime(), '" . $_SESSION['user'] . "')";
                mysqli_query($db, $insertPNRQuery);

                $selectIDquery = "SELECT ID FROM pnr WHERE 
                    Firstname = '" . $_SESSION['firstName' . $j]
                    . "' AND MiddleName = '" . $_SESSION['middleName' . $j]
                    . "' AND LastName = '" . $_SESSION['lastName' . $j]
                    . "' AND Gender = '" . $_SESSION['gender' . $j]
                    . "' AND Nationality = '" . $_SESSION['nationality' . $j]
                    . "' AND Age = " . $_SESSION['age' . $j]
                    . " AND Birthday = '" . $_SESSION['birthday' . $j]
                    . "' AND Email = '" . $_SESSION['email' . $j]
                    . "' AND ContactNum = '" . $_SESSION['contactNum' . $j]
                    . "'";

                $ID = mysqli_query($db, $selectIDquery);
                $ID = mysqli_fetch_assoc($ID);
                $_SESSION['passengerID' . $j] = intval($ID['ID']);

                $insertPNRFlightQuery = "INSERT INTO pnr_flight (ID, flightNumber, Type, ssr, remarks, user) VALUES (" .
                    $_SESSION['passengerID' . $j] . ", '" .
                    $_SESSION['selectedFlightNum'] . "', '" .
                    $_SESSION['type' . $j] . "', '" .
                    $_SESSION['ssr' . $j] . "', '" .
                    $_SESSION['remarks' . $j] . "', '" .
                    $_SESSION['user'] . "')";
                mysqli_query($db, $insertPNRFlightQuery);
            }

            if ($j == 1) {
                insertBooking($_SESSION['passengerID1'], $seatcount);
            }

            $bookingIDQuery = "SELECT bookingID FROM booking WHERE 
                flightNumber = '" . $_SESSION['selectedFlightNum']
                . "' AND Origin = '" . $_SESSION['flightOrigin']
                . "' AND Destination = '" . $_SESSION['flightDestination']
                . "' AND clientID = " . $_SESSION['passengerID1']
                . " AND user = '" . $_SESSION['user']
                . "'";
            $bookingIDResult = mysqli_query($db, $bookingIDQuery);
            $bookingID = mysqli_fetch_assoc($bookingIDResult);
            $bookingID = intval($bookingID['bookingID']);

            if (!empty($_SESSION['seat' . $j])) {
                $seatClass = seatClassCheck($_SESSION['seat' . $j]);
            }
            else {
                $seatClass = 'NULL';
            }

            $insertSeatQuery = "INSERT INTO flight_seat (clientID, passengerID, flightNumber, SeatClass, Seat, bookingID) VALUES (" .
                $_SESSION['passengerID1'] . ", " .
                $_SESSION['passengerID' . $j] . ", '" .
                $_SESSION['selectedFlightNum'] . "', '" .
                $seatClass . "', '" .
                $_SESSION['seat' . $j] . "', $bookingID)";
            mysqli_query($db, $insertSeatQuery);
        }

        unsetpnr();
        unsetseats();
        unsetetc();

        echo "<script> alert('Seats are now reserved!'); window.location= '../../reservations/list.php'</script>";
    }


    ?>

</body>

</html>