<?php 
session_start();
require_once('dbconfig.php');


$resource_name = $_POST['resourceName'];
$primary_Function = $_POST['primaryFunction'];
$secondary_Function = $_POST['secondaryFunction'];
$description = $_POST['description'];
$distance_temp = $_POST['distance'];
$cost_temp = $_POST['cost'];
$unit = $_POST['selectCost'];
$username = $_SESSION['user'];

$cost = floatval($cost_temp);






$description = addslashes($description);
$resource_name = addslashes($resource_name);
if($cost!=""){
	if(is_numeric($cost)){
		if(isset($_COOKIE['capArr'])){
			$str_Arr = $_COOKIE['capArr'];
			$capabilities = explode('"',$str_Arr);
			$arraysize = sizeof($capabilities);

			//remove commas from array
			for($i=0;$i<$arraysize;$i++){
				if($capabilities[$i]==","){
					unset($capabilities[$i]);
				}			
			}
			//remove the brackets from array
			array_pop($capabilities);
			array_shift($capabilities);
			
			foreach(array_keys($capabilities) as $value){
				$capabilities[$value] = addslashes($capabilities[$value]);
			}
			$arraysize = sizeof($capabilities);
			setcookie("capArr", "", time() - 3600); 
		}
		$distance=0;
		if($distance_temp!=""){
			if(is_numeric($distance_temp)){
				$distance = floatval($distance_temp);
			}else{
				header("Location: add-available-resource.php?submit=false&distance=false");			
				die();
			}
		}
		
		
		
		if($primary_Function!=""){
			$result = mysqli_query($con,"SELECT * FROM resource_function WHERE rsc_function='$primary_Function'");
			$row = mysqli_fetch_array($result);
			$primary_Function = $row["pk_function"];
		}

		if($secondary_Function!=""){
			$result = mysqli_query($con,"SELECT * FROM resource_function WHERE rsc_function='$secondary_Function'");
			$row = mysqli_fetch_array($result);
			$secondary_Function = $row["pk_function"];
		}

		if($unit!=""){
			$result = mysqli_query($con,"SELECT * FROM unit WHERE per_unit='$unit'");
			$row = mysqli_fetch_array($result);
			$unit = $row["unit_id"];
		}


			
		if(!($primary_Function=="" && $secondary_Function=="")){
			$sql = "INSERT INTO resources (resourcename, fk_pf, fk_sf, rsc_description,distance,fk_username)
				VALUES('$resource_name', '$primary_Function', '$secondary_Function', '$description', '$distance', '$username')";
		}
		if ($primary_Function!= "" && $secondary_Function=="") {
			$sql = "INSERT INTO resources (resourcename, fk_pf, rsc_description,distance,fk_username)
				VALUES('$resource_name', '$primary_Function', '$description', '$distance', '$username')";
		}

				
		if(mysqli_query($con, $sql)){
			header("Location: add-available-resource.php?submit=true");
		} else{
		   //header("Location: add-available-resource.php?submit=false");
		   echo("Error description: " . mysqli_error($con));
		   echo $distance;
		}

		$last_id = mysqli_insert_id($con);
		if(isset($arraysize)){
			for($i=0;$i<$arraysize;$i++) {
				$capabilities = array_map( 'addslashes', $capabilities);
				$cap_insert = $capabilities[$i];
				$sql_cap = "INSERT INTO capabilities(fk_cap,cap_description)
						VALUES('$last_id','$cap_insert')";
				mysqli_query($con,$sql_cap);
			}	
		}

		if(!($cost==""&&$unit=="")){
			$sql_cost = "INSERT INTO cost (fk_resource,cost_value,per_unit)
					VALUES('$last_id','$cost','$unit')";
			mysqli_query($con, $sql_cost);
		}
	}
}else{
	header("Location: add-available-resource.php?submit=false&cost=false");
}

?>