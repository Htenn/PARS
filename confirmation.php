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

                    for ($i = 1; $i <= $counter; $i++) {
                        if ($i == 1) {
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
                                        <h3>Seat Number: " . $_SESSION['clientSeat'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Seat Class: " . $seatClass . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Origin: " . $_SESSION['flightOrigin'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Destination: " . $_SESSION['flightDestination'] . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Departure Date: " . $_SESSION['dateDepartOrigin'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Arrival Date: " . $_SESSION['dateArriveDestination'] . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Departure Time: " . $_SESSION['timeDepartOrigin'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Arrival Time: " . $_SESSION['timeArriveDestination'] . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3>Name: " . $_SESSION['clientFirstName'] . " " . $_SESSION['clientMiddleName'] . " " . $_SESSION['clientLastName'] . "</h3>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Gender: " . $_SESSION['clientGender'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Nationality: " . $_SESSION['clientNationality'] . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Age: " . $_SESSION['clientAge'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Birthdate: " . $_SESSION['clientBirthday'] . "</h3>
                                    </div>
                                </div>
                            ";
                            echo "
                                <div class='row'>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Email: " . $_SESSION['clientEmail'] . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Contact Number: " . $_SESSION['clientContactNum'] . "</h3>
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
                                        <h3>Passenger Type: " . $passengerType . "</h3>
                                    </div>
                                    <div class='col-6 col-12-xsmall'>
                                        <h3>Remarks: " . $_SESSION['clientRemarks'] . "</h3>
                                    </div>
                                </div>
                            ";
                        }
                        else {
                            
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