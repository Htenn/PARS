<?php 
$clientID = $_POST['clientID'];
$clientFirstName = $_POST['clientFirstName'];
$clientMiddleName = $_POST['clientMiddleName'];
$clientLastName = $_POST['clientLastName'];
$clientGender = $_POST['clientGender'];
$clientBirthday = $_POST['clientBirthday'];
$clientAge = $_POST['clientAge'];
$clientEmail = $_POST['clientEmail'];
$clientContactNum = $_POST['clientContactNum'];
$clientNationality = $_POST['clientNationality'];
$clientAddtnlinfo = $_POST['clientAddtnlinfo'];
$clientRemarks = $_POST['clientRemarks'];



$conn = new mysqli('localhost','root','');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else{
	$stmt = $conn->prepare("insert into client(clientID, clientFirstName, clientMiddleName, clientLastName, clientGender, clientBirthday, clientAge, clientEmail, clientContactNum, clientNationality, clientAddtnlinfo, clientRemarks) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssssssssssss",$clientID, $clientFirstName, $clientMiddleName, $clientLastName, $clientGender, $clientBirthday, $clientAge, $clientEmail, $clientContactNum, $clientNationality, $clientAddtnlinfo, $clientRemakrs);
	$stmt->execute();
	echo "Success";
	$stmt->close(); 
	$conn->close();
}

?>