<?php
/* Database connection */
include("../../connection/config.php");


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'CarNumber',
	1 => 'CarName',
	2 => 'Description',
	3 => 'Price',
	4 => 'CarDateTime',
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM cars where CarStatus='Inactive'";
$query=mysqli_query($mysqli, $sql) or die("availablecarsdetails.php: get cars");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM cars WHERE CarStatus='Inactive' and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( CarNumber LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR CarName LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR Description LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($mysqli, $sql) or die("availablecarsdetails.php: get cars");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("availablecarsdetails.php: get rooms");

$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
    $nestedData[] = $x;
	$nestedData[] = $row["CarNumber"];
	$nestedData[] = $row["CarName"];
	$nestedData[] = $row["Description"];
	$nestedData[] = $row["Price"];
	$nestedData[] = $row["CarDateTime"];
	
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
