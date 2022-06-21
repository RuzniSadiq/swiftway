<?php

//including the database connection file.
include_once("../connect.php");

session_start();

error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:member-login.php');
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
  <link rel="shortcut icon" href="img/logo.png">


  <title>Reserve Ticket, SwiftWay - Sri Lanka Railways</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
  <script type="text/javascript" src="../js/tog.js"></script>


  <style>
    select:invalid {
      color: gray !important;
    }

    @keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in {
  animation: fade-in 1s;
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

      <h2 style="margin-left:30px;">Reserve Ticket <div id="theme-toggle"
          style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <h3 style="margin-left:30px;margin-top:50px;color:grey;">Select Train</h3>


      <center>
        <div class="form-container" style="margin-top:40px;">

          <div style="margin-left:60px;">

            <!-- progressbar -->
            <center>
              <ul id="progressbar">
                <li class="active" id="sdd"><strong>Choose Source, Destination and Date</strong></li>
                <li class="active" id="selecttrain"><strong>Select Train</strong></li>
                <li id="payment"><strong>Payment</strong></li>

              </ul>

              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                  aria-valuemin="0" aria-valuemax="100" style="width:66.6%"></div>
              </div> <br> <!-- fieldsets -->
            </center>

            <?php
	if(isset($_GET['next'])){
 
 if($_GET['tclass'] == "All classes"){
  $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_id,cl_occupiedseats,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE train.tr_source like '%$_GET[sourcee]%' && train.tr_destination like '%$_GET[destinationn]%' && train.tr_departuredt like '%$_GET[trainday]%' && tr_status='Available' && trainclass.cl_occupiedseats<trainclass.cl_seatcap");
 }
 else{

  $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE train.tr_source like '%$_GET[sourcee]%' && train.tr_destination like '%$_GET[destinationn]%' && train.tr_departuredt like '%$_GET[trainday]%' && trainclass.cl_name like '%$_GET[tclass]%' && tr_status='Available' && trainclass.cl_occupiedseats<trainclass.cl_seatcap");

 }
}    
 
    if(mysqli_num_rows($res)==0)
  {
    
    echo '<script>alert("Sorry No train found. Please try again ")</script>';
  echo "<script type='text/javascript'> document.location ='member-choose_sdcd.php'; </script>";
  }
  else
  {



    while($row= mysqli_fetch_assoc($res))
			{
        ?>

            <form name="form" class="fade-in" action="member-reserveticket.php" method="get">
              <?php
        echo "<div style='padding:35px 20px;background-color:#0d0d0d;width:80%;border-radius:10px;margin: 15px;color:#e6e6e6;position:relative;margin-right:70px'>";
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
        echo "<div style='position:absolute;margin-top:-70px;right:3%;z-index:100;font-size:17px;'><strong style='font-size:20px'>Rs. </strong>". $row ['cl_price']. "</div>";
          
        echo "<span style='text-transform: uppercase;position:absolute;top:13;float:left;left:66%;font-size:17px;'> Available Seats: ". $row ['cl_seatcap']-$row['cl_occupiedseats']. "</span>";
        echo "<br>";
        echo "<span style='text-transform: uppercase;position:absolute;top:75;float:left;left:70.5%;font-size:17px;'>". $row ['cl_name']. "</span>";
       
        
        echo "<input type=number value='1' min=1 max=20 class='count' name=passengers style='position:absolute;right:43%'>";

        
        
      
        echo "</div>";
        echo "</form>";
        
        
    
			}


    }
  
  

      ?>


              <!-- Submit Form Button Ends -->


          </div>
          <div>

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