<?php
/* Database connection start */
include("../../connection/config.php");
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'FullName', 
	1 => 'PhoneNo',
	2=> 'Email',
	3=> 'UserType',
	4=> 'Username',
	5=> 'Status',
	6=> 'DateTime'
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM users where Status='Active'";
$query=mysqli_query($mysqli, $sql) or die("usersdetails.php: get users");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM users where Status='Active' and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( FullName LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR UserType LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR Username LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($mysqli, $sql) or die("usersdetails.php: get users");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("usersdetails.php: get users");
$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
$modal='<a  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admodal'.$row['UserID'] .'" data-toggle="tooltip" data-placement="left" title="Edit User"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <div class="modal fade" id="admodal'. $row['UserID'] .'" aria-labelledby="admodallabel'. $row['UserID'] .'" role="dialog" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" onClick="refreshPage()" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title" id="admodallabel'. $row['UserID'] .'"> Edit User</h3>
	</div>
	<div class="modal-body">
	
	
	     <input type="hidden" class="form-control" name="userid[]" id="userid'. $row['UserID'] .'" value="'.$row['UserID'] .'" required="required" placeholder="User ID" readonly />
	
	     
<label for="label">Full Name</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="fullname[]" id="fullname'. $row['UserID'] .'" value="'. $row['FullName'] .'" required="required" placeholder="Full Name"/>
	 </div>
	 
	     
<label for="label">Phone Number</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="phone[]" id="phone'. $row['UserID'] .'" value="'. $row['PhoneNo'] .'" required="required" placeholder="Phone Number"/>
	 </div>
	 
	     
<label for="label">Email</label>
	   <div class="form-group">
	     <input type="email" class="form-control" name="email[]" id="email'. $row['UserID'] .'" value="'. $row['Email'] .'" required="required" placeholder="Email"/>
	 </div>
	 
	 <label for="label">User Type</label>
	 <div class="form-group">
	  <select name="usertype[]" id="usertype'.$row['UserID'] .'" class="form-control" required="required" data-error="Please select one option.">
	  <option value="'.$row['UserType'] .'">'.$row['UserType'] .'</option>
	  <option value="Administrator">Administrator</option>
	  <option value="General Manager">General Manager</option>
	  <option value="Manager">Manager</option>
	  <option value="Normal">Normal</option>
	  <option value="Receptionist">Receptionist</option>
	  </select>
        <span class="glyphicon glyphicon form-control-feedback"></span>
		<div class="help-block with-errors"></div>
      </div>
	  
	  <label for="label">Username</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="username[]" id="username'. $row['UserID'] .'" value="'. $row['Username'] .'" required="required" placeholder="Username"/>
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
}</script>';
       
	$nestedData=array(); 

	$nestedData[] = $x;
	$nestedData[] = $row["FullName"];
	$nestedData[] = $row["PhoneNo"];
	$nestedData[] = $row["Email"];
	$nestedData[] = $row["UserType"];
	$nestedData[] = $row["Username"];
	$nestedData[] = '<label class="label label-success">'.$row["Status"] .'</label>';
	$nestedData[] = $row["DateTime"];
	$nestedData[] = $modal;
	
	$x++;
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
