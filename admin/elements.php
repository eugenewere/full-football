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
	<title>jkuat-usl-admin</title>
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
			<li><a href="panels.php"><em class="fa fa-clone">&nbsp;</em> Fixtures &amp; League Table</a></li>
			<li class="active"><a href="elements.php"><em class="far fa-comments">&nbsp;</em> Feedback</a>
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
				<li class="active">Feedback</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Feedback</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12 chat">
				<div class="panel panel-default">
					<div class="panel-heading">Feeds</div>
					<div class="panel-body">
						<div class="col-md-12 no">
							<?php 
							 $konn=mysqli_connect("localhost","root","","contact");
							 if($konn){
							 	$msg="SELECT fullname,mail,subject,textarea FROM contacts";
							 	$findin=$konn->query($msg);
							  if($findin-> num_rows > 0){
							  	while($rows=$findin-> fetch_assoc()){
                                  echo '<li class="left clearfix"><span class="chat-img pull-left">
								<img src="images/avatar.png" alt="User Avatar" class="img-circle b1" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font">'.$rows['fullname']. '</strong> <small class="text-muted">1 mins ago</small></div>
									<p>'.$rows['mail'].' <br> <p class="msg"> '.$rows['textarea'].'</p> ';
							  	}

							  }

							 }

							 ?>
						</div>
					</div>
				</div><!-- /.panel-->				
			</div><!-- /.col-->
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading">Add Miscellaneous</div>
					<div class="panel-body">
						<div class="col-md-12 no">
							<!-- start of inpannels-->
							<div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-heading">Add country</div>
										<div class="panel-body">
											<div class="col-md-6 no">
					                          <form action="" method="POST">
					                          	<div class="form-group">
												  <label for="usr">A New Country:</label>
												  <input type="text" class="form-control" id="usr" name="country">
												</div>
												<button type="submit" class="btn btn-success" name="add-country">Add</button>
												<button type="submit" class="btn btn-danger" name="delete-country">Delete</button>					                          	
					                          </form>
            <?php 
            	$country='';
            	$errors=array();
            	   //ct=country
                $connct=mysqli_connect('localhost','root','','miscellaneous');
              // adding area
                if (isset($_POST["add-country"])) 
                {
                  $country=mysqli_real_escape_string($connct, $_POST['country']);

                  if (empty($country)) {
                  	array_push($errors, "Fill in the fields");
                  	echo "<script> alert('Fill in the fields')</script>";                  	
                  }

                  $country_check_query="SELECT * FROM country WHERE country='$country'";
                  $country_results=mysqli_query($connct,$country_check_query);
                  $country_rows=mysqli_num_rows($country_results);

                  if($country_rows>0){
                  	array_push($errors, "The country already exists");
                  	echo "<script> alert('The $country country already exists')</script>"; 
                  }               	
                    

                  if (count($errors)==0) {
                     $country_insert_query="INSERT INTO country VALUES('$country')";
                     mysqli_query($connct, $country_insert_query);
                      echo "<script> alert('$country record inserted')</script>"; 


                     }
                
                }
              //delete area

                if (isset($_POST["delete-country"])) 
                {
                	$country=mysqli_real_escape_string($connct, $_POST['country']);
                	if (empty($country)) {
                  	   array_push($errors, "Fill in the fields");
                  	   echo "<script> alert('Fill in the fields')</script>";                  	
                    }
                    $country_check_query1="SELECT * FROM country WHERE  country='$country'";
                    $country_results1=mysqli_query($connct,$country_check_query1);
                    $country_rows1=mysqli_fetch_assoc($country_results1);
                    
                    
                  	if($country_rows1==0){
                  		array_push($errors, "The country doesnt exist");
                  	    echo "<script> alert('The country doesnt exist')</script>"; 
                  	}                  	
                    
                    if (count($errors)==0) {
                     $country_delete_query="DELETE FROM country WHERE country='$country'";
                     mysqli_query($connct, $country_delete_query);
                      echo "<script> alert('$country record deleted')</script>"; 
                     }
                }



            ?>
					                        </div>
										</div>
								</div><!-- /.panel-->				
							</div><!-- /.col-->
							<div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-heading">Add Location</div>
										<div class="panel-body">
											<div class="col-md-6 no">
												<form action="" method="POST">
					                          	<div class="form-group">
												  <label for="usr">A New Location:</label>
												  <input type="text" class="form-control" id="usr" name="location">
												</div>
												<button type="submit" class="btn btn-success" name="add-location">Add</button>
												<button type="submit" class="btn btn-danger" name="delete-location">Delete</button>
					                          </form>
		    <?php 
            	$location='';
            	$errors=array();
            	   //lc=location
                $connlc=mysqli_connect('localhost','root','','miscellaneous');
              // adding area
                if (isset($_POST["add-location"])) 
                {
                  $location=mysqli_real_escape_string($connlc, $_POST['location']);

                  if (empty($location)) {
                  	array_push($errors, "Fill in the fields");
                  	echo "<script> alert('Fill in the fields')</script>";                  	
                  }

                  $location_check_query="SELECT * FROM location WHERE location='$location'";
                  $location_results=mysqli_query($connlc,$location_check_query);
                  $location_rows=mysqli_num_rows($location_results);

                  if($location_rows>0){
                  	array_push($errors, "The $location location already exists");
                  	echo "<script> alert('The $location location already exists')</script>"; 
                  }               	
                    

                  if (count($errors)==0) {
                     $location_insert_query="INSERT INTO location VALUES('$location')";
                     mysqli_query($connlc, $location_insert_query);
                      echo "<script> alert('$location record inserted')</script>"; 


                     }
                
                }
              //delete area

                if (isset($_POST["delete-location"])) 
                {
                	$location=mysqli_real_escape_string($connlc, $_POST['location']);
                	if (empty($location)) {
                  	   array_push($errors, "Fill in the fields");
                  	   echo "<script> alert('Fill in the fields')</script>";                  	
                    }
                    $location_check_query1="SELECT * FROM location WHERE  location='$location'";
                    $location_results1=mysqli_query($connlc,$location_check_query1);
                    $location_rows1=mysqli_fetch_assoc($location_results1);
                    
                    
                  	if($location_rows1==0){
                  		array_push($errors, "The location doesnt exist");
                  	    echo "<script> alert('The $location location doesnt exist')</script>"; 
                  	}                  	
                    
                    if (count($errors)==0) {
                     $location_delete_query="DELETE FROM location WHERE location='$location'";
                     mysqli_query($connlc, $location_delete_query);
                      echo "<script> alert('$location record deleted')</script>"; 
                     }
                }



            ?>

					                        </div>
										</div>
								</div><!-- /.panel-->				
							</div><!-- /.col-->
							<div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-heading">Add City</div>
										<div class="panel-body">
											<div class="col-md-6 no">
												<form action="" method="POST">
					                          	<div class="form-group">
												  <label for="usr">A New city:</label>
												  <input type="text" class="form-control" id="usr" name="city">
												</div>
												<button type="submit" class="btn btn-success" name="add-city">Add</button>
												<button type="submit" class="btn btn-danger" name="delete-city">Delete</button>                	
					                          </form>
		    <?php 
            	$city='';
            	$errors=array();
            	   //ct=city in connct
                $connct=mysqli_connect('localhost','root','','miscellaneous');
              // adding area
                if (isset($_POST["add-city"])) 
                {
                  $city=mysqli_real_escape_string($connct, $_POST['city']);

                  if (empty($city)) {
                  	array_push($errors, "Fill in the fields");
                  	echo "<script> alert('Fill in the fields')</script>";                  	
                  }

                  $city_check_query="SELECT * FROM city WHERE city='$city'";
                  $city_results=mysqli_query($connct,$city_check_query);
                  $city_rows=mysqli_num_rows($city_results);

                  if($city_rows>0){
                  	array_push($errors, "The $city location already exists");
                  	echo "<script> alert('The $city location already exists')</script>"; 
                  }               	
                    

                  if (count($errors)==0) {
                     $city_insert_query="INSERT INTO city VALUES('$city')";
                     mysqli_query($connlc, $city_insert_query);
                      echo "<script> alert('$city record inserted')</script>"; 
                     }
                
                }
              //delete area

                if (isset($_POST["delete-city"])) 
                {
                	$city=mysqli_real_escape_string($connct, $_POST['city']);
                	if (empty($city)) {
                  	   array_push($errors, "Fill in the fields");
                  	   echo "<script> alert('Fill in the fields')</script>";                  	
                    }
                    $city_check_query1="SELECT * FROM city WHERE  city='$city'";
                    $city_results1=mysqli_query($connct,$city_check_query1);
                    $city_rows1=mysqli_fetch_assoc($city_results1);
                    
                    
                  	if($city_rows1==0){
                  		array_push($errors, "The city doesnt exist");
                  	    echo "<script> alert('The $city city doesnt exist')</script>"; 
                  	}                  	
                    
                    if (count($errors)==0) {
                     $city_delete_query="DELETE FROM city WHERE city='$city'";
                     mysqli_query($connct, $city_delete_query);
                      echo "<script> alert('$city record deleted')</script>"; 
                     }
                }



            ?>

					                        </div>
										</div>
								</div><!-- /.panel-->				
							</div><!-- /.col-->

							<div class="col-lg-6">
								<div class="panel panel-success">
									<div class="panel-heading">Add New Features</div>
										<div class="panel-body">
											<div class="col-md-6 no">
												<form action="" method="POST">
					                          	<div class="form-group">
												  <label for="usr">A New Feature:</label>
												  <input type="text" class="form-control" id="usr" name="feature" disabled>
												</div>
												<button type="button" class="btn btn-success" name="add-feature">Add</button>
												<button type="button" class="btn btn-danger" name="delete-feature">Delete</button>					                          	
					                          </form>
					                        
										</div>
								</div><!-- /.panel-->				
							</div><!-- /.col-->

							<!--end of inpannels-->
                        </div>
					</div>
				</div><!-- /.panel-->				
			</div><!-- /.col-->

			<div class="col-sm-12">
				<p class="back-link">jkuat-usl <a href="https://www.medialoot.com">admin</a></p>
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
