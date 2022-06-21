<?php
include_once("../../connect.php");
session_start();
if(isset($_GET['paybtn'])){

  
$cusid = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$cusid1= mysqli_fetch_assoc($cusid);
$customer=$cusid1['cus_id'];

  $payment = $_GET['paymn'];
  $travelpoints = $_GET['travelpoints'];
  $amnt = $_GET['amnt'];
  $creditsremaining = $_GET['creditsremaining'];
  $pass = $_GET['pass'];
  $creditsused = $_GET['creditsused'];
  //$dtime = $_GET['daty'];
  $totalamntpaid = $_GET['totalamntpaid'];

  $classid = $_GET['classid'];
  

  /*//Checking empty fields	
  if(empty($cdn) || empty($noc)|| empty($expdt)|| empty($cvc)) { 
	
    if(empty($cdn)) {
        echo "<font color='red'>Credit/Debit Card field is empty.</font><br/>";
    }
if(empty($noc)) {
        echo "<font color='red'>Name on Card field is empty.</font><br/>";
    }


 if(empty($expdt)) {
        echo "<font color='red'>Expiry Date field is empty.</font><br/>";
    }
    
 if(empty($cvc)) {
        echo "<font color='red'>CVC field is empty.</font><br/>";
    }
  		 
}else{*/

        
  $date = date("Y-m-d");
  //echo $_GET['tr_id'];
  //$departuredti=date("Y-m-d\TH:i:s",strtotime($_GET['tr_id']));
$tr_id = $_GET['tr_id'];
  //$newti=date("Y-m-d H:i:s",strtotime($dtime));
  //$departuredtimeey = date("Y-m-d H:i:s",strtotime($_GET['tr_id']));
  try{
    $ttravelpoints= $cusid1['cus_travelpoints']+$travelpoints;
$totaltravelpoints= $cusid1['cus_totalearnedtp']+$travelpoints;

    $sqly = mysqli_query($conn, "UPDATE customer SET cus_travelpoints='$ttravelpoints',cus_totalearnedtp='$totaltravelpoints',cus_credit = '$creditsremaining' WHERE cus_username='$_SESSION[login]'");
  $result = mysqli_query($conn, "INSERT INTO ticket(ti_fare,credits_used,ti_totalamnt_paid,ti_no_passengers,cl_id,cus_id,ti_payment_type,ti_status,ti_reserveddate,tr_id)
  VALUES('$amnt', '$creditsused', '$totalamntpaid','$pass','$classid','$customer','$payment','Waiting','$date','$tr_id')");

  }catch (Exception){
    echo getMessage();
        
  }
  
  $num = mysqli_affected_rows($conn);
  if($num>0)
        {
          
          $em = '<script>alert("Reserved Successfully! ")</script>';
          header("Location: ../member-myreservations.php?pass=$em");
        
        }
        else
        {
          $em = '<script>alert("There was an error, please try again. ")</script>';
          header("Location: ../member-choose_sdcd.php?fail=$em");
        
        }

}


?>