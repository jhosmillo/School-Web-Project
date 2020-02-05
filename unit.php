<?php
	$result = mysqli_query($con,"SELECT * FROM unit");
							
	while($row = mysqli_fetch_array($result)){
		echo "<option>".$row['per_unit']."</option>";
	}
?>