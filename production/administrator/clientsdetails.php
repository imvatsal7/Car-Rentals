<?php
/* Database connection */
include("../../connection/config.php");


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'cFullName',
	1 => 'PhoneNumber',
	2 => 'cEmail',
	3 => 'cAccountType',
	4 => 'CompanyName',
	5 => 'Address',
	6 => 'cStatus',
	7 => 'cDateTime',
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM clients where cStatus='Active'";
$query=mysqli_query($mysqli, $sql) or die("clientsdetails.php: get clients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM clients WHERE cStatus='Active' and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( cFullName LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR PhoneNumber LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR cAccountType LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($mysqli, $sql) or die("clientsdetails.php: get clients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("clientsdetails.php: get clients");

$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
$modalbutton ='<a  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admodal'.$row['ClientID'] .'" data-toggle="tooltip" data-placement="left" title="Edit Client Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<div class="modal fade" id="admodal'. $row['ClientID'] .'" aria-labelledby="admodallabel'. $row['ClientID'] .'" role="dialog" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" onClick="refreshPage()" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title" id="admodallabel'. $row['ClientID'] .'"> Edit Client Details</h3>
	</div>
	<div class="modal-body">

	     <input type="hidden" class="form-control" name="clientid[]" id="clientid'. $row['ClientID'] .'" value="'.$row['ClientID'] .'" required="required" placeholder="Client ID" readonly />
	
	     
<label for="label">Full Name</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="fullname[]" id="fullname'. $row['ClientID'] .'" value="'. $row['cFullName'] .'" required="required" placeholder="Full Name"/>
	 </div>
	 
	     
<label for="label">Phone Number</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="phone[]" id="phone'. $row['ClientID'] .'" value="'. $row['PhoneNumber'] .'" required="required" placeholder="Phone Number"/>
	 </div>
	 
	     
<label for="label">Email</label>
	   <div class="form-group">
	     <input type="email" class="form-control" name="email[]" id="email'. $row['ClientID'] .'" value="'. $row['cEmail'] .'" required="required" placeholder="Email"/>
	 </div>
	 
	 <label for="label">Account Type</label>
	 <div class="form-group">
	  <select name="accounttype[]" id="accounttype'.$row['ClientID'] .'" class="form-control" required="required" data-error="Please select one option.">
	  <option value="'.$row['cAccountType'] .'">'.$row['cAccountType'] .'</option>
	  <option value="Company">Company</option>
	  <option value="Individual">Individual</option>
	  </select>
        <span class="glyphicon glyphicon form-control-feedback"></span>
		<div class="help-block with-errors"></div>
      </div>
	  
	   <label for="label">Company Name</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="companyname[]" id="companyname'. $row['ClientID'] .'" value="'. $row['CompanyName'] .'"  placeholder="Company Name"/>
	 </div>
	  
	  <label for="label">Address</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="address[]" id="address'. $row['ClientID'] .'" value="'. $row['Address'] .'" required="required" placeholder="Address"/>
	 </div>
	 
	</div>
	<div class="modal-footer">
	<button type="button"  class="btn btn-success" onClick="refreshPage()" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
	<button type="submit" class="btn btn-primary" name="btnupdate" id="btn_update"><span class="glyphicon glyphicon-save"></span> Save changes</button>
	</div>
	
	    
	</div>
	</div>
	</div>
	<script>
	function refreshPage() {
    location.reload();
}
	</script>
';
	$nestedData=array(); 
    $nestedData[] = $x;
	$nestedData[] = $row["cFullName"];
	$nestedData[] = $row["PhoneNumber"];
	$nestedData[] = $row["cEmail"];
	$nestedData[] = $row["cAccountType"];
	$nestedData[] = $row["CompanyName"];
	$nestedData[] = $row["Address"];
	$nestedData[] = '<label class="label label-success">'.$row["cStatus"] .'</label>';
	$nestedData[] = $row["cDateTime"];
	$nestedData[] = $modalbutton;
	
	$data[] = $nestedData;
	$x++;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
