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
	<title>jkuat-usl</title>
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
				<a class="navbar-brand" href="#"><span>jkuat-usl</span>Admin</a>
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
										<a href=index.php">New message from <strong>'.$rows1['fullname'].'</strong>.</a>
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
			<li><a href="charts.php"><em class="fas fa-user-tie">&nbsp;</em> Players</a>
			</li>
			<li class="active"><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Fixtures &amp; League Table</a></li>
			<li ><a href="elements.php"><em class="far fa-comments">&nbsp;</em> Feedback</a>
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
				<li class="active">Fixtures &amp; League</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Fixtures &amp; League</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									Fixures
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
						 //fx=fixtures
						      $connfxx =mysqli_connect('localhost','root','','leaguetable');
                              $retrieve_datafxx= "SELECT * FROM fixtures ORDER BY date1";
                              $resultfxx = mysqli_query($connfxx, $retrieve_datafxx);

								echo "<center>
								<table class='table-responsive' border='1'>
								<tr>
								<th>DATE</th>
								<th>DAY</th>
								<th>ID</th>
								<th>HOME</th>
								<th>TIME</th>
								<th>AWAY</th>
								<th>PITCH</th>
								<th>HOME</th>
								<th>AWAY</th>
								</tr>";
                                   $rownfxx = 0;
								while($rowfxx = mysqli_fetch_array($resultfxx))
								{
									$rownfxx++;
								echo "<tr>";
								echo "<td>" . $rowfxx['date1'] . "</td>";
								echo "<td>" . $rowfxx['day1'] . "</td>";
								echo "<td>" . $rowfxx['id'] . "</td>";
								echo "<td>" . $rowfxx['hometeam'] . "</td>";
								echo "<td>" . $rowfxx['time1'] . "</td>";
								echo "<td>" . $rowfxx['awayteam'] . "</td>";
								echo "<td>" . $rowfxx['pitch'] . "</td>";
								echo "<td>" . $rowfxx['results'] . "</td>";
								echo "<td>" . $rowfxx['results2'] . "</td>";
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($connfxx);
								
                        ?>					
										
									</div>
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->	


		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									  Add Fixtures
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em> Delete all Leagues
														</a>
													    </li>
														<li class="divider"></li>
														<li><a href="#">
															<em class="fa fa-cog"></em> Add League
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
										<form action="panels.php" method="POST">
										  	<div class="form-group">
											  <label for="usr">Date:</label>
											  <input type="date" class="form-control" id="usr" min="2019-05-04" name="date1" required>
											</div>
											<div class="form-group">
											  <label for="usr">Day:</label>
											  <input list="days" type="text" class="form-control" id="usr" name="day1" required>
											  <datalist id="days" >
												  <option value="Monday">
												  <option value="Tuesday">
												  <option value="Wenesday">
												  <option value="Thursday">
												  <option value="Friday">
												  <option value="Saturday">
												  <option value="Sunday">
											  </datalist>
											</div>
											<div class="form-group">
											  <label for="usr">Game Id:</label>
											  <input type="number" class="form-control" id="usr" name="id"  required>
											</div> 
											<div class="form-group">
											  <label for="usr">Home Team:</label>
											  <input type="text" list="hometeam" class="form-control" id="usr"  required name="hometeam">
											  <datalist id="hometeam">
											  	 
											  	   <?php 
											  	    //ht=hometeam
													 $konnht=mysqli_connect("localhost","root","","teamreg");
													 if($konnht){
													 	$msght="SELECT teamname FROM teamreg";
													 	$findinht=$konnht->query($msght);
													  if($findinht-> num_rows > 0){
													  	while($rowsht=$findinht-> fetch_assoc()){
						                                  echo '<option value="' .$rowsht['teamname']. '">';
													  	}}}

													 ?>
											  									  	
											  </datalist>
											</div>
											<div class="form-group">
											  <label for="usr">Time:</label>
											  <input type="time" class="form-control" id="usr" name="time1"  required>
											</div>
											<div class="form-group">
											  <label for="usr">Away Team:</label>
											  <input type="text" class="form-control" id="usr" name="awayteam" list="hometeam"  required>

											    <datalist id="hometeam">
											  	   <?php 
											  	      //at=away team
													 $konnat=mysqli_connect("localhost","root","","teamreg");
													 if($konnat){
													 	$msgat="SELECT teamname FROM teamreg";
													 	$findinat=$konnat->query($msgat);
													  if($findinat-> num_rows > 0){
													  	while($rowsat=$findinat-> fetch_assoc()){
						                                  echo '<option value="' .$rowsat['teamname']. '">';
													  	}}}

													?>
														
											    </datalist>
											</div>
											<div class="form-group">
											  <label for="usr">Pitch:</label>
											  <input type="text" class="form-control" id="usr" list="pitch"  required name="pitch">
											  <datalist id="pitch">
											  	<option value="Main Pitch">
											  	<option value="AICAD Pitch">
											  	<option value="JKUAT PITCH">
											  	<option value="">
											  	<option value="">			  	
											  </datalist>
											</div>
											<div class="form-group">
											  <label for="usr">Home Team Results:</label>
											  <input type="number" class="form-control" id="usr" name="results">
											</div>  
											<div class="form-group">
											  <label for="usr">Away Team Results:</label>
											  <input type="number" class="form-control" id="usr" name="results2">
											</div>  	


	                                        <button type="submit" class="btn btn-success" name="addfixtures">Add Fixtures</button>
										</form>

									    <?php 
									    $date1='';
									    $day1='';
									    $id='';
									    $hometeam='';
									    $time1='';
									    $awayteam='';
									    $pitch='';
									    $results='';
									    $results2='';

									    $errors= array();

									    $dbfx = mysqli_connect('localhost', 'root', '', 'leaguetable');



									    if (isset($_POST['addfixtures'])){

                                        $date1=mysqli_real_escape_string($dbfx, $_POST['date1']);
									    $day1=mysqli_real_escape_string($dbfx, $_POST['day1']);
									    $id=mysqli_real_escape_string($dbfx, $_POST['id']);
									    $hometeam=mysqli_real_escape_string($dbfx, $_POST['hometeam']);
									    $time1=mysqli_real_escape_string($dbfx, $_POST['time1']);
									    $awayteam=mysqli_real_escape_string($dbfx, $_POST['awayteam']);
									    $pitch=mysqli_real_escape_string($dbfx, $_POST['pitch']);
									    $results=mysqli_real_escape_string($dbfx, $_POST['results']);
									    $results=mysqli_real_escape_string($dbfx, $_POST['results2']);


									    if ($hometeam === $awayteam) {
									    	# code...
									    	array_push($errors, "Teams should not match");
									    	echo "<script> alert('Seriously!!!!! teams should not match pliz');</script>";
									    }
									    $fixtures_check_query="SELECT * FROM fixtures WHERE id='$id' LIMIT 1";

									    $resultsfx=mysqli_query($dbfx, $fixtures_check_query);
									    $userfx = mysqli_fetch_assoc($resultsfx);
									    if ($userfx) 
									        { 
									          // if user exists
									         	if ($userfx['id'] ===$id) {
									              array_push($errors, "Admin Id in use");
									              echo "<script> alert('Fixtures already inserted with same id');</script>";
									            }									          
									        }
									    if (count($errors) == 0)
									    {
									    	$queryfx="INSERT INTO fixtures(date1,day1,id,hometeam,time1,awayteam,pitch,results,results2)
									    	          VALUES('$date1','$day1','$id','$hometeam','$time1','$awayteam','$pitch','$results','$results2')";
									    	mysqli_query($dbfx, $queryfx);
									    	echo "<script> alert('records entered successfully')</script>";

									    }
									    else{
         	                               echo "<script> alert('please retry ')</script>";
                                        }

									   }
									  
									    ?>							
									</div>   
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-warning">
								<div class="panel-heading">
									Update or Delete Fixures scores
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em>Update results
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
									<form action="panels.php" method="POST">

										<div class="form-group">
										  <label for="usr">Game Id:</label>
										  <input type="number" class="form-control" id="usr" name="id" required name="id">
										</div> 

									    <div class="form-group">
										  <label for="usr">Home Team:</label>
										  <input type="number" class="form-control" id="usr" name="results" >
										</div> 
										<div class="form-group">
										  <label for="usr">Away team:</label>
										  <input type="number" class="form-control" id="usr" name="results2" >
										</div> 
                                        <button type="submit" class="btn btn-success" name="update">Update Fixtures</button>
                                        <button type="submit" class="btn btn-danger" name="delete">Delete Fixtures</button>
									</form>	
							<?php 
								$id='';
								$results='';
								$results2='';

								$errors=array();
                                   //dl=delete
                                $condl=mysqli_connect('localhost','root','','leaguetable');
 							//deleting area
                              if(isset($_POST['delete']))
                                {
	                              	$id =mysqli_real_escape_string($condl, $_POST['id']);


	                              	if (empty($id)) {
	                              		array_push($errors, "Atleast fill in the  id value");
	 								    echo"<script type='text/javascript'> alert('Atleast fill in the  id value')</script>";
	                              		# code...
	                              	}

	                              	$chek_id="SELECT * FROM fixtures WHERE id=$id";
	                              	$chek_results=mysqli_query($condl,$chek_id);
	                              	$chek_user=mysqli_fetch_assoc($chek_results);

	 								if ($chek_user) {

	 									if ($chek_user['id'] !== $id) {
	 										array_push($errors, "Invalid Id in use");
	 										echo"<script type='text/javascript'> alert('Invalid Id in use:cant find the record')</script>";
	 										# code...
	 									} 
	 									if (!$chek_user['id']) {
	 										array_push($errors, "There are no records");
	 										echo"<script type='text/javascript'> alert('There are no records')</script>";
	 										
	 							        }									
	 								}

	                                if (count($errors) == 0) {
	                                	$sqldl="DELETE FROM fixtures WHERE id=$id";

	                                if(mysqli_query($condl,$sqldl)){
	                                	echo "<script type='text/javascript'> alert('Record deleted successfully')</script>";
	                                }
	                                else{
	                                	echo "<script type='text/javascript'> alert('Error deleting the record')</script>";
	                                }}
                                }
                                 


                            //update area
                              if(isset($_POST['update'])){
                              $id =mysqli_real_escape_string($condl, $_POST['id']);
                              $results =mysqli_real_escape_string($condl, $_POST['results']);
                              $results2=mysqli_real_escape_string($condl, $_POST['results2']);

                               if (empty($id)||empty($results)) {
                              		array_push($errors, "Atleast fill in the all value");
 								    echo"<script> alert('Atleast fill in the all value')</script>";
                              		
                              	}

                                $chek_id="SELECT * FROM fixtures WHERE id=$id";
                              	$chek_results=mysqli_query($condl,$chek_id);
                              	$chek_user=mysqli_fetch_assoc($chek_results);
                              if ($chek_user) {                              	
                              	if ($chek_user['id'] !== $id) {
 										 array_push($errors, "Invalid Id in use");
 										 echo"<script> alert('Invalid Id in use :cant find the record')</script>";									
 									} 						
                              }
                              if (count($errors) == 0){
                              	//up=update;
                              	$query_up = "UPDATE fixtures SET results=$results ,results2=$results2 WHERE id=$id ";
                              	mysqli_query($condl, $query_up);
                              	echo"<script> alert('records updated')</script>";

                              }

                             }

                           	?>									
									</div>
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->	

		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									League Table
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em> Delete all Leagues
														</a>
													    </li>
														<li class="divider"></li>
														<li><a href="#">
															<em class="fa fa-cog"></em> Add League
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
						      $conn=mysqli_connect('localhost','root','','leaguetable');
                              $retrieve_data= "SELECT * FROM league1";
                              $result = mysqli_query($conn, $retrieve_data);

								echo "<center>
								<table class='table-responsive' border='1'>
								<tr>
								<th>Team</th>
								<th>Played</th>
								<th>Won</th>
								<th>Draw</th>
								<th>Lost</th>
								<th>Goal-Difference</th>
								<th>Points</th>
								</tr>";
                                   $rown = 0;
								while($row = mysqli_fetch_array($result))
								{
									$rown++;
								echo "<tr>";
								echo "<td>" . $row['team'] . "</td>";
								echo "<td>" . $row['played'] . "</td>";
								echo "<td>" . $row['won'] . "</td>";
								echo "<td>" . $row['draw'] . "</td>";
								echo "<td>" . $row['lost'] . "</td>";
								echo "<td>" . $row['difference'] . "</td>";
								echo "<td>" . $row['points'] . "</td>";
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($conn);
								
                        ?>					
										
									</div>
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->	


		
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-heading">
									Add League Standings
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em> Delete all Leagues
														</a>
													    </li>
														<li class="divider"></li>
														<li><a href="#">
															<em class="fa fa-cog"></em> Add League
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
										<form method="POST" action="panels.php">

											<div class="form-group">
											  <label for="usr">Team:</label>
											  <input list="football" type="text" class="form-control" id="usr" name="team" required>
											   <datalist id="football">												  
												  
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
											</div>
											<div class="form-group">
											  <label for="usr">Played:</label>
											  <input type="number"class="form-control" id="usr" name="played" required>
											</div>
											<div class="form-group">
											  <label for="usr">Games Won:</label>
											  <input type="number" class="form-control" id="usr" name="won" required>
											</div>
											<div class="form-group">
											  <label for="usr">Game Draw:</label>
											  <input type="number" class="form-control" id="usr" name="draw" required>
											</div>
											<div class="form-group">
											  <label for="usr">Game lost:</label>
											  <input type="number" class="form-control" id="usr" name="lost" required>
											</div>
											<div class="form-group">
											  <label for="usr">Goal Difference:</label>
											  <input type="number" class="form-control" id="usr" name="difference" required>
											</div>
											<div class="form-group">
											  <label for="usr">Points:</label>
											  <input type="number" class="form-control" id="usr" name="points" required>
											</div>

											<button type="submit" name="addleague" class="btn btn-success">Add</button>	
										</form>

												<?php
										           
														$team ="";
														$played = "";
														$won = "";
														$draw = "";
														$lost = "";
														$difference = "";
														$points = "";
														
														$errors = array(); 
										                
										                $ltdb = mysqli_connect('localhost', 'root', '', 'leaguetable');
										                
										                if(isset($_POST['addleague'])){

										                	$team =mysqli_real_escape_string($ltdb, $_POST['team']);
															$played = mysqli_real_escape_string($ltdb, $_POST['played']);
															$won = mysqli_real_escape_string($ltdb, $_POST['won']);
															$draw = mysqli_real_escape_string($ltdb, $_POST['draw']);
															$lost = mysqli_real_escape_string($ltdb, $_POST['lost']);
															$difference = mysqli_real_escape_string($ltdb, $_POST['difference']);
															$points = mysqli_real_escape_string($ltdb, $_POST['points']);  

															$team_check = "SELECT team FROM league1 WHERE team='$team' LIMIT 1";
													        $result = mysqli_query($ltdb, $team_check);
													        $user = mysqli_fetch_assoc($result);

													        if ($user) 
													         { 
													          // if user exists
													         	if ($user['team'] === $team) {
													              array_push($errors, "The team is already sorted");
													              echo "<script> alert('The team already sorted')</script>";
													            }												            
													         }

                                                             //cheking in team reg database for the team if it exists
													        $dbtr=mysqli_connect('localhost','root','','teamreg');


													        $team_check2 = "SELECT teamname FROM teamreg WHERE teamname='$team'";
													        $result2 = mysqli_query($dbtr, $team_check2);
													        $user2 = mysqli_fetch_assoc($result2);

													        if($user2==0){
										                  		array_push($errors, "The team doesnt exist");
										                  	    echo "<script> alert('The $team  doesnt exist')</script>"; 
										                  	}

										                   if(count($errors) == 0){

										                   	$query = "INSERT INTO league1(team,played,won,draw,lost,difference,points) VALUES ('$team','$played','$won','$draw','$lost','$difference','$points')" ;

										                    mysqli_query($ltdb, $query);
										                     $_SESSION['team']=$team;
										                     $_SESSION['success'] = "You are now logged in";
										                   }
										                            
										                }
											    ?>
									</div>
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->

		<!--delete league standings-->
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
						<div class="col-md-12">
							<div class="panel panel-danger">
								<div class="panel-heading">
									Delete League Standings
									<ul class="pull-right panel-settings panel-button-tab-right">
										<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
											<em class="fa fa-cogs"></em>
										</a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li>
													<ul class="dropdown-settings">
														<li><a href="#">
															<em class="fa fa-cog"></em> Delete all Leagues
														</a>
													    </li>
														<li class="divider"></li>
														<li><a href="#">
															<em class="fa fa-cog"></em> Add League
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
										<form method="POST" action="panels.php">

											<div class="form-group">
											  <label for="usr">Team Name:</label>
											  <input list="football" type="text" class="form-control" id="usr" name="team" required>
											   <datalist id="football">							  
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
											</div>		
											<button type="submit" name="deleteleague" class="btn btn-danger">Delete</button>	
										</form>
											<?php
												  $team='';
												  $errors=array(); 
												  $db = mysqli_connect('localhost', 'root', '', 'leaguetable');

											      if (isset($_POST["deleteleague"])) 
			                						{
			                							$team=mysqli_real_escape_string($db, $_POST['team']);
			                							if (empty($team)) {
									                  	   array_push($errors, "Fill in the fields");
									                  	   echo "<script> alert('Fill in the fields')</script>";                  	
									                    }
									                    $team_check_query1="SELECT * FROM league1 WHERE team='$team'";
									                    $team_results1=mysqli_query($db,$team_check_query1);
									                    $team_rows1=mysqli_fetch_assoc($team_results1);

									                    if($team_rows1==0){
								                  		array_push($errors, "The team doesnt exist");
								                  	    echo "<script> alert('The $team team doesnt exist')</script>"; 
								                  	    }
								                  	    if (count($errors)==0) {
									                     $team_delete_query="DELETE FROM league1 WHERE team='$team'";
									                     mysqli_query($db, $team_delete_query);
									                      echo "<script> alert('$team record deleted')</script>"; 
									                     }
			                						}
										   ?>

												
								</div>
							</div>
						</div>
		        </div><!--/.row-->
			</div>
		</div><!--/.row-->

		
        
        <div class="col-md-12">
				<div class="panel panel-success  chat">
					<div class="panel-heading">
						New Feeds
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
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<!--players table-->
					<div class="panel-body timeline-container">
						<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">30</div>
										<div class="text-muted">April</div>
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
										<div class="text-muted">April</div>
									</div>
									<div class="col-xs-10 col-md-10">
										<h4><a href="#">Jkuat Cup 2019</a></h4>
										<p>OUT WITH THE OLD AND IN WITH THE NEW In an effort to keep our commitment to maintaining originality while also improving the player experience at our tournaments, Green Sports Africa is proud to present.</p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
						
						<?php 
							 $confd=mysqli_connect("localhost","root","","feeds");
							 if($confd){
							 	$msgfd="SELECT * FROM newsfeeds ORDER BY date1";
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
					</div>
				</div>
			</div><!--/.col-->


				
		<div class="row">
			
             
             <div class="col-lg-12">
				<h2>Add Feeds</h2>
			</div>
			<div class="col-md-12">
				<div class="panel panel-success">
					<div class="panel-heading">Add Feeds
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<form method="POST" action="panels.php">
							<div class="form-group">
							  <label for="usr">Date:</label>
							  <input type="number" name="date" min="0" max="31" step="1" value="1" class="form-control" id="usr">	  
							</div>

							<div class="form-group">
							  <label for="usr">Month:</label>
							  <input type="month" name="month" class="form-control" id="usr">
							</div>

							<div class="form-group">
							  <label for="usr">Subject:</label>
							  <input type="text" name="subject" class="form-control" id="usr">
							</div>

							<div class="form-group">
							  <label for="comment">Comment:</label>
							  <textarea class="form-control" rows="15" id="comment" name="comment"></textarea>
							</div>
						   <button type="submit" name="createfeeds" class="btn btn-success">Create</button>
						</form>

						<?php 
    					  
    					  $date='';
    					  $month='';
    					  $subject='';
    					  $comment='';
    					  $errors = array();

    					  $dbfd = mysqli_connect('localhost', 'root', '', 'feeds');

    					  if (isset($_POST['createfeeds'])) {

    					  	$date=mysqli_real_escape_string($dbfd, $_POST['date']);
    					    $month=mysqli_real_escape_string($dbfd, $_POST['month']);
    					    $subject=mysqli_real_escape_string($dbfd, $_POST['subject']);
    					    $comment=mysqli_real_escape_string($dbfd, $_POST['comment']);

    					    if (empty($date) || empty($month) || empty($subject) || empty($comment)) 
					        { 
					        	array_push($errors, "Fill in the fields");
					            echo "<script type='text/javascript'> alert('Fill in the fields')</script>";
					        }
					        if($date>31){
					        	echo "<script type='text/javascript'> alert('The days are overboard')</script>";

					        }
					        if (count($errors) == 0)
                            {
                            	$queryfd= "INSERT INTO newsfeeds(date1,month,subject,comment)VALUES('$date','$month','$subject','$comment')";
                            	mysqli_query($dbfd, $queryfd);
                               echo "<script type='text/javascript'> alert('Feeds captured')</script>";




                            }
    					  }
						?>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
			
		
		
	</div><!--/.main-->
	
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
