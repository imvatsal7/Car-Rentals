<?php
include("../../connection/config.php");
if(isset($_POST['btnupdate'])){

$clientid=$_POST['clientid'];
$status=$_POST['status'];
$carnumber =$_POST['carnumber'];
//$rstatus="Inactive";

//update clients status
$stmt = $mysqli->prepare("select * from clients");
$stmt->execute();
$results = $stmt->get_result();
$count = $results->num_rows;

 //loop
 for($i=0;$i<$count;$i++){
$stmt = $mysqli->prepare("update  clients set cStatus=? where ClientID=?");
$stmt->bind_param("ss",$status[$i],$clientid[$i]);
$query = $stmt->execute();
 }
if($query){
	
	//update room status
	$stmt = $mysqli->prepare("select * from cars");
$stmt->execute();
$result = $stmt->get_result();
$counts = $result->num_rows;

 //loop
 for($i=0;$i<$counts;$i++){
$stmt = $mysqli->prepare("update  cars set CarStatus=? where CarNumber=?");
$stmt->bind_param("ss",$status[$i],$carnumber[$i]);
$stmt->execute();
 }
echo "updated";
}
else{
echo "not updated";
}
}