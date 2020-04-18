<?php
include("../../connection/config.php");
if(isset($_POST['btnupdate'])){

$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$usertype=$_POST['usertype'];
$username=$_POST['username'];
$userid=$_POST['userid'];

$stmt = $mysqli->prepare("select * from users");
$stmt->execute();
$results = $stmt->get_result();
$count = $results->num_rows;

 //loop
 for($i=0;$i<$count;$i++){
$stmt = $mysqli->prepare("update  users set FullName=?,PhoneNo=?,Email=?,UserType=?,Username=? where UserID=?");
$stmt->bind_param("ssssss",$fullname[$i],$phone[$i],$email[$i],$usertype[$i],$username[$i],$userid[$i]);
$query = $stmt->execute();
 }
if($query){
echo "updated";
}
else{
echo "not updated";
}
}