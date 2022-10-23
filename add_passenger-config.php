<?php
// session_start(); // needs arguments to start session and end session.
// initializing variables

$passengerFirstName = "";
$passengerMiddleName = "";
$passengerLastName = "";
$passengerGender = "";
$passengerBirthday = "";
$passengerAge = "";
$passengerEmail = "";
$passengerContactNum = "";
$passengerNationality = "";
$passengerType = "";
$passengerRemarks ="";

$errors = array(); //  to collect errors
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'id17946631_pars');

// REGISTER USER
if (isset($_POST['add_passenger'])) { // add_passenger is the name of the button in the form
// receive all input values from the form
$passengerFirstName = mysqli_real_escape_string($db, $_POST['passengerFirstName']);
$passengerMiddleName = mysqli_real_escape_string($db, $_POST['passengerMiddleName']);
$passengerLastName = mysqli_real_escape_string($db, $_POST['passengerLastName']);
$passengerGender = mysqli_real_escape_string($db, $_POST['passengerGender']);
$passengerBirthday = mysqli_real_escape_string($db, $_POST['passengerBirthday']);
$passengerAge = mysqli_real_escape_string($db, $_POST['passengerAge']);
$passengerEmail = mysqli_real_escape_string($db, $_POST['passengerEmail']);
$passengerContactNum = mysqli_real_escape_string($db, $_POST['passengerContactNum']);
$passengerNationality = mysqli_real_escape_string($db, $_POST['passengerNationality']);
$passengerType = mysqli_real_escape_string($db, $_POST['passengerType']);


// first check the database to make sure
// the passenger does not already exist
$passenger_check_query = "SELECT * FROM passenger WHERE passengerFirstName='$passengerFirstName' AND passengerLastName='$passengerLastName' AND passengerGender='$passengerGender' AND passengerBirthday='$passengerBirthday' AND passengerNationality='$passengerNationality' LIMIT 1";
$result = mysqli_query($db, $passenger_check_query); // Execute query
$passenger = mysqli_fetch_assoc($result); 
if ($passenger) { // if user exists
array_push($errors, "passenger already exists");
}

// Finally, add passenger to database if there are no errors in the form
if (count($errors) == 0) {

$query = "INSERT INTO passenger (passengerFirstName, passengerMiddleName, passengerLastName, passengerGender, passengerBirthday, passengerAge, passengerEmail, passengerContactNum, passengerNationality, passengerType, passengerRemarks) VALUES ('$passengerFirstName', '$passengerMiddleName','$passengerLastName','$passengerGender','$passengerBirthday','$passengerAge','$passengerEmail','$passengerContactNum','$passengerNationality','$passengerType','$passengerRemarks')";
mysqli_query($db, $query); // Execute query to the code.


//$_SESSION['passengerID'] = $passengerID; // 
// $_SESSION['success'] = "passenger is added.";

/* Incomplete section. Requires code to verify if addPassenger is true or false to decide where to redirect.
header('location: addpassenger.php'); // redirects to the next page
*/
}
}

?>
// ...