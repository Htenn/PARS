<?php
include '../sessionstart.php';
date_default_timezone_set("Asia/Manila");

require '../db.php';
?>

<!DOCTYPE HTML>
<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>View Reservation - PARS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
    <link rel="icon" href="../images/favicon.png">
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">
        <?php
            if($_SESSION['session'] == 'A') {
                $menu = '../adminmenu.php';
                if (isset($_GET['userID'])) {
                    $back = 'userlistview.php?view=' . $_GET['userID'];
                } else {
                    $back = 'adminlist.php';
                }
            } else {
                $menu = '../mainmenu.php';
                if (isset($_GET['userlist'])) {
                    $back = 'userlist.php';
                } else {
                    $back = 'list.php';
                }
            }

            echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 15px; color: grey;'>
            <ul class='actions'>
                <li><a href=" . $menu . " class='button primary small'>Menu</a></li>
            </ul>
            </div>";

            echo "<div style='position: fixed; float: left; margin-left: 15px; margin-top: 60px; color: grey;'>
            <ul class='actions'>
                <li><a href=" . $back . " class='button primary small'>Back</a></li>
            </ul>
            </div>";
        ?>

        <!-- Header -->
        <header id="header">
            <h1></h1>
            <p></p>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- Content -->
            <section id="content" class="main">
                <?php
                    if (isset($_GET['view'])) {
                        $ID = $_GET['view'];
                        $_SESSION['bookingID'] = $ID;

                        $query = "SELECT * FROM bookingr WHERE bookingID = $ID";
                        $queryResult = mysqli_query($db, $query);

                        if ($display = mysqli_fetch_array($queryResult)) {

                            //CITY PAIR 1
                            echo "
                                <header class='major'>
                                    <h2>City Pair 1</h2>
                                </header>";
                            echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Flight Number: </strong>" . $display['flightNumber1'] . "</h3>
                                </div>
                                ";
                            echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Origin: </strong>" . $display['Origin1'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Destination: </strong>" . $display['Destination1'] . "</h3>
                                        </div>
                                    </div>
                                ";
                            
                            $flightInfo = "SELECT * FROM flight WHERE flightNumber = '" . $display['flightNumber1'] . "' LIMIT 1";
                            $flightInfo = mysqli_query($db, $flightInfo);
                            if ($flightDisplay = mysqli_fetch_array($flightInfo)) {
                                echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Departure Date: </strong>" . $flightDisplay['dateDepartOrigin'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Arrival Date: </strong>" . $flightDisplay['dateArriveDestination'] . "</h3>
                                        </div>
                                    </div>
                                ";
                                echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Departure Time: </strong>" . $flightDisplay['timeDepartOrigin'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Arrival Time: </strong>" . $flightDisplay['timeArriveDestination'] . "</h3>
                                        </div>
                                    </div>
                                ";
                            }

                            echo '<br/><hr><br/>';

                            $seatsQuery = "SELECT * FROM flight_seat WHERE (clientID = " . $display['clientID'] . " AND flightNumber = '" . $display['flightNumber1'] . "' AND bookingrID = $ID)";
                            $seatsResult = mysqli_query($db, $seatsQuery);
                            while ($flight_seatTable = mysqli_fetch_array($seatsResult)) {
                                $pnrInfoQuery = "SELECT * FROM pnr WHERE ID = " . $flight_seatTable['passengerID'];
                                $pnrInfoResult = mysqli_query($db, $pnrInfoQuery);

                                if ($pnrDisplay = mysqli_fetch_array($pnrInfoResult)) {
                                    echo "  <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Name: </strong>" . $pnrDisplay['FirstName'] . " " . $pnrDisplay['MiddleName'] . " " . $pnrDisplay['LastName'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Seat: </strong>" . $flight_seatTable['SeatClass'] . " " . $flight_seatTable['Seat'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Gender: </strong>" . $pnrDisplay['Gender'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Nationality: </strong>" . $pnrDisplay['Nationality'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Age: </strong>" . $pnrDisplay['Age'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Birthdate: </strong>" . $pnrDisplay['Birthday'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Email: </strong>" . $pnrDisplay['Email'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Contact Number: </strong>" . $pnrDisplay['ContactNum'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                }

                                $pnrFlightInfoQuery = "SELECT * FROM pnr_flight WHERE (ID = " . $flight_seatTable['passengerID'] . " AND flightNumber = '" . $display['flightNumber1'] . "')";
                                $pnrFlightInfoResult = mysqli_query($db, $pnrFlightInfoQuery);

                                if ($pnrFlightDisplay = mysqli_fetch_array($pnrFlightInfoResult)) {
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Passenger Type: </strong>" . $pnrFlightDisplay['Type'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>SSR: </strong>" . $pnrFlightDisplay['ssr'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-12 col-12-xsmall'>
                                                    <h3><strong>Remarks: </strong>" . $pnrFlightDisplay['remarks'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                }
                                echo "<br/><hr/><br/>";
                            }

                            //CITY PAIR 2
                            echo "
                                <header class='major'>
                                    <h2>City Pair 2</h2>
                                </header>";
                            echo "
                                <div class='col-6 col-12-xsmall'>
                                    <h3><strong>Flight Number: </strong>" . $display['flightNumber2'] . "</h3>
                                </div>
                                ";
                            echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Origin: </strong>" . $display['Origin2'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Destination: </strong>" . $display['Destination2'] . "</h3>
                                        </div>
                                    </div>
                                ";
                            
                            $flightInfo = "SELECT * FROM flight WHERE flightNumber = '" . $display['flightNumber2'] . "' LIMIT 1";
                            $flightInfo = mysqli_query($db, $flightInfo);
                            if ($flightDisplay = mysqli_fetch_array($flightInfo)) {
                                echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Departure Date: </strong>" . $flightDisplay['dateDepartOrigin'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Arrival Date: </strong>" . $flightDisplay['dateArriveDestination'] . "</h3>
                                        </div>
                                    </div>
                                ";
                                echo "
                                    <div class='row'>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Departure Time: </strong>" . $flightDisplay['timeDepartOrigin'] . "</h3>
                                        </div>
                                        <div class='col-6 col-12-xsmall'>
                                            <h3><strong>Arrival Time: </strong>" . $flightDisplay['timeArriveDestination'] . "</h3>
                                        </div>
                                    </div>
                                ";
                            }

                            echo '<br/><hr><br/>';

                            $seatsQuery = "SELECT * FROM flight_seat WHERE (clientID = " . $display['clientID'] . " AND flightNumber = '" . $display['flightNumber2'] . "' AND bookingrID = $ID)";
                            $seatsResult = mysqli_query($db, $seatsQuery);
                            while ($flight_seatTable = mysqli_fetch_array($seatsResult)) {
                                $pnrInfoQuery = "SELECT * FROM pnr WHERE ID = " . $flight_seatTable['passengerID'];
                                $pnrInfoResult = mysqli_query($db, $pnrInfoQuery);

                                if ($pnrDisplay = mysqli_fetch_array($pnrInfoResult)) {
                                    echo "  <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Name: </strong>" . $pnrDisplay['FirstName'] . " " . $pnrDisplay['MiddleName'] . " " . $pnrDisplay['LastName'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Seat: </strong>" . $flight_seatTable['SeatClass'] . " " . $flight_seatTable['Seat'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Gender: </strong>" . $pnrDisplay['Gender'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Nationality: </strong>" . $pnrDisplay['Nationality'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Age: </strong>" . $pnrDisplay['Age'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Birthdate: </strong>" . $pnrDisplay['Birthday'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Email: </strong>" . $pnrDisplay['Email'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Contact Number: </strong>" . $pnrDisplay['ContactNum'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                }

                                $pnrFlightInfoQuery = "SELECT * FROM pnr_flight WHERE (ID = " . $flight_seatTable['passengerID'] . " AND flightNumber = '" . $display['flightNumber2'] . "')";
                                $pnrFlightInfoResult = mysqli_query($db, $pnrFlightInfoQuery);

                                if ($pnrFlightDisplay = mysqli_fetch_array($pnrFlightInfoResult)) {
                                    echo "
                                            <div class='row'>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>Passenger Type: </strong>" . $pnrFlightDisplay['Type'] . "</h3>
                                                </div>
                                                <div class='col-6 col-12-xsmall'>
                                                    <h3><strong>SSR: </strong>" . $pnrFlightDisplay['ssr'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                    echo "
                                            <div class='row'>
                                                <div class='col-12 col-12-xsmall'>
                                                    <h3><strong>Remarks: </strong>" . $pnrFlightDisplay['remarks'] . "</h3>
                                                </div>
                                            </div>
                                        ";
                                }
                                echo "<br/><hr/><br/>";
                            }

                            echo "
                                <div class='row'>
                                    <div class='col-12 col-12-xsmall'>
                                        <h3><strong>Date and Time Added: </strong>" . $display['addDate'] . " " . $display['addTime'] . "</h3>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12 col-12-xsmall'>
                                        <h3><strong>Created by: </strong>" . $display['user'] . "</h3>
                                    </div>
                                </div>
                            ";
                        }
                    }
                ?>
            </section>

        </div>

        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">&copy; Philippine Cultural College</p>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>