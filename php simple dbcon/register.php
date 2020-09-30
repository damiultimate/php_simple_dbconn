<?php 
session_start();

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

$username=$_GET['username'];
$email=$_GET['email'];
$password=$_GET['password'];
$account=$_GET['account'];
$loggedin=$_GET['loggedin'];


$sql = "INSERT INTO `users` (`username`, `email`, `password`, `account`, `loggedin`) VALUES ('$username', '$email', '$password', '0', '0')";
if($conn->query($sql)===TRUE){

echo "success";
$_SESSION['username']=$username;
$_SESSION['email']=$email;
// header("Location: index.php");

}else{
echo "error ".$conn->error;

	// header("Location:signup.php?error=true");

}


 ?>