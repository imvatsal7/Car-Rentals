<?php
/* Database connection start */
include("../../connection/config.php");
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'CarType', 
	1 => 'CarTypeDate',
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM cartypes";
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM cartypes where 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( CarType LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR CarTypeDate LIKE '".$requestData['search']['value']."%' ";
}
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
$modal='<a  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#admodal'.$row['CarTypeID'] .'" data-toggle="tooltip" data-placement="left" title="Edit Car Type"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <div class="modal fade" id="admodal'. $row['CarTypeID'] .'" aria-labelledby="admodallabel'. $row['CarTypeID'] .'" role="dialog" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" onClick="refreshPage()" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title" id="admodallabel'. $row['CarTypeID'] .'"> Edit Car Type</h3>
	</div>
	<div class="modal-body">
	
	
	     <input type="hidden" class="form-control" name="carstypeid[]" id="carstypeid'. $row['CarTypeID'] .'" value="'.$row['CarTypeID'] .'" required="required" placeholder="Car Type ID" readonly />
	
	     
      <label for="label">Car Type</label>
	   <div class="form-group">
	     <input type="text" class="form-control" name="carstype[]" id="carstype'. $row['CarTypeID'] .'" value="'. $row['CarType'] .'" required="required" placeholder="Car Type"/>
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
	$nestedData[] = $row["CarType"];
	$nestedData[] = $row["CarTypeDate"];
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
