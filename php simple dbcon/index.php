<?php 
session_start();

if(!isset($_SESSION['username'])){

header('Location: signup.php');

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <title>Login</title>
<style type="text/css">
	
</style>
</head>

<section>
	<h1>Welcome <?php echo $_SESSION['username']; ?> and thank you very much for signing up. You may now proceed to log into the App!!</h1>
</section>

</html>