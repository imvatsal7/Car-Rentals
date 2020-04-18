<?php
include("../../connection/config.php");

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['btn-save'])){
	
	
	function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s%s', str_split(bin2hex($data), 4));
}

$userid = uuid();
$fullname  =     $mysqli->real_escape_string($_POST["fullname"]);
$phone     =     $mysqli->real_escape_string($_POST["phone"]);
$email     =     $mysqli->real_escape_string($_POST["email"]);
$usertype  =  $mysqli->real_escape_string($_POST["usertype"]);
$username  =     $mysqli->real_escape_string($_POST["username"]);
$password  =     $mysqli->real_escape_string($_POST["password"]);
$status    =     $mysqli->real_escape_string($_POST["status"]);
//$options = array("cost"=>11);
//$hash = password_hash($password,PASSWORD_BCRYPT, $options);



//$password = md5($password);
$password=(md5(sha1($password)).md5($password.'xxxx'));

$stmt = $mysqli->prepare("select * from users where Email=? and Username=?");
$stmt->bind_param("ss",$email,$username);
$stmt->execute();
$results= $stmt->get_result();
$count=$results->num_rows;
if($count == 0){

$stmt = $mysqli->prepare("insert into users(UserID,FullName,PhoneNo,Email,UserType,Username,Password,Status)values(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss",$userid,$fullname,$phone,$email,$usertype,$username,$password,$status);

if($stmt->execute()){
	echo "registered";
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