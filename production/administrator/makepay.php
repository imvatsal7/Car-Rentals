<?php
/* Database connection */
include("../../connection/config.php");


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'cFullName',
	1 => 'PhoneNumber',
	2 => 'CarNumber',
    3 => 'Duration',
    4 => 'Price',
	5 => 'SubTotal',
	6 => 'Discount',
	7 => 'Total',
	8 => 'AmntPaid',
	9 => 'Balance',
	10 => 'pStatus',
	11 => 'pDateTime'
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM clients c,reservation s, payment p, cars r where c.ClientID=s.ClientID and c.cStatus = 'Active' and s.ReservationID=p.ReservationID and s.CarNumber=r.CarNumber";
$query=mysqli_query($mysqli, $sql) or die("makepay.php: get clients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM clients c,reservation s, payment p, cars r where c.ClientID=s.ClientID and c.cStatus = 'Active' and s.ReservationID=p.ReservationID and s.CarNumber=r.CarNumber and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( c.cFullName LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR c.PhoneNumber LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR c.cAccountType LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($mysqli, $sql) or die("makepay.php: get clients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("makepay.php: get clients");

$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array

	$nestedData=array(); 
    $nestedData[] = $x;
	$nestedData[] = $row["cFullName"];
	$nestedData[] = $row["PhoneNumber"];
	$nestedData[] = $row["CarNumber"];
	$nestedData[] = $row["Duration"];
	$nestedData[] = $row["Price"];
	$nestedData[] = $row["SubTotal"];
	$nestedData[] = $row["Discount"];
	$nestedData[] = $row["Total"];
	$nestedData[] = $row["AmntPaid"];
	$nestedData[] = $row["Balance"];
	$nestedData[] = $row["pStatus"];
	$nestedData[] = $row["pDateTime"];
	
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
