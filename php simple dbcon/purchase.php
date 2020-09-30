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
$price=$_GET['price'];
$creator=$_GET['creator'];

$sql="SELECT * FROM `users` WHERE email='$email'";

$result=$conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){

		$remaining = floatval($row['account'])-floatval($price);

		if(floatval($row['account']) < floatval($price)){
			die("little");
		}else{
			$sql="UPDATE users SET account='$remaining' WHERE email='$email'";
			$sql1="UPDATE users SET account=account+$price WHERE email='$creator'";
			$conn->query($sql);
			$conn->query($sql1);
			die("success");
		}
	}
}else{
	// echo "failure "+$conn->error;
}

 ?>