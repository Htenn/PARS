<?php
    require 'sessionstart.php';

    if(isset($_SESSION['session'])) {
        if ($_SESSION['session'] == 'A') {
            header('location: adminmenu.php');
        }
        elseif ($_SESSION['session'] == 'U') {
            header('location: mainmenu.php');
        }
    }
    else {
        session_unset();
        session_destroy();
        header('location: login.php');
    }
?>