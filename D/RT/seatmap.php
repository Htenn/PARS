<?php
include '../../sessionstart.php';

if (isset($_GET['plane'])) {
    $page = $_GET['plane'];

    switch ($page) {
        case 1:
            include 'seatmap1.php';
            break;
        case 2:
            include 'seatmap2.php';
            break;
    }
}
?>