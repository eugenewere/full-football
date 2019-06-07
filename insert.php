<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$dateofbirth = $_POST['dateofbirth'];
	$id = $_POST['id'];
	$location = $_POST['location'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
if (!empty($firstname) || !empty(lastname) || !empty(email) || !empty(phonenumber) || !empty(dateofbirth) || !empty(id) || !empty(location) || !empty(city) || !empty(country) || !empty(password1) || !empty(password2)){
	$host ="localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname="playerreg";
	//create connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else{
		$SELECT = "SELECT email From players Where email = ? Limit 1";
		$INSERT = "INSERT Into player (firstname, lastname, phonenumber, email, dateofbirth, id, location, city, country, password1, password2 ) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		//Prepare statement
	     $stmt = $conn->prepare($SELECT);
	     $stmt->bind_param("s", $email);
	     $stmt->execute();
	     $stmt->bind_result($email);
	     $stmt->store_result();
	     $rnum = $stmt->num_rows;
	      if ($rnum==0) {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ssssississ", $firstname, $lastname, $password2, $email, $phonenumber, $city, $location, $id, $dateofbirth, $country);
          $stmt->execute();
	      echo "New record inserted successfully";
	     } else {
	      echo "Someone already register using this email";
	     }
	      $stmt->close();
          $conn->close();
        }
	

}else{
	echo "<script> alert('please fill in the all the fields')</script>";
	die();
}

?>