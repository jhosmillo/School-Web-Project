<?php
require_once('dbconfig.php');

$sql = "SELECT * FROM resource_function";
$result = mysqli_query($con, $sql);
$rowcount=mysqli_num_rows($result);
$sql2 = mysqli_query($con,"SELECT * FROM resources WHERE fk_username='".$_SESSION['user']."' ");
$sql3 = mysqli_query($con,"SELECT fk_pf FROM resources WHERE fk_username='".$_SESSION['user']."' ");
$total = mysqli_num_rows($sql2);
$resource = 0;
$primary_function = [];
$resourcecount= [];
$rowcounter = 0;

while($resourcearray=mysqli_fetch_assoc($sql3)){
	array_push($resourcecount,$resourcearray['fk_pf']);
}
$intresource = array_map('intval', $resourcecount);

for($f=0; $f<=$rowcount;$f++){	
	$resource=count(array_keys($intresource, $f));
	array_push($primary_function,$resource);
	$resource=0;
}

array_shift($primary_function);


while($rows = mysqli_fetch_array($result)){  
	
	echo "<tr id=".$rowcounter."><td>" . $rows['pk_function'] . "</td><td>" . $rows['rsc_function'] . "</td><td>" . $primary_function[$rowcounter] . "</td></tr>"; 
	$rowcounter++;
	
}
$rowcounter=0;

echo "<thead class='thead-dark'><tr><th></th><th>Total</th><th>".$total."</th></tr></thead>";


?>