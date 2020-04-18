<?php
include("../../connection/config.php");


	$sql = "SELECT * from cartypes  where CarType like '%". $_GET['q'] ."%' limit 10";
	$result = $mysqli->query($sql);
	$json = [];
	
	while($row = $result->fetch_assoc())
	{
		$json[] = ['id'=>$row['CarTypeID'], 'text'=>$row['CarType']];
	}
   echo json_encode($json);
	?>