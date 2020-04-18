<?php
include("../../connection/config.php");
if(isset($_POST['btnupdate'])){

$clientid=$_POST['clientid'];
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$accounttype=$_POST['accounttype'];
$companyname=$_POST['companyname'];
$address=$_POST['address'];

$stmt = $mysqli->prepare("select * from clients");
$stmt->execute();
$results = $stmt->get_result();
$count = $results->num_rows;

 //loop
 for($i=0;$i<$count;$i++){
$stmt = $mysqli->prepare("update  clients set cFullName=?,PhoneNumber=?,cEmail=?,cAccountType=?,CompanyName=?,Address=? where ClientID=?");
$stmt->bind_param("sssssss",$fullname[$i],$phone[$i],$email[$i],$accounttype[$i],$companyname[$i],$address[$i],$clientid[$i]);
$query = $stmt->execute();
 }
if($query){
echo "updated";
}
else{
echo "not updated";
}
}