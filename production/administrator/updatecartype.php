<?php
include("../../connection/config.php");
if(isset($_POST['btnupdate'])){

$carstypeid=$_POST['carstypeid'];
$carstype = $_POST['carstype'];

$stmt = $mysqli->prepare("select * from cartypes");
$stmt->execute();
$results = $stmt->get_result();
$count = $results->num_rows;

 //loop
 for($i=0;$i<$count;$i++){
$stmt = $mysqli->prepare("update cartypes set CarType=? where CarTypeID=?");
$stmt->bind_param("ss",$carstype[$i],$carstypeid[$i]);
$query = $stmt->execute();
 }
if($query){
echo "updated";
}
else{
echo "not updated";
}
}