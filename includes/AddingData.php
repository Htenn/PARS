<?php
    require 'db.php';

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
    
    $flightNumberNsql = "SELECT * FROM flight WHERE flightNumber = '$flightNumberN' AND AircraftModel = '$AircraftModelN'";

    $query = mysqli_query($db, $flightNumberNsql);
    if(mysqli_num_rows($query) > 0) {
        echo "<script> alert('Flight already exists!'); window.location= 'addflight.php'</script>";
    } else {

    $sql = "INSERT INTO flight (flightNumber, Origin, Destination, dateDepartOrigin, timeDepartOrigin, 
    dateArriveDestination, timeArriveDestination, Type, AircraftModel)
    VALUES ('$flightNumberN', '$flightOriginN', '$flightDestinationN', '$dateDepartOriginN', '$timeDepartOriginN',
     '$dateArriveDestinationN', '$timeArriveDestinationN', '$flightTypeN', '$AircraftModelN')";

    $result = mysqli_query($db, $sql);

    echo "<script> alert('Flight has been added!'); window.location= 'addflight.php'</script>";
    }

}
?>