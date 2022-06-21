
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
    
    $customerid = $_GET['customerid'];
    $customerstatus = $_GET['customerstatus'];
  


    //Checking empty fields	
    if(empty($customerstatus))  { 
	
      if(empty($customerstatus)) {
          //echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Customer Status field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managecustomers.php'; </script>";
      }
  
  
      }
      
  
            
   else { 
    $resultt=mysqli_query($conn,"SELECT * FROM admin where ad_username='$_SESSION[adminlogin]' ;");
    $row=mysqli_fetch_assoc($resultt);
    $adid = $row['ad_id'] ;


    $result = mysqli_query($conn, "UPDATE customer SET cus_status='$customerstatus', ad_id='$adid'  WHERE cus_id='$customerid'");

    $num = mysqli_affected_rows($conn);
  if($num>0)
        {
          
    
        
        
              
  //redirectig to the display page.
    // echo '<script language="javascript">';
    // echo 'alert("Updated Successfully")';
    // echo '</script>';
    // echo "<script type='text/javascript'> document.location ='../admin-managecustomers.php'; </script>";
    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "success",
					title: "Success",
					showConfirmButton: false,
					text: "Customer details updated successfully"
            
        }).then(function() {
          window.location = "../admin-managecustomers.php";
        });
    }, 1000);
</script>';
 
}else
{
  // echo '<script language="javascript">';
  //   echo 'alert("An error occured. Please try again.")';
  //   echo '</script>';
  //   echo "<script type='text/javascript'> document.location ='../admin-managecustomers.php'; </script>";
    
  echo '<script>
  setTimeout(function() {
      Swal.fire({
        icon: "error",
        title: "Error",
        showConfirmButton: false,
        text: "An error occured. Please try again."
          
      }).then(function() {
        window.location = "../admin-managecustomers.php";
      });
  }, 1000);
</script>';
}
			
   
}
}
 