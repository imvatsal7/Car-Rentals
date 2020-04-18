<?php
include("../../connection/config.php");
session_start();

if(isset($_POST["btnsave"]))
{
$debtpid = uniqid();
$debtid = $_POST['debtid'];
$payid = $_POST['payid'];
$dpayid = $_POST['dpayid'];
$amntpaid=$_POST['amntpaid'];
$balance=$_POST['balance'];
$userid = $_SESSION['userid'];

if($balance == 0.00)
{
$stmt = $mysqli->prepare("insert into debtpaid (DebtPaidID,PaymentID,AmountPaid,UserID)values(?,?,?,?)");
$stmt->bind_param("ssss",$debtpid,$payid,$amntpaid,$userid);	
if($stmt->execute())
{
$stmt = $mysqli->prepare("update payment set pStatus = 'Paid' where PaymentID =?");
$stmt->bind_param("s",$payid);
if($stmt->execute())
{
    //$sql->prepare("select * from debtpaid where PaymentID=?");
    //$sql->bind_param("s",$dpayid);
    //$rest = $sql->get_result();
    //while($row = $rest->fetch_assoc()){
     //   $debtpaid = $debtpaid + $row['AmountPaid'];
     //  }  
    //$tdebtpaid = $debtpaid;
$stmt = $mysqli->prepare("update debtors set Debt = ?, DebtPaid = DebtPaid + ? where DebtID =?");
$stmt->bind_param("sss",$balance,$amntpaid,$debtid);
    if($stmt->execute()){
        echo "success";
    }
    
	else{
	echo "error";
  }
    }
else{
	echo "error";
  }
 }
 else{
	echo "error";
  }
}
else{
$stmt = $mysqli->prepare("insert into debtpaid (DebtPaidID,PaymentID,AmountPaid,UserID)values(?,?,?,?)");
$stmt->bind_param("ssss",$debtpid,$payid,$amntpaid,$userid);
if($stmt->execute())
{
$stmt = $mysqli->prepare("update debtors set Debt = ?, DebtPaid = DebtPaid + ? where DebtID =?");
$stmt->bind_param("sss",$balance,$amntpaid,$debtid);
    if($stmt->execute()){
        echo "success";
    }
    
	else{
	echo "error";
  }
}
else{
	echo "error";
  }
 }
}
?>