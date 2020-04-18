<?php

include("../../connection/config.php");

$output="";
$no=1;

$stmt= $mysqli->prepare("select * from clients c,reservation s, payment p, debtors d, debtpaid b where c.ClientID=s.ClientID and s.ReservationID=p.ReservationID and p.PaymentID=d.PaymentID and p.PaymentID=b.PaymentID order by dDateTime desc");
$stmt->execute();
$results=$stmt->get_result();
if($results->num_rows > 0){
	$row = $results->fetch_assoc();
$output .='
           <div class="table-responsive" style="font-size:20px">
	       <table id="example" class="table table-striped" style="width:100%">
		   <tr>
		   <td>Receipt Number</td><td>:</td><td>'.$row["PaymentID"].'</td>
		   </tr>
		   <tr>
		   <td>Full Name</td><td>:</td><td>'.$row["cFullName"].'</td>
		   </tr>
		   <tr>
		   <td>Debt Paid</td><td>:</td><td><label for="label">&cent; '.$row["AmountPaid"].'</label></td>
		   </tr>
		   <tr>
		   <td>Remaining Debt </td><td>:</td><td><label for="label">&cent; '.$row["Debt"].'</label></td>
		   </tr>
		   </table>
		  
		   <br/>
		   ';
  
   echo $output;
}
else{
	echo "No records available";
}


?>