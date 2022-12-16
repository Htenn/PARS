<?php
    if (isset($_SESSION['selectedFlightNum']))
    unset($_SESSION['selectedFlightNum']);
    if (isset($_SESSION['flightOrigin']))
    unset($_SESSION['flightOrigin']);
    if (isset($_SESSION['flightDestination']))
    unset($_SESSION['flightDestination']);
    if (isset($_SESSION['dateDepartOrigin']))
    unset($_SESSION['dateDepartOrigin']);
    if (isset($_SESSION['timeDepartOrigin']))
    unset($_SESSION['timeDepartOrigin']);
    if (isset($_SESSION['dateArriveDestination']))
    unset($_SESSION['dateArriveDestination']);
    if (isset($_SESSION['timeArriveDestination']))
    unset($_SESSION['timeArriveDestination']);
    if (isset($_SESSION['a320j']))
    unset($_SESSION['a320j']);
    if (isset($_SESSION['a320p']))
    unset($_SESSION['a320p']);
    if (isset($_SESSION['a320y']))
    unset($_SESSION['a320y']);
    if (isset($_SESSION['a330j']))
    unset($_SESSION['a330j']);
    if (isset($_SESSION['a330p']))
    unset($_SESSION['a330p']);
    if (isset($_SESSION['a330y']))
    unset($_SESSION['a330y']);
    if (isset($_SESSION['clientID']))
    unset($_SESSION['clientID']);
    if (isset($_SESSION['clientFirstName']))
    unset($_SESSION['clientFirstName']);
    if (isset($_SESSION['clientMiddleName']))
    unset($_SESSION['clientMiddleName']);
    if (isset($_SESSION['clientLastName']))
    unset($_SESSION['clientLastName']);
    if (isset($_SESSION['clientGender']))
    unset($_SESSION['clientGender']);
    if (isset($_SESSION['clientBirthday']))
    unset($_SESSION['clientBirthday']);
    if (isset($_SESSION['clientAge']))
    unset($_SESSION['clientAge']);
    if (isset($_SESSION['clientEmail']))
    unset($_SESSION['clientEmail']);
    if (isset($_SESSION['clientContactNum']))
    unset($_SESSION['clientContactNum']);
    if (isset($_SESSION['clientNationality']))
    unset($_SESSION['clientNationality']);
    if (isset($_SESSION['clientType']))
    unset($_SESSION['clientType']);
    if (isset($_SESSION['clientRemarks']))
    unset($_SESSION['clientRemarks']);
    if (isset($_SESSION['flightOrigin']))
    unset($_SESSION['clientSeat']);
    
    if (isset($_SESSION['pcounter'])) {
    for ($u = 1; $u <= $_SESSION['pcounter']; $u++) {
        unset($_SESSION['passengerID' . $u]);
        unset($_SESSION['passengerFirstName' . $u]);
        unset($_SESSION['passengerMiddleName' . $u]);
        unset($_SESSION['passengerLastName' . $u]);
        unset($_SESSION['passengerGender' . $u]);
        unset($_SESSION['passengerBirthday' . $u]);
        unset($_SESSION['passengerAge' . $u]);
        unset($_SESSION['passengerEmail' . $u]);
        unset($_SESSION['passengerContactNum' . $u]);
        unset($_SESSION['passengerNationality' . $u]);
        unset($_SESSION['passengerType' . $u]);
        unset($_SESSION['passengerRemarks' . $u]);
        unset($_SESSION['passengerSeat' . $u]);
    }
    }
?>