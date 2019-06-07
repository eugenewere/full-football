<?php
session_start();

// initializing variables
$teamname ="";
$email = "";
$phonenumber = "";	
$id = "";
$location = "";
$city = "";
$country = "";
$password1 = "";
$password2 = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'teamreg');

// REGISTER USER
if (isset($_POST['sign-up'])) {
  // receive all input values from the form
	$teamname = mysqli_real_escape_string($db, $_POST['teamname']);
	$email =  mysqli_real_escape_string($db, $_POST['email']);
	$phonenumber =  mysqli_real_escape_string($db, $_POST['phonenumber']);	
	$id =  mysqli_real_escape_string($db, $_POST['id']);
	$location =  mysqli_real_escape_string($db, $_POST['location']);
	$city =  mysqli_real_escape_string($db, $_POST['city']);
	$country =  mysqli_real_escape_string($db, $_POST['country']); 
	$password1 =  mysqli_real_escape_string($db, $_POST['password']);;
	$password2 =  mysqli_real_escape_string($db, $_POST['cpassword']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

		
        if (empty($teamname) || empty($email) || empty($phonenumber) ||  empty($id ) || empty($location) || empty($city) || empty($country) || empty($password1) || empty($password2)) 
        { 
        	array_push($errors, "Fill in the fields");
        	
        
        }
        // check for bad email syntax
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			   array_push($errors, "incorrect email");	
        }
        //check if password matches
        if ($password1 != $password2) {
	       array_push($errors, "The two passwords do not match");
        }
        if (strlen($password1)<8) {
	       array_push($errors, "The password is weak");
        }
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        
        $team_check_query = "SELECT * FROM teamreg WHERE teamid='$id' OR teamemail='$email' LIMIT 1";
        $result = mysqli_query($db, $team_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) 
         { 
          // if user exists
         	if ($user['id'] === $id) {
              array_push($errors, "Team-Id already exists");
            }

            if ($user['email'] === $email) {
              array_push($errors, "teamemail already exists");
            }
         }
       // Finally, register user if there are no errors in the form

        if (count($errors) == 0)
         {
         	$password1 = md5($password1);
         	//encrypt the password before saving in the database

         	 $query = "INSERT INTO teamreg (teamname, teamemail, teamphonenumber, teamid, teamlocation, teamcity,teamcountry,teampassword) VALUES('$teamname','$email','$phonenumber','$id','$location','$city','$country','$password1')";
         	mysqli_query($db, $query);
            $_SESSION['teamemail'] = $email;
            $_SESSION['success'] = "You are now logged in";
  	        header('location: teamregistration.php');
  	        echo "<script>alert('Team registered....');</script>";

         }
}





?>