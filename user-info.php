<?php 
	require_once('dbconfig.php');
	$cimt = mysqli_query($con,"SELECT * FROM cimtuser WHERE fk_username='".$_SESSION['user']."' ");
	$provider = mysqli_query($con,"SELECT * FROM rsc_provider WHERE fk_username='".$_SESSION['user']."' ");
	$admin = mysqli_query($con,"SELECT * FROM administrator WHERE fk_username='".$_SESSION['user']."' ");
	
	//$cimt_result = mysqli_query($con, $cimt);
	
	if(mysqli_num_rows($cimt)>0){
		$row = mysqli_fetch_array($cimt);
		echo "<p class='dropdown-item'>".$row["phonenumber"]."</p>";
	}
	
	if(mysqli_num_rows($provider)>0){
		$row = mysqli_fetch_array($provider);
		echo "<p class='dropdown-item'>".$row["postaladdress"]."</p>";
	}
	
	
	if(mysqli_num_rows($admin)>0){
		$row = mysqli_fetch_array($admin);
		echo "<p class='dropdown-item'>".$row["email"]."</p>";
	}
	
?>