<?php
include("../../connection/config.php");
if(isset($_POST['btnupdate'])){

$userid=$_POST['userid'];
$status=$_POST['status'];


$stmt = $mysqli->prepare("select * from users");
$stmt->execute();
$results = $stmt->get_result();
$count = $results->num_rows;

 //loop
 for($i=0;$i<$count;$i++){
$stmt = $mysqli->prepare("update  users set Status=? where UserID=?");
$stmt->bind_param("ss",$status[$i],$userid[$i]);
$query = $stmt->execute();
 }
if($query){
echo "updated";
}
else{
echo "not updated";
}
}