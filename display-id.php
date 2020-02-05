<?php
	require_once('dbconfig.php');
	if (isset($_GET['submit']) && $_GET['submit'] === 'true') {
		$last_id = mysqli_insert_id($con);
		echo $last_id;
		
	}
?>