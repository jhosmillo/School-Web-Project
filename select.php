<?php
	$result = mysqli_query($con,"SELECT * FROM resource_function");
							
	while($row = mysqli_fetch_array($result)){
		echo "<option>".$row['rsc_function']."</option>";
	}
?>