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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
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
				<a class="navbar-brand" href="#"><span>jkuat-usl</span> Admin</a>
				<!--msg box-->
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger"><?php echo "" .$num_rows1;?></span>
					</a>
						<ul class="dropdown-menu dropdown-messages">				
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="images/avatar.png">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#msg1">New message from <strong>Eugene were</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small>
								   </div>
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
					<!-- bell icon-->
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
			<li class="active"><a href="index.php"><em class="fas fa-tachometer-alt">&nbsp;</em> Dashboard</a>
			</li>
			<li><a href="widgets.php"><em class="fas fa-users">&nbsp;</em> Teams</a>
			</li>
			<li><a href="charts.php"><em class="fas fa-user-tie">&nbsp;</em> Players</a>
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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fas fa-user color-blue size1"></em>
							<div class="large">
							<?php echo "" .$num_rows;?>			
							 </div>
							<div class="text-muted">Players</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?php echo "" .$num_rows1;?>	</div>
							<div class="text-muted">Feedback</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo "" .$num_rows2;?></div>
							<div class="text-muted">Teams</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div><p class="large" id="display_div_id"><?php echo "" .$num_rows3;?></p></div>
							<div class="text-muted">Fixtures</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Fixures
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="panels.php">
												<em class="fa fa-cog"></em> Delete all fixtures
											</a>
										    </li>
											<li class="divider"></li>
											<li><a href="panels.php">
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
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						League Table Standings
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="panels.php">
												<em class="fa fa-cog"></em> Delete Table Records
											</a>
										    </li>
											<li class="divider"></li>
											<li><a href="panels.php">
												<em class="fa fa-cog"></em> Add Table Records
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
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Players</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo "" .$num_rows;?>" ><span class="percent"><?php echo "" .$num_rows;?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Feedback</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo "" .$num_rows1;?>" ><span class="percent"><?php echo "" .$num_rows1;?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Teams</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo "" .$num_rows2;?>" ><span class="percent"><?php echo "" .$num_rows2;?>%</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Fixtures</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo "" .$num_rows3;?>" ><span class="percent"><?php echo "" .$num_rows3;?>%</span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					 Players Scoreboard
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="charts.php">
												<em class="fa fa-cog"></em> Edit Players
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
		
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default chat">
					<div class="panel-heading">
						Feedback
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="elements.php">
												<em class="fa fa-cog"></em> View Feedback
											</a></li>
											
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<ul>
							<li class="left clearfix" id="msg1"><span class="chat-img pull-left">
								<img src="images/avatar.png" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">Eugene Were</strong> <small class="text-muted">1 mins ago</small></div>
									<p>Please review your log-in page</p>
								</div>
							</li>
							<?php 
							 $konn=mysqli_connect("localhost","root","","contact");
							 if($konn){
							 	$msg="SELECT fullname,mail,subject,textarea FROM contacts";
							 	$findin=$konn->query($msg);
							  if($findin-> num_rows > 0){
							  	while($rows=$findin-> fetch_assoc()){
                                  echo '<li class="left clearfix"><span class="chat-img pull-left">
								<img src="images/avatar.png" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">'.$rows['fullname']. '</strong> <small class="text-muted">1 mins ago</small></div>
									<p>'.$rows['mail'].' <br> <p class="msg"> '.$rows['textarea'].'</p>';
							  	}

							  }

							 }

							 ?>
							
						</ul>
					</div>
					
				</div>
				
			</div><!--/.col-->
			<div class="col-md-6 chat">
				<div class="panel panel-default ">
					<div class="panel-heading">
						The Jkuatie Latest Panel
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="panels.php">
												<em class="fa fa-cog"></em> Create New Feeds
											</a></li>
											<li class="divider"></li>
											
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
						
						<div class="article">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-2 col-md-2 date">
										<div class="large">24</div>
										<div class="text-muted">April</div>
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
			
			
			<div class="col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Players
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
						
					<div class="panel-body timeline-container" id="players">
						<?php 
						  $conn4=mysqli_connect('localhost','root','','playerreg');
                              $check = "SELECT * FROM player";
                              $result1 = mysqli_query($conn4, $check);

								echo "<center>
								<table class='table-responsive' border='1'>
								<tr>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Team</th>
								</tr>";
                                   $rown = 0;
								while($row = mysqli_fetch_array($result1))
								{
									$rown++;
								echo "<tr>";
								echo "<td>" . $row['firstname'] . "</td>";
								echo "<td>" . $row['lastname'] . "</td>";
								echo "<td>" . $row['email'] . "</td>";
								echo "<td>" . $row['phoneno'] . "</td>";
								echo "<td>" . $row['team'] . "</td>";
								echo "</tr>";
								}
								echo "</table> 
								</center>";

								mysqli_close($conn4);
								
                        ?>					
					</div>
				</div>
			</div><!--/.col-->

			<div class="col-md-6">

				<div class="panel panel-default ">
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
												<em class="fa fa-cog"></em>Add teams
											</a></li>
											<li class="divider"></li>
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
						<!--players table-->
					<div class="panel-body timeline-container" id="teams">
						<?php 
						      $conn1=mysqli_connect('localhost','root','','teamreg');
                              $retrieve_data1= "SELECT * FROM teamreg";
                              $result = mysqli_query($conn1, $retrieve_data1);

								echo "<center>
								<table class='table-responsive s12 active' border='1'>
								<tr>
								<th>name</th>
								<th>email</th>
								<th>phonenumber</th>
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
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Jkuat-usl <a href="#">admin</a></p>
			</div>
		</div><!--/.row-->

			<div class="col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Players Search In Respective Teams
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<!--setting cog icons-->
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
						<!--players table-->
				<form action="" method="POST">	
					<div class="panel-body timeline-container" id="">
						<div class="input-group">
					     <input list="listss" type="text" class="form-control" placeholder="Search" name="search">
					       <div class="input-group-btn">
						      <button class="btn btn-default" type="submit" name="submit1">
						        <i class="glyphicon glyphicon-search"></i>
						      </button>
					      </div>
					  </div>
                          <datalist id="listss">
                            <?php 
                                //at=away team
                             $konnat=mysqli_connect("localhost","root","","teamreg");
                             if($konnat){
                              $msgat="SELECT teamname FROM teamreg";
                              $findinat=$konnat->query($msgat);
                              if($findinat->num_rows > 0){
                                while($rowsat=$findinat-> fetch_assoc()){
                                                echo '<option value="' .$rowsat['teamname']. '">';
                              }}}
                            ?>
                            
                          </datalist>
                          <?php
                      if (isset($_POST['submit1'])) {
                        # code...
                      
                        $search_value=$_POST["search"];
                        $conn6=mysqli_connect('localhost','root','','playerreg');
                        $sql="SELECT * FROM player WHERE team LIKE '%$search_value%'";

                        $res=$conn6->query($sql);
                        echo "
                        <table class='table-responsive' border='1'>";
                        echo "<tr>";
                        echo "<th>firstname</th>";
                        echo "<th>lastname</th>";
                        echo " </tr>";                                    
                        
                      if ($res->num_rows > 0) {
                        while($row=$res->fetch_assoc()){
                         
                        echo "<tr>";
                        echo "<td><a href='charts.php' class='list-group-item'>".$row["firstname"]."</a></td>";
                         echo "<td><a href='charts.php' class='list-group-item'>".$row["lastname"]."</a></td>";
                        echo"</tr>";
                        }  }else{ 
                        echo "</table>";
                        mysqli_close($conn6);
                      }
                    }
                      
                 ?>
                          
                </form>
                    
					</div>
				</div>
			

			<div class="divider"></div>

			
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../javascript/script.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "#009900",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "green"
	});
};
	</script>
		
</body>
</html>