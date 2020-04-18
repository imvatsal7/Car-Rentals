<?php
include("../../connection/config.php");

      $output = '';
	  if(isset($_POST["client_id"])){
		$client_id = $_POST["client_id"];
		
		$sql = "SELECT * from clients c, reservation s,payment p,debtors d where c.ClientID=s.ClientID and c.ClientID = '$client_id' and s.ReservationID=p.ReservationID and p.PaymentID=d.PaymentID order by d.dDateTime desc";
		$res = mysqli_query($mysqli,$sql) or die('Error, query failed');
			
		if($res->num_rows > 0)
		{
		$row = $res->fetch_assoc();
			
			
		$output .= '
<div class="form-group">
<input type="hidden" name="payid" id="payid" value="'. $row['PaymentID'] .'" class="form-control" placeholder="Payment ID" readonly="readonly" />
<input type="hidden" name="dpayid" id="dpayid" value="'. $row['PaymentID'] .'" class="form-control" placeholder="Payment ID" readonly="readonly" />
<input type="hidden" name="debtid" id="debtid" value="'. $row['DebtID'] .'" class="form-control" placeholder="Debt ID" readonly="readonly" />
</div>

<label for="label">Debt &cent;</label>
<div class="form-group"><input type="text" name="gtotal" id="gtotal" value="'. $row['Debt'] .'" class="form-control" placeholder="Debt" readonly="readonly" required /></div>

<label for="label">Amount Paid &cent;</label>
<div class="form-group"><input type="number" name="amntpaid" id="amntpaid" data-bv-digits="true" value="" class="form-control" placeholder="Amount Paid"  required /></div>

<label for="label">Remaining Debt &cent;</label>
<div class="form-group"><input type="text" name="balance" id="balance" value="" class="form-control" placeholder="Remaining Debt" readonly="readonly"  required /></div>

</div>
';
      }
		else
			{
				$output .= 'Sorry! No record(s) available';
			}
			echo $output;
	  }			
			?>
