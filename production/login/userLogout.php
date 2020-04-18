<?php
	
 include("connection/config.php");
 session_start();
  
 
## finally destroying the session
// unset all session variables
$_SESSION = array();	
// destroy the session cookie
if(isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time()-50000, '/');
}	
unset($_SESSION["userid"]);	
// destroy the session
session_destroy();
 header("Location: ../../index.php");
?>