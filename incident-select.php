<?php
	$result = mysqli_query($con,"SELECT * FROM category");
							
	while($row = mysqli_fetch_array($result)){
		echo "<option>".$row['category_type']."</option>";
	}
?>