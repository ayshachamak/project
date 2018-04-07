<?php 

include 'config.php';
include 'Database.php';
?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	
	<title>User-sign_in</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="icon" href="images/reg.png" />
</head>
<body>
	<div class="header">

			<div class="menu"> 
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="sign_up.php">Sign Up</a></li>
			<li><a href="sign_in.php">Log In</a></li>
		</ul>
		
	</div>
	
	</div>
		<center><h1>Personal Wallet</h1></center>
	
	<div class="leri">
	<fieldset>
	<legend><b>Log In</b></legend>
	<br><br>
	
	
			
	<form class="regi" action="sign_in.php" method="post">	
		
		<label for="userid">User ID:</label> 
		<input id="userid" type="name" name="userid" placeholder="Enter User ID" autofocus required>
		<input id ="checkbox" type="checkbox">Save User ID
		
		<br><br>
		
		<label for="pass">Password:</label> 
		<input id="pass" type="password" name="password" placeholder="Password" required>
		
		<input type="submit" name="submit" value="Log In"> 
		<br>

		<a href=""><i>Forgot User ID or Password?</i></a>
		
		
	
	</form>
	<br><br>
	</fieldset>
	</div>
	
	<div class="bottombar">
	
		<div class="bar1">
			<h2>About Us</h2>
			<p>
				<a href="http://www.facebook.com">Facebook</a><br>
				<a href="https://plus.google.com/discover?hl=en">Google+</a><br>
				<a href="https://twitter.com/?lang=en">Twitter</a>
			</p>
		</div >
		
		<div class="bar2">
			<h2>More</h2>
			<p>
				<a href="#">Privacy Policy</a><br>
				<a href="#">Terms & Conditions</a><br>
				
			</p>
			
		</div>
		
		<div class="bar3">
			<h2>My Account</h2>
			<p>
				<a href="">Order History</a><br>
				
			</p>
		</div>
	
	
	</div>
	<br>
	<div class="copyright">
		<hr>
			<p> Personal Wallet &copy;2018 All Rights Reserved. <br />
		       Developed by Jannat Binta Alam</p>
		
	</div>
	
</body>
</html>