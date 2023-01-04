<?php
    session_start();
    $db = mysqli_connect('localhost', 'root' , '', 'pars');

    $pcounter = 1;

    $firstname = "";
    $middlename = "";
    $lastname = "";
    $gender = "";
    $nationality = "";
    $age = "";
    $birthdate = "";
    $email = "";
    $contactnum = "";
    $passengertype = "";
    $passengeroption = "";
    $remarks = "";

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
            $passengeroption = mysqli_real_escape_string($db, $_POST['passengerOption' . $counter]);
            $remarks = mysqli_real_escape_string($db, $_POST['remarks' . $counter]);

            if ($counter == 1) {
                $checkClientQuery = "SELECT * FROM client WHERE 
                    clientFirstName = '$firstname' AND
                    clientMiddleName = '$middlename' AND
                    clientLastname = '$lastname' AND
                    clientGender = '$gender' AND
                    clientBirthday = '$birthdate' AND
                    clientEmail = '$email' AND
                    clientContactNum = '$contactnum' AND
                    clientNationality = '$nationality' LIMIT 1";

                $checkClientResult = mysqli_query($db, $checkClientQuery);
                $ifClientResult = mysqli_fetch_assoc($checkClientResult);
                if ($ifClientResult) {
                    $_SESSION['clientID'] = $ifClientResult['clientID'];
                }

                $_SESSION['clientFirstName'] = $firstname;
                $_SESSION['clientMiddleName'] = $middlename;
                $_SESSION['clientLastName'] = $lastname;
                $_SESSION['clientGender'] = $gender;
                $_SESSION['clientBirthday'] = $birthdate;
                $_SESSION['clientAge'] = $age;
                $_SESSION['clientEmail'] = $email;
                $_SESSION['clientContactNum'] = $contactnum;
                $_SESSION['clientNationality'] = $nationality;
                $_SESSION['clientType'] = $passengertype;
                $_SESSION['clientOption'] = $passengeroption;
                $_SESSION['clientRemarks'] = $remarks;
            }
            else { // PASSENGER
                $checkpassengerQuery = "SELECT * FROM passenger WHERE 
                    passengerFirstName = '$firstname' AND
                    passengerMiddleName = '$middlename' AND
                    passengerLastname = '$lastname' AND
                    passengerGender = '$gender' AND
                    passengerBirthday = '$birthdate' AND
                    passengerEmail = '$email' AND
                    passengerContactNum = '$contactnum' AND
                    passengerNationality = '$nationality' LIMIT 1";

                $checkpassengerResult = mysqli_query($db, $checkpassengerQuery);
                $ifpassengerResult = mysqli_fetch_assoc($checkpassengerResult);
                if ($ifpassengerResult) {
                    $_SESSION['passengerID' . $pcounter] = $ifpassengerResult['passengerID'];
                }

                $_SESSION['passengerFirstName' . $pcounter] = $firstname;
                $_SESSION['passengerMiddleName' . $pcounter] = $middlename;
                $_SESSION['passengerLastName' . $pcounter] = $lastname;
                $_SESSION['passengerGender' . $pcounter] = $gender;
                $_SESSION['passengerBirthday' . $pcounter] = $birthdate;
                $_SESSION['passengerAge' . $pcounter] = $age;
                $_SESSION['passengerEmail' . $pcounter] = $email;
                $_SESSION['passengerContactNum' . $pcounter] = $contactnum;
                $_SESSION['passengerNationality' . $pcounter] = $nationality;
                $_SESSION['passengerType' . $pcounter] = $passengertype;
                $_SESSION['passengerOption' . $pcounter] = $passengeroption;
                $_SESSION['passengerRemarks' . $pcounter] = $remarks;
                
                $pcounter++;
            }
        }
        $_SESSION['counter'] = $counter;
        $_SESSION['pcounter'] = $pcounter;
        header('location: confirmation.php', true, 301);
    }
?>