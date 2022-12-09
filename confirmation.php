<?php
    session_start();
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
                        }
                        else {
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
                        if ($i < $pcounter-1) {
                            echo "<br/><hr/><br/>";
                        }
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