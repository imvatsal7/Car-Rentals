<?php
include("../../connection/config.php");

//active users
$active='Active';
$stmt = $mysqli->prepare("SELECT * FROM users where Status=?");
$stmt->bind_param("s",$active);
$stmt->execute();
$results=$stmt->get_result();
$activeusers = $results->num_rows;

//active clients
$activecl="Active";
$stmt = $mysqli->prepare("SELECT * FROM clients WHERE cStatus=?");
$stmt->bind_param("s",$activecl);
$stmt->execute();
$rs = $stmt->get_result();
$activeclients = $rs->num_rows;

//inactive clients
$activecl="Inactive";
$stmt = $mysqli->prepare("SELECT * FROM clients WHERE cStatus=?");
$stmt->bind_param("s",$activecl);
$stmt->execute();
$rs = $stmt->get_result();
$inactiveclients = $rs->num_rows;

//allclients
$totalclients = $inactiveclients + $activeclients;


//total rooms
$stmt = $mysqli->prepare("SELECT * FROM rooms");
$stmt->execute();
$rs = $stmt->get_result();
$roomnumn = $rs->num_rows;

//occupied rooms
$stmt = $mysqli->prepare("SELECT * FROM rooms where rStatus='Active'");
$stmt->execute();
$rs = $stmt->get_result();
$actroomnumn = $rs->num_rows;

//available rooms
$stmt = $mysqli->prepare("SELECT * FROM rooms where rStatus='Inactive'");
$stmt->execute();
$rs = $stmt->get_result();
$inactroomnumn = $rs->num_rows;

//debtors
$stmt = $mysqli->prepare("SELECT * FROM payment where pStatus='Debtor'");
$stmt->execute();
$rs = $stmt->get_result();
$debtor = $rs->num_rows;
?>