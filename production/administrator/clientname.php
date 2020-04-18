<?php
include("../../connection/config.php");


	$sql = "SELECT * from clients c, reservation s, payment p  where c.ClientID=s.ClientID and c.cFullName like '%". $_GET['q'] ."%' and s.ReservationID=p.ReservationID and p.pStatus='Debtor' limit 10";
	$result = $mysqli->query($sql);
	$json = [];
	
	while($row = $result->fetch_assoc())
	{
		$json[] = ['id'=>$row['ClientID'], 'text'=>$row['cFullName']];
	}
   echo json_encode($json);
	?>