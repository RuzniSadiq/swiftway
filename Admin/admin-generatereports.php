<html lang="en">
<?php
//including the database connection file.
include_once("../connect.php");
//Start the Session
session_start();
error_reporting(0);
if(strlen($_SESSION['adminlogin'])==0)
    {   
header('location:admin-login.php');
}
else{
	
//including the database connection file.
include_once("../connect.php");

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Generate Reports, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>





<body style="background-color: #242424;">
<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->

<div class="wrapz">
<?php $page='adgeneratereports'; include_once("assets/admin-nav.php"); ?>
    <div class="main-panel">
 


		<form method='get' action='assets/admin-generatereportspdf.php'>
	<?php	
  date_default_timezone_set('Asia/Colombo');
  //$today = date("H:i:s");
  //echo $today;
  //$DateTime = new DateTime();
 //$DateTime->modify('-2 hours');
 //echo $DateTime->format("Y-m-d H:i:s");




 // Current date and time
$currentdatetime = date("Y-m-d H:i:s");

//$cdt = strtotime($currentdatetime);
//$currentt = date('Y-m-d H:i:s', $cdt);


// Convert datetime to Unix timestamp
$timestamp = strtotime($currentdatetime);
// Subtract time from datetime
$time = $timestamp - (3 * 60 * 60);
// Date and time after subtraction
$hoursbak = date("Y-m-d H:i:s", $time);
//$hoursbakz = strtotime($hoursbak);
//$hoursbakzz = date('Y-m-d H:i:s', $hoursbakz);
 
$res = mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE train.tr_departuredt BETWEEN '$hoursbak' AND '$currentdatetime'");
//$date = "2010-01-21 00:00:00";

while($row= mysqli_fetch_assoc($res))
{
  ?>

  <form name="form" action="member-reserveticket.php" method="get">
    <?php
  echo "<div style='padding:35px 20px;background-color:#0d0d0d;width:80%;border-radius:10px;margin: 15px;color:#e6e6e6;margin-right:70px'>";
  echo "<img src='../img/train.png' style='height:60px;width:70px;float:left;position:relative;top:-10'>"; 
  echo "<strong style='font-size:20px;position:relative;top:-20;float:left;'>". "Train number . ". $row['tr_number'] . " - " . $row ['tr_name'] . " - " . $row ['tr_type'] ."</strong>";
  echo "<br>";
  echo "<span style='font-size:14px;position:relative;top:0;float:left;left:65px'>". $row ['tr_source'] . "</span>" ."<i class='fal fa-long-arrow-alt-right' style='margin-left:100px;margin-right:20px;font-size:30px;float:left;position:relative;'></i>". "<span style='font-size:14px;position:relative;top:0;float:left;left:20px'>". $row ['tr_destination'] . "</span>" ;
 echo "<span style='font-size:14px;position:relative;top:30;left:-30%;'>". $row ['tr_departuredt']. "</span>";
 echo "<span style='font-size:14px;position:relative;top:30;left:-27%;'>". $row ['tr_arrivaldt']. "</span>";
 
 //
echo "<input type='hidden' name='classid' value=$row[cl_id] />";

  echo "<a style='color:white;text-decoration:none'><button class='custom-button reserve-button' style='border-radius:10px;float:right;background-color:#673AB7;position:relative;top:-20;padding:10px;font-size:12px' 
  type='submit' name='reserve'><span>Reserve</span></button></a>";
  echo "<strong style='font-size:20px;position:relative;top:-19;float:right;right:3%;margin-right:50px'>" . " Class Name "."</strong>"."<strong style='font-size:18px;position:relative;top:-40;float:right;right:5%;margin-right:200px'>"." No of Passengers "."</strong>";
  echo "<div style='position:absolute;margin-top:-70px;right:13%;z-index:100;font-size:17px;'><strong style='font-size:20px'>Rs. </strong>". $row ['cl_price']. "</div>";
    
  echo "<span style='text-transform: uppercase;position:relative;top:-5;float:left;left:40.5%;font-size:17px;'>". $row ['cl_name']. "</span>";
  
  echo "<input type=number value='1' min=1 max=20 class='count' name=passengers style='position:absolute;right:43%'>";

  
  

  echo "</div>";
  echo "</form>";
  

}

//if ($date < $today) {}?>
		<!--</form>-->

         
            <div>
                
     


      
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

</body>

</html>


<?php } ?>

