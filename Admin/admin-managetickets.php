<?php

//including the database connection file.
include_once("../connect.php");

session_start();

error_reporting(0);
if(strlen($_SESSION['adminlogin'])==0)
    {   
header('location:admin-login.php');
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

    
    <title>Manage Tickets, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>
<script src="jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style> 
select:invalid { color: gray !important; } 
.column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }

@keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in-element {
  animation: fade-in 1s;
  
}
.swal2-popup {
  font-size: 1.6rem !important;
}
	.swal2-container {
  zoom: 1;
}
	.swal2-icon {
  width: 5em !important;
  height: 5em !important;
  border-width: .25em !important;
}
</style>
</head>
<body style="background-color: #242424;">

<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

<div class="wrapz">
<?php $page='admanagetickets'; include_once("assets/admin-nav.php"); ?>
<?php 
if (isset($_GET['pass'])): ?>
  <p><?php echo $_GET['pass']; ?></p>
<?php endif ?>
<?php if (isset($_GET['fail'])): ?>
<p><?php echo $_GET['fail']; ?></p>
<?php endif;
?>
    <div class="main-panel">
  
    <h2 style="margin-left:30px;">Manage Tickets <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">

      
      <div style="float:left;margin-bottom:20px;position:absolute;top:230px;left:30px;z-index:10">
  <form class="custom-form" method='get' action='assets/admin-generatereportspdf.php' >
    
<input class="form-control" type="month" style="height:35px;width:90%;box-shadow:none;padding:5px" name="date" required><br>
    <input type='submit' name="ticketyo" style="float:right;position:relative;left:95px;bottom:51px;padding:3px;font-size:11px" class="btn btn-warning" value='Download PDF'>
  </form>
</div>
<form method="get" action="Modal/manageticketsmodal.php" style="margin-left:1080px;position:relative;top:20px;z-index:200">
<p style="font-weight:5px">Update Ticket Status
<button class="btn btn-info" style="backgroud-color:green" type="submit" name="del" ><i class="fal fa-history"></i></button></p>
</form>

<?php

$rez=mysqli_query($conn, "SELECT train.tr_id,tr_number,tr_type,tr_source,tr_destination,tr_arrivaldt,tr_departuredt,ticket.ti_fare,ti_departuredt,ti_reserveddate,ti_no_passengers,ti_id,cus_id,credits_used,ti_payment_type,ti_payment_status,ti_status,trainclass.cl_name,cl_occupiedseats,cl_seatcap FROM train inner join trainclass ON train.tr_id = trainclass.tr_id inner join ticket on trainclass.cl_id = ticket.cl_id order by ti_id ");

  ?>
  <table id="myTable" class="display fade-in-element dataTables_wrapper dataTables_filter input" style="margin-top:120px;width:95%;margin-right:30px;font-size:13px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<thead style="cursor:pointer">
<tr>
<th>Ticket ID</th>
<th>Train ID</th>
<th>Train Number</th>
<th>Train Type</th>
<th>Class Name</th>
<th>Customer ID</th>
<th>No of tickets</th>
<th>Ticket Fare</th>
<th>Payment Type</th>
<th>Ticket Departure Date</th>
<th>Reserved Date</th>
<th>Ticket Status</th>
<th>Ticket Payment Status</th>
<th style="width: 12%">Actions</th>
</tr>
</thead>

<?php
echo "<tbody>";
while($row= mysqli_fetch_assoc($rez))
  {
    $hu=$row['cus_id'];
    
    $ress=mysqli_query($conn, "SELECT * FROM customer WHERE cus_id='$hu'");
    while($rowy= mysqli_fetch_assoc($ress))
  {
echo "<tr style='text-align:left'>";
  
 
  echo "<td>"; echo $row['ti_id'];"</td>";
  echo "<td>"; echo $row['tr_id'];"</td>";
  echo "<td>"; echo $row['tr_number'];"</td>";
  echo "<td>"; echo $row['tr_type'];"</td>";
  echo "<td>"; echo $row['cl_name'];"</td>";
  echo "<td>"; echo $row['cus_id'];"</td>";
  echo "<td>"; echo $row['ti_no_passengers'];"</td>";
  echo "<td>"; echo $row['ti_fare'];"</td>";
  echo "<td>"; echo $row['ti_payment_type'];"</td>";
  echo "<td>"; echo $row['ti_departuredt'];"</td>";
  echo "<td>"; echo $row['ti_reserveddate'];"</td>";
if($row['ti_status']=="Confirmed"){
    echo "<td style='color:#337ab7'><strong>"; echo $row['ti_status'];"</strong></td>";

  }
  elseif($row['ti_status']=="Cancelled"){
    echo "<td style='color:red'><strong>"; echo $row['ti_status'];"</strong></td>";

  }
  elseif($row['ti_status']=="Expired"){
    echo "<td style='color:#f0ad4e'><strong>"; echo $row['ti_status'];"</strong></td>";

  }
  if($row['ti_payment_status']=="Paid"){
    echo "<td style='color:green'><strong>"; echo $row['ti_payment_status'];"</strong></td>";
  }if($row['ti_payment_status']=="Waiting"){
    echo "<td style='color:#000066'><strong>"; echo $row['ti_payment_status'];"</strong></td>";  
  }
  ?><td><button type="button" class="btn btn-primary" name="editbtn" data-toggle="modal" data-target="#myModal<?php echo $row['ti_id'];?>"><i class="fal fa-edit"></i></button>
  <?php	echo "| <a href=\"admin-deleteticket.php?ti_id=$row[ti_id]\" onClick=\"return confirm('Are you sure you want to delete?' )\" style='color:white;text-decoration:none'><button type='button' class='btn btn-danger'><i class='fal fa-trash'></i></button></a></td>";
  
  

  

echo "</tr>";?>
<!----------------------modal searched ---------->

    <div class="modal fade" id="myModal<?php echo $row['ti_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:3%;width:60%" >
        <div class="modal-content" style="height:85%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Edit Ticket Details</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:0px">
          
          
          <div style="color:grey;">
          
      
        
          
                                    <form method="get" action="Modal/manageticketsmodal.php">


                                    <div class="row">
        <div class="column" style="position:relative;left:50px">
        <label style="">Ticket ID</label>
        <input class="form-control" style="width:70%" type="text" name="ticketid" readonly value="<?php echo $row['ti_id'];  ?>">
        <br>
        <label style="">Class Name</label>
        <input class="form-control" style="width:70%" type="text" name="clname" readonly value="<?php echo $row['cl_name'];  ?>">
        <br>
        <label style="">Customer NIC</label>
        <input class="form-control" style="width:70%" type="text" name="cusnic" readonly value="<?php echo $rowy['cus_nicnum'];  ?>">
        <br>
        <label style="">No of Tickets</label>
        <input class="form-control" style="width:70%" type="text" name="noooftickets" readonly value="<?php echo $row['ti_no_passengers'];  ?>">
       
        <br>
        <label style="">Payment Type</label>
        <input class="form-control" style="width:70%" type="text" name="paytype" readonly value="<?php echo $row['ti_payment_type'];  ?>">
        <br>
        <label>Ticket Payment Status</label>
        
         <select class="form-control" style="width:70%" type="text" name="ticketpaymentstatus">
         <!-- <option>Waiting</option> -->
         <option <?php if($row['ti_payment_status']=="Paid") echo 'selected="selected"'; ?> >Paid</option>
         <option <?php if($row['ti_payment_status']=="Waiting") echo 'selected="selected"'; ?>>Waiting</option>
         </select>


        </div>
        <div class="column" style="position:relative;left:50px">
        <label style="">Train Number</label>
        <input class="form-control" style="width:70%" type="text" readonly name="trainnum" readonly value="<?php echo $row['tr_number'];  ?>">
        <br>
        <label style="">Customer ID</label>
        <input class="form-control" style="width:70%" type="text" name="cusid" readonly value="<?php echo $row['cus_id'];  ?>">
        <br>
        <label style="">Customer Number</label>
        <input class="form-control" style="width:70%" type="text" name="cusno" readonly value="<?php echo $rowy['cus_no'];  ?>">
        <br>
        <label style="">Ticket fare</label>
        <input class="form-control" style="width:70%" type="text" name="tifare" readonly value="<?php echo $row['ti_fare'];  ?>">
        <br>
        <label>Ticket Status</label>
        
         <select class="form-control" style="width:70%" type="text" name="ticketstatus">
         <!-- <option>Waiting</option> -->
         <option <?php if($row['ti_status']=="Confirmed") echo 'selected="selected"'; ?>>Confirmed</option>
         <option <?php if($row['ti_status']=="Cancelled") echo 'selected="selected"'; ?>>Cancelled</option>
         <option <?php if($row['ti_status']=="Expired") echo 'selected="selected"'; ?>>Expired</option>
         </select>
        <br>
        <label style="">Credits Used</label>
        <input class="form-control" style="width:70%" type="text" name="creditsused" readonly value="<?php echo $row['credits_used'];  ?>">
       
        </div>
    </div>
                
    <input type="submit" name="updatebtn" value="Update" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:10px">
    </form>
          </div>
          
          <div>
          
          </div>
          
          </div>
          
          
          </div>
            
         
          
        </div>
      </div>
      
    </div>
    
    <!----------------------modal end----------><?php
  }
}

  echo "</tbody>";
  echo "</table>";
  //echo "Today is " . date("Y/m/d") . "<br>";
  ?>
  
<?php
      
      //echo "</div>";
      //$update=mysqli_query($conn, "SELECT train.tr_id,tr_number,tr_departuredt,ticket.ti_fare,ti_reserveddate,ti_payment_status,ti_status FROM train inner join ticket ON train.tr_id = ticket.tr_id WHERE ti_status='Confirmed' && tr_departuredt<CURDATE()");

     
            
  
    
      ?>
      
 
 </div>
<!-- form container Ends -->





 
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


<?php }?>
