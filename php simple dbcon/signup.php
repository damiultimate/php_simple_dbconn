<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>

    <title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<style type="text/css">
	.loader_par{
		display: none;
	}

	.loader{
width: 90px;
height: 90px;
background: transparent;
border:20px solid blue;
border-right-color: white;
border-left-color: white;
border-radius: 500px;
animation-name: animatt;
animation-iteration-count: infinite;
animation-timing-function: linear;
animation-duration: 1s;
	}

	@keyframes animatt{
		from{transform: rotate(0deg);}
		to{transform: rotate(360deg);}
	}

</style>
</head>

<section style="display: flex;justify-content: center;align-items: center; height: 99vh; position: relative;">
  <div class="card col-md-5" style="padding: 20px;">  
	<h4 style="margin-bottom: 20px; width: 100%; text-align: center; ">Fill in the form to complete the signup process</h2>

    <form method="post" action="javascript:signup();">
       <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="username" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@gmail.com" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" required="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password Again</label>
    <input type="password" class="form-control" id="Password2" placeholder="password again" required="">
  </div>
   <!-- <small id="forgot" class="form-text text-muted"><a href="javascript:create()">Don't have an account? Create one..</a></small> -->
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</section>

<section class="loader_par" style="width: 100%; height: 100%; background: rgba(0,0,0,0.4); position: absolute; top: 0; left: 0;align-items: center;justify-content: center;">
	<div class="loader"></div>
</section>

<script type="text/javascript">
	
	function signup(){
    if(document.getElementById("password").value != document.getElementById("Password2").value){
alert("Passwords do not match! ");
    }else{
        document.getElementsByClassName("loader_par")[0].style.display="flex";
		var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
		var username=document.getElementById("username").value;
    var account=navigator.userAgent;

        var xhr = new XMLHttpRequest();
        var url="http://localhost/serverProject/register.php?email="+email+"&password="+password+"&username="+username+"&account="+account+"&loggedin=0";
        xhr.open('get', url);
        xhr.responseType = 'html';
        xhr.onreadystatechange = function() {
          // callback(xhr.response);
          if(this.readyState == 4 && this.status == 200){
            
          	// alert(xhr.responseText);
        document.getElementsByClassName("loader_par")[0].style.display="none";
        if(xhr.responseText.includes("success")){

            window.location.replace("index.php");

          }else{
alert("Error!! A user with that email address already exists, please register with another email address")
          }
        }
        };
        xhr.onerror = function(){
			alert("Error connecting to the server, please check your internet connecton.......");
        document.getElementsByClassName("loader_par")[0].style.display="none";

        };
        xhr.send();
      
	}
}

</script>

</html>