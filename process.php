<?php

session_start();
$mysqli = new mysqli('localhost', 'root','','id17946631_pars');

$flightSeatClass='';
$flightSeatNumber='';

if(isset($_POST['save'])){
    $flightSeatClass = $_POST['flightSeatClass'];
    $flightSeatNumber = $_POST['flightSeatNumber'];

    $mysqli->query("UPDATE INTO data (flightSeatClass, flightSeatNumber) VALUES ('$flightSeatClass, $flightSeatNumber')") ;
}

if (isset($_GET['edit'])) {
    $flightNumber = $_GET['flightNumber'];
    $result = $mysqli->query("SELECT * from flight_seat where flightNumber=$flightNumber");
    if (count($result)==1){
        $row = $result->fetch_array();
        $fligthSeatClass = $row['flightSeatClass'];
        $fligthSeatNumber = $row['flightSeatNumber'];
    }
?>