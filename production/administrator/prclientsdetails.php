<?php
/* Database connection */
include("../../connection/config.php");


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'cFullName',
	1 => 'CarNumber',
	2 => 'Resource',
	3 => 'CheckInDate',
	4 => 'CheckOutDate',
	5 => 'Duration',
	6 => 'TotalCharge',
	7 => 'ReservationDate',
	8 => 'FullName'
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM users u, clients c,reservation s, cars r where u.UserID=c.UserID and c.ClientID=s.ClientID and c.cStatus='Inactive' and s.CarNumber=r.CarNumber";
$query=mysqli_query($mysqli, $sql) or die("pclientsdetails.php: get clients");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM users u, clients c,reservation s, cars r where u.UserID=c.UserID and c.ClientID=s.ClientID and c.cStatus='Inactive' and s.CarNumber=r.CarNumber and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( c.cFullName LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR c.PhoneNumber LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR c.cAccountType LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($mysqli, $sql) or die("pclientsdetails.php: get clients");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("pclientsdetails.php: get clients");

$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
$nights = round($row["Duration"]/1441);
	$nestedData=array(); 
    $nestedData[] = $x;
	$nestedData[] = $row["cFullName"];
	$nestedData[] = $row["CarNumber"];
	$nestedData[] = $row["Resource"];
	$nestedData[] = $row["CheckInDate"];
	$nestedData[] = $row["CheckOutDate"];
	$nestedData[] = $nights." night(s)";
	$nestedData[] = $row["TotalCharge"];
	$nestedData[] = $row["ReservationDate"];
	$nestedData[] = $row["FullName"];
	
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
