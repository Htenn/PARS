<?php
    $conn = mysqli_connect("localhost", "root", "", "pars1");

    if(isset($_POST['submit'])) {
    $flightOriginN = $_POST['flightOriginN'];
    $flightDestinationN = $_POST['flightDestinationN'];
    $dateDepartOriginN = $_POST['dateDepartOriginN'];
    $timeDepartOriginN = $_POST['timeDepartOriginN'];
    $dateArriveDestinationN = $_POST['dateArriveDestinationN'];
    $timeArriveDestinationN = $_POST['timeArriveDestinationN'];
    $flightNumberN = $_POST['flightNumberN'];
    $flightTypeN = $_POST['flightTypeN'];
    $AircraftModelN = $_POST['AircraftModelN'];
    
    $flightNumberNsql = "SELECT * FROM flight WHERE flightNumber = '$flightNumberN' OR flightAircraftModel = '$AircraftModelN'";

    $query = mysqli_query($conn, $flightNumberNsql);
    if(mysqli_num_rows($query) > 0) {

        echo "Flight number Or Aircraft Model is already used";

    } else {

    $sql = "INSERT INTO flight (flightNumber, flightOrigin, flightDestination, dateDepartOrigin, timeDepartOrigin, 
    dateArriveDestination, timeArriveDestination, flightType, flightAircraftModel)
    VALUES ('$flightNumberN', '$flightOriginN', '$flightDestinationN', '$dateDepartOriginN', '$timeDepartOriginN',
     '$dateArriveDestinationN', '$timeArriveDestinationN', '$flightTypeN', '$AircraftModelN')";

    $result = mysqli_query($conn, $sql);

    
    }

}
?>