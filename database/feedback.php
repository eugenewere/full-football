<?php
session_start();

// initializing variables
$fullname ="";
$mail = "";
$subject = "";	
$textarea = "";
$errors = array();



// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'contact');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
	$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
	$mail =  mysqli_real_escape_string($db, $_POST['mail']);
	$subject =  mysqli_real_escape_string($db, $_POST['subject']);	
	$textarea =  mysqli_real_escape_string($db, $_POST['textarea']);
	
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

		
        if (empty($fullname) || empty($mail) || empty($subject ) ||  empty($textarea )) 
        { 
        	
        	array_push($errors, "enter full details");
        }
        // check for bad email syntax
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			   array_push($errors, "wrong email details");
        }
        
        // first check the database to make sure 
        // a user does not already exist with the same username and/or email
        
        $feed = "SELECT * FROM contacts WHERE mail='$mail' LIMIT 1";
        $result = mysqli_query($db, $feed);
        $user = mysqli_fetch_assoc($result);

       

        if (count($errors) == 0)
         {     	
         	 $query = "INSERT INTO contacts (fullname,mail,subject, textarea) VALUES('$fullname','$mail','$subject','$textarea')";
         	  mysqli_query($db, $query);
            $_SESSION['mail'] = $mail;
            $_SESSION['success'] = "You are now logged in";
  	        header('location: index.php');

           echo "<script type='text/javascript'>alert('thanks for ur feedback');</script>";
  	        

         }
}
?>