<?php
include("../../connection/config.php");


	$sql = "SELECT * from brand  where Brand like '%". $_GET['q'] ."%' limit 10";
	$result = $mysqli->query($sql);
	$json = [];
	
	while($row = $result->fetch_assoc())
	{
		$json[] = ['id'=>$row['BrandID'], 'text'=>$row['Brand']];
	}
   echo json_encode($json);
	?>