<html lang="en">
<?php

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
$query = "SELECT tr_status, count(*) as number FROM train GROUP BY tr_status";  
$result = mysqli_query($conn, $query); 

$cus = "SELECT cus_status, count(*) as number FROM customer GROUP BY cus_status";  
$custom = mysqli_query($conn, $cus); 

//$queryy = "SELECT ti_status, count(*) as number FROM ticket GROUP BY ti_status";  
$queryyz = "SELECT ti_status, count(*) as number FROM ticket WHERE ti_status='Confirmed'"; 
$resy = mysqli_query($conn, $queryyz); 


$exp = "SELECT ti_status, count(*) as number FROM ticket WHERE ti_status='Expired'"; 
$expir = mysqli_query($conn, $exp); 

$canc = "SELECT ti_status, count(*) as number FROM ticket WHERE ti_status='Cancelled'"; 
$cancel = mysqli_query($conn, $canc); 

$resultyo = "SELECT SUM(ti_fare),(ti_reserveddate) FROM ticket WHERE ti_payment_status='Paid' GROUP BY MONTH(ti_reserveddate)"; 
$newyyy = mysqli_query($conn, $resultyo); 

$fesult = "SELECT ti_reserveddate FROM ticket GROUP BY MONTH(ti_reserveddate)";
$dzy = mysqli_query($conn, $fesult); 
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

.hideme
{
    opacity:0;
}

@keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in-element {
  animation: fade-in 1.4s;
}

.my-custom-scrollbar {
position: relative;
height: 300px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

.bord{
	border: none;
	margin-left:35px;
	margin-top:80px;
	float:left;
	width:330px;
	border-radius:10px;
  height:200px;
  background-color:#0d0d0d;
  
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
                          ['tr_status', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["tr_status"]."', ".$row["number"]."],";  
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
                      colors: ['#00c4af', '#142f36'],
                      pieHole: 0.4,
                      legend: {
        textStyle: { color: 'white' }
    }
                  
                      
                  
                      
                        
                      
                      //is3D:true,  
                        
                     };


                     
                     
                    
                     
                var chart = new google.visualization.PieChart(document.getElementById('pieechart'));  
               
                chart.draw(data, options);  
                

           }  
           </script>  


<!----- scatter chart yo ---->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           //google.charts.load('current', {'packages':['corechart']});
           let alreadyLoaded = false ;
           window.addEventListener('scroll', function(){
            if (alreadyLoaded === false){

    var element = document.querySelector('#scatterchart');
    var position = element.getBoundingClientRect();


    if(position.top >= 0 && position.bottom <= window.innerHeight) {

      alreadyLoaded = true; 
    // checking for partial visibility
    if(position.top < window.innerHeight && position.bottom >= 0) {
           google.charts.load('current', {
    packages: ['controls', 'corechart'],
   
    });  
           google.charts.setOnLoadCallback(drawChart);  
        
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['tr_status', 'Number'],  
                          <?php  
                          while($customer = mysqli_fetch_array($custom))  
                          {  
                               echo "['".$customer["cus_status"]."', ".$customer["number"]."],";  
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
                      colors: ['#00c4af', '#142f36'],
                      pieHole: 0.4,
                      titleTextStyle: {
        color: 'white'
    },
    hAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
    },
    vAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
        
    },
                      
    legend: {
        position:'none'
        
    }            
                      
                        
                      
                      //is3D:true,  
                        
                     };


                     
                     
                    
                     
                var chart = new google.visualization.ScatterChart(document.getElementById('scatterchart'));  
               
                chart.draw(data, options);  
                

              }
    }
}
    
    }
 });
               </script>  








<!---The revenue for each month yo---->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">  
           //google.charts.load('current', {'packages':['corechart']});
           let alreadyLoadzed = false ;
           window.addEventListener('scroll', function(){
            if (alreadyLoadzed === false){

    var elementy = document.querySelector('#revenuechart');
    var positiony = elementy.getBoundingClientRect();


    if(positiony.top >= 0 && positiony.bottom <= window.innerHeight) {

      alreadyLoadzed = true; 
    // checking for partial visibility
    if(positiony.top < window.innerHeight && positiony.bottom >= 0) {
           google.charts.load('current', {
    packages: ['controls', 'corechart'],
   
    });   
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['date','Revenue'],  
                          <?php  
                          while($hmmm = mysqli_fetch_array($newyyy)){
                            //$naw = mysqli_fetch_array($dzy);
                          
                            $ymd=strtotime($hmmm['ti_reserveddate']);
                            $newformat = date('F',$ymd);
                            //$ymd = DateTime::createFromFormat('m-d-Y', $hmmm['ti_reserveddate'])->format('Y-m-d');
                               echo "['".$newformat."',".$hmmm["SUM(ti_fare)"]."],";
                          
                          }
                          
                          ?>  
                     ]);  
                var options = {  
                  animation: {
                duration: 1500,
                startup: true //This is the new option
            },
                      backgroundColor: 'transparent',
                      
                      colors: ['#00c4af'],
                     //hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}, colors: ['red','green'], is3D:true };
                     
    titleTextStyle: {
        color: 'white'
    },
    hAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
    },
    vAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
    },
    legend: {
        position:'none'
        
    }

                      
                      //is3D:true,  
                        
                     };  
                     
                     
                    
                     
                var chart = new google.visualization.ColumnChart(document.getElementById('revenuechart'));  
                chart.draw(data, options);  
              }
    }
}
    
    }
 });
           </script>  






<!---ticket status yo Bar Chart------->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           let alreadyLoadzyed = false ;
           window.addEventListener('scroll', function(){
            if (alreadyLoadzyed === false){

    var elementyy = document.querySelector('#ticketchart');
    var positionyy = elementyy.getBoundingClientRect();


    if(positionyy.top >= 0 && positionyy.bottom <= window.innerHeight) {

      alreadyLoadzyed = true; 
    // checking for partial visibility
    if(positionyy.top < window.innerHeight && positionyy.bottom >= 0) {
           google.charts.load('current', {
    packages: ['controls', 'corechart'],
   
    });   
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['ti_status', '', {role: 'style'}],  
                          <?php  
                          $royw = mysqli_fetch_array($resy);
                         // $wait = mysqli_fetch_array($waity);
                          $expired = mysqli_fetch_array($expir);
                          $cancelled = mysqli_fetch_array($cancel);
                          
                               echo "['".$royw["ti_status"]."', ".$royw["number"].",'#360167'],";
                            //   echo "['".$wait["ti_status"]."', ".$wait["number"].",'#6b0772'],";  
                              // echo "['".$expired["ti_status"]."', ".$expired["number"].",'#af1281'],";
                              echo "['".$expired["ti_status"]."', ".$expired["number"].",'#6b0772'],";
                               echo "['".$cancelled["ti_status"]."', ".$cancelled["number"].",'#cf268a'],";  
                          
                          ?>  
                     ]);  
                var options = {  
                  animation: {
                duration: 1500,
                startup: true, //This is the new option
                scroll:true
            },
                      backgroundColor: 'transparent',
                      
                      colors: ['#000f12'],
                     //hAxis: {title: 'Year', titleTextStyle: {color: 'red'}}, colors: ['red','green'], is3D:true };
                     
    titleTextStyle: {
        color: 'white'
    },
    hAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
    },
    vAxis: {
        textStyle: {
            color: 'white'
        },
        titleTextStyle: {
            color: 'white'
        }
    },

        //textStyle: {
          //  color: 'white'
        //}
        legend: {
        position:'none'
        
    }                 
                      //is3D:true,  
                        
                     };  
                     
                     
                    
                     
                var chart = new google.visualization.BarChart(document.getElementById('ticketchart'));  
                chart.draw(data, options); 
                 
           }  
          }
    }

    
    }
 });
           </script>  
</head>
<body style="background-color: #242424;">
<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<?php 
$totaltick=mysqli_query($conn, "SELECT * FROM ticket");
$members=mysqli_query($conn, "SELECT * FROM customer");
$ticket=mysqli_query($conn, "SELECT * FROM ticket WHERE ti_status='Waiting'");
$result = "SELECT SUM(ti_fare) as value_sum FROM ticket WHERE ti_payment_status='Paid'";
$sumy=mysqli_query($conn, $result);
$rowyyy = mysqli_fetch_assoc($sumy);



$member = mysqli_num_rows($members);
$tickets = mysqli_num_rows($ticket); 
$totaltickets = mysqli_num_rows($totaltick); 

?>
<div class="wrapz">
<?php $page='addashboard'; include_once("assets/admin-nav.php"); ?>
    <div class="main-panel">
      <h2 style="margin-left:30px;">Dashboard <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      
      

<div class = "bord" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);position:relative;z-index:100;float:left;margin-left:70px;bottom:0px">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Trains Available and Unavailable</strong></p>
<hr style="border-top:3px solid #000f12">
<center><div id="pieechart" class="fade-in-element" style="width:700px;height:400px;position:relative;bottom:50px;right:40px" ></div>  </center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class = "bord" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);margin-left:50px;position:relative;bottom:480px;z-index:100;float:right;margin-right:50px;">
	
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Trains Departing soon</strong></p>
<hr style="border-top:3px solid #000f12">
<center><?php	
  date_default_timezone_set('Asia/Colombo');
 // Current date and time
$currentdatetime = date("Y-m-d H:i:s");
// Convert datetime to Unix timestamp
$timestamp = strtotime($currentdatetime);
// Subtract time from datetime
$time = $timestamp + (3 * 60 * 60);
// Date and time after subtraction
$hoursbak = date("Y-m-d H:i:s", $time);

$res = mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE train.tr_departuredt BETWEEN '$currentdatetime' AND '$hoursbak'");
?>
<div class="table-wrapper-scroll-y my-custom-scrollbar fade-in-element">
<table class="table table-sm">
<thead style="cursor:pointer;z-index:100;color:#a6a6a6">
  <tr>
    
    
    <th scope="col">Train Number</th>
    <th scope="col">Name</th>
    <th scope="col">Type</th>
    <th scope="col">Source</th>
    <th scope="col">Destination</th>
    <th scope="col">Departure Date</th>
    <th scope="col">Arrival Date</th>
  </tr>
</thead>
<?php
echo "<tbody>";
    while($row= mysqli_fetch_assoc($res))
			{
        
        
  
   echo "<tr style='text-align:left;color:white'>";
      
     
     
      echo "<td>"; echo $row['tr_number'];"</td>";
      echo "<td>"; echo $row['tr_name'];"</td>";
      echo "<td style='text-transform:uppercase'>"; echo $row['tr_type'];"</td>";
      echo "<td>"; echo $row['tr_source'];"</td>";
      echo "<td>"; echo $row['tr_destination'];"</td>";
      echo "<td>"; echo $row['tr_departuredt'];"</td>";
      echo "<td>"; echo $row['tr_arrivaldt'];"</td>";
      echo "</tr>";
      }
      echo "</tbody>";
      echo "</table>";
      echo "</div>";
  ?> </center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class = "hideme bord" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);position:relative;z-index:100;float:left;margin-left:70px;bottom:450px">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Revenue</strong></p>
<hr style="border-top:3px solid #000f12">
<center><div id="revenuechart" class="fade-in-element" style="width:600px;height:400px;position:relative;bottom:50px;right:35px" ></div>  </center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class="hideme bord" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);position:absolute;z-index:100;float:right;left:591px;top:605px;margin-right:50px;">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Tickets</strong></p>
<hr style="border-top:3px solid #000f12">
<center><div id="ticketchart" class="fade-in-element" style="width:700px;height:400px;position:relative;bottom:50px;right:40px" ></div>  </center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class="hideme bord fade-in-element" style="width:600px;height:400px;color:white;background: radial-gradient(#002329, #000f12);position:absolute;z-index:100;float:right;margin-top:86%;margin-right:46px;right:560px">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Customers</strong></p>
<hr style="border-top:3px solid #000f12">
<center><div id="scatterchart" class="fade-in-element" style="width:700px;height:400px;position:relative;bottom:50px;right:40px" ></div>  </center><br style="clear: both">
<center><div class="fant" style="color:#b35900;"></div></center>
</div>

<div class ="hideme bord" style="float:right;margin-right:50px;width:400px;height:400px;background: radial-gradient(#002329, #000f12);position:absolute;margin-top:86%;left:791px;">
<p style="text-align:center;position:relative;top:10px;color:#eee;font-size:18px"><strong>Total Revenue Earned</strong></p>
<hr style="border-top:3px solid #000f12">
<center></center><br style="clear: both">
<div class="fade-in-element">
<img src="../img/revenueearned.png" class="fade-in-element" style="width:230px;margin-left:50px;margin-bottom:15px"></div>
<center><div class="fant" style="color:#eee;z-index:1000"><span style="font-size:50px;">Rs.</span><?php echo (float)$rowyyy['value_sum'];?></div></center>
</div>
         
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


        $(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},1300);
                    
            }
            
        }); 
    
    });
    
});
    </script>
    
    <br><br>
<footer style="position:relative;top:300px">
<?php include_once("assets/footer.php"); ?>
</footer>

</body>

</html>


<?php } ?>
