<?php
	$result = mysqli_query($con,"SELECT * FROM primaryfunction");
							
	while($row = mysqli_fetch_array($result)){
		echo "<option>".$row['pf']."</option>";
	}
?>