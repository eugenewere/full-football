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
				<a class="navbar-brand" href="#"><span>Jkuat-Usl </span>Admin</a>
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
										<a href="#"><strong>Victor</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="images/avatar.png">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Victor Asava</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
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
							<li><a href="#msg1">
								<div><em class="fa fa-envelope" ></em> <?php echo "" .$num_rows1;?> New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#teams">
								<div><em class="fa fa-heart"></em> <?php echo "" .$num_rows2;?> New teams
									<span class="pull-right text-muted small">3 mins ago</span></div>
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
			<li ><a href="widgets.php"><em class="fas fa-users">&nbsp;</em> Teams</a>
			</li>
			<li class="active"><a href="charts.php"><em class="fas fa-user-tie">&nbsp;</em> Players</a>
			</li>
			<li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Fixtures &amp; League Table</a></li>
			<li><a href="elements.php"><em class="far fa-comments">&nbsp;</em> Feedback</a>
			</li>			
			<li><a href="index.php?logout='1'"><em class="fa fa-power-off">&nbsp;</em> Logout</a>
			</li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Players</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Players</h1>
			</div>
		</div><!--/.row-->
			
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						All Players
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
											<li class="divider"></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<?php 
						      $conn=mysqli_connect('localhost','root','','playerreg');
                              $retrieve_data= "SELECT * FROM player";
                              $result = mysqli_query($conn, $retrieve_data);

								echo "<center>
								<table class='table-responsive table-hover' border='1'>
								<tr>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Player id</th>
								<th>Team</th>
								<th>City</th>
								<th>Country</th>
								<th>Location</th>
								</tr>";
                                   $rown = 0;
								while($row = mysqli_fetch_array($result))
								{
									$rown++;
								echo "<tr>";
								echo "<td>" . $row['firstname'] . "</td>";
								echo "<td>" . $row['lastname'] . "</td>";
								echo "<td>" . $row['email'] . "</td>";
								echo "<td>" . $row['phoneno'] . "</td>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['team'] . "</td>";
								echo "<td>" . $row['city'] . "</td>";
								echo "<td>" . $row['country'] . "</td>";
								echo "<td>" . $row['location'] . "</td>";
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($conn);
								
                        ?>					
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		

				<div class="clear"></div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						Delete Player
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
											<li class="divider"></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<form action="charts.php" method="POST">
								<div class="form-group">
								  <label for="usr">Id:</label>
								  <input type="number" class="form-control" id="usr" name="id" required autocomplete="off">
								</div>

								<button type="submit" name="delete-player" class="btn btn-danger">Delete</button>
							</form>

							<?php 
								$id='';
                                   //dp=deleteplayer
                                $condp=mysqli_connect('localhost','root','','playerreg');

                              if(isset($_POST['delete-player'])){
                              	$id =mysqli_real_escape_string($condp, $_POST['id']);

                                $sqldp="DELETE FROM player WHERE id=$id";

                                if(mysqli_query($condp,$sqldp)){
                                	echo "<script type='text/javascript'> alert('Record deleted successfully')</script>";
                                }
                                else{
                                	echo "<script type='text/javascript'> alert('Error deleting the record')</script>";
                                }
                                mysqli_close($condp);
                               }
							?>
<!--dddd-->							
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
				<div class="clear"></div>

        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">
					 Players Scoreboard
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
											<li class="divider"></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					    <div class="panel-body">
						    <div class="canvas-wrapper">
						<?php 

						      $connsb=mysqli_connect('localhost','root','','playerreg');
                              $retrieve_datasb= "SELECT * FROM scoreboard1 ";
                              $resultsb = mysqli_query($connsb, $retrieve_datasb);

								echo "<center>
								<table class='table-responsive table-hover' border='1'>
								<tr>
								<th>Player name</th>
								<th>id</th>
								<th>Score</th>							
								</tr>";
                                   $rown = 0;
								while($row = mysqli_fetch_array($resultsb))
								{
									$rown++;
								echo "<tr>";
								echo "<td>" . $row['playername'] . "</td>";
								echo "<td>" . $row['id'] . "</td>";
								echo "<td>" . $row['score'] . "</td>";
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($connsb);
								
                        ?>		
<!--dddd-->							
						    </div>
					    </div>
				</div>
			</div>
		</div><!--/.row-->
		         <div class="clear"></div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">
					  Create Players Scoreboard
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
											<li class="divider"></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					    <div class="panel-body">
						    <div class="canvas-wrapper">
						    	<form action="charts.php" method="POST">
						    		<div class="form-group">
								      <label for="usr">Player Full Name</label>
								      <input list="playerss" type="text" class="form-control" id="usr" name="playername" required>
								      <datalist id="playerss">
								<?php 
								 $konn1=mysqli_connect("localhost","root","","playerreg");
								 if($konn1){
								 	$msg1="SELECT firstname FROM player";
								 	$findin1=$konn1->query($msg1);
								  if($findin1->num_rows > 0){
								  	while($rows1=$findin1-> fetch_assoc()){
	                                  echo '<option value="' .$rows1['firstname']. '">';
								  	}}}

								?>						      	

								      </datalist>
								    </div>
								    <div class="form-group">
								      <label for="usr">Player Id:</label>
								      <input  type="number" class="form-control" id="usr" name="id"required >	      
								    </div>	
								    <div class="form-group">
								      <label for="usr">Score:</label>
								      <input type="number" class="form-control" id="usr" name="score"required>
								    </div>	

								     <button type="submit" name="postscore" class="btn btn-success">Create</button>				    		
						    	</form><!--dddd-->
						    	<?php

						    	$playername="";
						    	$id="";
						    	$score="";
						    	$errors = array(); 

						    	$sbdb = mysqli_connect('localhost', 'root', '', 'playerreg');
						    	if (isset($_POST['postscore'])){
						    		$playername=mysqli_real_escape_string($sbdb, $_POST['playername']);
						    		$id=mysqli_real_escape_string($sbdb, $_POST['id']);
						    	    $score=mysqli_real_escape_string($sbdb, $_POST['score']);
                                    


						    	    $namecheck="SELECT firstname FROM player";
						    	    $valuess=mysqli_query($sbdb,$namecheck);
						    	    $valuess2=mysqli_fetch_assoc($valuess);

						    	   if(empty($playername)||empty($score)||empty($id)){
						    	   	  array_push($errors, "Fill in the fields");
						    	   }
						    	   if($valuess2['firstname']===$playername){
						    	   	 array_push($errors, "The player exists");
						    	   	 echo "<script> alert(' The player exists');</script>";

						    	   }
						    	    $user_check_querysb = "SELECT * FROM scoreboard1 WHERE playername='$playername'  LIMIT 1";
							        $resultsb = mysqli_query($sbdb, $user_check_querysb);
							        $usersb = mysqli_fetch_assoc($resultsb);

							        if ($usersb) 
							         { 
							          // if user exists
							         	if ($usersb['playername'] === $playername) {
							              array_push($errors, "The player exists you cant duplicate ");
							              echo "<script> alert(' The player exists');</script>";
							            }							          
							         }

						    	   if (count($errors) == 0)
                                   {
                                   	$query1="INSERT INTO scoreboard1(playername,id,score) VALUES('$playername','$id','$score')";

                                    mysqli_query($sbdb, $query1);
                                    $_SESSION['playername'] = $playername;
						            $_SESSION['success'] = "You are now logged in";
						  	        header('location: ');


                                   }
						    	}
						    	?>


						    </div>
					    </div>
				</div>
			</div>
		</div><!--/.row-->

				<div class="clear"></div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-danger">
					<div class="panel-heading">
						Delete Player Scores
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
											<li class="divider"></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<form action="charts.php" method="POST">
								<div class="form-group">
								  <label for="usr">Player Id:</label>
								  <input type="number" class="form-control" id="usr" name="id" required>
								</div>
								<button type="submit" name="delete-score" class="btn btn-danger">Delete</button>
							</form>

							<?php 
								$id='';
                                   //ds=deletescore
                                $conds=mysqli_connect('localhost','root','','playerreg');

                              if(isset($_POST['delete-score'])){
                              	$id =mysqli_real_escape_string($conds, $_POST['id']);

                                $sqlds="DELETE FROM scoreboard1 WHERE id=$id";

                                if(mysqli_query($conds,$sqlds)){
                                	echo "<script type='text/javascript'> alert('Record deleted successfully')</script>";
                                }
                                else{
                                	echo "<script type='text/javascript'> alert('Error deleting the record')</script>";
                                }
                                mysqli_close($conds);
                               }
							?>
<!--dddd-->							
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
          <div class="clear"></div>

<!--delete players-->

			
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
