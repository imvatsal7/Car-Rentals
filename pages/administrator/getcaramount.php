<?php
include("../../connection/config.php");

          // $q = intval($_GET['q']);
		   
				$output = '';
				if(isset($_POST['car_id']))
				{
	        $car_id=$_POST['car_id'];
			$sql = "SELECT * from cars where CarNumber = '$car_id'";
			$res = mysqli_query($mysqli,$sql) or die('Error, query failed');
			
			if($res->num_rows > 0)
			{
			if($row = $res->fetch_assoc())
			{
			
			$output .= '<input type="text" name="amount" id="amount" value="'. $row['Price'] .'" class="form-control" placeholder="Amount" readonly="readonly" required />
			            <input type="text" name="roomid" id="roomid" value="'. $row['CarNumber'] .'" class="form-control" placeholder="RoomID" readonly="readonly" required />';
			
			}
			}
			else
			{
				$output .= 'Sorry! Amount has not been assigned to Car';
			}
				}
			echo $output;			
			?>
