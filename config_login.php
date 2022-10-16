<?php
    //session_start();

    $userID = "";
    $password = "";
    $errors = array();

    $db = mysqli_connect("", "", "", ""); //connect to the database

    if(isset($_POST['login'])) {
        $userID = mysqli_real_escape_string($db, $_POST['userID']); //collect text from the form
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password); //encrypt
        $loginQuery = "SELECT * FROM user WHERE userID = '$userID' AND password = '$password'";
        $result_loginQuery = mysqli_query($db, $loginQuery);
        if(mysqli_num_rows($result_loginQuery) == 1) {
            $_SESSION['userID'] = $userID;
            $_SESSION['success'] = "You are now logged in"; //set session

            // for logging of user login
            date_default_timezone_set('Asia/Manila'); //set timezone
            $date = date("Y-m-d");
            $time = date("H:i:s"); //set date and time for logging
            $logQuery = "INSERT INTO user_sign_in_log VALUES ('$userID', '$date', '$time')"; //log date and time to the database

            //determine which menu to redirect based on the userType
            $field_user = mysqli_fetch_field($result_loginQuery);
            if($field_user -> userType == 'admin') {
                header('location: adminmenu.php'); //if the user account type is an admin, redirect to the admin menu.
            }
            else {
                header ('location: mainmenu.html'); //if the user account type is a user, redirect to the user menu.
            }
        }
        else {
            array_push($errors, "Wrong userID/password combination");
        }
        mysqli_free_result($result_loginQuery); //frees the memory associated with the result
    }
    mysqli_close($db); //close connection
?>