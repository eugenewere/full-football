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


?>
<!DOCTYPE html>
<html>
<head>
	<title>User Account</title>


	<link rel="stylesheet" type="text/css" href="style/aftalogin.css">
	<link rel="stylesheet" href="style/savebtn.css">
	<link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link href=' http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/core.css">  
</head>
<body>
	<div class="user-wrapper">
		<div class="topnav">
			<img src="images/playerreg.jpg">
		    <h2>User account</h2>
              <!--navbutton-->
		    <li class="nav-button" id="button">
	          <a href="#button" class="btn e1
	          "><i class="far fa-user"></i>Welcome<i class="fas fa-caret-down" ></i></a>
	          <div class="smenu-i">
	            <a href="#profile">my profile</a>
	            <a href="#Edit">edit</a>
	            <a href="#TeamPlayers">team players</a>
	            <a href="#Rules">rules</a>
	            <a href="#Fixtures">fixtures</a>
	            <a href="aftalogin.php?logout='1'" >logout</a>
	          </div>
	        </li>

		</div>
		     <!--profile pic-->
		    <div class="profile-pic" id="">
		    	<img src="images/avatar.png">
          <p><?php echo "Hi,".$_SESSION["firstname"]; ?></p>    		    	
		    </div>			
	</div>

	<!--maincontents-->
	<div class="middle">
      <div class="menu">

        <li class="item" id='profile'>
	          <a href="#profile" class="btn "><i class="far fa-user"></i> My Profile <i class="fas fa-caret-down" ></i></a>
	               <!--dropdwn-->
			         <div class="smenu">
			         	<!--profile-->
			         	<div class="center-image">
							<div class="profile-container"><img src="images/avatar.png"></div>
							<p><?php echo "" .$_SESSION["firstname"]; ?></p>
						</div>
           
						<!--flexed content-->
			         	<div class="flex-content">
                           <!--section right-->
                            <div class="section-left f1">
	                            <span>
									FirstName:<br> 
								    <input type="text" name="firstname" value='<?php echo "" .$_SESSION["firstname"]; ?>'   readonly>
							    </span><br>

							    <span>
									LastName:<br>
								    <input type="text" name="lastname" value="<?php echo "" .$_SESSION["lastname"]; ?>" readonly>
							    </span><br>

							    <span>				
									Email Address:<br>
									<input type="text" name="email" value='<?php echo "" .$_SESSION["email"]; ?>' readonly>
							    </span><br>

							    <span>
									Phone Number:<br>
								    <input type="Number" name="phonenumber" value="<?php echo "" .$_SESSION["phoneno"]; ?>"  readonly>
							    </span><br>

							    <span>
									Your Team:<br>
								    <input list="team" name="team"placeholder="" readonly value="<?php echo "" .$_SESSION["team"]; ?>">								   
								</span><br>											
							</div>

							 <!--section-right-->
							<div class="section-right f1">
								<span>
									Your Neighbourhood:<br>
								    <input list="city" name="City"placeholder="" readonly value="<?php echo "" .$_SESSION["location"]; ?>">								    
								</span><br>

								<span>
									Your Country:<br>
									<input list="country" name="country" readonly value="<?php echo "" .$_SESSION["country"]; ?>">										
								</span><br>	

								<span>
									Date Of Birth:<br>
								    <input type="date" name="DateOfBirth"placeholder="DD/MM/YYYY" readonly value="<?php echo "" .$_SESSION["dateofbirth"]; ?>">
								</span><br>		

								<span>
									Id No:<br>
								    <input type="Number" name="id"placeholder="xxxxxxx" readonly value="<?php echo "" .$_SESSION["id"]; ?>">
								</span><br>	

								
							</div>			         		
			         	</div>	         	
			         </div>            
        </li>




        <li class="item" id="Edit">
          <a href="#Edit" class="btn"><i class="far fa-envelope"></i>Edit Profile <i class="fas fa-caret-down" ></i></a>
	          <div class="smenu">
	          	<div class="center-image">
					<div class="profile-container"><img src="images/avatar.png" id="pic" ></div>
									
					<p><?php echo "" .$_SESSION["firstname"]; ?></p>
				</div>

        <form action="" method="POST">

				 <div class="flex-content">
			        	   <!--section right-->          
            <div class="section-left f1">
                <span>
								FirstName:<br> 
							    <input type="text" name="firstname" value="<?php echo "" .$_SESSION["firstname"]; ?>"  required >
						    </span><br>

						    <span>
								LastName:<br>
							    <input type="text" name="lastname" value="<?php echo "" .$_SESSION["lastname"]; ?>">
						    </span><br>

						    <span>				
								Email Address:<br>
								<input type="text" name="email" value="<?php echo "" .$_SESSION["email"]; ?>" required>
						    </span><br>

						    <span>
								Phone Number:<br>
							    <input type="Number" name="phonenumber" value="<?php echo "" .$_SESSION["phoneno"]; ?>" >
						    </span><br>
						     <span>
								Your Team:<br>
							    <input list="team" name="football"placeholder="" value="<?php echo "" .$_SESSION["team"]; ?>">
							    <datalist id="team">
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
							</span><br>

						</div>
						 <!--section-left-->
						<div class="section-right f1">

							<span>
								Your Neighbourhood:<br>
							    <input list="city" name="location" placeholder="" value="<?php echo "" .$_SESSION["location"]; ?>">
							    <datalist id="city">
										  <?php 
                         $konn1=mysqli_connect("localhost","root","","miscellaneous");
                         if($konn1){
                          $msg1="SELECT city FROM city";
                          $findin1=$konn1->query($msg1);
                          if($findin1->num_rows > 0){
                            while($rows1=$findin1-> fetch_assoc()){
                                          echo '<option value="' .$rows1['city']. '">';
                            }}}

                      ?>
									</datalist>
							</span><br>

							<span>
								Your Country:<br>
								<input list="country" name="country" value="<?php echo "" .$_SESSION["country"]; ?>">
									<datalist id="country">
										<?php 
                       $konn2=mysqli_connect("localhost","root","","miscellaneous");
                       if($konn2){
                        $msg2="SELECT country FROM country";
                        $findin2=$konn2->query($msg2);
                        if($findin2->num_rows > 0){
                          while($rows2=$findin2-> fetch_assoc()){
                                          echo '<option value="' .$rows2['country']. '">';
                          }}}

                    ?>
									</datalist>
							</span><br>	

							<span>
								Date Of Birth:<br>
							    <input type="date" name="dateofbirth" placeholder="DD/MM/YYYY" value="<?php echo "" .$_SESSION["dateofbirth"]; ?>">
							</span><br>		

							<span>
								Id No:<br>
							    <input type="Number" name="id" placeholder="xxxxxxx" value="<?php echo "" .$_SESSION["id"]; ?>">
							</span><br>	
              <span>
                Password:<br>
                  <input type="Password" name="password1"placeholder="xxxxxxx" required>
              </span><br>
              <span>
                Confirm Password:<br>
                  <input type="Password" name="password2"placeholder="xxxxxxx" required>
              </span><br>										
						</div>		
			   </div>

          <input type="submit" name="save" value="save" >
        </form>
        <?php 
           $firstname ="";
          $lastname = "";
          $email = "";
          $phonenumber = "";  
          $dateofbirth = "";
          $id = "";
          $location = "";
          
          $country = "";
          $football = "";
          $password1 = "";
          $password2 = "";
          $errors=array();

          $db = mysqli_connect('localhost', 'root', '', 'playerreg');

          if (isset($_POST['save'])) {
             $firstname =mysqli_real_escape_string($db, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $phonenumber =mysqli_real_escape_string($db, $_POST['phonenumber']);
            $dateofbirth = mysqli_real_escape_string($db, $_POST['dateofbirth']);
            $id = mysqli_real_escape_string($db, $_POST['id']);
            $location = mysqli_real_escape_string($db, $_POST['location']);
            
            $country = mysqli_real_escape_string($db, $_POST['country']);
            $football = mysqli_real_escape_string($db, $_POST['football']);
            $password1 = mysqli_real_escape_string($db, $_POST['password1']);
            $password2 = mysqli_real_escape_string($db, $_POST['password2']);

            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              array_push($errors, "incorrect email syntax"); 
              echo"<script> alert('Atleast fill in the all value')</script>"; 
            }
            if ($password1 != $password2) {
             array_push($errors, "The two passwords do not match");
             echo"<script> alert('The two passwords do not match')</script>"; 
            }
              if (strlen($password1 )<8) {
             array_push($errors, "The password is weak");
             echo"<script> alert('The password is weak')</script>"; 
            }
            if (count($errors) == 0)
            {
              $password1 = md5($password1);
              $query_up = "UPDATE player SET firstname=$firstname ,lastname=$lastname ,email=$email, phonenumber=$phonenumber, dateofbirth= $dateofbirth, id=$id, location=$location, country=$country, football=$football, password=$password1 WHERE id=$id ";
              mysqli_query($db, $query_up);
              echo"<script> alert('records updated')</script>";
            }
          }
         ?>
                        	         
          

			</div>
        </li>





        <li class="item" id="TeamPlayers">
          <a href="#TeamPlayers" class="btn"><i class="fas fa-users"></i>Team Players <i class="fas fa-caret-down" ></i></a>
          <div class="smenu">
            <div class="table-wrapper">
              <table>
                 <caption>Team Players</caption>
                  <form action="" method="post">
                         
                          <input list="listss" type="text" name="search" class="form-control" value ="Players Search In Respective Teams">
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
                          <input type="submit" name="submit1"  value="Search">
                  </form>
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

                         echo "<th>id</th>";
                         echo "<th>phone number</th>";
                         echo "<th>city</th>";
                         echo "<th>location</th>";
                         echo "<th>country</th>";

                        echo " </tr>";                                    
                        
                      if ($res->num_rows > 0) {
                        while($row=$res->fetch_assoc()){
                         
                        echo "<tr>";
                        echo "<td>".$row["firstname"]."</td>";
                         echo "<td><a>".$row["lastname"]."</a></td>";
                         echo "<td><a>".$row["id"]."</a></td>";
                          echo "<td><a>".$row["phoneno"]."</a></td>";
                            echo "<td><a>".$row["city"]."</a></td>";
                              echo "<td><a>".$row["location"]."</a></td>";
                                echo "<td><a>".$row["country"]."</a></td>";
                        echo"</tr>";
                        }  }else{ 
                        echo "</table>";
                        mysqli_close($conn6);
                      }
                    }
                      
                 ?>
                
                     <div width='100%' height="100"></div>
                     

                    <?php 
                      $conn4=mysqli_connect('localhost','root','','playerreg');
                      $check = "SELECT * FROM player";
                      $result1 = mysqli_query($conn4, $check);

                      echo "<center>
                      <table class='table-responsive' border='1'>
                      <tr>
                      <th>Icon</th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Team</th>
                      <th>Location</th>
                      <th>City</th>
                      <th>Country</th>
                      </tr>";
                                         $rown = 0;
                      while($row = mysqli_fetch_array($result1))
                      {
                        $rown++;
                      echo "<tr>";
                      echo"<td><i class='far fa-user'></i></td>";
                      echo "<td>" . $row['firstname'] . "</td>";
                      echo "<td>" . $row['lastname'] . "</td>";
                      echo "<td>" . $row['email'] . "</td>";
                      echo "<td>" . $row['phoneno'] . "</td>";
                      echo "<td>" . $row['team'] . "</td>";
                      echo "<td>" . $row['location'] . "</td>";
                      echo "<td>" . $row['city'] . "</td>";
                      echo "<td>" . $row['country'] . "</td>";
                      echo "</tr>";
                      }
                      echo "</table> 
                      </center>";

                      mysqli_close($conn4);
                
                    ?>  
              </table>              
            </div>            
          </div>
        </li>

        <li class="item" id="leaguetable">
          <a href="#leaguetable" class="btn"><i class="fas fa-users"></i>League Table <i class="fas fa-caret-down" ></i></a>
          <div class="smenu">
          	<div class=" table-wrapper">
          		 
          		
          			
          		  <?php 
                      $conn=mysqli_connect('localhost','root','','leaguetable');
                      $retrieve_data= "SELECT * FROM league1";
                      $result = mysqli_query($conn, $retrieve_data);

                    echo "<center>
                    <table class='table-responsive' border='1'><caption >League Table</caption>
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
        </li>


       <!-- start of rules and regulations-->
        <li class="item" id="Rules">
          <a href="#Rules" class="btn"><i class="fas fa-file-alt"></i>Rules <i class="fas fa-caret-down" ></i></a>
          <div class="smenu">
          	<h2 id="rules-header">JKUAT league matches rules & regulations (2019)</h2>
            <ol>
            	<li>Participating teams to report one hour before kickoff</li>
            	<li>Home team to
            		<ul>
            			<li>Provide playing ground</li>
            			<li>Playing ground to be properly marked with lime </li>
            			<li>Goal nets to be put on the goal posts </li>
            			<li>Bench /plastic chairs home team and away team accommodating reserves and technical bench 12 pax per team </li>
            			<li>Home team 3 playable match balls/ away team 2 playable before kickoff.</li>
            		</ul>
            	</li>
            	<li>Any protest to be in written signed by Centre referee, captain of both teams before kick off </li>
            	<li>In case a team fails to turn up for the match for duration of 45 mins. After checking the match official present calls off the match a match report forwarded to the Secretary JKUAT Sports office within 48hrs. </li>
            	<li>Any player card with alteration should not be allowed to participate and the matter should be reported to the Sports Office</li>
            	<li>Match duration 45 mins in each half. </li>
            	<li>Participating teams to handle injuries that may occur during their league matches</li>
            	<li>Match postponement to be done in writing 3 days (72hrs) before kickoff to JKUAT Sports office</li>
            	<li>Kindly check MasterCard overleaf for more rules & regulations.</li>

            </ol>
          </div>
        </li>
        <!-- end of rules and regulations-->
        <li class="item" id="playerscore">
          <a href="#playerscore" class="btn"><i class="fas fa-file-alt"></i>Players Scores <i class="fas fa-caret-down" ></i></a>
          <div class="smenu">
            <h2 id="rules-header">Players Scoreboards</h2>
              <?php 
            
                  $connsb=mysqli_connect('localhost','root','','playerreg');
                  $retrieve_datasb= "SELECT * FROM scoreboard1 ";
                 $resultsb = mysqli_query($connsb, $retrieve_datasb);

                echo "<center>
                <table class='table-responsive table-hover' border='1' padding-bottom='10'>
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
            
          </div>
        </li>

         <!-- start of fixtures-->
        <li class="item" id="Fixtures">
          <a href="#Fixtures" class="btn"><i class="fas fa-wrench"></i>Fixtures <i class="fas fa-caret-down" ></i></a>
          <div class="smenu">
           <div class="table-wrapper">
            	<table>
            		<caption>JKUAT FIXTURES TABLE</caption>
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
                <th>RESULTS</th>
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
                echo "</tr>";
                }
                echo "</table> 
                </center>";

                mysqli_close($connfxx);
                
                        ?>
            	</table>
            	
            </div>
          </div>
        </li>
        <!-- end of fixtures-->



        <li class="item">
          <a class="btn" href="aftalogin.php?logout='1'" name="logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </li>
      </div>
    </div>
    
<script type="text/javascript" src="javascript/script.js"></script>
<script type="text/javascript">
  var pic= document.getElementById("pic");
      var newpic=document.getElementById("newpic").value;

      pic.src=newpic.src;
      console.log(pic);
</script>
</body>
</html>