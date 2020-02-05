<?php
	require_once('dbconfig.php');
	if (isset($_GET['submit']) && $_GET['submit'] === 'true') {
		$catid= $_GET['ID'];
		$result = mysqli_query($con,"SELECT incidentid FROM incidents WHERE incidentid LIKE '%$catid%' ORDER BY incidentid DESC LIMIT 1");
		$row = mysqli_fetch_array($result);	
		$catQuery = $row['incidentid'];
		echo $catQuery;
		
	}
?>