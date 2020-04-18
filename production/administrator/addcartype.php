<?php
include("../../connection/config.php");

if(isset($_POST['btnsave'])){
	
	
	function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s%s', str_split(bin2hex($data), 4));
}

$cartypeid = uuid();
$cartype  =  $mysqli->real_escape_string($_POST["cartype"]);

$stmt = $mysqli->prepare("select * from cartypes where CarType=?");
$stmt->bind_param("s",$cartype);
$stmt->execute();
$results= $stmt->get_result();
$count=$results->num_rows;
if($count == 0){

$stmt = $mysqli->prepare("insert into cartypes(CarTypeID,CarType)values(?,?)");
$stmt->bind_param("ss",$cartypeid,$cartype);

if($stmt->execute()){
	echo "success";
   }
else
   {
	echo "error";
    }
  }
else
  {
	echo "1";
   }
}
?>