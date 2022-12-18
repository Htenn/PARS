<?php
    $conn = mysqli_connect("localhost", "root", "", "pars");

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
    
    $flightNumberNsql = "SELECT * FROM flight WHERE flightNumber = '$flightNumberN' AND flightAircraftModel = '$AircraftModelN'";

    $query = mysqli_query($conn, $flightNumberNsql);
    if(mysqli_num_rows($query) > 0) {
        echo "<script> alert('Flight already exists!'); window.location= 'addflight.php'</script>";
    } else {

    $sql = "INSERT INTO flight (flightNumber, flightOrigin, flightDestination, dateDepartOrigin, timeDepartOrigin, 
    dateArriveDestination, timeArriveDestination, flightType, flightAircraftModel)
    VALUES ('$flightNumberN', '$flightOriginN', '$flightDestinationN', '$dateDepartOriginN', '$timeDepartOriginN',
     '$dateArriveDestinationN', '$timeArriveDestinationN', '$flightTypeN', '$AircraftModelN')";

    $result = mysqli_query($conn, $sql);

    echo "<script> alert('Flight has been added!'); window.location= 'addflight.php'</script>";
    }

}
?>