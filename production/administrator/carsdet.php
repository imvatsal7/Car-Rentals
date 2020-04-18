<?php
/* Database connection start */
include("../../connection/config.php");
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'CarNumber', 
	1 => 'CarType',
	2 => 'Brand',
	3 => 'CarName',
	4 => 'Description',
	5 => 'Price',
	6 => 'CarImage',
	7 => 'CarDateTime',
);

// getting total number records without any search
$sql = "SELECT * ";
$sql.=" FROM cars c, cartypes t, brand b where c.CarTypeID=t.CarTypeID and c.BrandID=b.BrandID";
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT * ";
$sql.=" FROM cars c, cartypes t, brand b where c.CarTypeID=t.CarTypeID and c.BrandID=b.BrandID and 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( CarNumber LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR CarName LIKE '".$requestData['search']['value']."%' ";
}
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($mysqli, $sql) or die("carsdet.php: get CarType");
$x=1;
$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
$modal ='<a  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#admodal'.$row['CarNumber'] .'" data-toggle="tooltip" data-placement="left" title="Edit Car"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
        <div class="modal fade" id="admodal'. $row['CarNumber'] .'" aria-labelledby="admodallabel'. $row['CarNumber'] .'" role="dialog" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
	<h3 class="modal-title" id="admodallabel'. $row['CarNumber'] .'"> Car Details</h3>
	</div>
	<div class="modal-body">
	
	<div class="row">
      <!--personal info-->
            <div class="col-md-6">
            <div id="personalInfo" style="">

    <div class="form-group">
    <label for="label">Car Number:</label> '. $row['CarNumber'] .' 
</div>

 <div class="form-group">
       <label for="label">Car Type:</label> '.$row['CarType'].' 
   </div>

 <div class="form-group">
       <label for="label">Brand:</label> '.$row['Brand'].'
   </div>

     <div class="form-group">
     <label for="label">Car Name:</label> '.$row['CarName'].'
   </div>

        <div class="form-group">
           <label for="label">Description:</label> '.$row['Description'].'   
        </div>

        <div class="form-group">
           <label for="label">Price per hour (&dollar;):</label> '.$row['Price'].'   
        </div>

        <div class="form-group">
      <label for="label">Engine Capacity:</label> '.$row['EngineCapacity'].'
   </div>

        <div class="form-group">
            <label for="label">Model:</label> '.$row['Model'].' 
        </div>

        <div class="form-group">
           <label for="label">Color:</label> '.$row['Color'].'
        </div>

        <div class="form-group">
            <label for="label">Year of manufature:</label> '.$row['YearOfManufac'].'
        </div>
        <div class="form-group">
       <label for="label">Type of gas:</label> '.$row['TypeOfGas'].'
   </div>
     <div class="form-group">
       <label for="label">Type of gas:</label> '.$row['TypeOfGas'].'
   </div>
   <div class="form-group">
            <label for="label">Inspector:</label> '.$row['Inspector'].'   
        </div>
        </div>
      </div>

     <div class="col-md-6">
            <!--div id="personalInfo" style=""></div-->
            <div class="form-group">
            <img src="'.$row['CarImage'].'" width="100%">   
        </div>
      
      
        <div class="form-group">
            <label for="label">Insurance Type:</label> '.$row['InsuranceType'].'  
        </div>
        <div class="form-group">
             <label for="label">Last Date Of Service:</label> '.$row['LastDateOfServ'].'  
        </div>	
        <div class="form-group">
           <label for="label">Next Service:</label> '.$row['NextService'].'   
        </div>
        <div class="form-group">
            <label for="label">Known Defects:</label> '.$row['KnownDefects'].' 
        </div>
        <div class="form-group">
          <label for="label">Air Conditioning:</label> '.$row['AirConditioning'].'  
    </div>
    <div class="form-group">
        <label for="label">Heat:</label> '.$row['Heat'].' 
    </div>
        <div class="form-group">
        <label for="label">Transmission:</label> '.$row['Transmission'].'
    </div>
    

          </div>
     </div>
	 
	</div>
	<div class="modal-footer">
	
	</div>
	
	    
	</div>
	</div>
	</div>
	';
       
	$nestedData=array(); 

	$nestedData[] = $x;
	$nestedData[] = $row["CarNumber"];
	$nestedData[] = $row["CarType"];
	$nestedData[] = $row["Brand"];
	$nestedData[] = $row["CarName"];
	$nestedData[] = $row["Description"];
	$nestedData[] = $row["Price"];
	$nestedData[] = '<img src="'. $row["CarImage"] .'" width="100px">';
	$nestedData[] = $row["CarDateTime"];
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
