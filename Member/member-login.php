<?php

//including the database connection file.
include_once("../connect.php");

//Start the Session
session_start();


	

?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Login, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!--<link rel="stylesheet" type="text/css" href="../css/styles.css" />-->
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />



</head>
<body>
	<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
    <!-- Page Starts -->
    <div>
		
	
        <div class="container-fluid user-auth">
			<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
				<!-- Logo Starts -->
				<a class="logo" href="index.php">
				<img style="position:relative;bottom:-20px;right:20px;width:150%" src="../img/banner-2.png">
					<img id="single-logo" style="position:relative;z-index:1;bottom:20px;left:10px" class="img-responsive" src="../img/light/trans.png" alt="logo" >
					
				</a>
				<!--<a class="logo" href="home.html">
					<img id="single-logo" class="img-responsive" src="../img/light/trans.png" alt="logo" >
				</a>-->
				<!-- Logo Ends -->
				<!-- Slider Starts -->
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div style="padding:10px;position:absolute;top:40%;z-index:3;background-color:white;border-top-right-radius:30%;border-bottom-right-radius:30%;color:black" id="hi"><span onclick="appearancehidendisplay()" style="cursor:pointer;"><i class="fa fa-cog fa-spin"></i></span></div>
	
<div id="opensesame" style="padding:30px;position:absolute;top:40%;left:10px;z-index:1;background-color:#f2f2f2;display:none;border-radius:10%;height:18%">
<strong style="color:black;margin-left:8px">Appearance</strong>
<hr style="position:relative;width:100%;top:-10px;border-top: 3px solid black;">
						
						<button id="theme-toggle" style="position:relative;left:0%;top:-15px;width:100px;height:30px;border-radius:5px;background: linear-gradient(45deg, #ffffff 50%, #000000 50%);border: none"><strong><span style="color:black">Light</span><span style="margin-left:10px;color:white">Dark</span></strong></button>
					</div>			


					<!-- Indicators Starts -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<!-- Indicators Ends -->
					<!-- Carousel Inner Starts -->
					<div class="carousel-inner">
						<!-- Carousel Item Starts -->
						<div class="item active item-1">
						
						<div>
								<blockquote>
								<p>Sri Lanka Railways Was Great To Travel With And Interpreted Our Needs Perfectly.</p>
									<footer><span>Sahan Navishka</span></footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-2">
						
						<div>
								<blockquote>
								<p>Was Able To Simply Book My Ticket With SwiftWay, Offers Great And Friendly Service.</p>
									<footer><span>Lucy Smith</span></footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
						<!-- Carousel Item Starts -->
						<div class="item item-3">
					
						<div>
								<blockquote>
								<p>If Its Reaching Your Destination On Time And Not Missing The View Of This Wonderful Island, Sri Lanka Railways Is The Best To Go For.</p>
									<footer><span>Ranga Amarasekara</span></footer>
								</blockquote>
							</div>
						</div>
						<!-- Carousel Item Ends -->
					</div>
					<!-- Carousel Inner Ends -->
				
				</div>
				<!-- Slider Ends -->
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			
				<div class="form-container">
					<div>
						<!-- Main Heading Starts -->
					<div class="text-center top-text">
						<h1><span>member</span> login</h1>
						<p>great to have you back!</p>
					</div>
					<!-- Main Heading Ends -->
						<!-- Form Starts -->
						<form class="custom-form" method = "post">
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="username" id="text" placeholder="USERNAME" type="text" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group">
								<button class="custom-button" type="submit"><span>login</span></button>
								<p class="text-center" style="position:relative;top:20px">forgot your password ? <a href="member-forgotpw.php" style="color:#9acd32">Recover Account</a></p>
								<p class="text-center">don't have an account ? <a href="member-registration.php" style="color:#9acd32">register now</a></p>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						<!-- Form Ends -->


					</div>
				</div>
				
				<p class="text-center copyright-text">Copyright © 2021 SwiftWay All Rights Reserved</p>
				<!-- Copyright Text Ends -->
			</div>
		</div>
    </div>
    <!-- Page Ends -->

	<!--for slider-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
        $(window).on("load",function(){
			
          $(".loader-wrapper").delay(300).fadeOut("slow");
        });
    </script>

</body>

</html>

<?php

	
	
	//if the form is submitted
	if (isset($_POST['username']) and isset($_POST['password'])){
		
		//Assigning posted values to variables.
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		$query = "SELECT * FROM customer WHERE cus_username='$username' and cus_password='$password'";
		
		$sql=mysqli_query($conn,"SELECT * FROM customer where cus_username='$username' ;");
		$row=mysqli_fetch_assoc($sql);
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		$count = mysqli_num_rows($result);
		
		//If there is a matching row in the database, then session will be set for the user.
		if ($count == 1){
			
			//if the member status is blocked
			if ($row['cus_status']=='Blocked'){
				
			echo  '<script>alert("Your Account has been blocked please contact support")</script>';
			
		
		}
		//if the member status is pending
		if ($row['cus_status']=='Pending'){
				
			echo  '<script>alert("Your Account is pending, please try again in a while")</script>';
			
		
		}
		
		//if the member status is active
		if ($row['cus_status']=='Active'){
				
			$_SESSION['login'] = $username;
			echo '<script>alert("Welcome "+"'.$username.'")</script>';
			echo "<script type='text/javascript'> document.location ='member-dashboard.php'; </script>";
			
		
		}
		}
		else
		{
			// If the login credentials don't match, set an error message.
			echo  '<script>alert("Invalid Login Credentials.")</script>';
		}
	}
	
	
?>
<script type="text/javascript" src="../js/tog.js"></script>
