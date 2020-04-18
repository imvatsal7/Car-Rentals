<?php
include("../../connection/config.php");
session_start();
if(isset($_POST["btnsave"]))
{
$payid = uniqid();
$debtid = uniqid();
$clientid = $_POST['clientid'];
$reserveid = $_POST['reserveid'];
$subtotal = $_POST['subtotal'];
$discount = $_POST['discount'];
$gtotal = $_POST['gtotal'];
$userid = $_SESSION['userid'];
$carnumber=$_POST['carnumber'];
$amntpaid=$_POST['amntpaid'];
$balance=$_POST['balance'];
$status = '';
$active = 'Active';
$rstatus = 'Active';

if($balance != 0){
  $status = 'Debtor';
}
else if($balance == 0){
  $status = 'Paid';
}
else{
  $status = 'Complement';
}
if($balance > 0)
{
$stmt = $mysqli->prepare("insert into payment (PaymentID,ReservationID,SubTotal,Discount,Total,AmntPaid,Balance,pStatus,UserID)values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss",$payid,$reserveid,$subtotal,$discount,$gtotal,$amntpaid,$balance,$status,$userid);
if($stmt->execute())
{
   $amtpaid= '0.00';
   $stmt = $mysqli->prepare("insert into debtors (DebtID,PaymentID,Debt,DebtPaid,UserID)values(?,?,?,?,?)");
   $stmt->bind_param("sssss",$debtid,$payid,$balance,$amtpaid,$userid);		
	if($stmt->execute())
{
	
$stmt = $mysqli->prepare("update clients set cStatus =? where ClientID =?");
$stmt->bind_param("ss",$active,$clientid);
if($stmt->execute())
{
$stmt = $mysqli->prepare("update cars set CarStatus =? where CarNumber =?");
$stmt->bind_param("ss",$rstatus,$carnumber);
if($stmt->execute())
{

	   echo "success";
   }
   else
{
echo "Error";
    }
   }
  }
 }
}

else{
	$stmt = $mysqli->prepare("insert into payment (PaymentID,ReservationID,SubTotal,Discount,Total,AmntPaid,Balance,pStatus,UserID)values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss",$payid,$reserveid,$subtotal,$discount,$gtotal,$amntpaid,$balance,$status,$userid);
if($stmt->execute())
{
$stmt = $mysqli->prepare("update clients set cStatus =? where ClientID =?");
$stmt->bind_param("ss",$active,$clientid);
if($stmt->execute())
{
$stmt = $mysqli->prepare("update cars set CarStatus =? where CarNumber =?");
$stmt->bind_param("ss",$rstatus,$carnumber);
if($stmt->execute())
{
  
	   echo "success";
   }
   else
 {
echo "Error";
    }
   }	
  }
else
{
echo "Error";
  }
 }
}
?>