<?php
    session_start();

    $counter = 1;
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
    $remarks = "";

    if (isset($_POST['seatSubmit'])) {
        $db = mysqli_connect('localhost', 'root' , '', 'pars');

        foreach ($_SESSION['elements'] as $items) {
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
            $remarks = mysqli_real_escape_string($db, $_POST['remarks' . $counter]);

            if ($counter == 1) {
                $checkClientQuery = "SELECT * FROM client WHERE 
                    clientFirstName = '$firstname' AND
                    clientMiddleName = '$middlename' AND
                    clientLastname = '$lastname' AND
                    clientGender = '$gender' AND
                    clientBirthday = '$birthdate' AND
                    clientAge = $age AND
                    clientEmail = '$email' AND
                    clientContactNum = '$contactnum' AND
                    clientNationality = '$nationality' AND
                    clientType = '$passengertype' AND
                    clientRemarks = '$remarks' LIMIT 1";

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
                $_SESSION['clientRemarks'] = $remarks;
                $_SESSION['clientSeat'] = $items;
                echo $_SESSION['clientFirstName'];
            }
            else {
                $checkpassengerQuery = "SELECT * FROM passenger WHERE 
                    passengerFirstName = '$firstname' AND
                    passengerMiddleName = '$middlename' AND
                    passengerLastname = '$lastname' AND
                    passengerGender = '$gender' AND
                    passengerBirthday = '$birthdate' AND
                    passengerAge = $age AND
                    passengerEmail = '$email' AND
                    passengerContactNum = '$contactnum' AND
                    passengerNationality = '$nationality' AND
                    passengerType = '$passengertype' AND
                    passengerRemarks = '$remarks' LIMIT 1";

                $checkpassengerResult = mysqli_query($db, $checkpassengerQuery);
                $ifpassengerResult = mysqli_fetch_assoc($checkpassengerResult);
                if ($ifpassengerResult) {
                    $_SESSION['passengerID' . $pcounter] = $ifpassengerResult['passengerID'];
                    $_SESSION['passengerFirstName' . $pcounter] = $ifpassengerResult['passengerFirstName'];
                    $_SESSION['passengerMiddleName' . $pcounter] = $ifpassengerResult['passengerMiddleName'];
                    $_SESSION['passengerLastName' . $pcounter] = $ifpassengerResult['passengerLastName'];
                    $_SESSION['passengerGender' . $pcounter] = $ifpassengerResult['passengerGender'];
                    $_SESSION['passengerBirthday' . $pcounter] = $ifpassengerResult['passengerBirthday'];
                    $_SESSION['passengerAge' . $pcounter] = $ifpassengerResult['passengerAge'];
                    $_SESSION['passengerEmail' . $pcounter] = $ifpassengerResult['passengerEmail'];
                    $_SESSION['passengerContactNum' . $pcounter] = $ifpassengerResult['passengerContactNum'];
                    $_SESSION['passengerNationality' . $pcounter] = $ifpassengerResult['passengerNationality'];
                    $_SESSION['passengerType' . $pcounter] = $ifpassengerResult['passengerType'];
                    $_SESSION['passengerRemarks' . $pcounter] = $ifpassengerResult['passengerRemarks'];
                    $_SESSION['passengerSeat' . $pcounter] = $items;
                } else {
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
                    $_SESSION['passengerRemarks' . $pcounter] = $remarks;
                    $_SESSION['passengerSeat' . $pcounter] = $items;
                }
                $pcounter++;
            }
            $counter++;
        }
        $_SESSION['counter'] = $counter;
        $_SESSION['pcounter'] = $pcounter;
        header('location: confirmation.php');
    }
?>