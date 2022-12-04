<?php
    $counter = 1;

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

    foreach ($elements as $items) {
        $db = mysqli_connect('localhost', 'root' , '', 'pars');

        if (isset($_POST['submit'])) {
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
                    $ID = $ifClientResult['clientID'];
                }
                else {
                    $insertQuery = "INSERT INTO client (clientFirstName, clientMiddleName, clientLastName, clientGender, clientBirthday, clientAge, clientEmail, clientContactNum, clientNationality, clientType, clientRemarks, addClientDate, addClientTime) VALUES ('$firstname', '$middlename', '$lastname', '$gender', '$nationality', $age, '$birthdate' , '$email', '$contactnum', '$passengertype', '$remarks', curdate(), curtime())";

                    mysqli_query($db, $insertQuery);

                    $getIDquery = "SELECT clientID FROM client WHERE
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
                        clientRemarks = '$remarks";

                    $ID = mysqli_query($db, $getIDquery);
                }
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
                    $ID = $ifpassengerResult['passengerID'];
                } else {
                    $insertQuery = "INSERT INTO passenger (passengerFirstName, passengerMiddleName, passengerLastName, passengerGender, passengerBirthday, passengerAge, passengerEmail, passengerContactNum, passengerNationality, passengerType, passengerRemarks, addpassengerDate, addpassengerTime) VALUES ('$firstname', '$middlename', '$lastname', '$gender', '$nationality', $age, '$birthdate' , '$email', '$contactnum', '$passengertype', '$remarks', curdate(), curtime())";

                    mysqli_query($db, $insertQuery);

                    $getIDquery = "SELECT passengerID FROM passenger WHERE
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
                            passengerRemarks = '$remarks";

                    $ID = mysqli_query($db, $getIDquery);
                }
            }

            if ($ID) {
                
            }
        }
    }
?>