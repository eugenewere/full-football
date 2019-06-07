<?php
session_start();

// initializing variables
$firstname ="";
$lastname = "";
$email = "";
$phonenumber = "";
$id = "";
$password = "";
$cpassword = "";
$image="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'admin1');

// REGISTER USER
if (isset($_POST['register'])) 
{
	// receive all input values from the form
	  $firstname =mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phonenumber =mysqli_real_escape_string($db, $_POST['phonenumber']);		
		$id = mysqli_real_escape_string($db, $_POST['id']);
    $image = mysqli_real_escape_string($db, $_POST['image']);		
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);

	// form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array

		
        if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) ||  empty($id ) || empty($password) || empty($cpassword)) 
        { 
        	array_push($errors, "Fill in the fields");
        
        }
        // check for bad email syntax
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			    array_push($errors, "incorrect email syntax");	
        }
        //check if password matches
        if ($password != $cpassword) {
	        array_push($errors, "The two passwords do not match");
        }
        if ($id != 1990) {
          array_push($errors, "Invalid Id... Please use the assigned Id");
        }
        if (strlen($password )<8) {
	        array_push($errors, "The password is weak");
        }
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
        
        $user_check_query = "SELECT * FROM admin_reg WHERE id='$id' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) 
         { 
          // if user exists
         	if ($user['id'] === 1990) {
              array_push($errors, "Admin Id in use");
            }
          if ($user['email'] ===$email) {
            array_push($errors, "Email in use");
          }
         }
       // Finally, register user if there are no errors in the form

         if (count($errors) == 0)
         {
         	$password = md5($password);
         	//encrypt the password before saving in the database

         	$query = "INSERT INTO admin_reg (firstname, lastname, email, phonenumber, id, password, image) VALUES('$firstname','$lastname','$email','$phonenumber','$id','$password','$image')";
         	mysqli_query($db, $query);
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
  	        header('location: login.php');
         }
         else{
         	echo "<script> alert('database error')</script>";
         }
}







// LOGIN admin
if (isset($_POST['submit'])) 
{
	

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
	  if (empty($email)) {
	  	array_push($errors, "Email is required");
	  }
	  if (empty($password)) {
	  	array_push($errors, "Password is required");
	  }
	  if (count($errors) == 0) {
	  	$password = md5($password);
	  	$query = "SELECT * FROM admin_reg WHERE email ='$email' AND password ='$password'";
      
      
	  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) { 
           //connect to players database
           $connection=mysqli_connect('localhost','root','','playerreg');
           if($connection){
              $det="SELECT count(*) AS total FROM player";
              $value=mysqli_query($connection,$det);
              $values=mysqli_fetch_assoc($value);
              $num_rows=$values['total'];              
           }else{}
           //end of connection      
      $row = mysqli_fetch_assoc($results);
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['phonenumber'] = $row['phonenumber'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['image'] = $row['image'];
      

      $_SESSION['tplayer'] = $num_rows;
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location:index.php');
  	}else {
  		array_push($errors, "Wrong Email/Password combination");
  	}
 }
}

 
 


?>