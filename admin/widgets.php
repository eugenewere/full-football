<?php
session_start();




  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.php");
  }
//require ('database/server.php');
//connect to players database
   $conn=mysqli_connect('localhost','root','','playerreg');
   if($conn){
      $det="SELECT COUNT(*) AS total FROM player";
      $value=mysqli_query($conn,$det);
      $values=mysqli_fetch_assoc($value);
      $num_rows=$values['total'];              
   }else{}
//end of connection 

//connect to feedback databse
   $conn1=mysqli_connect('localhost','root','','contact');
   if($conn1){
      $det1="SELECT COUNT(*) AS total FROM contacts";
      $value1=mysqli_query($conn1,$det1);
      $values1=mysqli_fetch_assoc($value1);
      $num_rows1=$values1['total'];              
   }else{}
//end of connection
//connect to team database
   $conn2=mysqli_connect('localhost','root','','teamreg');
   if($conn2){
      $det2="SELECT COUNT(*) AS total FROM teamreg";
      $value2=mysqli_query($conn2,$det2);
      $values2=mysqli_fetch_assoc($value2);
      $num_rows2=$values2['total'];              
   }else{}
//end of connection
//connect to fixtures database
   $conn3=mysqli_connect('localhost','root','','leaguetable');
   if($conn3){
      $det3="SELECT COUNT(*) AS total FROM fixtures";
      $value3=mysqli_query($conn3,$det3);
      $values3=mysqli_fetch_assoc($value3);
      $num_rows3=$values3['total'];              
   }else{}
//end connections

   //site visitor
   /* $cunt=mysqli_connect('localhost','root','','simplecounter');
    if($cunt){0
    	$find_counts = mysqli_query("SELECT * FROM user_count");

    	while($row= mysqli_fetch_assoc($find_counts)){
    		$current_count=$row['counts'];
    		$new_count=$current_count +1;
    		$update_count=mysqli_query("UPDATE 'simplecounter'.'user_count' SET 'counts'=$new_count");
    	}
    }*/


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jkuat-Usl-Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>jkuat-usl </span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger"><?php echo "" .$num_rows1;?></span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="images/avatar.png">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>Eugene Were</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<?php 
							 $konn1=mysqli_connect("localhost","root","","contact");
							 if($konn1){
							 	$msg1="SELECT fullname FROM contacts";
							 	$findin1=$konn1->query($msg1);
							  if($findin1-> num_rows > 0){
							  	while($rows1=$findin1-> fetch_assoc()){
                                  echo '<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="images/avatar.png">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#msg1">New message from <strong>'.$rows1['fullname'].'</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small>
								   </div>
								</div>
							</li>';
							  	}

							  }

							 }

							 ?>
							<li class="divider"></li>
							


							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">4</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> <?php echo "" .$num_rows1;?> New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>					
							
							<li><a href="#">
								<div><em class="fa fa-user"></em> <?php echo "" .$num_rows2;?> New teams
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#players">
								<div><em class="fa fa-user"></em> <?php echo "" .$num_rows;?> New players
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#players">
								<div><em class="fa fa-user"></em> <?php echo "" .$num_rows3;?> New Fixtures
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="images/avatar.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo "Hi Admin,".$_SESSION["firstname"]; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="index.php"><em class="fas fa-tachometer-alt">&nbsp;</em> Dashboard</a>
			</li>
			<li class="active"><a href="widgets.php"><em class="fas fa-users">&nbsp;</em> Teams</a>
			</li>
			<li><a href="charts.php"><em class="fas fa-user-tie">&nbsp;</em> Players</a>
			</li>
			<li ><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Fixtures &amp; League Table</a></li>
			<li><a href="elements.php"><em class="far fa-comments">&nbsp;</em> Feedback</a>
			</li>	
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a>
			</li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Teams</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Teams</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default articles chat">
					<div class="panel-heading">
						The Jkuatie Latest News
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>				
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">30</div>
										<div class="text-muted">Jun</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="#">Why Most Jkuat Students Make It To Premier League</a></h4>
										<p>The most popular league in Kenya is not the Kenyan Premier League. It’s the English Premier League. Most Football fanatics in this country can name the entire Chelsea starting 11 but would struggle to name even one left back playing in the Kenyan Premier League. It’s bizarre..</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
						
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">28</div>
										<div class="text-muted">Jun</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="#">Jkuat Cup 2019</a></h4>
										<p>OUT WITH THE OLD AND IN WITH THE NEW In an effort to keep our commitment to maintaining originality while also improving the player experience at our tournaments, Green Sports Africa is proud to present.</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
						
						<div class="article">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">24</div>
										<div class="text-muted">Jun</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="#">Here Is What’s Happening To All Our Talented Players</a></h4>
										<p>There are two very distinct narratives when it comes to kids playing football in Kenya. Let’s look at two stories. Here’s Dennis. Dennis’ story began in 1999 when he first fell in love with football.</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->

						<?php 
							 $confd=mysqli_connect("localhost","root","","feeds");
							 if($confd){
							 	$msgfd="SELECT * FROM newsfeeds";
							 	$findinfd=$confd->query($msgfd);
							  if($findinfd-> num_rows > 0){
							  	while($rowsfd=$findinfd-> fetch_assoc()){
                                  echo '<div class="article border-bottom">
							    <div class="col-xs-12">
								<div class="row">
							    <div class="col-xs-2 col-md-2 date">
							    <div class="large">'.$rowsfd['date1'].'</div>
								<div class="text-muted">'.$rowsfd['month'].'</div>
							    </div>
							    <div class="col-xs-10 col-md-10">
								<h4><a href="#">'.$rowsfd['subject'].'</a></h4>
								<p>'.$rowsfd['comment'].'</div>
								</div>
							    </div>
							    <div class="clear"></div>
						        </div><!--End .article-->';
							  	}

							  }

							 }

					    ?>
					</div>

				</div><!--End .articles-->
		            <div class="col-md-12">
						<div class="panel panel-danger">
							<div class="panel-heading">Delete Teams</div>
							<div class="panel-body">
								<form action="widgets.php" method="POST">
									<div class="form-group">
									  <label for="usr">Team id:</label>
									  <input type="text" name="id" class="form-control" id="usr" required>
									</div>

									<button type="submit" name="delete" class="btn btn-danger">Delete</button>
								</form>
								<?php

								 $id='';

                                 $db1 = mysqli_connect('localhost', 'root', '', 'teamreg');
                                 if (isset($_POST['delete'])) {
                                 	$id = mysqli_real_escape_string($db1, $_POST['id']);
                                
                                    $sql1 = "DELETE FROM teamreg WHERE teamid=$id";
                                   
                                    
                                if( mysqli_query($db1, $sql1)){
                                	echo "<script type='text/javascript'> alert('Record deleted successfully')</script>";
                                }
                                else{
                                	echo "<script type='text/javascript'> alert('Error deleting the record')</script>";
                                }
                                mysqli_close($db1);

                                }

								?>
							</div>
						</div>
					</div>

			<div class="clear"></div>
				

<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									Teams
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em> Delete all fixtures
														</a>
													    </li>
														<li class="divider"></li>
														<li><a href="#">
															<em class="fa fa-cog"></em> Add fixtures
														</a>
													    </li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
									<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
								<div class="panel-body">
									<div class="canvas-wrapper">
										<?php 
						      $conn1=mysqli_connect('localhost','root','','teamreg');
                              $retrieve_data1= "SELECT * FROM teamreg";
                              $result = mysqli_query($conn1, $retrieve_data1);

								echo "<center>
								<table class='table-responsive' border='1'>
								<tr>
								<th>teamname</th>
								<th>email</th>
								<th>Phonenumber</th>
								<th>id</th>
								<th>location</th>
								<th>campus</th>
																
								</tr>";
                                   $rown = 0;
								while($row = mysqli_fetch_array($result))
								{
									$rown++;
								echo "<tr>";
								echo "<td>" . $row['teamname'] . "</td>";
								echo "<td>" . $row['teamemail'] . "</td>";
								echo "<td>" . $row['teamphonenumber'] . "</td>";
								echo "<td>" . $row['teamid'] . "</td>";
								echo "<td>" . $row['teamlocation'] . "</td>";
								echo "<td>" . $row['teamcity'] . "</td>";
								
								
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($conn1);
								
                        ?>	
									</div>
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->

				<div class="panel panel-default">
					<div class="panel-heading">
						Add Teams
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Delete teams
											</a></li>
											<li class="divider"></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						  
<!--add teams-->        <form method="POST" action="widgets.php">
	                          
	                         <div class="form-group">
						      <label for="usr">Team Name:</label>
						      <input type="text" class="form-control" id="usr" name="teamname" autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Team Email:</label>
						      <input type="email" class="form-control" id="pwd" name="email" autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="usr">Phone Number:</label>
						      <input type="text" class="form-control" id="usr" name="phonenumber" autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="pwd">Id:</label>
						      <input type="text" class="form-control" id="pwd" name="id" autocomplete="off">
						    </div>
						    <div class="form-group">
						      <label for="usr">Location:</label>
						      <input  list="location" type="text" class="form-control" name="location" id="usr">
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
						    </div>
						    <div class="form-group">
						      <label for="pwd">Team Campus City:</label>
						      <input list="city" type="text" class="form-control" name="city" id="pwd">
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
						    </div>
						    <div class="form-group">
						      <label for="pwd">Team Campus Country:</label>
						      <input list="country" type="text" class="form-control" name="country" id="pwd">
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
						    </div>
						    <button type="submit" name="submit" class="btn btn-success">Add</button>
                        </form>

                    <?php 
                       

                        $teamname ="";
						$email = "";
						$phonenumber = "";	
						$id = "";
						$location = "";
						$city = "";
						$country = "";
						$errors = array();

						$db = mysqli_connect('localhost', 'root', '', 'teamreg');
						if (isset($_POST['submit'])) {

							$teamname = mysqli_real_escape_string($db, $_POST['teamname']);
							$email =  mysqli_real_escape_string($db, $_POST['email']);
							$phonenumber =  mysqli_real_escape_string($db, $_POST['phonenumber']);	
							$id =  mysqli_real_escape_string($db, $_POST['id']);
							$location =  mysqli_real_escape_string($db, $_POST['location']);
							$city =  mysqli_real_escape_string($db, $_POST['city']);
							$country =  mysqli_real_escape_string($db, $_POST['country']); 
							    if (empty($teamname) || empty($email) || empty($phonenumber) ||  empty($id ) || empty($location) || empty($city) || empty($country))
								{
								  array_push($errors, "Fill in the fields");
								  echo "<script> alert('Fill in the fields')</script>";			        
					            }
					            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
								   array_push($errors, "incorrect email");
								   echo "<script> alert('incorrect email')</script>";
								}
								if(strlen($id)<4 || strlen($id)>4){
									array_push($errors, "only four character are required");
									echo "<script> alert('only four character are required')</script>";
								}

								$check="SELECT * FROM teamreg WHERE teamname ='$teamname'";
		                         	$feed=mysqli_query($db,$check);
		                         	$check_exists=mysqli_num_rows($feed);
		                         	if($check_exists>0){
                                      
		                         		echo "<script>alert('Team already exists....');</script>";
		                         		
		                             
		                         	}

						   /*$team_check_query = "SELECT teamname AND teamid FROM teamreg WHERE teamid='$id' AND teamname='$teamname' LIMIT 1";

						        $result = mysqli_query($db, $team_check_query);
        						$user = mysqli_fetch_assoc($result);


        						if ($user) 
						         { 
						          // if user exists
						         	if ($user['teamid'] === $id) {
						              array_push($errors, "Team-Id already exists");
						              echo "<script> alert('Team-Id already exists')</script>";
						            }

						            if ($user['teamname'] === $teamname) {
						              array_push($errors, "team name already exists");
						              echo "<script> alert('team name already exists')</script>";
						            }
						    }*/
						       	else{
		                         	
		                            $query = "INSERT INTO teamreg (teamname, teamemail, teamphonenumber, teamid, teamlocation, teamcity,teamcountry) VALUES('$teamname','$email','$phonenumber','$id','$location','$city','$country')";
		                            mysqli_query($db, $query);
						           
						  	        echo "<script>alert('Team registered....');</script>";
							  	 }	
							  									
						}
						
                    ?>
					</div> 
					
				</div>
				
			</div><!--/.col-->


			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Calendar
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>


				
				
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">jkuat-usl <a href="https://www.medialoot.com">admin</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	  

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
