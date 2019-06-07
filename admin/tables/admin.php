<!DOCTYPE html>
<html>
<head>
	<title>JKUAT-USL-ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	
	<link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link href=' http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
	<!--top nav-->
	<div class="stick_nav">
		<div class="nav">
			<div class="logo">
				<i class="fas fa-futbol" id="logo-pic"></i>
			    <p id="logo-name">jkuat-usl-admin</p>				
			</div>

			<div class="admin_info">
			    <li class="nav-button" id="button">
	          		<a href="#button" class="btn">
	          			<i class="far fa-envelope" id="mail"><span>12</span></i>
	          			<i class="far fa-user" id="mail"><span>1</span></i>
	          			admin
	          			<i class="fas fa-caret-down" id="mail" ></i>
			        </a>
			          <div class="smenu-i">
			            <a href="#profile">Dashboard</a>
			            <a href="#Edit">Team</a>
			            <a href="#TeamPlayers">Players</a>
			            <a href="#Rules">Feedback</a>
			            <a href="#Fixtures">fixtures</a>
			            <a href="#" >logout</a>
	                  </div>
	              </li>				
			</div>


		</div>		
	</div>
	<!--end of top nav-->
    <!--start of fixed nav-->
	<div class="left_fixed_nav">
		<div class="fixednav-left">
			
			   	<div class="top-content">
			   		<div id="img"><img src="../images/avatar.png"></div>
			   		<div id="details">
			   			<p>Username</p>
			   			<span id="online"><div id="online-button"></div>Online</span>
			   		</div>	   		
			   	</div>

			   	<div class="center-items">
			   		<div class="center-items-list">
			   			<ul>
			   				<a href="#"><li><i class="fas fa-tachometer-alt"></i>Dashboard</li></a>
			   				<a href="#"><li><i class="fas fa-users"></i>Teams</li></a>
			   				<a href="#"><li><i class="fas fa-user-tie"></i>Players</li></a>
			   				<a href="#"><li><i class="far fa-comments"></i>Feedback</li></a>
			   				<a href="#"><li><i class="fas fa-power-off"></i>Logout</li>	</a>   				
			   			</ul>		   			
			   		</div>		   		
			   	</div>	   	
		</div>

	   <div class="right-content">
	   	   <div class="maincontent" id="dashboard">
	   	   	  <div class="top-dash">
	   	   	  	<div class="teams">
	   	   	  		<i class="fas fa-users"></i>
	   	   	  		<p>Teams</p>
	   	   	  		<p>70</p>	   	   	  		
	   	   	  	</div>
	   	   	  	
	   	   	  </div>	   	   	
	   	   </div>	   	
	   </div>		
	</div>


</body>
</html>