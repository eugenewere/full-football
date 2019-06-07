<?php 
include('database/server.php') ;
?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/core.css">
</head>
<body>
	<div class="login-wrapper">
		<!--preloader-->

	    <div class="preloader hidden">
			<div class="loader hide"><p><p></div>	
		</div>


		<!--nav-->
		<div class="nav">
			<img src="images/login.jpg">
			<p>Log-In</p>				
		</div>

		<div class="log-in-middle ">
			<p id="header">Log In to your Account</p>		 

           
			<form action="login.php" method="POST" >
				<?php include('database/error.php'); ?>
				<span>				
					<i class="fas fa-envelope"></i> Email Address:<br>
					<input type="text" name="email" placeholder="Email Address" required id="pass">
				</span><br>

				<span>				
					<i class="fas fa-key"></i> Password:<br>
					<input type="Password" name="password" placeholder="password" required id="mail">
				</span><br>

				<span>
					<button type="submit" name="login_form" ><i class="fas fa-user"></i>Log-In</button>
				</span>

			

				<span id="or">
					<h2>OR</h2>
				</span>

				<span class="social">
					<div><a href="http://www.facebook.com"><i class="fab fa-facebook-f"></i>Log In With Facebook</a></div>

					<div><a href="http://www.google.com"><i class="fab fa-google"></i>Log In With Google</a></div>

					<div><a href="http://www.twitter.com"><i class="fab fa-twitter"></i>Log In With Twitter</a></div>

					<div><a href="http://www.chimpmonkey.com"><i class="fab fa-mailchimp"></i>Log In With Chimp Monkey</a></div>
					
				</span>
				<span id="register">
					<p><a href="regestration.php">Sign Up As Player or Register your team ?</a></p>
				</span>

			</form>
			
		</div>
		 
	</div>

<script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>