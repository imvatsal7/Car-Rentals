<?php
include("../../connection/config.php");
error_reporting(0);
session_start();

if(isset($_POST['btnsave'])){
  
$carnumber  =    $mysqli->real_escape_string($_POST["carnumber"]);
$cartype     =   $mysqli->real_escape_string($_POST["cartype"]);
$brand     =     $mysqli->real_escape_string($_POST["brand"]);
$car     =       $mysqli->real_escape_string($_POST["car"]);
$description  =  $mysqli->real_escape_string($_POST["description"]);
$price  =        $mysqli->real_escape_string($_POST["price"]);
$enginecapa  =   $mysqli->real_escape_string($_POST["enginecapa"]);
$model     =     $mysqli->real_escape_string($_POST["model"]);
$color     =     $mysqli->real_escape_string($_POST["color"]);
$manuyear     =  $mysqli->real_escape_string($_POST["manuyear"]);
$gastype     =   $mysqli->real_escape_string($_POST["gastype"]);
$mileage     =   $mysqli->real_escape_string($_POST["mileage"]);
$inspector   =   $mysqli->real_escape_string($_POST["inspector"]);
$insuretype   =  $mysqli->real_escape_string($_POST["insuretype"]);
$servdate     =  $mysqli->real_escape_string($_POST["servdate"]);
$nextservdate =  $mysqli->real_escape_string($_POST["nextservdate"]);
$kdefects     =  $mysqli->real_escape_string($_POST["kdefects"]);
$aircon     =    $mysqli->real_escape_string($_POST["aircon"]);
$heat     =      $mysqli->real_escape_string($_POST["heat"]);
$transmission =  $mysqli->real_escape_string($_POST["transmission"]);
$status    =     "Inactive";
$userid = $_SESSION["userid"];

$alert = "";

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
$alert = '<div class="alert alert-warning" role="alert">Return Code: ' . $_FILES["file"]["error"] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
}
else
{
if (file_exists("../upload/" . $_FILES["file"]["name"])) {
$alert = '<div class="alert alert-warning" role="alert">'.$_FILES["file"]["name"] . '<span id="invalid"> <b>already exists.</b><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "../upload/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

 $stmt = $mysqli->prepare("insert into cars(CarNumber,CarTypeID,BrandID,CarName,Description,Price,EngineCapacity,Model,Color,YearOfManufac,TypeOfGas,Mileage,Inspector,InsuranceType,LastDateOfServ,NextService,KnownDefects,AirConditioning,Heat,Transmission,CarStatus,CarImage,UserID)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssssssssssssss",$carnumber,$cartype,$brand,$car,$description,$price,$enginecapa,$model,$color,$manuyear,$gastype,$mileage,$inspector,$insuretype,$servdate,$nextservdate,$kdefects,$aircon,$heat,$transmission,$status,$targetPath,$userid);

       if($stmt->execute()){
       $alert = '<div class="alert alert-success" role="alert"> Records successfully saved!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
       }
      else
         {
          $alert = '<div class="alert alert-danger" role="alert">Sorry, records not saved!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
         }
      }
    }
   }
else
    {
    $alert = '<div class="alert alert-warning" role="alert">***Invalid file Size or Type***<span><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>';
   }
  }
}
?>