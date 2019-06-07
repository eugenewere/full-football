<?php
session_start();

// initializing variables
$firstname ="";
$lastname = "";
$email = "";
$phonenumber = "";	
$dateofbirth = "";
$id = "";
$location = "";
$city = "";
$country = "";
$football = "";
$password1 = "";
$password2 = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'playerreg');

// REGISTER USER
if (isset($_POST['submit-button'])) 
{
	// receive all input values from the form
	  $firstname =mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phonenumber =mysqli_real_escape_string($db, $_POST['phonenumber']);
		$dateofbirth = mysqli_real_escape_string($db, $_POST['dateofbirth']);
		$id = mysqli_real_escape_string($db, $_POST['id']);
		$location = mysqli_real_escape_string($db, $_POST['location']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$country = mysqli_real_escape_string($db, $_POST['country']);
		$football = mysqli_real_escape_string($db, $_POST['football']);
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);

	// form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

		
        if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($dateofbirth) || empty($id ) || empty($location) || empty($city) || empty($country) || empty($football) || empty($password1) || empty($password2)) 
        { 
        	array_push($errors, "Fill in the fields");
        
        }
        // check for bad email syntax
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "incorrect email syntax");	
        }
        //check if password matches
        if ($password1 != $password2) {
	     array_push($errors, "The two passwords do not match");
        }
        if (strlen($password1 )<8) {
	     array_push($errors, "The password is weak");
        }
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
        
        $user_check_query = "SELECT * FROM player WHERE id='$id' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) 
         { 
          // if user exists
         	if ($user['id'] === $id) {
              array_push($errors, "User-Id already exists");
            }

            if ($user['email'] === $email) {
              array_push($errors, "email already exists");
            }
         }
       // Finally, register user if there are no errors in the form

         if (count($errors) == 0)
         {
         	$password1 = md5($password1);
         	//encrypt the password before saving in the database

         	$query = "INSERT INTO player (firstname, lastname, email, phoneno, dateofbirth, id, location, city, country, team, password1) VALUES('$firstname','$lastname','$email','$phonenumber','$dateofbirth','$id','$location' ,'$city','$country','$football','$password1')";
         	mysqli_query($db, $query);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
  	        header('location: login.php');
         }
         else{
         	echo "<script> alert('database error')</script>";
         }
}







// LOGIN USER
if (isset($_POST['login_form'])) 
{
	//$db = mysqli_connect('localhost', 'root', '', 'playerreg');

	//$variable= 'SELECT * FROM player WHERE email = .SESSION["email"]';
	//$row = mysql_fetch_assoc($variable);

	//$firstname = $row['firstname'];
	//$lastname = $row['lastname'];
	//$location = $row['location'];
	//$id = $row['id'];
	//$dateofbirth = $row['dateofbirth'];
	//$phoneno = $row['phoneno'];
    //$email = $row['email'];
	//$city = $row['city'];
	//$team = $row['team'];
	//$country = $row['country'];

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
	  if (empty($email)) {
	  	array_push($errors, "Email is required");
	  }
	  if (empty($password)) {
	  	array_push($errors, "Password is required");
	  }
	  if (count($errors) == 0) {
	  	$password1 = md5($password);
	  	$query = "SELECT * FROM player WHERE email ='$email' AND password1 ='$password1'";

      
	  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {

      
      $row = mysqli_fetch_assoc($results);
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['phoneno'] = $row['phoneno'];
      $_SESSION['dateofbirth'] = $row['dateofbirth'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['location'] = $row['location'];
      $_SESSION['city'] = $row['city'];
      $_SESSION['country'] = $row['country'];
       $_SESSION['team'] = $row['team'];

  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location:aftalogin.php');
  	}else {
  		array_push($errors, "Wrong Email/Password combination");
  	}
 }
}



//when user edits his account
if (isset($_POST['save']))
{





}

?>