<?php
require_once('dbconfig.php');
$keyword='';
$primaryFunction = '';
$distance = '';
if (isset($_POST['keyword'])){
	$keyword = $_POST['keyword'];
}else{
	$keyword="";
}
if (isset($_POST['primaryFunction'])){
	$primaryFunction = $_POST['primaryFunction'];
}else{
	$primaryFunction="";
}
if (isset($_POST['distance'])){
	$distance = $_POST['distance'];
}else{
	$distance="";
}


if (isset($_GET['search'])){
		
}else{
	header("Location: search-resources.php?search=$keyword&function=$primaryFunction&distance=$distance");
}
?>