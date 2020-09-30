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
$data=$_GET['user'];

$data1 = base64_decode($data);
$data1=explode(" ", $data1);
$email =$data1[0];
$password=$data1[1];
$username=$data1[2];
$account=0;
$value=$_GET['topup'];

$sql="UPDATE `users` SET account=account+$value WHERE email='$email'";
if($conn->query($sql)===TRUE){
	// echo "success";
	header("Location:account.php?user=".$_GET['user']);
}else{
	// echo "failure";
}

 ?>