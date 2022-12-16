<?php
// session_start(); // needs arguments to start session and end session.
// initializing variables

$userFirstName = "";
$userMiddleName = "";
$userLastName = "";
$username = "";
$password = "";
$userType ="";

$errors = array(); //  to collect errors
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'pars');

// REGISTER USER
if (isset($_POST['add_user'])) { // add_user is the name of the button in the form
// receive all input values from the form
$userFirstName = mysqli_real_escape_string($db, $_POST['userFirstName']);
$userMiddleName = mysqli_real_escape_string($db, $_POST['userMiddleName']);
$userLastName = mysqli_real_escape_string($db, $_POST['userLastName']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$userType = mysqli_real_escape_string($db, $_POST['userType']);



// first check the database to make sure
// the user does not already exist
$user_check_query = "SELECT * FROM user WHERE userFirstName='$userFirstName' AND userLastName='$userLastName' AND username='$username' AND userType='$userType' LIMIT 1";
$result = mysqli_query($db, $user_check_query); // Execute query
$user = mysqli_fetch_assoc($result); 
if ($user) { // if user exists
    array_push($errors, "user already exists");
    echo "User already exists.";
}

// Finally, add user to database if there are no errors in the form
if (count($errors) == 0) {
$password = md5($password);
$query = "INSERT INTO user (userFirstName, userMiddleName, userLastName, username, password, userType) VALUES ('$userFirstName', '$userMiddleName','$userLastName','$username','$password','$userType')";
mysqli_query($db, $query); // Execute query to the code.


//$_SESSION['userID'] = $userID; // 
// $_SESSION['success'] = "user is added.";

/* Incomplete section. Requires code to verify if addPassenger is true or false to decide where to redirect.
header('location: adduser.php'); // redirects to the next page
*/
}
}

?>
