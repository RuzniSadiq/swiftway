<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Register, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!--<link rel="stylesheet" type="text/css" href="../css/styles.css" />-->
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />

<style>
select:invalid { color: gray !important; }
input:invalid { color: gray !important; } 

.custom-form input[type=text], .custom-form input[type=password], .custom-form input[type=datetime-local], .custom-form input[type=email], .custom-form input[type=date], .custom-form input[type=month] {
    box-shadow: none;
    height: 35px;
    padding-left: 15px;
    border: 1px solid #ddd;
    background: #f2f2f2;
    font-size: 13px;
}

.user-auth>div:nth-child(2) .form-container form .form-group {
    margin: 0 auto;
    margin-bottom: 20px;
}
body { overflow-y: hidden;}

</style>
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
						<h1><span>get</span> started</h1>
						<p>open an account absolutely free</p>
					</div>
					<!-- Main Heading Ends -->
						<!-- Form Starts -->
						<form class="custom-form" method="post" enctype="multipart/form-data">
                            <!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="name" id="name" placeholder="NAME" type="text" required>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
								<input class="form-control" name="username" id="name" placeholder="USERNAME" type="text" required>
							</div>

							<div class="form-group">
								<input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
							</div>
							<div class="form-group">
								<input class="form-control" name="number" id="name" placeholder="Number" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" name="nicnumber" id="name" placeholder="NIC Number" type="text" required>
							</div>
							<div class="form-group">
								<select class="form-control" style="height:35px" name="gender" id="name" type="text" required>
								<option value="" disabled selected hidden>GENDER</option>
								<option>Male</option>
								<option>Female</option>
								</select>
							</div>
							<!-- Input Field Ends -->
							<!-- Input Field Starts -->
							<div class="form-group">
                            
								<input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                                <script>document.getElementById("password").minLength = "6"; 
                                document.getElementById("password").maxLength="10";</script>
                            </div>
							<div>
							<div onClick="triggerClickf()">
							<img src="" style="width:60px;height:60px;border-radius:5px" onClick="triggerClick()" id="profileDisplayfront">
</div>
							</span>
							<input type="file" name="nic_front" onChange="displayImagef(this)" id="frontImage" class="form-control" style="display: none;" required accept='uploads/NIC front side/*'>
							<label>NIC Front</label>
							</div>
							<div style="position:relative;bottom:87px;left:100px">
							<div onClick="triggerClickb()">
							<img src="" style="width:60px;height:60px;border-radius:5px" onClick="triggerClick()" id="profileDisplayback">
</div>	
						</span>
							<input type="file" name="nic_back" onChange="displayImageb(this)" id="backImage" class="form-control" style="display: none;" required accept='uploads/NIC back side/*'>
							<label>NIC Back</label>
							</div>
								
								  
							<!-- Input Field Ends -->
							<!-- Submit Form Button Starts -->
							<div class="form-group" style="position:relative;bottom:100px">
								<button class="custom-button register-button" name="RegisterNow" style="position:relative;top:30px" type="submit"><span>Create Account</span></button>
								
								<p class="text-center" style="position:relative;top:30px">already have an account ? <a href="member-login.php" style="color:#9acd32">login</a></p>
							</div>
							<!-- Submit Form Button Ends -->
						</form>
						
						<!-- Form Ends -->
					</div>
				</div>
				
				<!-- Copyright Text Starts -->
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
 <script>
    function triggerClickf(e) {
  document.querySelector('#frontImage').click();
}
function displayImagef(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplayfront').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
<script>
    function triggerClickb(e) {
  document.querySelector('#backImage').click();
}
function displayImageb(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#profileDisplayback').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}
</script>
</body>

</html>
<script type="text/javascript" src="../js/tog.js"></script>

<?php

//including the database connection file.
include_once("../connect.php");

//Check if the submit button is clicked.
if(isset($_POST['RegisterNow'])) {  

	

    


	

    //Inputs from the from	
    $name = $_POST['name'];
    $username = $_POST['username'];
	$gender = $_POST['gender'];	
	$email = $_POST['email'];
    $password = $_POST['password'];
	$num = $_POST['number'];
	$nicnum = $_POST['nicnumber'];

	
	// Check if the Radio button is really selected, to avoid the "Undefined index" error.
	//if(isset($_POST['gender']))
	//{	
		//$gender = $_POST['gender'];
	//}
       
    //Checking empty fields	
    if(empty($name) || empty($username) || empty($gender)|| empty($email) || empty($password) || empty($num) || empty($nicnum))   { 
	
        if(empty($name)) {
            //echo "<font color='red'> Name field is empty.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" Name Field is empty")';
			echo '</script>';
        }
		if(empty($username)) {
            //echo "<font color='red'>Mobile Number field is empty.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" User Name Field is empty")';
			echo '</script>';
        }      	
		
		 if(empty($gender)) {
            //echo "<font color='red'>E-mail field is empty.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" Gender Field is empty")';
			echo '</script>';
        }
				
		 if(empty($email)) {
            //echo "<font color='red'>Password field is empty.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" E-mail Field is empty")';
			echo '</script>';
        }
	
		 if(empty($password)) {
            //echo "<font color='red'>Please select a Gender.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" Password Field is empty")';
			echo '</script>';
        }	
		if(empty($nicnum)) {
            //echo "<font color='red'>Please select a Gender.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" Number Field is empty")';
			echo '</script>';
        }	
		if(empty($num)) {
            //echo "<font color='red'>Please select a Gender.</font><br/>";
			echo '<script language="javascript">';
			echo 'alert(" NIC number Field is empty")';
			echo '</script>';
        }		
		
	
        //link to the previous page
        //echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		
    } else { 
	
        // if all the fields are filled (not empty)             
        //insert data to database
		$errors = array();

		$u= "SELECT cus_username FROM customer WHERE cus_username='$username'";
		$e= mysqli_query($conn, "SELECT cus_email FROM customer WHERE cus_email='$email'");
		$uu= mysqli_query($conn,$u);
		$uuu = mysqli_num_rows($uu);
		$e= "SELECT cus_email FROM customer WHERE cus_email='$email'";
		
		$ee= mysqli_query($conn,$e);
		$eee = mysqli_num_rows($ee);
		
		if($uuu>0)
		{
			 //echo "<font color='green'>You have been registered successfully!";
		echo '<script language="javascript">';
		echo 'alert("Username already exists")';
		echo '</script>';
		}else if($eee>0){
			//echo "<font color='green'>You have been registered successfully!";
		echo '<script language="javascript">';
		echo 'alert("Email already exists")';
		echo '</script>';

		}else{
			
	$fimage=time() . '-' . $_FILES['nic_front']['name'];

	$bimage=time() . '-' . $_FILES['nic_back']['name'];

    //upload the image to a specific folder first and this folder for example called (images)
	$img_ex = pathinfo($fimage, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
	$bimg_ex = pathinfo($bimage, PATHINFO_EXTENSION);
	$bimg_ex_lc = strtolower($bimg_ex);
	$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs) && in_array($bimg_ex_lc, $allowed_exs)) {

    $target_dir="uploads/NIC front side/$username - ";
    $target_file=$target_dir . basename($fimage);

	$btarget_dir="uploads/NIC back side/$username - ";
    $btarget_file=$btarget_dir . basename($bimage);

    //now move the image to the folder (images)

    // move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    //now let we upload the image to the database
		$cus_status ="Pending";
		$date =  date("y/m/d");
		if(move_uploaded_file($_FILES['nic_front']['tmp_name'], $target_file) && move_uploaded_file($_FILES['nic_back']['tmp_name'], $btarget_file)){
        $result = mysqli_query($conn, "INSERT INTO customer(cus_name,cus_username,cus_email,cus_password,cus_gender,cus_nicnum,cus_no,cus_status,cus_joineddate,cus_NICFront,cus_NICBack)
		VALUES('$name','$username','$email','$password','$gender','$nicnum','$num','$cus_status','$date','$username - $fimage','$username - $bimage')");

		}
	}else {
			echo '<script language="javascript">';
			echo 'alert("You cant upload files of this type")';
			echo '</script>';			
			echo "<script type='text/javascript'> document.location ='member-registration.php'; </script>";
		}

$num = mysqli_affected_rows($conn);
if($num>0)
{
		

        //display success message
        //echo "<font color='green'>You have been registered successfully!";
		echo '<script language="javascript">';
			echo 'alert("You have been registered successfully, your account is pending")';
			echo '</script>';

}else{
	echo '<script language="javascript">';
			echo 'alert("There was an error, please try again")';
			echo '</script>';
}
			
		}
	}
}

?>
