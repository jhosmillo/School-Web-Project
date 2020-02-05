<?php
session_start();
require_once('dbconfig.php');
$category = $_POST['categorySelect'];
$date = $_POST['datepicker'];
$description = $_POST['incidentDescription'];
$username = $_SESSION['user'];

$tempDescription = addslashes($description);
$description = $tempDescription;
$sqlDate = str_replace('/', '-', $date);
$date=date("Y-m-d",strtotime($sqlDate));



$categoryID = "SELECT * FROM category WHERE category_type LIKE '%$category%'";
$resultCatID = mysqli_query($con, $categoryID);
$tempCatID=mysqli_fetch_array($resultCatID);
$catID = $tempCatID['category_id'];

$incidentID = "SELECT * FROM incidents WHERE incidentid LIKE '%$catID%' ORDER BY incidentid DESC LIMIT 1";
$resultIncidentID = mysqli_query($con, $incidentID);
$rows = mysqli_num_rows($resultIncidentID);
if($rows===0){
	$insertID = $catID . "-" . 1;
}else{
	$tempIncidentID=mysqli_fetch_array($resultIncidentID);
	$tempIdResult=$tempIncidentID['incidentid'];
	$tempID=substr($tempIdResult,3);

	$intID = (int)$tempID;
	$intID=$intID+1;

	$insertID = $catID . "-" . $intID;
}

$insertIncident = "INSERT INTO incidents (incidentid, fk_category, incident_date, inci_description, fk_username)
					VALUES ('$insertID', '$catID', '$date', '$description', '$username')";
if(mysqli_query($con, $insertIncident)){
	header("Location: add-emergency-incident.php?submit=true&ID=$catID");
} else{
	header("Location: add-emergency-incident.php?submit=false");
	
}



?>