<?php
ob_start();
//including the database connection file.
include_once("../connect.php");


session_start();
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

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>


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
<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<div class="wrapz">
<?php $page='memchoose_sdcd'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
  <?php
  $pass=$_GET['passengers'];
  $classid=$_GET['classid'];
  $sqy = mysqli_query($conn, "SELECT * FROM trainclass WHERE cl_id='$classid'");
  $rown= mysqli_fetch_assoc($sqy);
  $totalseatsafteraddition = $rown['cl_occupiedseats'] + $pass;
  if(isset($_GET['reserve']))
  {
  //  header('location:member-dashboard.php');
  if($totalseatsafteraddition >$rown['cl_seatcap']){
     //redirectig to the display page.
     //echo "asdjnaksd";
    //  echo '<script language="javascript">';
    //  echo 'alert("The number of seats chosen exceeds the seats available. Please try again.")';
    //  echo '</script>';
    //  echo "<script type='text/javascript'> document.location ='member-choose_sdcd.php'; </script>";
     //header('location:member-dashboard.php');
     echo '<script>
     setTimeout(function() {
         Swal.fire({
           icon: "warning",
           title: "Warning",
           showConfirmButton: false,
           text: "The number of seats chosen exceeds the seats available. Please try again."
             
         }).then(function() {
          window.history.back()
         });
     }, 1000);
 </script>';
  }
}
  ?>
    <h2 style="margin-left:30px;">Reserve Ticket <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <h3 style="margin-left:30px;margin-top:50px;color:grey;">Payment</h3>
      
      
      <center>
      <div class="form-container" style="margin-top:40px;">
      
					<div style="margin-left:60px;">
    
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="sdd"><strong>Choose Source, Destination and Date</strong></li>
                        <li class="active" id="selecttrain"><strong>Select Train</strong></li>
                        <li class="active" id="payment"><strong>Payment</strong></li>
                        
                    </ul>
                    
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
                    </div> <br> <!-- fieldsets -->
                 
                    
                
                
            
        </div>
					<div>



         

 
 
 
 


          <?php 
 $classid=$_GET['classid'];

 //$res=mysqli_query($conn, "SELECT * FROM trainclass WHERE cl_id = $classid");
 //$res=mysqli_query($conn, "SELECT train.tr_source,tr_departuredt,tr_destination,tr_arrivaldt,ticket.ti_fare,ti_no_passengers,ti_id,trainclass.cl_name,cl_seatcap,cl_price FROM train inner join trainclass ON train.cl_id = trainclass.cl_id inner join ticket on trainclass.cl_id = ticket.cl_id WHERE cl_id = $classid");


  $res=mysqli_query($conn, "SELECT train.tr_id,tr_source,tr_number,tr_name,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE cl_id = $classid");

 $row= mysqli_fetch_assoc($res);

 $resh = mysqli_query($conn, "SELECT * FROM customer where cus_username='$_SESSION[login]'");
 $custoemr= mysqli_fetch_assoc($resh);

 ?>




						
						<!-- Form Starts -->
            <form class="form-inline custom-form" onsubmit="openModal()" id="myForm" method="post">

           <!--<form class="custom-form" style="margin-left:30px; margin-right:75px;" id="content-desktop" method="post">-->
           
                            <!-- Input Field Starts -->
							

              <!--<input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:50px;" type="text" name="name" required placeholder="Name">-->
              <div style="padding:40px;background-color:#000;width:50%;height:70%;border-radius:10px;margin-bottom:25px;position:relative;bottom:10px;right:18px;color:#eee">
              <span style="font-size:20px">ORDER SUMMARY</span>
              <div style="margin-top:100px">
              <?php
              echo "<span style='font-size:14px;margin-top:100px;position:absolute;top:20px;right:83%'>"."<i class='far fa-map-marker-alt' style='position:absolute;right:83px;top:12%'></i><span style='position:relative;left:12px'>". $row ['tr_source'] . "</span></span>" ."<i class='fal fa-long-arrow-alt-right' style='font-size:30px;margin-top:100px;position:absolute;top:15px;right:70%'></i>". "<span style='font-size:14px;position:absolute;margin-top:100px;text-align:right;top:20;right:51%'>". $row ['tr_destination'] . "</span>" ;
              echo "<span style='font-size:14px;margin-top:100px;position:absolute;top:50px;right:83%'>"."<i class='far fa-calendar-minus' style='position:absolute;right:80px;top:12%'></i>". date("Y-m-d",strtotime($row ['tr_departuredt'])). "</span>";
              echo "<span style='font-size:14px;margin-top:100px;position:absolute;top:50px;right:51%;'>". date("Y-m-d",strtotime($row ['tr_arrivaldt'])). "</span>";
              echo "<span style='font-size:14px;margin-top:100px;position:absolute;top:80px;right:86%'>". "<i class='fas fa-clock' style='position:absolute;right:60px;top:12%'></i>" . date("H:i:s",strtotime($row ['tr_departuredt'])). "</span>"."<br>";
              echo "<span style='font-size:14px;margin-top:100px;position:absolute;top:80px;right:51%;'>". date("H:i:s",strtotime($row ['tr_arrivaldt'])). "</span>";
              ?>
              <div class="vertical" style="position:absolute;height:25%;top:10%;margin-top:70px;left:330px"></div>
              <div style="z-index:10;position:absolute;margin-top:40px;top:15%;text-align:left;left:55%">
              
              <?php
              
              
              echo "<span style=''>". "Class Name : <strong style='text-transform: uppercase;'>" . $row['cl_name'] ."</strong></span><br>";
              echo "<span style='position:absolute;top:27%;'>". "No. of Tickets : <strong>" .$_GET['passengers']. "</strong></span><br>";
              
              
              echo "<span style='position:absolute;top:55%;'>". "Amount (LKR) : <strong>" . $_GET['passengers']*$row['cl_price'] . "</strong></span><br>";
              //echo intval(1599/100);
              //bronze 1
              
              if($custoemr['cus_totalearnedtp']<150){
              $travelpoints = intval($_GET['passengers']*$row['cl_price']/100);
              }
              //silver 1.1
              if($custoemr['cus_totalearnedtp']>=150 && $row['cus_totalearnedtp']<600){
                $silver = intval($_GET['passengers']*$row['cl_price']/100)*1.1;
              $travelpoints = number_format($silver,1);
              }
              //gold 1.2
              if($custoemr['cus_totalearnedtp']>=600 && $row['cus_totalearnedtp']<3000){
                $gold = intval($_GET['passengers']*$row['cl_price']/100)*1.2;
              $travelpoints = number_format($gold,1);
              }
              //platinum 1.4
              if($custoemr['cus_totalearnedtp']>=3000){
               $platinum = intval($_GET['passengers']*$row['cl_price']/100)*1.4;
              $travelpoints = number_format($platinum,1);
              }
              
              echo "<span style='position:absolute;top:82%;'>". "Travel Points : +<strong>" . $travelpoints . "</strong></span><br>";
              echo "<span style='position:absolute;top:110%;'>". "Credits : <strong style='text-transform: uppercase;'>" . (double)$custoemr['cus_credit'] ."</strong></span><br>";
              
             
              ?>
              </div>
          
              </div>
              <div class="form-group inputWithIcony swing-in-top-fwd" style="display: flex;">
              
              <div class="inputWithIcony">
              <i class="fad fa-hand-holding-usd" style="left: 65%;top:205%;position:relative;"></i>
              <select class="form-control" style="position:relative;margin-left: 245px;width:100%;height:35px;box-shadow:none;top:130px;right:150px" required name="payment">
              <option value="" disabled selected hidden>Payment Method</option>
              <option>Cash</option>
              <option>Card</option>
              </select>
              <div class="form-check" style="position:relative;right:190px;top:200px">
              <input type="checkbox" class="form-check-input" name = "checkbox" id="usecredits" style="position:relative;left:40px;top:20px;width:30%;height:30%">
              <label class="form-check-label" for="usecredits" style="font-size:16px;position:relative;top:15px">Use Credits</label>
            </div>
              </div>
              </div>

              <br>
							<!-- Submit Form Button Starts -->
							<div class="form-group">
              <button class="custom-button confirm-button" style="padding:8px;font-size:12px;border-radius:10px;position:relative;left:350%;background-color:#673AB7;top:158px" type="submit" id="payhere-payment" name="submitt"><span>Confirm</span></button>
							</div>
 </form>
 <script>
    // Called when user completed the payment. It can be a successful payment or failure
    payhere.onCompleted = function onCompleted(orderId) {
        //alert("Payment completed!");
        //document.location ='member-myreservations.php';
        $(document).ready(function(){
			
      Swal.fire({
        icon: "success",
        title: "Success",
        showConfirmButton: false,
        text: "Payment Completed!",
        timer: 1700
        
        }).then(function() {
      window.location = "member-myreservations.php";
    });
    });
       
      
        
        //Note: validate the payment and show success or failure page to the customer

    };

    // Called when user closes the payment without completing
    payhere.onDismissed = function onDismissed() {
        //Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Called when error happens when initializing payment such as invalid parameters
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1218998",    // Replace your Merchant ID
        "return_url": "http://localhost/understand/Member/member-reserveticket.php",     // Important
        "cancel_url": "http://localhost/understand/Member/member-reserveticket.php", 
        "notify_url":   "http://localhost/understand/Member/member-reserveticket.php",  // Important
        <?php 
        //$departuredtime=date("Y-m-d\TH:i:s",strtotime($row ['tr_departuredt']));
        $tr_id = $row ['tr_id'];
        $tr_departuredt = $row ['tr_departuredt'];
        $amnt = $_GET['passengers']*$row['cl_price'];
        $cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$cusid1= mysqli_fetch_assoc($cusid);
$customer=$cusid1['cus_id'];


   ?>
        "order_id": "xxx",
        "items": "Ticket",
      <?php  if (isset($_POST['checkbox'])){
          $amntaftercredits = $amnt-(int)$custoemr['cus_credit'];
 
      if ((int)$custoemr['cus_credit'] > $amnt)
      { ?>
        "amount": "0",
   <?php   }if ((int)$custoemr['cus_credit'] < $amnt){  ?>
        "amount": "<?=$amntaftercredits ?>",
        <?php }
      
    }else{ ?>
      "amount": "<?=$amnt ?>",<?php
    }?>
        "currency": "LKR",
        "first_name": "<?=$cusid1['cus_name']?>",
        "last_name": "Perera",
        "email": "swiftwayadmn@gmail.com",
        "phone": "0771234567",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };

 
</script>


        
    
    </div>
</div>
</center>


<?php



if(isset($_POST['submitt'])){
if($_POST['payment'] == "Card") {
	$showModal = "true";



  $tr_id = $row ['tr_id'];
  $tr_departuredt = $row ['tr_departuredt'];
  $amnt = $_GET['passengers']*$row['cl_price'];
  $cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
  $cusid1= mysqli_fetch_assoc($cusid);
  $customer=$cusid1['cus_id'];
  $ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
  $totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;
  $tr_id = $row['tr_id'];
  $date = date("Y-m-d");
  
  
  if (isset($_POST['checkbox'])){
  $amntaftercredits = $amnt-(int)$custoemr['cus_credit'];
  if ((int)$custoemr['cus_credit'] > $amnt)
  { 
  $creditsremaining = abs($amntaftercredits);
  $creditsused = $amnt;
  $totalamntpaid = 0;
  ?>
    <?php } if 
    ((int)$custoemr['cus_credit'] < $amnt){ 
      $totalamntpaid = $amntaftercredits;
      
      $creditsused = $custoemr['cus_credit'];
      $creditsremaining = 0;
      ?>
  
   <?php } 
  
  
  
  //checkbox else
  }else{ 
    $creditsused = 0;
    $totalamntpaid = $amnt;
    $creditsremaining=$custoemr['cus_credit'];
    
    ?>
  
  
  
  <?php } ?>
  
  
  
  <?php
  
  
  if (isset($_POST['checkbox'])){
    if ((int)$custoemr['cus_credit'] < $amnt)
  { 
  
  $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$creditsremaining' WHERE cus_username='$_SESSION[login]'");
          $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
          $resulttick = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
          VALUES('$amnt','$creditsused','$totalamntpaid','$pass','$classid','$customer','Card','Confirmed','Paid','$date','$tr_departuredt','$tr_id')");
  
  }
}
  
  
  

 
else{
  $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$creditsremaining' WHERE cus_username='$_SESSION[login]'");
  $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
  $resulttick = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
  VALUES('$amnt','$creditsused','$totalamntpaid','$pass','$classid','$customer','Card','Confirmed','Paid','$date','$tr_departuredt','$tr_id')");

}
}

if($_POST['payment'] == "Cash") {

  $cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
  $cusid1= mysqli_fetch_assoc($cusid);
$customer=$cusid1['cus_id'];
$payy=$_POST['payment'];
$date = date("Y-m-d");
$departuredti=date("Y-m-d H:i:s",strtotime($row ['tr_departuredt']));
//	header('location:member-mybookings.php');
$ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
$totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;
//$sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints' WHERE cus_username='$_SESSION[login]'");
//max($value, 0);
$totalamount = $_GET['passengers']*$row['cl_price'];
$amntcredits = $totalamount-(int)$custoemr['cus_credit'];
    


$tr_id = $row['tr_id'];
$tr_departuredt = $row['tr_departuredt'];
if (isset($_POST['checkbox'])){
  $amntaftercredits = $amnt-(int)$custoemr['cus_credit'];
if ((int)$custoemr['cus_credit'] > $amnt)
{
$totalamntpaid = 0;
//$amnt = 0;
  $positive = abs($amntaftercredits);
  
  $ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
  $totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;
  $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$positive' WHERE cus_username='$_SESSION[login]'");
  $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
$result = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
VALUES('$amnt', '$amnt', '$totalamntpaid','$pass','$classid','$customer','$payy','Confirmed','Paid','$date','$tr_departuredt','$tr_id')");
  
}else{
 
  echo "<input type='hidden' name='creditsremaining' value='0'>";
  $creditsremaining = 0;
  $ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
  $totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;
  $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$creditsremaining' WHERE cus_username='$_SESSION[login]'");
  $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
$result = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
VALUES('$amnt', '$custoemr[cus_credit]', '$amntaftercredits','$pass','$classid','$customer','$payy','Confirmed','Waiting','$date','$tr_departuredt','$tr_id')");
}

}else{
  $ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
  $totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;
  $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints' WHERE cus_username='$_SESSION[login]'");
  $sqlyy = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");
  $resulttick = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_payment_status,ti_reserveddate,ti_departuredt,tr_id)
  VALUES('$amnt','0','$amnt','$pass','$classid','$customer','$payy','Confirmed','Waiting','$date','$tr_departuredt','$tr_id')");
}





$num = mysqli_affected_rows($conn);
if($num>0)

{
  
  //$em = '<script>alert("Reserved Successfully! ")</script>';
  //header("Location: member-myreservations.php?pass=$em");
  echo '<script>
  setTimeout(function() {
      Swal.fire({
        icon: "success",
        title: "Success",
        showConfirmButton: false,
        text: "Reserved Successfully!"
          
      }).then(function() {
        window.location = "member-myreservations.php";
      });
  }, 1000);
</script>';
  

}else{
  //echo '<script>alert("There was an error, please try again. ")</script>';
  echo '<script>
  setTimeout(function() {
      Swal.fire({
        icon: "error",
        title: "Error",
        showConfirmButton: false,
        text: "We encountered a problem. Please try again."
          
      }).then(function() {
        window.location = "member-choose_sdcd.php";
      });
  }, 1000);
</script>';
}
}
}


?>




      
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


<?php			
	if(!empty($showModal)) {
		// CALL MODAL HERE
		echo '<script type="text/javascript">
			$(document).ready(function(){
				payhere.startPayment(payment);
			});
		</script>';
	} 
?>

<div style="margin-top:500px">


<?php include_once("assets/footer.php"); ?>
</div>

</body>

</html>
<?php
}
?>
