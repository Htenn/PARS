<?php
    session_start();
    require '../../db.php';

    if (isset($_POST['pnrSubmit'])) {

        $seatcount = $_SESSION['seatcount'];

        if ($seatcount > $_SESSION['maxSeatCount']) {
            $_SESSION['maxSeatCount'] = $seatcount;
        }

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
            $seat1 = mysqli_real_escape_string($db, $_POST['seat1' . $counter]);
            $seat2 = mysqli_real_escape_string($db, $_POST['seat2' . $counter]);
            $ssrA = mysqli_real_escape_string($db, $_POST['ssrA' . $counter]);
            $ssrB = mysqli_real_escape_string($db, $_POST['ssrB' . $counter]);
            $ssrC = mysqli_real_escape_string($db, $_POST['ssrC' . $counter]);
            $ssrD = mysqli_real_escape_string($db, $_POST['ssrD' . $counter]);
            $ssr = $ssrA . " " . $ssrB . " " . $ssrC . " " . $ssrD;
            $remarks = mysqli_real_escape_string($db, $_POST['remarks' . $counter]);


            $checkClientQuery = "SELECT * FROM pnr WHERE 
                FirstName = '$firstname' AND
                MiddleName = '$middlename' AND
                Lastname = '$lastname' AND
                Gender = '$gender' AND
                Birthday = '$birthdate' AND
                Nationality = '$nationality' AND
                user = '" . $_SESSION['user'] ."' LIMIT 1";

            $checkClientResult = mysqli_query($db, $checkClientQuery);
            $ifClientResult = mysqli_fetch_assoc($checkClientResult);
            if ($ifClientResult) {
                $_SESSION['passengerID' . $counter] = $ifClientResult['ID'];
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
            $_SESSION['seat1' . $counter] = $seat1;
            $_SESSION['seat2' . $counter] = $seat2;
            $_SESSION['ssrA' . $counter] = $ssrA;
            $_SESSION['ssrB' . $counter] = $ssrB;
            $_SESSION['ssrC' . $counter] = $ssrC;
            $_SESSION['ssrD' . $counter] = $ssrD;
            $_SESSION['ssr' . $counter] = $ssr;
            $_SESSION['remarks' . $counter] = $remarks;
            
        }

        header('location: confirmation.php', true, 301);
    }
?>