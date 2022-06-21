<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("../connect.php");
//including the database connection file.

$s=mysqli_query($conn, "SELECT DISTINCT tr_source FROM train");
$d=mysqli_query($conn, "SELECT DISTINCT tr_destination FROM train");
$c=mysqli_query($conn, "SELECT DISTINCT cl_name FROM trainclass  ORDER BY cl_name ASC;");

$x=mysqli_query($conn, "SELECT DISTINCT tr_source FROM train");
$y=mysqli_query($conn, "SELECT DISTINCT tr_destination FROM train");


error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:../user-login.php');
}
else{

?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Reserve Ticket, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>





<style>
select:invalid { color: gray !important; }
input:invalid { color: gray !important; } 

.swing-in-top-fwd {
  animation: swing-in-top-fwd 1s;
}

@keyframes swing-in-top-fwd {
  0% {
    transform: rotateX(-100deg);
    transform-origin: top;
    opacity: 0;
  }
  100% {
    transform: rotateX(0deg);
    transform-origin: top;
    opacity: 1;
  }
}

</style>


</head>
<body style="background-color: #242424;">
	<!-- preloader -->
  <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<div class="wrapz">
<?php $page='memchoose_sdcd'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
    <?php if (isset($_GET['fail'])): ?>
		<p><?php echo $_GET['fail']; ?></p>
	<?php endif ?>
  <?php if (isset($_GET['pass'])): ?>
		<p><?php echo $_GET['pass']; ?></p>
	<?php endif ?>
    <h2 style="margin-left:30px;">Reserve Ticket <!--<img id="theme-toggle" src="../img/togglethemee.png" style="cursor:pointer;width:40px;position:relative;left:75%" >--> 
    <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <h3 style="margin-left:30px;margin-top:50px;color:grey;">Source, Destination, Class and Date </h3>
      <!--<span style="cursor:pointer;" onclick="hi()" id="darkk"><i class="fas fa-lightbulb-on" ></i></span>-->

      
      
     
      <!--<button id="theme-toggle">Switch to dark mode</button>-->
      
      
      <center>
      <div class="form-container" style="margin-top:40px;">
      
					<div style="margin-left:60px;">
    
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="sdd"><strong>Choose Source, Destination and Date</strong></li>
                        <li id="selecttrain"><strong>Select Train</strong></li>
                        <li id="payment"><strong>Payment</strong></li>
                        
                    </ul>
                    
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:33.3%"></div>
                    </div> <br> <!-- fieldsets -->
                 
                    
                
                
            
        </div>
					<div>
						
						<!-- Form Starts -->
						<form class="custom-form swing-in-top-fwd" style="margin-left:30px; margin-right:75px;margin-left:60px;" id="content-desktop" method="get" action="member-searchtrain.php">
           
                            <!-- Input Field Starts -->
							<div class="form-group inputWithIcon">
              <i class="fal fa-map-marker-alt" style="right:0%;left: 265px;"></i>
              <select class="form-control" style="width:30%;height:5%;box-shadow:none; margin-right: 30px;" required id="content-desktop" name="sourcee">
              <option value="" disabled selected hidden>Source</option>
              <?php while($r = mysqli_fetch_array($s))
{
  ?>
  
              <option id="content-desktop"><?php echo $r['tr_source'];?></option>
              
  <?php
}
  ?>            
              
              </select>
              </div>
              <div class="form-group inputWithIcon">
              <i class="fal fa-map-marker-alt" style="right:0%;left: 265px;"></i>
              <select class="form-control" style="width:30%;height:5%; margin-right: 30px;" required id="content-desktop" name="destinationn">
              <option value="" disabled selected hidden>Destination</option>
              <?php while($v = mysqli_fetch_array($d))
{
  ?>
 
 
              <option id="content-desktop"><?php echo $v['tr_destination'];?></option>
              
  <?php
}
  ?>            
                
              </select>
              </div>

              <div class="form-group inputWithIcon">
              <i class="fal fa-map-marker-alt" style="right:0%;left: 265px;"></i>
              <select class="form-control" style="width:30%;height:5%;box-shadow:none; margin-right: 30px;margin-bottom:30px" required id="content-desktop" name="tclass">
              <option value="" disabled selected hidden>Class Type</option>
  <option>All classes</option>
              <?php while($cl = mysqli_fetch_array($c))
{
  ?>
 
              <option id="content-desktop"><?php echo $cl['cl_name'];?></option>
              
  <?php
}
  ?>            
                
              </select>
              </div>

              <input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:50px;" value="" selected hidden type="date" id="traindaytime" name="trainday" required>
              
							</div>



              
							<!-- Submit Form Button Starts -->
							<div class="form-group" id="content-desktop">
              <button class="custom-button next-button" style="border-radius:10px;float:right;margin-right:30px;background-color:#673AB7 !important" type="submit" name="next"><span>Next</span></button>
								
							
							</div>
              
             
						</form>

            
            
						<!-- Form Ends -->



            <!--mobile---------------->
            <!-- Form Starts -->
						<form class="custom-form" id="content-mobile" method="get" action="member-searchtrain.php">
           
           <!-- Input Field Starts -->
<div class="form-group inputWithIcon" style="text-align:center;margin-left:30px">
<i class="fal fa-map-marker-alt"></i>
<select class="form-control" required id="content-mobile" style="margin-bottom:20px;width:80%;">
<?php while($q = mysqli_fetch_array($x))
{
?>
<option value="" disabled selected hidden>Source</option>
<option id="content-mobile"><?php echo $q['tr_source'];?></option>

<?php
}
?>            

</select>

<div class="form-group inputWithIcon">
<i class="fal fa-map-marker-alt"></i>
<select class="form-control" required id="content-mobile" style="width:80%;">
<?php while($z = mysqli_fetch_array($y))
{
?>
<option value="" disabled selected hidden>Destination</option>
<option id="content-mobile"><?php echo $z['tr_destination'];?></option>

<?php
}
?>            

</select>
</div>
<input class="form-control" type="date" id="traindaytime" name="traindaytime" required style="width:80%">
</div>

<!----form end--->



<!-- Submit Form Button Starts -->
<div class="form-group">
<button class="custom-button next-button" style="border-radius:10px;float:right;margin-right:30px;background-color:#673AB7 !important" type="submit" name="next"><span>Next</span></button>




</div>
<!-- Submit Form Button Ends -->

</form>



					</div>
				</div>




        
    
    </div>
</div>
</center>







      
  </div>
  </div>
    <!-- Page Ends -->

	<!--for slider-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
        $(window).on("load",function(){
			
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
<?php include_once("assets/footer.php"); ?>

</body>

</html>
<?php } ?>