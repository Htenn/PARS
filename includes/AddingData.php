<?php
    $conn = mysqli_connect("localhost", "root", "", "id17946631_pars");

    $flightOriginN = $_POST['flightOriginN'];
    $flightDestinationN = $_POST['flightDestinationN'];
    $dateDepartOriginN = $_POST['dateDepartOriginN'];
    $timeDepartOriginN = $_POST['timeDepartOriginN'];
    $dateArriveDestinationN = $_POST['dateArriveDestinationN'];
    $timeArriveDestinationN = $_POST['timeArriveDestinationN'];
    $flightNumberN = $_POST['flightNumberN'];
    $flightTypeN = $_POST['flightTypeN'];
    $AircraftModelN = $_POST['______________'];
    

    $sql = "INSERT INTO flight (flightNumber, flightOrigin, flightDestination, dateDepartOrigin, timeDepartOrigin, 
    dateArriveDestination, timeArriveDestination, flightType, ______________)
    VALUES ('$flightNumberN', '$flightOriginN', '$flightDestinationN', '$dateDepartOriginN', '$timeDepartOriginN',
     '$dateArriveDestinationN', '$timeArriveDestinationN', '$flightTypeN' $AircraftModelN);";
    $result = mysqli_query($conn, $sql);

    header("Location: ../AddFlight.php?input=success");

?>