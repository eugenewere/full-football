<?php include('database/feedback.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Football</title>
	
	<link href="admin/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link href=' http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/core.css">

</head>
<body >
<!--preloader-->
    <div class="preloader hidden">
		<div class="loader hide"><p><p></div>

	</div>
<!--side-nav-->
	<div class="side-nav" id="drop">

		<div class="upper-content">
			<i class="far fa-times-circle" onclick="hide()"></i>
			<i class="fas fa-futbol" id="logo-pic"></i>
			<p id="logo-name">jkuat-usl</p>

		</div>

		<div class="menu-icons-side">
			<ul>
				<a href="#home"><li>home</li></a>
       <a href="#services"> <li>services</li></a>
        <a href="#fixtures"><li>fixtures</li></a>
        <!-- <li><a href="#table">table</a></li> -->
        <a href="#blog"><li>blog</li></a>
        <a href="#contact"><li>contact</li></a>

		</div>
		<div class="social">
			<div class="social-icons">
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>
			</div>


			<div class="registration-side">
					<button id="log-in-side"><i class="fas fa-sign-in-alt"></i> <a href="login.php">log-in</a></button>
					<button id="registration-side"><i class="fas fa-user-plus"></i> <a href="regestration.php"target="blank">sign up</a></button>
			</div>

		</div>
	</div>
<!--top-nav-->
	<div class="top-nav" id="body">

		<div class="logo left1 flex ">
			<i class="fas fa-futbol" id="logo-pic"></i>
			<p id="logo-name"><a href="#home">jkuat-usl</a></p>
		</div>

		<div class="menu-icons middle1 flex ">
			<ul>
				<li><a href="#home">home</a></li>
				<li><a href="#services">about</a></li>
				<li><a href="#fixtures">fixtures</a></li>
				<!-- <li><a href="#table">table</a></li> -->
				<li><a href="#blog">blog</a></li>
				<li><a href="#contact">contact</a></li>
			</ul>

		</div>

		<div class="registration right1 flex ">
			<button id="log-in"><i class="fas fa-sign-in-alt"></i><a href="login.php">log-in</a></button>
			<button id="registration"><i class="fas fa-user-plus"></i><a href="regestration.php" target="_blank">sign up</a></button>
		</div>

		<div class="expand-menu " onclick="drop()">
		  <i class="fas fa-align-right"></i>
		</div>
	</div>
	<!--end of navigation-->

<!--start of 2nd-nav-->
	<div class="nd-nav">
		<div class="nd-nav-content">
			<img src="images/2ndnav.jpg">
			<div class="nd-nav-left">
				<h1>jkuat-usl</h1>
			    <p>Bridging the gap between talent and opportunity in Jkuat football scene.</p>
			     <a href="#table"><button type="button" id="more"
			     class="sliders">league table</button></a>
			</div>


		</div>
	</div>
<!--3th section-->
	<section id="services">
		<div class="rd-container">
			<div class="center1">
				<h2>why we do what we do</h2>

				<p>Jkuat usl purpose is what drives us each day to achieve our hopes and dreams for football in this country.
				</p>
		    </div>


			<div class="showcase">
				<div class="change s1">
					<i class="fas fa-futbol"></i>
					 <h4>change</h4>
					<p>We strive to change the fate of every aspiring sports man or woman in Jkuat.</p>

				</div>

				<div class="enhance s1">
					<i class="fas fa-industry"></i>
					<h4>enhance</h4>
					<p>We aspire to enhance the environmental energy in which the company operates on in true entrepreneurial spirit.</p>

				</div>

				<div class="world s1">
					<i class="fas fa-globe-americas"></i><br>
	                 <h4>showcase</h4>
					<p>As proud Africans we are intent on preserving and showcasing the unique African culture through all our services.
					</p>

				</div>

			</div>

		</div>
	</section>

<!--4th section-->
	<div class="info">
		<div class="info-content">
			<h2>stay in touch with all things Jkuat sports.</h2>
		</div>
	</div>
	<section id="fixtures">
		<h2 class="fixh2" align="center">fixtures</h2>
    <table>
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
                echo "<td class='time'>" . $rowfxx['time1'] . "</td>";
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
    </table>
  </section>
   <section id="table">
    <table align="center">
      <tr>
        <td colspan="8"><h2>USL Round-Up Standings</h2></td>
      </tr>
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
    </table>
  </section>
 
<!--5th section-->


<section id="blog">
	<div class="jkuatie">
		<h2> the jkuatie</h2>
		<p class="p1">All the latest news and blogposts from our jkuat Sports playing teams
		</p>
		<div class="blogposts">
            <!--threeblogs-->
			<div class="blogs f1">
				<div class="blog-image"><img src="images/jkuat.jpg"></div>
				<span><a href="#">Opinion</a></span>
				<h3>why most jkuat students make it to premier league</h3>
				<p>
					The most popular league in Kenya is not the Kenyan Premier League. It’s the English Premier League. Most Football fanatics in this country can name the entire Chelsea starting 11 but would struggle to name even one left back playing in the Kenyan Premier League. It’s bizarre.
				</p>
			</div>
			<div class="blogs f2">
				<div  class="blog-image"><img src="images/jkuatcup2019.jpg"></div>
				<span><a href="#">Jkuat-cup</a></span>
				<h3>Jkuat cup 2019</h3>
				<p>
					OUT WITH THE OLD AND IN WITH THE NEW In an effort to keep our commitment to maintaining originality while also improving the player experience at our tournaments, Green Sports Africa is proud to present
				</p>
			</div>
			<div class="blogs f3">
				<div  class="blog-image"><img src="images/download.jpg"></div>
				<span><a href="#">Jkuat-league</a></span>
				<h3>Here Is What’s Happening to All Our Talented Players</h3>
				<p>
					There are two very distinct narratives when it comes to kids playing football in Kenya. Let’s look at two stories. Here’s Dennis. Dennis’ story began in 1999 when he first fell in love with football
				</p>
			</div>
		</div>
	</div>
</section>
<!--footer-->
<section id="contact">
	<div class="footer">
		<div class="footer-content">
			<div class="social">
				<h2> get in touch</h2>
				<div id="social-icons">
					<a href="#"><i class="fab fa-facebook-f"></i> Football on facebook</a><br>
					<a href="#"><i class="fab fa-twitter"></i> Football on twitter</a><br>
					<a href="#"><i class="fab fa-instagram"></i> Football on instagram</a><br>
					<a href="#"><i class="fab fa-youtube"></i> Football on youtube</a><br>
				</div>
			</div>
			<div class="forms-container">
				<div class="forms">
					<span>Contact Us</span>
					<form id="input" action="index.php" method="POST">
             <?php include('database/error.php'); ?>
						<input required type="text" name="fullname" placeholder="Your Name" id="fnme"> <br>

						<input required type="text" name="mail" placeholder="Your Mail" id="lnme"><br>

						<input required type="text" name="subject" placeholder="Subject"
						id="sbj"><br>

						<textarea required="" placeholder="Describe yourself here..." name="textarea" id="msg">
						</textarea><br>

						<button type="submit" name="submit" id="snd" onclick="verify()"> SEND MESSAGE</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>
<!--footer credits-->

<div class="footer-credits">
	<div>
		<p>© Copyright Jkuat</p>
	    <p>Jkuat Football</p>
	    <div class="help-center">
	    	<a href="web/terms.php" target="_blank">Terms and Conditions</a>
	    </div>
    </div>
</div>

<!-- scripting-lib-->
<script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>
