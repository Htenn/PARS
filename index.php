<?php
    require 'sessionstart.php';
    $_SESSION = array();

    if(isset($_SESSION['session'])) {
        if ($_SESSION['session'] == 'A') {
            header('location: adminmenu.php');
        }
        elseif ($_SESSION['session'] == 'U') {
            header('location: mainmenu.php');
        }
    }
    else {
        header('location: login.php');
    }
?>