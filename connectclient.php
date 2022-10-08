<?php 
$connection = mysqli_connect("localhost","root","Fgs8%[EHwcdmupuv","id17946631_pars");
if($connection->connect_error){
	die('Connection Failed : '.$connection->connect_error);
}else{
	$stmt = $connection->prepare("insert into client(clientID, clientFirstName, clientMiddleName, clientLastName, clientGender, clientBirthday, clientAge, clientEmail, clientContactNum, clientNationality", clientAddtnlinfo, clientRemarks) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
	$stmt->bind_param("",$clientID, $clientFirstName, $clientMiddleName, $clientLastName, $clientGender, $clientBirthday, $clientAge, $clientEmail, $clientContactNum, $clientNationality, $clientAddtnlinfo, $clientAddtnlinfo);
	$stmt->execute();
	echo "Success";
	$stmt->close();
	$connection->close();
}

?>