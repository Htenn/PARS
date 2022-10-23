<?php
// session_start(); // needs arguments to start session and end session.
// initializing variables

$clientFirstName = "";
$clientMiddleName = "";
$clientLastName = "";
$clientGender = "";
$clientBirthday = "";
$clientAge = "";
$clientEmail = "";
$clientContactNum = "";
$clientNationality = "";
$clientType = "";
$clientAddPass = "";
$clientRemarks ="";

$errors = array(); //  to collect errors
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'id17946631_pars');

// REGISTER USER
if (isset($_POST['add_client'])) { // add_client is the name of the button in the form
// receive all input values from the form
$clientFirstName = mysqli_real_escape_string($db, $_POST['clientFirstName']);
$clientMiddleName = mysqli_real_escape_string($db, $_POST['clientMiddleName']);
$clientLastName = mysqli_real_escape_string($db, $_POST['clientLastName']);
$clientGender = mysqli_real_escape_string($db, $_POST['clientGender']);
$clientBirthday = mysqli_real_escape_string($db, $_POST['clientBirthday']);
$clientAge = mysqli_real_escape_string($db, $_POST['clientAge']);
$clientEmail = mysqli_real_escape_string($db, $_POST['clientEmail']);
$clientContactNum = mysqli_real_escape_string($db, $_POST['clientContactNum']);
$clientNationality = mysqli_real_escape_string($db, $_POST['clientNationality']);
$clientType = mysqli_real_escape_string($db, $_POST['clientType']);
$clientAddPass = mysqli_real_escape_string($db, $_POST['clientAddPass']);
$clientRemarks = mysqli_real_escape_string($db, $_POST['clientRemarks']);

// first check the database to make sure
// the client does not already exist
$client_check_query = "SELECT * FROM client WHERE clientFirstName='$clientFirstName' AND clientLastName='$clientLastName' AND clientGender='$clientGender' AND clientBirthday='$clientBirthday' AND clientNationality='$clientNationality' LIMIT 1";
$result = mysqli_query($db, $client_check_query); // Execute query
$client = mysqli_fetch_assoc($result); 
if ($client) { // if user exists
array_push($errors, "Client already exists");
}

// Finally, add client to database if there are no errors in the form
if (count($errors) == 0) {

$query = "INSERT INTO client (clientFirstName, clientMiddleName, clientLastName, clientGender, clientBirthday, clientAge, clientEmail, clientContactNum, clientNationality, clientType, clientAddPass, clientRemarks) VALUES ('$clientFirstName', '$clientMiddleName','$clientLastName','$clientGender','$clientBirthday','$clientAge','$clientEmail','$clientContactNum','$clientNationality','clientType','$clientAddPass','$clientRemarks')";
mysqli_query($db, $query); // Execute query to the code.


//$_SESSION['clientID'] = $clientID; // 
// $_SESSION['success'] = "Client is added.";

/* Incomplete section. Requires code to verify if addPassenger is true or false to decide where to redirect.
header('location: addclient.php'); // redirects to the next page
*/
}
}
include "index1.php";
do {
  include "assets/includes/addform.php";
  echo "<br><br>";
  $clientAddPass--;

} while ($clientAddPass >= 1);
include "assets/includes/submitb.php";
include "assets/includes/footer.php";
?>
