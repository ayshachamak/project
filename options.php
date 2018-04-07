<?php 

include 'config.php';
include 'Database.php';
?>

<?php

    $db = new Database();
    $query = "SELECT * FROM user";
    $read = $db->select($query);
    
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Personal Wallet</title>
	
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
		<div class="container">	
			
		<div class="opt">
				
	        <a class="atag" href="budget.php"><input class="button" type="button" value="Budget Planning"></a>
	        <a class="atag" href="wallet.php"><input class="button" type="button" value="My Wallet"></a>
	        <a class="atag" href="trans.php"><input class="button" type="button" value="Wallet Transfer"></a>
	       
	    </div>
		<br><br>	
	
	<div class="im">	
		<img src="images/B1374.jpg" alt="Wallet" height="250" width="250"/>
	</div>
	
	</div>
	</div>
	<div class="bottombar">
	
		<div class="bar1">
			<h2>About Us</h2>
			<p>
				<a href="http://www.facebook.com">Facebook</a><br>
				<a href="https://plus.google.com/discover?hl=en">Google+</a><br>
				<a href="https://twitter.com/?lang=en">Twitter</a>
			</p>
		</div>
		
		<div class="bar2">
			<h2>More</h2>
			<p>
				<a href="">Privacy Policy</a><br>
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