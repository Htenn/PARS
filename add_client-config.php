<?php
session_start();
// initializing variables

$clientID = "";
$clientFirstName = "";
$clientMiddleName = "";
$clientLastName = "";
$clientGender = "";
$clientBirthday = "";
$clientAge = "";
$clientEmail = "";
$clientContactNum = "";
$clientNationality = "";
$clientAddtnlinfo = "";
$clientRemarks ="";

$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '','id17946631_pars');

// REGISTER USER
if (isset($_POST['add_client'])) {
// receive all input values from the form

$clientFirstsName = mysqli_real_escape_string($db, $_POST['clientFirstName']);
$clientMiddleName = mysqli_real_escape_string($db, $_POST['clientMiddleName']);
$clientLastName = mysqli_real_escape_string($db, $_POST['clientLastName']);
$clientGender = mysqli_real_escape_string($db, $_POST['clientGender']);
$clientBirthday = mysqli_real_escape_string($db, $_POST['clientBirthday']);
$clientAge = mysqli_real_escape_string($db, $_POST['clientAge']);
$clientEmail = mysqli_real_escape_string($db, $_POST['clientEmail']);
$clientContactNum = mysqli_real_escape_string($db, $_POST['clientContactNum']);
$clientNationality = mysqli_real_escape_string($db, $_POST['clientNationality']);
$clientAddtnlinfo = mysqli_real_escape_string($db, $_POST['clientAddtnlinfo']);
$clientRemarks = mysqli_real_escape_string($db, $_POST['clientRemarks']);



// first check the database to make sure
// a user does not already exist with the same username and/or email
$client_check_query = "SELECT * FROM client WHERE clientFirstName='$clientFirstName', clientLastName='$clientLastName', clientGender='$clientGender', clientBirthday='$clientBirthday', clientNationality='$clientNationality' LIMIT 1";
$result = mysqli_query($db, $client_check_query);
$client = mysqli_fetch_assoc($result);
if ($client) { // if user exists
array_push($errors, "Client already exists");
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {

$query = "INSERT INTO client ('clientFirstName', 'clientMiddleName', 'clientLastName', 'clientGender', 'clientBirthday', 'clientAge', 'clientEmail', 'clientContactNum', 'clientNationality', 'clientAddtnlinfo', 'clientRemarks') VALUES('$clientFirstName', '$clientMiddleName','$clientLastName','$clientGender','$clientBirthday','$clientAge','$clientEmail','$clientContactNum','$clientNationality','$clientAddtnlinfo','$clientAddtnlinfo','$clientRemarks')";
mysqli_query($db, $query);
$_SESSION['clientID'] = $clientID;
$_SESSION['success'] = "Client is added";

}
}

?>

