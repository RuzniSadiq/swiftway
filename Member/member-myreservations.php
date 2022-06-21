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
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>My Reservations, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>
<style> 
select:invalid { color: gray !important; }


  @keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in-element {
  animation: fade-in 1.4s;
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
<?php $page='memmyreservations'; include_once("assets/member-nav.php"); ?>

    <div class="main-panel">
  
    <h2 style="margin-left:30px;">My Reservations <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">

      
      <center>
      <div class="form-container" style="margin-top:40px;">
  
<?php $cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$cusid1= mysqli_fetch_assoc($cusid);
$customer=$cusid1['cus_id'];
$res=mysqli_query($conn, "SELECT train.tr_name,tr_number,tr_departuredt,tr_arrivaldt,tr_source,tr_destination,ticket.ti_id,ti_reserveddate,ti_payment_status,ti_fare,ti_no_passengers,cus_id,ti_payment_type,ti_status,trainclass.cl_id,cl_name,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id inner join ticket on trainclass.cl_id = ticket.cl_id WHERE cus_id = '$customer' ORDER BY ticket.ti_reserveddate DESC");


?>
<?php 
if (isset($_GET['pass'])): ?>
  <p><?php echo $_GET['pass']; ?></p>
<?php endif ?>
<?php if (isset($_GET['fail'])): ?>
<p><?php echo $_GET['fail']; ?></p>
<?php endif;
?>
  <table id="myTable" class="display fade-in-element dataTables_wrapper dataTables_filter input" style="margin-top:120px;width:40px;margin-right:8px;font-size:12.3px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<thead style="cursor:pointer">
  <tr>

    <th>Train Number</th>
    <th>Train Name</th>
    
    <th>Train Source</th>
    <th>Train Destination</th>
    <th>Train Departure Date</th>
    <th>Train Arrival Date</th>
    <th>Class Name</th>
    <th>Class Price</th>
    <th style="width: -100%">No of Passengers</th>
    <th>Ticket Fare</th>
    <th>Payment Type</th>
    <th>Ticket Reserved Date</th>
    <th>Payment Status</th>
    <th>Ticket Status</th>
    
    <th>Actions</th>
  </tr>
</thead>
<?php
echo "<tbody>";
    while($row= mysqli_fetch_assoc($res))
			{
        
        
  
   echo "<tr style='text-align:left'>";
      
      //echo "<td>"; echo $i;$i++; echo "</td>";

      echo "<td>"; echo $row['tr_number'];"</td>";
      echo "<td>"; echo $row['tr_name'];"</td>";
      
      echo "<td>"; echo $row['tr_source'];"</td>";
      echo "<td>"; echo $row['tr_destination'];"</td>";
      echo "<td>"; echo $row['tr_departuredt'];"</td>";
      echo "<td>"; echo $row['tr_arrivaldt'];"</td>";
      echo "<td style='text-transform:capitalize'>"; echo $row['cl_name'];"</td>";
      echo "<td style='text-transform:capitalize'>"; echo $row['cl_price'];"</td>";
      echo "<td>"; echo $row['ti_no_passengers'];"</td>";
      echo "<td>"; echo $row['ti_fare'];"</td>";"</td>";
      echo "<td>"; echo $row['ti_payment_type'];"</td>";
      echo "<td>"; echo $row['ti_reserveddate'];"</td>";
      if($row['ti_payment_status']=="Paid"){
        echo "<td style='color:green'><strong>"; echo $row['ti_payment_status'];"</strong></td>";
      }if($row['ti_payment_status']=="Waiting"){
        echo "<td style='color:#000066'><strong>"; echo $row['ti_payment_status'];"</strong></td>";  
      }
     if($row['ti_status']=='Confirmed'){
        echo "<td style='color:#337ab7'><strong>"; echo $row['ti_status'];"</strong></td>";
       // echo "<td><button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px' name='deletebtnnotallowed'>Cancel</button> |
        
        ?><td><button type="submit" data-toggle="modal" data-target="#myModal<?php echo $row['ti_id'];?>" class="btn btn-primary" style="padding:4px;">Print code</button></a>
  <?php  "</td>";


      }
      elseif($row['ti_status']=='Expired'){
        echo "<td style='color:#f0ad4e'><strong>"; echo $row['ti_status'];"</strong></td>";
        // echo "<td><button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px' name='deletebtnnotallowed'>Cancel</button> |
        
        ?><td><button type="button" class="btn btn-primary" style="background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px">Print code</button></a>
  <?php  "</td>";


      }
      elseif($row['ti_status']=='Cancelled'){
        echo "<td style='color:red'><strong>"; echo $row['ti_status'];"</strong></td>";
      //  echo "<td><button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px' name='deletebtnnotallowed'>Cancel</button>
        
        ?><td><button type="button" class="btn btn-primary" style="background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px">Print code</button></a>
  <?php  "</td>";


      }

    echo "</tr>";
    ?>
    <div class="modal fade" id="myModal<?php echo $row['ti_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:6%;top:18%;width:60%" >
        <div class="modal-content" style="height:55%;width:50%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Ticket QR Code</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:10px">
          
          
          
          <?php $width = "250";
  $height = "250";

$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl=
Ticket ID = {$row['ti_id']}%0A
Customer ID = {$row['cus_id']}%0A
Customer Username = {$_SESSION['login']}%0A
Train No. = {$row['tr_number']}%0A
Train Name = {$row['tr_name']}%0A
Train Source = {$row['tr_source']}%0A
Train Destination = {$row['tr_destination']}%0A
Train Departure Date = {$row['tr_departuredt']}%0A
Train Arrival Date = {$row['tr_arrivaldt']}%0A
Class Price = {$row['cl_price']}%0A
No. of tickets = {$row['ti_no_passengers']}%0A
Ticket fare = {$row['ti_fare']}%0A
Payment Status = {$row['ti_payment_status']}%0A
";

$output["img"] = $url;

?>
<?php if (isset($output)) { ?>
                <div style="width:250px;height:250px;">
                    <img src="<?php echo $output["img"] ?>" alt="QR Code" width="100%" height="100%">
                </div>
                <?php } ?>
      
        
                <button type="button" class="btn btn-secondary" style="background-color:black;border:none;float:right;color:white" data-dismiss="modal">Close</button>
                                    
        
          
          <div>
          
          </div>
          
          </div>
          
          
          </div>
            
         
         
    
    <!----------------------modal end----------><?php
      }
      echo "</tbody>";
      echo "</table>";
      
      
      ?>
 
 </div>
<!-- form container Ends -->
</center>
 
  </div>
  </div>
    <!-- Page Ends -->

	<!--for slider-->
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/jquery.dataTables.js"></script>
  <script src="../js/dataTables.bootstrap.js"></script>
  
  
  <script>
    $("#myTable").dataTable( {
    //"dom": ;
    
    lengthMenu: [5, 10, 20, 50, 100, 200],
    //dom: 'Pfrtip' 
    columnDefs: [
    {
        targets: -1,
        className: 'dt-body-right'
    }
  ],

} );


  </script>



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

<?php 

} ?>
