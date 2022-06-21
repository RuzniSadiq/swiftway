
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/logo.png">

    
      <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />

<!-- Bootstrap CSS -->

<script src="jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	.swal2-popup {
  font-size: 1.6rem !important;
}
	.swal2-container {
  zoom: 0.8;
}
	.swal2-icon {
  width: 5em !important;
  height: 5em !important;
  border-width: .25em !important;
}
	</style>


</head>
<?php
include_once("../../connect.php");
session_start();
if(isset($_GET['updatebtn'])){
    
    //$trainnumber = $_GET['trainnumber'];
    
    $ticketid = $_GET['ticketid'];
    $ticketstatus = $_GET['ticketstatus'];
    $ticketpaymentstatus = $_GET['ticketpaymentstatus'];
  


    //Checking empty fields	
    if(empty($ticketstatus))  { 
	
      if(empty($ticketstatus)) {
          //echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Ticket Status field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managetickets.php'; </script>";
      }
  
  
      }
      
  
            
   else { 

    // if($ticketstatus=='Confirmed')  { 
    //   $squ = mysqli_query($conn, "SELECT * FROM ticket WHERE ti_id='$ticketid'");
    //   $rowzy= mysqli_fetch_assoc($squ);
    //   $classid = $rowzy['cl_id'];
    //   $sqy = mysqli_query($conn, "SELECT * FROM trainclass WHERE cl_id='$classid'");
    //   $rown= mysqli_fetch_assoc($sqy);
    //   $totalseatsafteraddition = $rown['cl_occupiedseats'] + $rowzy['ti_no_passengers'];


    //   if($totalseatsafteraddition <=$rown['cl_seatcap']){
    //     $result = mysqli_query($conn, "UPDATE ticket SET ti_status='$ticketstatus',,ti_payment_status='$ticketpaymentstatus' WHERE ti_id='$ticketid'");
    //     $pass = $rowzy['ti_no_passengers'];
    //     $resulty = mysqli_query($conn, "UPDATE trainclass SET cl_occupiedseats='$totalseatsafteraddition' WHERE cl_id='$classid'");

    //   }else{
    //     echo '<script language="javascript">';
    //     echo 'alert("The number of seats chosen exceeds the seats available. Please try again.")';
    //     echo '</script>';
    //     echo "<script type='text/javascript'> document.location ='../admin-managetickets.php'; </script>";
    //   }
    // }
    // else{
    //$result = mysqli_query($conn, "UPDATE ticket SET ti_status='$ticketstatus' WHERE ti_id='$ticketid'");
    $resultyy = mysqli_query($conn, "UPDATE ticket SET ti_status='$ticketstatus',ti_payment_status='$ticketpaymentstatus' WHERE ti_id='$ticketid'");
    }
    $num = mysqli_affected_rows($conn);
  if($num>0)
        {
          
    
        
        
              
  //redirectig to the display page.
    // echo '<script language="javascript">';
    // echo 'alert("Updated Successfully")';
    // echo '</script>';
    // echo "<script type='text/javascript'> document.location ='../admin-managetickets.php'; </script>";
    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "success",
					title: "Success",
					showConfirmButton: false,
					text: "Ticket details updated successfully"
            
        }).then(function() {
          window.location = "../admin-managetickets.php";
        });
    }, 1000);
</script>';
 
}else
{
  // echo '<script language="javascript">';
  //   echo 'alert("An error occured. Please try again.")';
  //   echo '</script>';
  //   echo "<script type='text/javascript'> document.location ='../admin-managetickets.php'; </script>";
  echo '<script>
  setTimeout(function() {
      Swal.fire({
        icon: "error",
        title: "Error",
        showConfirmButton: false,
        text: "An error occured. Please try again"
          
      }).then(function() {
        window.location = "../admin-managetickets.php";
      });
  }, 1000);
</script>';

}
			
   
}

if(isset($_GET['del'])) {
        
  //$updateticketstatus=mysqli_query($conn, "UPDATE ticket inner join train ON ticket.tr_id = train.tr_id SET ticket.ti_status='Expired' WHERE ticket.ti_status='Confirmed' && train.tr_departuredt<CURDATE()");
  $updateticketstatus=mysqli_query($conn, "UPDATE ticket SET ti_status='Expired' WHERE ti_status='Confirmed' && ti_departuredt<CURDATE()");
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
          text: "Updated Successfully!"
            
        }).then(function() {
          window.location = "../admin-managetickets.php";
        });
    }, 1000);
  </script>';
    
  
  }else{
    //echo '<script>alert("There was an error, please try again. ")</script>';
    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "info",
          title: "Upto Date",
          showConfirmButton: false,
          text: "Seems everything is upto date!"
            
        }).then(function() {
          window.location = "../admin-managetickets.php";
        });
    }, 1000);
  </script>';
  }


        }
//}
 