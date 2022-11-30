<?php
    date_default_timezone_set("Asia/Manila");
    echo "The time is " . date("h:i:sa");

    if (isset($_GET['submit'])) {
        $elements = $_GET['str'];
        echo $elements;
    }
?>