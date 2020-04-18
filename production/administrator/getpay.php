 <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
 <!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<?php
include("../../connection/config.php");



      $output = '';


		
		$sql = "SELECT * from clients c, reservation s where c.ClientID=s.ClientID order by cDateTime desc";
		$res = mysqli_query($mysqli,$sql) or die('Error, query failed');
			
		if($res->num_rows > 0)
		{
		$row = $res->fetch_assoc();
			
			
		$output .= '
<label for="label">Full Name</label>
<div class="form-group">
<input type="hidden" name="clientid" id="clientid" value="'. $row['ClientID'] .'" class="form-control" placeholder="Client ID" readonly="readonly" required />
<input type="text" name="fullname" id="fullname" value="'. $row['cFullName'] .'" class="form-control" placeholder="Full Name" readonly="readonly" required />
</div>

<div class="form-group">
<input type="hidden" name="reserveid" id="reserveid" value="'. $row['ReservationID'] .'" class="form-control" placeholder="ReservationID" readonly="readonly" />
<input type="text" name="carnumber" id="carnumber" value="'. $row['CarNumber'] .'" class="form-control" placeholder="CarNumber" readonly="readonly" />
</div>
<label for="label">Sub Total &cent;</label>
<div class="form-group">
<input type="text" name="subtotal" id="subtotal" value="'. $row['TotalCharge'] .'" class="form-control" placeholder="Sub Total" readonly="readonly"  required="required"/>
</div>

<label for="label">Discount %</label>
<div class="form-group">
<select name="discount" id="discount" class="discount form-control" style="width:100%" required="required">
<option value=""></option>
<option value="0">0</option>
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
<option value="30">30</option>
<option value="35">35</option>
<option value="40">40</option>
<option value="45">45</option>
<option value="50">50</option>
<option value="55">55</option>
<option value="60">60</option>
<option value="65">65</option>
<option value="70">70</option>
<option value="75">75</option>
<option value="80">80</option>
<option value="85">85</option>
<option value="90">90</option>
<option value="95">95</option>
<option value="100">100</option>
</select>
</div>

<label for="label">Total &cent;</label>
<div class="form-group"><input type="text" name="gtotal" id="gtotal" value="" class="form-control" placeholder="Grand Total" readonly="readonly" required /></div>

<label for="label">Amount Paid &cent;</label>
<div class="form-group"><input type="number" name="amntpaid" id="amntpaid" step="any" data-bv-digits="true" value="" class="form-control" placeholder="Amount Paid"  required /></div>

<label for="label">Balance &cent;</label>
<div class="form-group"><input type="text" name="balance" id="balance" value="" class="form-control" placeholder="Balance" readonly="readonly"  required="required" /></div>
';
      }
		else
			{
				$output .= 'Sorry! Client has not yet booked room';
			}
			echo $output;			
			?>
<script>
 $(".discount").select2({
    placeholder: "Select Discount",
  });
   $(".status").select2({
    placeholder: "Select Status",
  });   

</script>