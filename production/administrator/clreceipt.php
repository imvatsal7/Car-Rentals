<?php

include("../../connection/config.php");

$output="";
$no=1;

$stmt= $mysqli->prepare("select * from clients c,reservation s, cars r, payment p where c.ClientID=s.ClientID and s.CarNumber=r.CarNumber and s.ReservationID=p.ReservationID order by pDateTime desc");
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
		   <td>Car Number</td><td>:</td><td># '.$row["CarNumber"].'</td>
		   </tr>
		   <tr>
		   <td>Check IN</td><td>:</td><td>'.$row["CheckInDate"].'</td>
		   </tr>
		   <tr>
		   <td>Check Out</td><td>:</td><td>'.$row["CheckOutDate"].'</td>
		   </tr>
		   <tr>
		   <td>Sub Total</td><td>:</td><td><label for="label">&dollar; '.$row["SubTotal"].'</label></td>
		   </tr>
		   <tr>
		   <td>Discount</td><td>:</td><td>'.$row["Discount"].'%</td>
		   </tr>
		   <tr>
		   <td>Total</td><td>:</td><td><label for="label">&dollar; '.$row["Total"].'</label></td>
		   </tr>
		   <tr>
		   <td>Amount Paid</td><td>:</td><td><label for="label">&dollar; '.$row["AmntPaid"].'</label></td>
		   </tr>
		   <tr>
		   <td>Unpaid Amount </td><td>:</td><td><label for="label">&dollar; '.$row["Balance"].'</label></td>
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