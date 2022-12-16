<?php
include 'sessionstart.php';
date_default_timezone_set("Asia/Manila");
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
                $counter = $_SESSION['counter'];
                $pcounter = $_SESSION['pcounter'];

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
                echo "<br/><hr/><br/>";

                for ($i = 0; $i < $pcounter; $i++) {
                    if ($i == 0) {
                        // check for seat class
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a320j'], true)) {
                            $seatClass = 'Business';
                        }
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a320p'], true)) {
                            $seatClass = 'Premium Economy';
                        }
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a320y'], true)) {
                            $seatClass = 'Economy';
                        }
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a330j'], true)) {
                            $seatClass = 'Business';
                        }
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a330p'], true)) {
                            $seatClass = 'Premium Economy';
                        }
                        if (in_array($_SESSION['clientSeat'], $_SESSION['a330y'], true)) {
                            $seatClass = 'Economy';
                        }
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Seat Number: </strong>" . $_SESSION['clientSeat'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Seat Class: </strong>" . $seatClass . "</h3>
                                    </div>
                                </div>
                                <br/>
                            ";
                        echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Name: </strong>" . $_SESSION['clientFirstName'] . " " . $_SESSION['clientMiddleName'] . " " . $_SESSION['clientLastName'] . "</h3>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Gender: </strong>" . $_SESSION['clientGender'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Nationality: </strong>" . $_SESSION['clientNationality'] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Age: </strong>" . $_SESSION['clientAge'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Birthdate: </strong>" . $_SESSION['clientBirthday'] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Email: </strong>" . $_SESSION['clientEmail'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Contact Number: </strong>" . $_SESSION['clientContactNum'] . "</h3>
                                    </div>
                                </div>
                            ";

                        switch ($_SESSION['clientType']) {
                            case 'U':
                                $passengerType = 'Unaccompanied Minor';
                                break;
                            case 'H':
                                $passengerType = 'Handicapped';
                                break;
                            case 'M':
                                $passengerType = 'Medically OK for travel';
                                break;
                            default:
                                $passengerType = 'Normal';
                        }

                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Passenger Type: </strong>" . $passengerType . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Remarks: </strong>" . $_SESSION['clientRemarks'] . "</h3>
                                    </div>
                                </div>
                            ";
                    } else {
                        // check for seat class
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a320j'], true)) {
                            $seatClass = 'Business';
                        }
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a320p'], true)) {
                            $seatClass = 'Premium Economy';
                        }
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a320y'], true)) {
                            $seatClass = 'Economy';
                        }
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a330j'], true)) {
                            $seatClass = 'Business';
                        }
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a330p'], true)) {
                            $seatClass = 'Premium Economy';
                        }
                        if (in_array($_SESSION['passengerSeat' . $i], $_SESSION['a330y'], true)) {
                            $seatClass = 'Economy';
                        }
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Seat Number: </strong>" . $_SESSION['passengerSeat' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Seat Class: </strong>" . $seatClass . "</h3>
                                    </div>
                                </div>
                                <br/>
                            ";
                        echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Name: </strong>" . $_SESSION['passengerFirstName' . $i] . " " . $_SESSION['passengerMiddleName' . $i] . " " . $_SESSION['passengerLastName' . $i] . "</h3>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Gender: </strong>" . $_SESSION['passengerGender' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Nationality: </strong>" . $_SESSION['passengerNationality' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Age: </strong>" . $_SESSION['passengerAge' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Birthdate: </strong>" . $_SESSION['passengerBirthday' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Email: </strong>" . $_SESSION['passengerEmail' . $i] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Contact Number: </strong>" . $_SESSION['passengerContactNum' . $i] . "</h3>
                                    </div>
                                </div>
                            ";

                        switch ($_SESSION['passengerType' . $i]) {
                            case 'U':
                                $passengerType = 'Unaccompanied Minor';
                                break;
                            case 'H':
                                $passengerType = 'Handicapped';
                                break;
                            case 'M':
                                $passengerType = 'Medically OK for travel';
                                break;
                            default:
                                $passengerType = 'Normal';
                        }

                        echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Passenger Type: </strong>" . $passengerType . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3><strong>Remarks: </strong>" . $_SESSION['passengerRemarks' . $i] . "</h3>
                                    </div>
                                </div>
                            ";
                    }
                    if ($i < $pcounter - 1) {
                        echo "<br/><hr/><br/>";
                    }
                }
                ?>

                <form method='post' action='confirmation.php'>
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
    function insertBooking(int $clientID, int $pcounter)
    {
        $db = mysqli_connect('localhost', 'root', '', 'pars');
        $insertBookingQuery = "INSERT INTO booking (clientID, flightNumber, bookingOrigin, bookingDestination, bookingNumOfSeats, addBookingDate, addBookingTime) VALUES ('" .  $clientID . "', '" .
            $_SESSION['selectedFlightNum'] . "', '" .
            $_SESSION['flightOrigin'] . "', '" .
            $_SESSION['flightDestination'] . "', " .
            $pcounter . ", curdate(), curtime())";

        mysqli_query($db, $insertBookingQuery);
    }

    if (array_key_exists('exeConfirm', $_POST)) {
        $db = mysqli_connect('localhost', 'root', '', 'pars');
        $counter = $_SESSION['counter'];
        $pcounter = $_SESSION['pcounter'];

        for ($ii = 0; $ii < $pcounter; $ii++) {

            if ($ii == 0) { // CLIENT
                // check for seat class
                if (in_array($_SESSION['clientSeat'], $_SESSION['a320j'], true)) {
                    $seatClass = 'J';
                }
                if (in_array($_SESSION['clientSeat'], $_SESSION['a320p'], true)) {
                    $seatClass = 'P';
                }
                if (in_array($_SESSION['clientSeat'], $_SESSION['a320y'], true)) {
                    $seatClass = 'Y';
                }
                if (in_array($_SESSION['clientSeat'], $_SESSION['a330j'], true)) {
                    $seatClass = 'J';
                }
                if (in_array($_SESSION['clientSeat'], $_SESSION['a330p'], true)) {
                    $seatClass = 'P';
                }
                if (in_array($_SESSION['clientSeat'], $_SESSION['a330y'], true)) {
                    $seatClass = 'Y';
                }


                if (isset($_SESSION['clientID'])) {

                    $insertFlightSeatQuery = "INSERT INTO flight_seat (clientID, flightNumber, flightSeatClass, flightSeatNumber, remarks) VALUES ('" .
                        $_SESSION['clientID'] . "', '" .
                        $_SESSION['selectedFlightNum'] . "', '" .
                        $seatClass . "', '" .
                        $_SESSION['clientSeat'] . "', '" .
                        $_SESSION['clientRemarks']
                        . "') ";

                    mysqli_query($db, $insertFlightSeatQuery);

                    insertBooking($_SESSION['clientID'], $pcounter);
                } else {
                    switch ($_SESSION['clientType']) {
                        case 'U':
                            $passengerType = 'Unaccompanied Minor';
                            break;
                        case 'H':
                            $passengerType = 'Handicapped';
                            break;
                        case 'M':
                            $passengerType = 'Medically OK for travel';
                            break;
                        default:
                            $passengerType = 'Normal';
                    }

                    $insertClientQuery = "INSERT INTO client (clientFirstName, clientMiddleName, clientLastName, clientGender, clientNationality, clientAge, clientBirthday, clientEmail, clientContactNum, clientType, addClientDate, addClientTime) VALUES ('" .
                        $_SESSION['clientFirstName'] . "', '" .
                        $_SESSION['clientMiddleName'] . "', '" .
                        $_SESSION['clientLastName'] . "', '" .
                        $_SESSION['clientGender'] . "', '" .
                        $_SESSION['clientNationality'] . "', '" .
                        $_SESSION['clientAge'] . "', '" .
                        $_SESSION['clientBirthday'] . "', '" .
                        $_SESSION['clientEmail'] . "', '" .
                        $_SESSION['clientContactNum'] . "', '" .
                        $_SESSION['clientType'] . "', curdate(), curtime()) ";

                    mysqli_query($db, $insertClientQuery);

                    $selectClientIDquery = "SELECT clientID FROM client WHERE 
                        clientFirstname = '" . $_SESSION['clientFirstName']
                        . "' AND clientMiddleName = '" . $_SESSION['clientMiddleName']
                        . "' AND clientLastName = '" . $_SESSION['clientLastName']
                        . "' AND clientGender = '" . $_SESSION['clientGender']
                        . "' AND clientNationality = '" . $_SESSION['clientNationality']
                        . "' AND clientAge = '" . $_SESSION['clientAge']
                        . "' AND clientBirthday = '" . $_SESSION['clientBirthday']
                        . "' AND clientEmail = '" . $_SESSION['clientEmail']
                        . "' AND clientContactNum = '" . $_SESSION['clientContactNum']
                        . "'";

                    $clientID = mysqli_query($db, $selectClientIDquery);
                    $clientID = mysqli_fetch_assoc($clientID);
                    $_SESSION['clientID'] = intval($clientID['clientID']);

                    $insertFlightSeatQuery = "INSERT INTO flight_seat (clientID, flightNumber, flightSeatClass, flightSeatNumber, remarks) VALUES ('" .
                        $_SESSION['clientID'] . "', '" .
                        $_SESSION['selectedFlightNum'] . "', '" .
                        $seatClass . "', '" .
                        $_SESSION['clientSeat'] . "', '" .
                        $_SESSION['clientRemarks']
                        . "') ";

                    mysqli_query($db, $insertFlightSeatQuery);

                    insertBooking($_SESSION['clientID'], $pcounter);
                }
            } else { // PASSENGER
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a320j'], true)) {
                    $seatClass = 'J';
                }
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a320p'], true)) {
                    $seatClass = 'P';
                }
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a320y'], true)) {
                    $seatClass = 'Y';
                }
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a330j'], true)) {
                    $seatClass = 'J';
                }
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a330p'], true)) {
                    $seatClass = 'P';
                }
                if (in_array($_SESSION['passengerSeat' . $ii], $_SESSION['a330y'], true)) {
                    $seatClass = 'Y';
                }

                if (isset($_SESSION['passengerID' . $ii])) {
                    $passengerID = $_SESSION['passengerID' . $ii];

                    $insertFlightSeatQuery = "INSERT INTO flight_seat (clientID, passengerID, flightNumber, flightSeatClass, flightSeatNumber, remarks) VALUES (" .
                        $_SESSION['clientID'] . ", '" .
                        $passengerID . "', '" .
                        $_SESSION['selectedFlightNum'] . "', '" .
                        $seatClass . "', '" .
                        $_SESSION['passengerSeat' . $ii] . "', '" .
                        $_SESSION['passengerRemarks' . $ii]
                        . "') ";

                    mysqli_query($db, $insertFlightSeatQuery);
                } else {
                    switch ($_SESSION['passengerType' . $ii]) {
                        case 'U':
                            $passengerType = 'Unaccompanied Minor';
                            break;
                        case 'H':
                            $passengerType = 'Handicapped';
                            break;
                        case 'M':
                            $passengerType = 'Medically OK for travel';
                            break;
                        default:
                            $passengerType = 'Normal';
                    }

                    $insertPassengerQuery = "INSERT INTO passenger (clientID, passengerFirstName, passengerMiddleName, passengerLastName, passengerGender, passengerNationality, passengerAge, passengerBirthday, passengerEmail, passengerContactNum, passengerType, addPassengerDate, addPassengerTime) VALUES ('" .
                        $_SESSION['clientID'] . "', '" .
                        $_SESSION['passengerFirstName' . $ii] . "', '" .
                        $_SESSION['passengerMiddleName' . $ii] . "', '" .
                        $_SESSION['passengerLastName' . $ii] . "', '" .
                        $_SESSION['passengerGender' . $ii] . "', '" .
                        $_SESSION['passengerNationality' . $ii] . "', '" .
                        $_SESSION['passengerAge' . $ii] . "', '" .
                        $_SESSION['passengerBirthday' . $ii] . "', '" .
                        $_SESSION['passengerEmail' . $ii] . "', '" .
                        $_SESSION['passengerContactNum' . $ii] . "', '" .
                        $_SESSION['passengerType' . $ii] . "', curdate(), curtime()) ";

                    mysqli_query($db, $insertPassengerQuery);

                    $selectPassengerIDquery = "SELECT passengerID FROM passenger WHERE 
                            passengerFirstname = '" . $_SESSION['passengerFirstName' . $ii]
                        . "' AND passengerMiddleName = '" . $_SESSION['passengerMiddleName' . $ii]
                        . "' AND passengerLastName = '" . $_SESSION['passengerLastName' . $ii]
                        . "' AND passengerGender = '" . $_SESSION['passengerGender' . $ii]
                        . "' AND passengerNationality = '" . $_SESSION['passengerNationality' . $ii]
                        . "' AND passengerAge = '" . $_SESSION['passengerAge' . $ii]
                        . "' AND passengerBirthday = '" . $_SESSION['passengerBirthday' . $ii]
                        . "' AND passengerEmail = '" . $_SESSION['passengerEmail' . $ii]
                        . "' AND passengerContactNum = '" . $_SESSION['passengerContactNum' . $ii]
                        . "'";

                    $passengerID = mysqli_query($db, $selectPassengerIDquery);
                    $passengerID = mysqli_fetch_assoc($passengerID);
                    $passengerID = intval($passengerID['passengerID']);

                    $insertFlightSeatQuery = "INSERT INTO flight_seat (clientID, passengerID, flightNumber, flightSeatClass, flightSeatNumber, remarks) VALUES (" .
                        $_SESSION['clientID'] . ", '" .
                        $passengerID . "', '" .
                        $_SESSION['selectedFlightNum'] . "', '" .
                        $seatClass . "', '" .
                        $_SESSION['passengerSeat' . $ii] . "', '" .
                        $_SESSION['passengerRemarks' . $ii]
                        . "') ";

                    mysqli_query($db, $insertFlightSeatQuery);
                }
            }
        }
        echo "<script> alert('Seats are now reserved!');</script>";
        header('location: report.php#reserved');
    }


    ?>

</body>

</html>