<?php
    session_start();
    $db = mysqli_connect('localhost', 'root' , '', 'pars');

    $pcounter = 1;

    if (isset($_POST['pnrSubmit'])) {

        $seatcount = $_SESSION['seatcount'];

        for ($counter = 1; $counter <= $seatcount; $counter++) {
            $firstname = mysqli_real_escape_string($db, $_POST['firstName' . $counter]);
            $middlename = mysqli_real_escape_string($db, $_POST['middleName' . $counter]);
            $lastname = mysqli_real_escape_string($db, $_POST['lastName' . $counter]);
            $gender = mysqli_real_escape_string($db, $_POST['gender' . $counter]);
            $nationality = mysqli_real_escape_string($db, $_POST['nationality' . $counter]);
            $age = mysqli_real_escape_string($db, $_POST['age' . $counter]);
                $age = intval($age);
            $birthdate = mysqli_real_escape_string($db, $_POST['birthdate' . $counter]);
            $email = mysqli_real_escape_string($db, $_POST['email' . $counter]);
            $contactnum = mysqli_real_escape_string($db, $_POST['contactNum' . $counter]);
            $passengertype = mysqli_real_escape_string($db, $_POST['passengerType' . $counter]);
            $ssrA = mysqli_real_escape_string($db, $_POST['ssrA' . $counter]);
            $ssrB = mysqli_real_escape_string($db, $_POST['ssrB' . $counter]);
            $ssrC = mysqli_real_escape_string($db, $_POST['ssrC' . $counter]);
            $ssrD = mysqli_real_escape_string($db, $_POST['ssrD' . $counter]);
            $ssr = $ssrA . " " . $ssrB . " " . $ssrC . " " . $ssrD;
            $remarks = mysqli_real_escape_string($db, $_POST['remarks' . $counter]);

            if ($counter == 1) {
                $checkClientQuery = "SELECT * FROM client WHERE 
                    FirstName = '$firstname' AND
                    MiddleName = '$middlename' AND
                    Lastname = '$lastname' AND
                    Gender = '$gender' AND
                    Birthday = '$birthdate' AND
                    Email = '$email' AND
                    ContactNum = '$contactnum' AND
                    Nationality = '$nationality' LIMIT 1";

                $checkClientResult = mysqli_query($db, $checkClientQuery);
                $ifClientResult = mysqli_fetch_assoc($checkClientResult);
                if ($ifClientResult) {
                    $_SESSION['clientID'] = $ifClientResult['clientID'];
                }

                $_SESSION['firstName' . $counter] = $firstname;
                $_SESSION['middleName' . $counter] = $middlename;
                $_SESSION['lastName' . $counter] = $lastname;
                $_SESSION['gender' . $counter] = $gender;
                $_SESSION['birthday' . $counter] = $birthdate;
                $_SESSION['age' . $counter] = $age;
                $_SESSION['email' . $counter] = $email;
                $_SESSION['contactNum' . $counter] = $contactnum;
                $_SESSION['nationality' . $counter] = $nationality;
                $_SESSION['type' . $counter] = $passengertype;
                $_SESSION['ssr' . $counter] = $ssr;
                $_SESSION['remarks' . $counter] = $remarks;
            }
            else { // PASSENGER
                $checkpassengerQuery = "SELECT * FROM passenger WHERE 
                    FirstName = '$firstname' AND
                    MiddleName = '$middlename' AND
                    Lastname = '$lastname' AND
                    Gender = '$gender' AND
                    Birthday = '$birthdate' AND
                    Email = '$email' AND
                    ContactNum = '$contactnum' AND
                    Nationality = '$nationality' LIMIT 1";

                $checkpassengerResult = mysqli_query($db, $checkpassengerQuery);
                $ifpassengerResult = mysqli_fetch_assoc($checkpassengerResult);
                if ($ifpassengerResult) {
                    $_SESSION['passengerID' . $pcounter] = $ifpassengerResult['passengerID'];
                }

                $_SESSION['firstName' . $counter] = $firstname;
                $_SESSION['middleName' . $counter] = $middlename;
                $_SESSION['lastName' . $counter] = $lastname;
                $_SESSION['gender' . $counter] = $gender;
                $_SESSION['birthday' . $counter] = $birthdate;
                $_SESSION['age' . $counter] = $age;
                $_SESSION['email' . $counter] = $email;
                $_SESSION['contactNum' . $counter] = $contactnum;
                $_SESSION['nationality' . $counter] = $nationality;
                $_SESSION['type' . $counter] = $passengertype;
                $_SESSION['ssr' . $counter] = $ssr;
                $_SESSION['remarks' . $counter] = $remarks;
            }
        }
        
        $_SESSION['pcounter'] = $pcounter;
        header('location: confirmation.php', true, 301);
    }
?>