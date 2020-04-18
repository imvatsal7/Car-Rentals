<?php
include("../../connection/config.php");
session_start();
error_reporting(0);

if($_POST){
	
	//clients
	function guidv4($data)
{
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

$clientid= guidv4(openssl_random_pseudo_bytes(16));
//$clientid = $uuid = bin2hex(openssl_random_pseudo_bytes(16));
$fullname = mysqli_real_escape_string($mysqli, $_POST["fullname"]);
$phone =    mysqli_real_escape_string($mysqli, $_POST["phone"]);
$email = mysqli_real_escape_string($mysqli, $_POST["email"]);
$accounttype = mysqli_real_escape_string($mysqli, $_POST["accounttype"]);
$companyname = mysqli_real_escape_string($mysqli, $_POST["companyname"]);
$address = mysqli_real_escape_string($mysqli, $_POST["address"]);
$useid=$_SESSION["userid"];
$status = "Pending";

//reservation
$resid = uniqid();
$carnumber=$_POST['carnumber'];
$resource = $_POST['resource'];
$datefrom = $_POST['datefrom'];
$dateto = $_POST['dateto'];
$totalc="";
//$date_to = "2018-11-07 12:00:00";
	
$from_time = strtotime($datefrom);
$to_time = strtotime($dateto);
$dur = round(abs($to_time - $from_time) / 60,2). " minute";
$duration = round($dur/60);


$stmt = $mysqli->prepare("insert into clients(ClientID,cFullName,PhoneNumber,cEmail,cAccountType,CompanyName,Address,cStatus,UserID)values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss",$clientid,$fullname,$phone,$email,$accounttype,$companyname,$address,$status,$useid);

if($stmt->execute()){
	  $stmt=$mysqli->prepare("select Price from cars where CarNumber =?");
    $stmt->bind_param("s",$carnumber);
    $stmt->execute();
    $res=$stmt->get_result();
if($row=$res->fetch_assoc())
{
$amount=$row["Price"];
$totalc = ($amount *$duration);

$stmt = $mysqli->prepare("insert into reservation(ReservationID,ClientID,CarNumber,Resource,CheckInDate,CheckOutDate,Duration,TotalCharge,UserID)values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss",$resid,$clientid,$carnumber,$resource,$datefrom,$dateto,$duration,$totalc,$useid);
$stmt->execute();

echo "registered";
  }
  else
   {
	echo "error";
    }
 }
else
   {
	echo "error";
    }
  }
?>