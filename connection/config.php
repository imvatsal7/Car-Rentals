<?php
$server='localhost';
$username='root';
$password='';
$dbname='carrentalsdb';

$mysqli=new mysqli($server,$username,$password,$dbname);
if($mysqli->connect_error){
	exit('Error connecting to database');
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");
?>