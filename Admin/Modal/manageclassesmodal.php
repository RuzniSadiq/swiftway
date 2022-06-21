
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
    
    $trainid = $_GET['trainid'];
    $classid = $_GET['classid'];
    $seatcap = $_GET['seatcap'];
    $classname = $_GET['classname'];
    $classprice = $_GET['classprice'];
    $occupiedseats = $_GET['occupiedseats'];


    //Checking empty fields	
    if(empty($trainid) || empty($seatcap)|| empty($classname) || empty($classprice) || empty($occupiedseats))   { 
	
      if(empty($trainid)) {
          //echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train ID field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }
  	
   if(empty($seatcap)) {
          //echo "<font color='red'>Author field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Seat Capacity field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }
      
   if(empty($classname)) {
          //echo "<font color='red'>Category field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Class Name field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }

      if(empty($classprice)) {
        //echo "<font color='red'>Category field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Class Price field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
    }

    if(empty($occupiedseats)) {
      //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Occupied Seats field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
  }

  
  
      }
      
  
            
   else { 


    $result = mysqli_query($conn, "UPDATE trainclass SET tr_id='$trainid',cl_name='$classname',cl_seatcap='$seatcap',cl_price='$classprice',cl_occupiedseats='$occupiedseats'  WHERE cl_id='$classid'");
				
		//redirectig to the display page.
			// echo '<script language="javascript">';
			// echo 'alert("Updated Successfully")';
			// echo '</script>';
      // echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";

      echo '<script>
      setTimeout(function() {
          Swal.fire({
            icon: "success",
            title: "Success",
            showConfirmButton: false,
            text: "Train class details have been updated successfully!"
              
          }).then(function() {
            window.location = "../admin-manageclasses.php";
          });
      }, 1000);
  </script>';
			
   
}
}

if(isset($_GET['insertbtn'])){
  
  $trainid = $_GET['trainid'];
    //$classid = $_GET['classid'];
    $seatcap = $_GET['seatcap'];
    $classname = $_GET['classname'];
    $classprice = $_GET['classprice'];


    //Checking empty fields	
    if(empty($trainid) || empty($seatcap)|| empty($classname) || empty($classprice))   { 
	
      if(empty($trainid)) {
          //echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train ID field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }
  	
   if(empty($seatcap)) {
          //echo "<font color='red'>Author field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Seat Capacity field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }
      
   if(empty($classname)) {
          //echo "<font color='red'>Category field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Class Name field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
      }

      if(empty($classprice)) {
        //echo "<font color='red'>Category field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Class Price field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
    }

  
  
      }
      
  
            
   else { 


  $result = mysqli_query($conn, "INSERT INTO trainclass(tr_id,cl_name,cl_seatcap,cl_price)
  VALUES('$trainid','$classname','$seatcap','$classprice')");
  $num = mysqli_affected_rows($conn);
  if($num>0)
        {
          
    
        
        
              
  //redirectig to the display page.
    // echo '<script language="javascript">';
    // echo 'alert("Inserted Successfully")';
    // echo '</script>';
    // echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
    
    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "success",
					title: "Success",
					showConfirmButton: false,
					text: "Train class details inserted successfully!"
            
        }).then(function() {
          window.location = "../admin-manageclasses.php";
        });
    }, 1000);
</script>';
 
}else
{
  // echo '<script language="javascript">';
  //   echo 'alert("An error occured. Check whether the Train ID exists.")';
  //   echo '</script>';
  //   echo "<script type='text/javascript'> document.location ='../admin-manageclasses.php'; </script>";
  echo '<script>
  setTimeout(function() {
      Swal.fire({
        icon: "error",
        title: "Error",
        showConfirmButton: false,
        text: "An error occured. Check whether the Train ID exists."
          
      }).then(function() {
        window.location = "../admin-manageclasses.php";
      });
  }, 1000);
</script>';

}
}
}