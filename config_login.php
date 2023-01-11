<?php

    $username = "";
    $password = "";
    $errors = array();

    $db = mysqli_connect("localhost", "root", "", "pars"); //connect to the database

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']); //collect text from the form
        $password = mysqli_real_escape_string($db, $_POST['password']);

        $password = md5($password); //encrypt
        $loginQuery = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result_loginQuery = mysqli_query($db, $loginQuery);
        if(mysqli_num_rows($result_loginQuery) == 1) {

            // for logging of user login
            date_default_timezone_set('Asia/Manila'); //set timezone
            $date = date("Y-m-d");
            $time = date("H:i:s"); //set date and time for logging
            $logQuery = "INSERT INTO user_sign_in_log VALUES ('$username', '$date', '$time')";
            mysqli_query($db, $logQuery); //log date and time to the database

            //determine which menu to redirect based on the userType
            $field_user = mysqli_fetch_assoc($result_loginQuery);
            if($field_user['userType'] == 'A') {
                $_SESSION['session'] = 'A';
                $_SESSION['user'] = $username;
                header('location: adminmenu.php'); //if the user account type is an admin, redirect to the admin menu.
            }
            else {
                $_SESSION['session'] = 'U';
                $_SESSION['user'] = $username;
                header ('location: mainmenu.php'); //if the user account type is a user, redirect to the user menu.
            }
        }
        else {
            array_push($errors, "Wrong username/password combination");
        }
        
    }
    
?>