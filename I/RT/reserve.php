<?php
if (isset($_GET['citypair'])) {
    $page = $_GET['citypair'];

    switch ($page) {
        case 1:
            include 'citypair1.php';
            break;
        case 2:
            include 'citypair2.php';
            break;
    }
}
?>