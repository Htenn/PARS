<?php
include 'sessionstart.php';
date_default_timezone_set("Asia/Manila");

$db = mysqli_connect('localhost', 'root', '', 'pars');
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
            <h1>Confirmation</h1>
            <h2>
                <?php
                echo $_SESSION['selectedFlightNum'];
                ?>
            </h2>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <?php
                $seatcount = $_SESSION['seatcount'];
                $pcounter = $_SESSION['pcounter'];

                echo "
                        <div class='col-6 col-12-xsmall'>
                            <h3><strong>Flight Number: </strong>" . $_SESSION['selectedFlightNum'] . "</h3>
                        </div>
                    ";
                echo "
                        <div class='row gtr-uniform'>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Origin: </strong>" . $_SESSION['flightOrigin'] . "</h3>
                            </div>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Destination: </strong>" . $_SESSION['flightDestination'] . "</h3>
                            </div>
                        </div>
                    ";
                echo "
                        <div class='row gtr-uniform'>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Departure Date: </strong>" . $_SESSION['dateDepartOrigin'] . "</h3>
                            </div>
                            <div class='col-6 col-12-xsmall'>
                                <h3><strong>Arrival Date: </strong>" . $_SESSION['dateArriveDestination'] . "</h3>
                            </div>
                        </div>
                    ";
                echo "
                        <div class='row gtr-uniform'>
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
                        <div class='row gtr-uniform'>
                            <div class='col-12 col-12-xsmall'>
                                <h3><strong>Seats:</strong> " . $_SESSION['seatcount'];
                                echo "<br/>";
                                foreach ($_SESSION['seats'] as $seat) {
                                    // check for seat class
                                    if (in_array($seat, $_SESSION['a320j'], true)) {
                                        $seatClass = 'J';
                                    }
                                    elseif (in_array($seat, $_SESSION['a320p'], true)) {
                                        $seatClass = 'P';
                                    }
                                    elseif (in_array($seat, $_SESSION['a320y'], true)) {
                                        $seatClass = 'Y';
                                    }
                                    elseif (in_array($seat, $_SESSION['a330j'], true)) {
                                        $seatClass = 'J';
                                    }
                                    elseif (in_array($seat, $_SESSION['a330p'], true)) {
                                        $seatClass = 'P';
                                    }
                                    elseif (in_array($seat, $_SESSION['a330y'], true)) {
                                        $seatClass = 'Y';
                                    }
                                    
                                    echo $seatClass;
                                    echo "\t";
                                    echo $seat;
                                    echo "<br/>";
                                }
                            echo "</h3></div>
                        </div>
                        <br/>
                    ";
                echo "<br/><hr/><br/>";

                for ($i = 1; $i <= $seatcount; $i++) {
                    if ($i == 1) {
                        echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Name: </strong>" . $_SESSION['firstName' . $i] . " " . $_SESSION['middleName' . $i] . " " . $_SESSION['lastName' . $i] . "</h3>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Gender: </strong>" . $_SESSION['gender' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Nationality: </strong>" . $_SESSION['nationality' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Age: </strong>" . $_SESSION['age' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Birthdate: </strong>" . $_SESSION['birthday' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Email: </strong>" . $_SESSION['email' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Contact Number: </strong>" . $_SESSION['contactNum' . $i] . "</h3>
                                    </div>
                                </div>
                            ";

                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Passenger Type: </strong>" . $_SESSION['type' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>SSR: </strong>" . $_SESSION['ssr' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-12 col-12-xsmall'>
                                        <h3><strong>Remarks: </strong>" . $_SESSION['remarks' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                    } else { // START OF PASSENGER
                        echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Name: </strong>" . $_SESSION['firstName' . $i] . " " . $_SESSION['middleName' . $i] . " " . $_SESSION['lastName' . $i] . "</h3>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Gender: </strong>" . $_SESSION['gender' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Nationality: </strong>" . $_SESSION['nationality' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Age: </strong>" . $_SESSION['age' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Birthdate: </strong>" . $_SESSION['birthday' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Email: </strong>" . $_SESSION['email' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Contact Number: </strong>" . $_SESSION['contactNum' . $i] . "</h3>
                                    </div>
                                </div>
                            ";

                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Passenger Type: </strong>" . $_SESSION['type' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>SSR: </strong>" . $_SESSION['ssr' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row gtr-uniform'>
                                    <div class='col-12 col-12-xsmall'>
                                        <h3><strong>Remarks: </strong>" . $_SESSION['remarks' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                    }
                    if ($i < $seatcount) {
                        echo "<br/><hr/><br/>";
                    }
                }
                ?>
                <p></p>
                <form method='post' action='confirmation'>
                    <input type='submit' class='button primary fit' name='exeConfirm' value='CONFIRM' />
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

    <?php
    function insertBooking(int $clientID, int $seatcount) {
        // $db = mysqli_connect('localhost', 'root', '', 'pars');
        $insertBookingQuery = "INSERT INTO booking (clientID, flightNumber, Origin, Destination, NumOfSeats, addDate, addTime, user) VALUES ('" .  $clientID . "', '" .
            $_SESSION['selectedFlightNum'] . "', '" .
            $_SESSION['flightOrigin'] . "', '" .
            $_SESSION['flightDestination'] . "', " .
            $seatcount . ", curdate(), curtime())" . $_SESSION['user'];

        mysqli_query($GLOBALS['db'], $insertBookingQuery);
    }

    function insertFlightSeat(int $clientID, int $seatcount) {
        foreach ($_SESSION['seats'] as $seat) {
            // check for seat class
            if (in_array($seat, $_SESSION['a320j'], true)) {
                $seatClass = 'J';
            }
            elseif (in_array($seat, $_SESSION['a320p'], true)) {
                $seatClass = 'P';
            }
            elseif (in_array($seat, $_SESSION['a320y'], true)) {
                $seatClass = 'Y';
            }
            elseif (in_array($seat, $_SESSION['a330j'], true)) {
                $seatClass = 'J';
            }
            elseif (in_array($seat, $_SESSION['a330p'], true)) {
                $seatClass = 'P';
            }
            elseif (in_array($seat, $_SESSION['a330y'], true)) {
                $seatClass = 'Y';
            }
            
            $insertFlightSeatQuery = "INSERT INTO flight_seat (clientID, flightNumber, SeatClass, SeatNumber) VALUES ('" .
                $_SESSION['clientID'] . "', '" .
                $_SESSION['selectedFlightNum'] . "', '" .
                $seatClass . "', '" .
                $seat
                . "') ";

            mysqli_query($GLOBALS['db'], $insertFlightSeatQuery);
        }
    }

    if (array_key_exists('exeConfirm', $_POST)) {
        $seatcount = $_SESSION['seatcount'];

        for ($j = 1; $j <= $seatcount; $j++) {

            if ($j == 1) { // START OF CLIENT
                if (isset($_SESSION['clientID'])) {

                    insertBooking($_SESSION['clientID'], $seatcount);

                } else {                    
                    $insertClientQuery = "INSERT INTO client (FirstName, MiddleName, LastName, Gender, Nationality, Age, Birthday, Email, ContactNum, Type, addDate, addTime) VALUES ('" .
                        $_SESSION['firstName' . $j] . "', '" .
                        $_SESSION['middleName' . $j] . "', '" .
                        $_SESSION['lastName' . $j] . "', '" .
                        $_SESSION['gender' . $j] . "', '" .
                        $_SESSION['nationality' . $j] . "', '" .
                        $_SESSION['age' . $j] . "', '" .
                        $_SESSION['birthday' . $j] . "', '" .
                        $_SESSION['email' . $j] . "', '" .
                        $_SESSION['contactNum' . $j] . "', '" .
                        $_SESSION['type' . $j] . "', curdate(), curtime()) ";

                    mysqli_query($db, $insertClientQuery);

                    $selectClientIDquery = "SELECT clientID FROM client WHERE 
                        Firstname = '" . $_SESSION['firstName' . $j]
                        . "' AND MiddleName = '" . $_SESSION['middleName' . $j]
                        . "' AND LastName = '" . $_SESSION['lastName' . $j]
                        . "' AND Gender = '" . $_SESSION['gender' . $j]
                        . "' AND Nationality = '" . $_SESSION['nationality' . $j]
                        . "' AND Age = '" . $_SESSION['age' . $j]
                        . "' AND Birthday = '" . $_SESSION['birthday' . $j]
                        . "' AND Email = '" . $_SESSION['email' . $j]
                        . "' AND ContactNum = '" . $_SESSION['contactNum' . $j]
                        . "'";

                    $clientID = mysqli_query($db, $selectClientIDquery);
                    $clientID = mysqli_fetch_assoc($clientID);
                    $_SESSION['clientID'] = intval($clientID['clientID']);

                    insertBooking($_SESSION['clientID'], $seatcount);
                }
            } else { // PASSENGER

                if (isset($_SESSION['passengerID' . $j])) {
                    $passengerID = $_SESSION['passengerID' . $j];

                } else {
                    $insertPassengerQuery = "INSERT INTO passenger (clientID, FirstName, MiddleName, LastName, Gender, Nationality, Age, Birthday, Email, ContactNum, Type, addDate, addTime) VALUES ('" .
                        $_SESSION['clientID'] . "', '" .
                        $_SESSION['firstName' . $j] . "', '" .
                        $_SESSION['middleName' . $j] . "', '" .
                        $_SESSION['lastName' . $j] . "', '" .
                        $_SESSION['gender' . $j] . "', '" .
                        $_SESSION['nationality' . $j] . "', '" .
                        $_SESSION['age' . $j] . "', '" .
                        $_SESSION['birthday' . $j] . "', '" .
                        $_SESSION['email' . $j] . "', '" .
                        $_SESSION['contactNum' . $j] . "', '" .
                        $_SESSION['type' . $j] . "', curdate(), curtime()) ";

                    mysqli_query($db, $insertPassengerQuery);

                    $selectPassengerIDquery = "SELECT passengerID FROM passenger WHERE 
                            Firstname = '" . $_SESSION['firstName' . $j]
                        . "' AND MiddleName = '" . $_SESSION['middleName' . $j]
                        . "' AND LastName = '" . $_SESSION['lastName' . $j]
                        . "' AND Gender = '" . $_SESSION['gender' . $j]
                        . "' AND Nationality = '" . $_SESSION['nationality' . $j]
                        . "' AND Age = '" . $_SESSION['age' . $j]
                        . "' AND Birthday = '" . $_SESSION['birthday' . $j]
                        . "' AND Email = '" . $_SESSION['email' . $j]
                        . "' AND ContactNum = '" . $_SESSION['contactNum' . $j]
                        . "'";

                    $passengerID = mysqli_query($db, $selectPassengerIDquery);
                    $passengerID = mysqli_fetch_assoc($passengerID);
                    $passengerID = intval($passengerID['passengerID']);
                }
            }
        }
        echo "<script> alert('Seats are now reserved!'); window.location= 'report.php#reserved'</script>";
    }


    ?>

</body>

</html>