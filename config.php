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
$db = mysqli_connect('localhost', 'root', '');

// REGISTER USER
if (isset($_POST['reg_user'])) {
// receive all input values from the form
$clientID = mysqli_real_escape_string($db, $_POST['clientID']);
$clientFirstName = mysqli_real_escape_string($db, $_POST['clientFirstName']);
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

// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($clientID)) { array_push($errors, "ID is required"); }
if (empty($clientFirstName)) { array_push($errors, "First Name is required"); }
// Middle name not required
if (empty($clientLastName)) { array_push($errors, "Last Name is required"); }
if (empty($clientGender)) { array_push($errors, "Gender is required"); }
if (empty($clientBirthday)) { array_push($errors, "Birthday is required"); }
if (empty($clientAge)) { array_push($errors, "Age is required"); }
if (empty($clientEmail)) { array_push($errors, "Email is required"); }
if (empty($clientContactNum)) { array_push($errors, "Contact Number is required"); }
if (empty($clientNationality)) { array_push($errors, "Nationality is required"); }
// Additional Info is a choice for additional passenger
if (empty($clientRemarks)) { array_push($errors, "Remarks is required"); }
// if ($password_1 != $password_2) { array_push($errors, "The two passwords do not match"); }

// first check the database to make sure
// a user does not already exist with the same username and/or email
$client_check_query = "SELECT * FROM client WHERE clientID='$clientID' OR clientEmail='$clientEmail' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$client = mysqli_fetch_assoc($result);
if ($clientID) { // if user exists
if ($clientID['clientID'] === $clientID) {
array_push($errors, "Client ID already exists");
}
if ($clientID['clientEmail'] === $clientEmail) {
array_push($errors, "Email already exists");
}
}

// Finally, register user if there are no errors in the form
if (count($errors) == 0) {

$query = "INSERT INTO client (clientID, clientFirstName, clientMiddleName, clientLastName, clientGender, clientBirthday, clientAge, clientEmail, clientContactNum, clientNationality, clientAddtnlinfo, clientRemarks) 
VALUES('$clientID', '$clientFirstName', 'clientMiddleName','clientLastName','clientGender','clientBirthday','clientAge','clientEmail','clientContactNum','clientNationality','clientAddtnlinfo','clientAddtnlinfo','clientRemarks')";
mysqli_query($db, $query);
$_SESSION['clientID'] = $clientID;
$_SESSION['clientFirstName'] = $clientFirstName;
$_SESSION['clientMiddleName'] = $clientMiddleName;
$_SESSION['clientLastName'] = $clientLastName;
$_SESSION['clientGender'] = $clientGender;
$_SESSION['clientBirthday'] = $clientBirthday;
$_SESSION['clientAge'] = $clientAge;
$_SESSION['clientEmail'] = $clientEmail;
$_SESSION['clientContactNum'] = $clientContactNum;
$_SESSION['clientNationality'] = $clientNationality;
$_SESSION['clientAddtnlinfo'] = $clientAddtnlinfo;
$_SESSION['clientRemarks'] = $clientRemarks;
$_SESSION['success'] = "You are now logged in";
header('location: addclient.php');
}
}
// ...
