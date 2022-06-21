<html lang="en">
<?php

//Start the Session
session_start();

error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:member-login.php');
}
else{
	
//including the database connection file.
include_once("../connect.php");
$cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$cusid1= mysqli_fetch_assoc($cusid);

$customer=$cusid1['cus_id'];
$query = "SELECT ti_status, count(*) as number FROM ticket WHERE cus_id = '$customer' AND ti_status='Confirmed' or cus_id = '$customer' AND ti_status='Cancelled' GROUP BY ti_status";  
$reesult = mysqli_query($conn, $query); 
$ano = mysqli_num_rows($reesult);

?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Dashboard, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>




<style>
/*.my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

*/

.rotate {
  transition: transform .7s ease-in-out;
}
.rotate:hover {
  transform: rotate(360deg);
}

.bord{
	border: none;
	margin-left:35px;
	margin-top:80px;
	float:left;
	width:360px;
	border-radius:10px;
  height:270px;
  background-color:#0d0d0d;
  
}
i{
  transition: transform .2s;
}
i:hover {
  transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */

}
.fant
{
	font-size:25px;
	font-family:Lucida Sans Unicode, Lucida Grande, sans-serif;
	margin-bottom:10px
}
</style>

<!--Pie chart yo ---------------->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           //google.charts.load('current', {'packages':['corechart']});
           google.charts.load('current', {
    packages: ['controls', 'corechart'],
   
    });  
           google.charts.setOnLoadCallback(drawChart);  
        
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['ti_status', 'Number'],  
                          <?php  
                          while($royw = mysqli_fetch_array($reesult))  
                          {  
                               echo "['".$royw["ti_status"]."', ".$royw["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                    animation: {
                  duration: 1500,
                 // easing: 'out',
                  startup: true
              },
                      backgroundColor: 'transparent',
                      pieSliceBorderColor : "transparent",
                      colors: ['#00c4af','#142f36'],
                      pieHole: 0.4,
                      legend: {
        textStyle: { color: 'white'
    //       fontName: 'Arial Black', 
    // fontSize: 14 
  }
    }
                  
                      
                  
                      
                        
                      
                      //is3D:true,  
                        
                     };


                     
                     
                    
                     
                var chart = new google.visualization.PieChart(document.getElementById('pieechart'));  
               
                chart.draw(data, options);  
                

           }  
           </script>  
</head>
<body style="background-color: #242424;">
<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<?php 
$train=mysqli_query($conn, "SELECT * FROM train WHERE tr_status='Available'");
$trains = mysqli_num_rows($train);


$sumticket=mysqli_query($conn, "SELECT SUM(ti_fare) FROM ticket WHERE cus_id = '$customer' AND ti_payment_status = 'Waiting'");
$sumtickets = mysqli_fetch_assoc($sumticket);

$sumtickettotalamnt=mysqli_query($conn, "SELECT SUM(credits_used) FROM ticket WHERE cus_id = '$customer' AND ti_payment_status = 'Waiting'");
$sumticketstotalamnt = mysqli_fetch_assoc($sumtickettotalamnt);




?>
<div class="wrapz">
<?php $page='memdashboard'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
      <h2 style="margin-left:30px;">Dashboard <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      
      

<div class = "bord" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);position:relative;z-index:100;float:left;margin-left:70px;bottom:0px">
<p style="text-align:center;position:relative;top:10px;color:#fff;font-size:18px"><strong>Tickets Confirmed and Cancelled</strong></p>
<hr style="border-top:3px solid #d9d9d9">

<center>
<?php if($ano>0){ ?>  
<div id="pieechart" class="fade-in-element" style="width:700px;height:400px;position:relative;bottom:50px;right:40px;color:white !important" ></div>  
<?php }else{ ?>  
<div class="fade-in-element" style="width:700px;height:400px;position:relative;bottom:50px;right:40px;color:white !important" >
<span style="position:relative;top:170px;right:30px;font-size:16px">No data</span>
</div>  
<?php } ?> 
</center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class ="hideme bord" style="float:right;margin-right:50px;width:400px;height:400px;background: radial-gradient(#002329, #000f12);position:absolute;left:791px;">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Pending Amount</strong></p>
<hr style="border-top:3px solid #000f12">
<center></center><br style="clear: both">
<i class="fad fa-money-check-edit-alt" style="font-size:120px;position:relative;left:130px;top:40px;color:white"></i><br>
<center><div class="fant" style="color:#eee;z-index:1000;position:relative;top:110px;"><span style="font-size:50px;">Rs.</span><?php echo (float)$sumtickets['SUM(ti_fare)']-(float)$sumticketstotalamnt['SUM(credits_used)'];?></div></center>
</div>


<div class = "bord" style="background: radial-gradient(#002329, #000f12);float:left;margin-top:47%;position:relative;right:49.7%">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Available Trains</strong></p>
<hr style="border-top:3px solid #000f12">
<br style="clear: both">
<center><div class="fant" style="color:#eee;"><i style="font-size:110px;position:relative;bottom:0px" class="fal fa-train"></i><br><div style="position:relative;left:145px;top:14px;background-color:white;padding:10px;height:50px;
width:70px;border-top-left-radius:100px;border-bottom-right-radius:10px"><p style="color:black;text-align:right;font-size:20px"><strong><?php echo (float)$trains;?></strong></p></div></div></center>
</div>

<div class = "bord" style="background: radial-gradient(#002329, #000f12);margin-right:5px;margin-left:40px;position:relative;bottom:350px;left:430px">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>SwiftWay Credits</strong></p>
<hr style="border-top:3px solid #000f12">
<br style="clear: both">
<center><div class="fant" style="color:#eee;">  <div style="margin-bottom:0px;">
  <div style="height:120px;width:130px;border-radius:10px;background-color:black">
  <img src="../img/logo.png" class="rotate" style="height:80px;width:80px;margin-top:20px">
  </div>
  <div><br><div style="position:relative;left:145px;top:-18px;background-color:white;padding:10px;height:50px;
width:70px;border-top-left-radius:100px;border-bottom-right-radius:10px"><p style="color:black;text-align:right;font-size:20px"><strong><?php echo (float)$cusid1['cus_credit'];?></strong></p></div></div></center>
</div>

<div class = "bord" style="background: radial-gradient(#002329, #000f12);margin-right:5px;margin-left:40px;position:relative;bottom:350px;left:420px">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Travel Points</strong></p>
<hr style="border-top:3px solid #000f12">
<br style="clear: both">
<center><div class="fant" style="color:#eee;"><img src="../img/star.gif" style="position:relative;bottom:40px;width:225px;height:180px"><br><div style="position:relative;left:145px;top:-56px;background-color:white;padding:10px;height:50px;
width:70px;border-top-left-radius:100px;border-bottom-right-radius:10px"><p style="color:black;text-align:right;font-size:20px"><strong><?php echo (float)$cusid1['cus_travelpoints'];?></strong></p></div></div></center>
</div>













                
     


      
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
<footer>
<?php include_once("assets/footer.php"); ?>
</footer>

</body>

</html>

<?php } ?>


