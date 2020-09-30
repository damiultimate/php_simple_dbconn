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


$sql="SELECT * FROM `users` WHERE email='$email' AND password='$password1'";

$result=$conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		if($row['loggedin'] == "0"){
			echo "success=".$row['username'];
			$email=$row['email'];
			$sql="UPDATE users SET loggedin='1' WHERE email='$email'";
			$conn->query($sql);

		}else{
			echo "loggedin";
		}
	}
}else{
	echo "failure "+$conn->error;
}

 ?>