<?php
include("../../connection/config.php");

            
	$sql = "SELECT * from cars where CarStatus='Inactive' and CarNumber like '%". $_GET['q'] ."%' order by CarNumber asc limit 10";
	$result = $mysqli->query($sql);
	$json = [];
	
	while($row = $result->fetch_assoc())
	{
		$json[] = ['id'=>$row['CarNumber'], 'text'=>$row['CarNumber']];
	}
   echo json_encode($json);
			?>