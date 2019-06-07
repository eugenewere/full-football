<?php include('database/server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jkuat-usl-admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register As Admin</div>
					<?php include('database/error.php');?>

				<div class="panel-body">
					<form  action="register.php" method="POST" name="myForm">				
							<div class="form-group">
								<input class="form-control" placeholder="First Name" name="firstname" type="text" autofocus="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Last Name" name="lastname" type="text" autofocus="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Phone number" name="phonenumber" type="number" autofocus="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Admin-id" name="id" type="number" autofocus="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="
								Confirm Password" name="cpassword" type="password" value="" required >
							</div>
							<div class="">
								Choose profile image:
								<input class="" placeholder="file" name="image" type="file" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<a href="login.php" class="btn btn-primary btn-primary-color">Login</a>

							<button class="btn btn-primary" type="submit" name="register">Sign-up</button>
						
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
