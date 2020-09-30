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

$sql="SELECT * FROM `users` WHERE email='$email'";

$result=$conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
$account=$row['account'];
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
 <section style="display: flex;justify-content: center;align-items: center; height: 99vh; position: relative;margin-top: 10px;">


  <div class="card col-md-5" style="padding: 20px;"> 


<h5 style="text-align: center; margin: 20px;" id="title_text">Account Information</h5>

	<h5 style="margin-bottom: 20px; width: 100%; text-align: center; margin: 10px;" id="text_purchase">Username = <?php echo ucfirst($username); ?></h5>
	<h5 style="margin-bottom: 20px; width: 100%; text-align: center; margin: 10px;" id="text_purchase">Email = <?php echo $email; ?></h5>
	<h5 style="margin-bottom: 20px; width: 100%; text-align: center; margin: 10px;" id="text_purchase">Account Balance= $<?php echo $account; ?></h5>

 <div class="row" style="display: flex;align-items: center;justify-content: center;margin: 10px;">
  <button type="submit" name="submit" class="btn btn-primary col-md-5" style="margin-right: 20px;" onclick="topup();">TopUp Account</button>
  <button type="submit" name="submit" class="btn btn-primary col-md-5" style="margin-right: 20px;background: gray; border-color: gray;" onclick="withdraw();">Withdraw</button>
</div>
</div>

</section>
<script type="text/javascript">
	function topup(){
		var a = prompt("Enter any amount you would like to add to your account");
		if( a != ""){
			var b=parseFloat(a);

			if(!b){
				alert("Please enter a valid amount");

			}else{
				alert("Processing......");
				window.location.replace("topup.php?user=<?php echo $_GET['user']; ?>&topup="+b);
			}
		}
	}

	function withdraw(){
		var a = prompt("Enter any amount you would like to withdraw from your account");
		if( a != ""){
			var b=parseFloat(a);

			if(!b){
				alert("Please enter a valid amount");

			}else{
				alert("Processing......");
				window.location.replace("withdraw.php?user=<?php echo $_GET['user']; ?>&withdraw="+b);
			}
		}
	}
</script>
</body>
</html>
