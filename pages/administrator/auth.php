<?php session_start();
error_reporting(0);

if(!$_SESSION["usertype"]){
	header("Location: ../../index.php");
}
else{
	$usertype = $_SESSION['usertype'];
}
?>