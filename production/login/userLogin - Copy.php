<?php
include("connection/config.php");
error_reporting(0);
session_start();

if(isset($_POST["btnlogin"])){
	$error='';
$username  =     $mysqli->real_escape_string($_POST["username"]);
$email  =     $mysqli->real_escape_string($_POST["email"]);
$password  =     $mysqli->real_escape_string($_POST["password"]);
$status="Active";
$password=(md5(sha1($password)).md5($password.'xxxx'));

//$password = md5($password);


$stmt = $mysqli->prepare("select * from users where Status=? and Username=? and Email=? limit 1");
$stmt->bind_param("sss",$status,$username,$password);
$stmt->execute();
//$stmt->store_result();
$results = $stmt->get_result();

if($results->num_rows != 1){
	$error .= '<div class="alert alert-danger" role="alert">Invalid ID and Password<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>';
   }
     else{
	      $row = $results->fetch_assoc();
		 // $stmt->bind_result($id, $password);
		  //if(password_verify($password,$row['Password'])){
		  //admin
	        if($row["UserType"] == "Administrator"){
			$_SESSION["userid"] = $row["UserID"]; 
			$_SESSION["fullname"] = $row["FullName"];
			$_SESSION["usertype"] = $row["UserType"];
			header("Location: pages/Administrator/dashboard.php");
		 }
		 
		 //receptionist
           /*else if($row["AccountType"] == "Receptionist"){
			$_SESSION["userid"] = $row["UserID"]; 
			$_SESSION["fullname"] = $row["FullName"];
			$_SESSION["accounttype"] = $row["AccountType"];
			header("Location: pages/Reception/dashboard.php"); 
		   }*/		 
	   //}
   else{
	$error .= '<div class="alert alert-danger" role="alert">Invalid ID and Password<button type="button" class="close" data-dismiss="alert">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>';
}	
   }
}

?>