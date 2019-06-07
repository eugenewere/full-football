<?php include('database/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Player Registration</title>
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
			<img src="images/playerreg.jpg">
			<p>player registration</p>				
		</div>

		<div class="player-registration-middle">
			<form name="myForm" method="POST" action="playerregestration.php" onsubmit="return validateForm()" >
				
				     <p>player registration</p>
				     	
				    <?php include('database/error.php'); ?>	
				<span>
					FirstName:<br>
				    <input type="text" name="firstname" placeholder="FirstName" autofocus required="" class="verif">
				</span><br>

				<span>
					LastName:<br>
				    <input type="text" name="lastname" placeholder="LastName" class="verif">
				</span><br>
				
				<span>				
					Email Address:<br>
					<input type="text" name="email" placeholder="Email Address" required class="verif">
				</span><br>

				<span>
					Phone Number:<br>
				    <input type="Number" name="phonenumber" placeholder="+254......" maxlength="14" required class="verif">
				</span><br>

				<span>
					Date Of Birth:<br>
				    <input type="date" name="dateofbirth" placeholder="DD/MM/YYYY" class="verif">
				</span><br>
				
				<span>
					School Id:<br>
				    <input type="Number" name="id" placeholder="xxxx-xxxx" class="verif">
				</span><br>

				<span>
					Location:<br>
				    <input list="location" name="location" placeholder="...." class="verif">
				    <datalist id="location">
				    	<?php 
							 $konn0=mysqli_connect("localhost","root","","miscellaneous");
							 if($konn0){
							 	$msg0="SELECT location FROM location";
							 	$findin0=$konn0->query($msg0);
							  if($findin0->num_rows > 0){
							  	while($rows0=$findin0-> fetch_assoc()){
                                  echo '<option value="' .$rows0['location']. '">';
							  	}}}

						?>
					</datalist>
				</span><br>

				<span>
					City:<br>
				    <input list="city" name="city" placeholder="...." class="verif">
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
					Your Country:<br>
					<input list="country" name="country" class="verif">
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
					Your Football Team:<br>
					<input list="football" name="football" class="verif">
					<datalist id="football">
						  <option selected hidden value="">Select team</option>
                    <?php 
					 $konn=mysqli_connect("localhost","root","","teamreg");
					 if($konn){
					 	$msg="SELECT teamname FROM teamreg";
					 	$findin=$konn->query($msg);
					  if($findin->num_rows > 0){
					  	while($rows=$findin-> fetch_assoc()){
                          echo '<option value="' .$rows['teamname']. '">';
					  	}}}

					?>
					</datalist>
				</span><br>

				<span>
					Create Password:<br>
				    <input type="Password" name="password1" placeholder="xxxxxxx" autofocus  required id="pass1" class="verif">
				</span><br>

				<span>
					Confirm Password:<br>
				    <input type="Password" name="password2" placeholder="xxxxxxx" autofocus  required id="pass2" class="verif">
				</span><br>

                <div class="reg">
                	<button type="submit" name="submit-button">sign-up</button>
					<button type="Reset"><a href="">Reset!</a></button>
					
                </div><br>

                
                <div class="term">
                	<P>Already registered? <a href="login.php">log-in</a></P>
                </div>

               <a href="regestration.php"> <button type="button" id="back" >Back </button></a>

			</form>	
			
		</div>		
	</div>
	



 <script type="text/javascript" src="script.js"></script>
</body>
</html>