<?php
	require_once('dbconfig.php');
	$username = $password = '';

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM user WHERE username='$username' AND pass='$password'";
	$result = mysqli_query($con, $sql);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result))
		{			
			session_start();
			$_SESSION['user'] = $username;
		}		
		
		header("Location: main.php");
	}
	else
	{
		header("Location: index.php?login=false");
	}
?>

