<?php
    function unsetpnr() {

        $pnrFieldsArray = array('firstName', 'middleName', 'lastName', 'gender', 'age', 'nationality', 'birthday', 'email', 'contactNum', 'type', 'ssr', 'ssrA', 'ssrB', 'ssrC', 'ssrD', 'remarks', 'passengerID');
        foreach ($pnrFieldsArray as $items) {
            for ($i = 1; $i <= 300; $i++) {
                if(isset($_SESSION["$items" . $i])) {
                    unset($_SESSION["$items" . $i]);
                }
            }
        }
    }

    function unsetpassengerID() {
        for ($i = 1; $i <= 300; $i++) {
            if(isset($_SESSION["passengerID" . $i])) {
                unset($_SESSION["passengerID" . $i]);
            }
        }
    }

    function unsetetc() {
        $pnrFieldsArray = array('clientID', 'AircraftModel', 'AircraftModel1', 'AircraftModel2',);
        foreach ($pnrFieldsArray as $items) {
            if (isset($_SESSION["$items"]))
            unset($_SESSION["$items"]);
        }
    }

    function unsetseats() {
        $pnrFieldsArray = array('seats', 'seats1', 'seats2', 'seatcount', 'minSeatCount','a320j', 'a320p', 'a320y', 'a330j', 'a330p', 'a330y', 'a320j1', 'a320p1', 'a320y1', 'a330j1', 'a330p1', 'a330y1', 'a320j2', 'a320p2', 'a320y2', 'a330j2', 'a330p2', 'a330y2');
        foreach ($pnrFieldsArray as $items) {
            if (isset($_SESSION["$items"]))
            unset($_SESSION["$items"]);
        }
    }
?>