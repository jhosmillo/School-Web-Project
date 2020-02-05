<?php
include("search-results.php");
$keyword=$_GET['search'];
$primarySearch=$_GET['function'];
$searchDistance = $_GET['distance'];
$distanceSearchResult='';
$distanceSearchResult=true;

$sql = "SELECT resources.resourceid, resources.resourcename, resource_function.rsc_function, resources.rsc_description, resources.distance, cost.cost_value, 
	unit.per_unit,capabilities.cap_description,user.displayname FROM resources LEFT OUTER JOIN cost ON cost.fk_resource=resources.resourceid LEFT OUTER JOIN unit ON cost.per_unit=unit.unit_id LEFT OUTER JOIN 
	capabilities ON resources.resourceid=capabilities.fk_cap RIGHT OUTER JOIN resource_function ON resources.fk_pf=resource_function.pk_function LEFT OUTER JOIN user ON user.username=resources.fk_username";

if($keyword==="" && $primarySearch==="" && $searchDistance ===""){
	$sql .= " WHERE resources.resourceid IS NOT NULL GROUP BY resources.resourceid ORDER BY resources.distance ASC";
	$result = mysqli_query($con, $sql);

	while($rows=mysqli_fetch_array($result)){
		echo "<tr><td>".$rows['resourceid']."</td><td>".$rows['resourcename']."</td><td>".$rows['displayname']."</td><td>".'$',$rows['cost_value'],'/',$rows['per_unit']."</td><td>".$rows['distance']."</td></tr>";		
	}
	$rows = mysqli_num_rows($result);
	
	if($rows==0){	
		$searchResult = false;		
	}else{
		$searchResult = true;	
	}
	//echo is_float($_GET['distance']);
}else{
	$keyword=addslashes($keyword);
	if($keyword!=""){
		$sql .= " WHERE (resources.rsc_description LIKE '%$keyword%' OR resources.resourcename LIKE '%$keyword%' OR capabilities.cap_description LIKE '%$keyword%')";
		
	}
	if($primarySearch!=""){
		if($keyword!=""){
			$sql .= " AND (resource_function.rsc_function LIKE '%$primarySearch%')";
		}else{
			$sql .= " WHERE (resource_function.rsc_function LIKE '%$primarySearch%')";
		}
		
	}
	if($searchDistance!=""){
			if(is_numeric($searchDistance)){
				$distance1=floatval($searchDistance + 0.2);
				$distance2=floatval($searchDistance - 0.2);
				if($keyword==="" && $primarySearch===""){
					$sql .= " WHERE (resources.distance BETWEEN '$distance2' AND '$distance1')";
				}				
				$sql .= " AND (resources.distance BETWEEN '$distance2' AND '$distance1')";																					
			}else{
				$distanceSearchResult=false;
			}
		}
	
		$sql .= " GROUP BY resources.resourceid ORDER BY resources.distance ASC";
		$result = mysqli_query($con, $sql);
		while($rows=mysqli_fetch_array($result)){
			echo "<tr><td>".$rows['resourceid']."</td><td>".$rows['resourcename']."</td><td>".$rows['displayname']."</td><td>".'$',$rows['cost_value'],'/',$rows['per_unit']."</td><td>".$rows['distance']."</td></tr>";			
		}
	
	
	$rows = mysqli_num_rows($result);
	if($rows==0){	
		$searchResult = false;		
	}else{
		$searchResult = true;	
	}
}
?>