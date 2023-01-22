<?php
include '../../sessionstart.php';

if (isset($_POST['str'])) {
    $_SESSION['seats1'] = json_decode($_POST['str'], true);
    $_SESSION['minSeatCount'] = count($_SESSION['seats1']);
    header('location: seatmap.php?plane=2');
}

if (isset($_POST['str2'])) {
    $_SESSION['seats2'] = json_decode($_POST['str2'], true);
    $_SESSION['minSeatCount'] = count($_SESSION['seats2']);
    header('location: pnr.php');
}
?>