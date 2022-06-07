<?php
session_start();
include_once("db.php");

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $check_user="select * from admin WHERE username='$username'AND password='$password'";

    $run=mysqli_query($conn,$check_user);

    if(mysqli_num_rows($run))
    {
        header("location:dashboard.php");

        $_SESSION['username']=$username;

    }
    else
    {
        echo "<script>alert('Username or password is incorrect!')</script>";
    }
}
?>



<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
	<title>KIMS</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="kims.png" rel="shortcut icon" type="img/png">
	<link rel="stylesheet" href="stylelogin.css">
	
	<style type="text/css">
		body{background: #EEE;}
		.wrapper{display: inline-block;width: 100%;}
		.wrapper > img{display: block;margin: 40px auto;}
		.box{margin: 0 auto 40px;}
		.cname {background: url("images/login-banner.png") no-repeat; height: 56px; display: block; margin: 0 24%;}
		.message {display:none;background-color: red;padding: 10px;margin-bottom: 10px;color: white;border-radius: 5px;}
		@font-face {
		    font-family : "Open Sans";
		    src: url("css/OpenSans-Regular.ttf");
		}
	</style>
	
	<!--[if IE]>
	<link rel="stylesheet" href="css/login/orange-ie.css">
	<![endif]-->


	<style>
		.button {
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  width: 100%;
		  padding: 8px 15px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 10px 0 0;
		  cursor: pointer;
		}
		
		.button2 {background-color: #008CBA;} /* Blue */
		
		</style>


</head>
<body>

	<div class="wrapper">
		<img src="img/kims.png">
	</div>
	
	<div class="wrapper">

		<div class="medium box">
			<center><span class="cname" style="font-size:20px;">ADMIN</span></center>
			<form id="form-login" method="post" novalidate action="">
				<div class="message"></div>
				<div>
					<!--[if IE]>
						<label class="ie-holder">Username</label>
					<![endif]-->
					<input id="login-username" type="text" name="username" placeholder="Username" />
				</div>
				<div>
					<!--[if IE]>
						<label class="ie-holder">Password</label>
					<![endif]-->
					<input id="login-password" type="password" name="password" placeholder="Password" />
				</div>
				<div class="checkbox" style="visibility: hidden;">
					<input id="login_checkbox" name="remember" type="checkbox" />
					<label for="login_checkbox">Remember me<span class="icon"></span></label>
				</div>
					<div class="pw">
						<a href="forgot-password.html" style="visibility: hidden;" class="pw-icon">
							<span class="hint-tip">Forgot username/password</span>
						</a>
					</div>
				<button class="button button2" type="submit" name="submit">LOGIN</button>
			</form>
		</div>
		<p class="holder" style="margin-top:-35px;">Copyright © 2022 KIMS HOSPITAL All rights reserved.</p>
	</div>
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.form.min.js" type="text/javascript"></script>

</html>