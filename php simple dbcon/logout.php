<?php 


$servername = "localhost";
$username = "project";
$password = "project";
$dbname = "project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email=$_GET['email'];
$password1=$_GET['password'];

$sql="UPDATE users SET loggedin='0' WHERE email='$email'";
if($conn->query($sql)===TRUE){
	echo "success";
}else{
	echo "failure";
}


 ?>