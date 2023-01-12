<?php
    function unsetpnr() {
        $pnrFieldsArray = array('seats', 'seatcount', 'minSeatCount');
        foreach ($pnrFieldsArray as $items) {
            unset($_SESSION["$items"]);
        }

        $pnrFieldsArray = array('firstName', 'middleName', 'lastName', 'gender', 'nationality', 'birthday', 'email', 'contactNum', 'type', 'ssr', 'ssrA', 'ssrB', 'ssrC', 'ssrD', 'remarks');
        foreach ($pnrFieldsArray as $items) {
            for ($i = 1; $i <= $_SESSION['maxSeatCount']; $i++) {
                unset($_SESSION["$items" . $i]);
            }
        }
    }
?>