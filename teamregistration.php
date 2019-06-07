<?php include('database/teamreg.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Team Registration</title>
	<link rel="stylesheet" type="text/css" href="style/playerregestration.css">
</head>
<body>
	<!--preloader-->
    <div class="preloader hidden">
		<div class="loader hide"><p><p></div>
		
	</div>
	<!--start of navigation-->
	<div class="player-registration-wrapper">

                <div class="nav">
					<img src="images/playerreg.png">
					<p>team registration</p>				
				</div>

		<div class="player-registration-middle">
			<form name="myForm" action="teamregistration.php" onsubmit="return validateForm()" method="POST">			
				   <p>team registration</p>

				     <?php include('database/error.php'); ?>	
				<span>
					Team Name:<br>
				    <input type="text" name="teamname" placeholder="TeamName" autofocus required="">
				</span><br>

				<span>				
					 Team Email Address:<br>
					<input type="text" name="email" placeholder="Email Address" required>
				</span><br>

				<span>
					Team Phone Number:<br>
				    <input type="Number" name="phonenumber"placeholder="+254......" maxlength="14" required>
				</span><br>

				<span>
					Team No:<br>
				    <input type="Number" name="id"placeholder="xxxx-xxxx">
				</span><br>

				<span>
					Team Location:<br>
				    <input list="location" type="text" name="location" placeholder="....">
				    <datalist id="location">
				    	<?php 
						 $konn1=mysqli_connect("localhost","root","","miscellaneous");
						 if($konn1){
						 	$msg1="SELECT city FROM city";
						 	$findin1=$konn1->query($msg1);
						  if($findin1->num_rows > 0){
						  	while($rows1=$findin1-> fetch_assoc()){
                              echo '<option value="' .$rows1['city']. '">';
						  	}}}

						?>
						      	


				    	
				    </datalist>
				</span><br>

				<span>
					Team City:<br>
				    <input list="city" type="text" name="city"placeholder="....">
				    <datalist id="city">
				    	<?php 
						 $konn1=mysqli_connect("localhost","root","","miscellaneous");
						 if($konn1){
						 	$msg1="SELECT city FROM city";
						 	$findin1=$konn1->query($msg1);
						  if($findin1->num_rows > 0){
						  	while($rows1=$findin1-> fetch_assoc()){
                              echo '<option value="' .$rows1['city']. '">';
						  	}}}

						?>
				    	
				    </datalist>
				</span><br>

				<span>
					Team Country:<br>
					<input list="country" name="country">
					<datalist id="country">
						<?php 
						  $konn2=mysqli_connect("localhost","root","","miscellaneous");
						 if($konn2){
						 	$msg2="SELECT country FROM country";
						 	$findin2=$konn2->query($msg2);
						  if($findin2->num_rows > 0){
						  	while($rows2=$findin2-> fetch_assoc()){
                              echo '<option value="' .$rows2['country']. '">';
						  	}}}

						?>
					</datalist>
				</span><br>
				
				<span>
					Create Password:<br>
				    <input type="Password" name="password" placeholder="xxxxxxx" autofocus  required>
				</span><br>

				<span>
					Confirm Password:<br>
				    <input type="Password" name="cpassword" placeholder="xxxxxxx" autofocus  required>
				</span><br>

                <div class="reg">
                	<button type="submit" name="sign-up" >Sign-up</button><button type="Reset">Reset!</button><br>
					
                </div>

                <div class="term">
                	<P>Already registered? <a href="login.php">log-in</a></P>
                </div>

                 <button type="button" id="back"><a href="regestration.php">Back</a> </button>
			</form>
			
			
		</div>
		
	</div>
 <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>