<?php
/* Database connection */
include("../../connection/config.php");

//$total="";
//$amntpaid="";
$status="Debtor";
$stmt = $mysqli->prepare("select * from payment p, debtors d where p.PaymentID=d.PaymentID and p.pStatus =?");
$stmt->bind_param("s",$status);
$stmt->execute();
$res = $stmt->get_result();
if($res->num_rows > 0)
{
while($row = $res->fetch_assoc())
{
	$total = $total + $row['Balance'];
    $amntpaid = $amntpaid + $row['DebtPaid'];
    $unpaid = $unpaid + $row['Debt'];
}
    $totaldebt = $total;
    $paiddebt = $amntpaid;
    $tunpaid = $unpaid;
}
else
{
	$totaldebt = 0.00;
    $paiddebt = 0.00;
    $tunpaid = 0.00;
}
?>