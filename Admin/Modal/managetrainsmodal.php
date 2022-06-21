
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
use PHPMailer\PHPMailer\PHPMailer;
include_once("../../connect.php");
session_start();
if(isset($_GET['updatebtn'])){
    
    //$trainnumber = $_GET['trainnumber'];
    
    $trainname = $_GET['trainname'];
    $trainid = $_GET['trainid'];
    $trainsource = $_GET['trainsource'];
    $traindestination = $_GET['traindestination'];
    $traindeparturedt = $_GET['traindeparturedt'];
    $trainarrivaldt = $_GET['trainarrivaldt'];
    $trainstatus = $_GET['trainstatus'];
    $traintype = $_GET['traintype'];
    $trainpostalcode = $_GET['trainpostalcode'];

    //Checking empty fields	
    if(empty($trainname) || empty($trainsource) || empty($traindestination)|| empty($traindeparturedt) || empty($trainarrivaldt) || empty($trainstatus) || empty($traintype))   { 
	
      if(empty($trainname)) {
          //echo "<font color='red'>Name field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train name field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
      }
  if(empty($trainsource)) {
          //echo "<font color='red'>ISBN field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train source field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
      }      	
  
   if(empty($traindestination)) {
          //echo "<font color='red'>Author field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train destination field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
      }
      
   if(empty($traindeparturedt)) {
          //echo "<font color='red'>Category field is empty.</font><br/>";
    echo '<script language="javascript">';
    echo 'alert("Train departure date field is empty")';
    echo '</script>';
    echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
      }

      if(empty($trainarrivaldt)) {
        //echo "<font color='red'>Category field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Train arrival date field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
    }

    if(empty($trainstatus)) {
      //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train status field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
  }

  if(empty($traintype)) {
    //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train type field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
}

if(empty($trainpostalcode)) {
  //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train postal code field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
}
  
  
      }
      
  
            
   else { 
    $resultt=mysqli_query($conn,"SELECT * FROM admin where ad_username='$_SESSION[adminlogin]' ;");
    $row=mysqli_fetch_assoc($resultt);
    $adid = $row['ad_id'] ;

    $result = mysqli_query($conn, "UPDATE train SET tr_name='$trainname',tr_source='$trainsource',tr_destination='$traindestination',tr_departuredt='$traindeparturedt',tr_arrivaldt='$trainarrivaldt',tr_type='$traintype',tr_status='$trainstatus',tr_postalcode='$trainpostalcode',ad_id='$adid'  WHERE tr_id='$trainid'");
    

    //wejnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
    
    
    require_once '../phpmailer/Exception.php';
    require_once '../phpmailer/PHPMailer.php';
    require_once '../phpmailer/SMTP.php';
    
    $mail = new PHPMailer(true);
    
    $alert = '';
    
    
    
      try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'swiftwaysmtpserver@gmail.com'; // Gmail address which you want to use as SMTP server
        $mail->Password = 'reignsruzni'; // Gmail address Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //587
        //$mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
          'ssl' => array(
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
          )
      );
        $mail->Port = '587';
    
        $mail->setFrom('swiftwaysmtpserver@gmail.com'); // Gmail address which you used as SMTP server
        $dep=mysqli_query($conn, "SELECT customer.cus_id,cus_email, ticket.ti_id,tr_id
        FROM customer
        INNER JOIN ticket ON customer.cus_id = ticket.cus_id WHERE tr_id='$trainid' && ti_status='Confirmed'");
        while($rowyo=mysqli_fetch_assoc($dep)){
        $mail->addAddress($rowyo['cus_email']);// Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        }
        $depdt=date("Y-m-d H:i:s",strtotime($traindeparturedt));
        $mail->isHTML(true);
        $mail->Subject = 'Train Delay Alert';
        $mail->Body = "<h3> Your train has been delayed.</h3>
        <h3> Your train departure time: $depdt</h3>";
    
        $mail->send();
        
      } catch (Exception $e){
       
               
      }
    
    
		//redirectig to the display page.
		// echo '<script language="javascript">';
    //     echo 'alert("Updated Successfully")';
    //     echo '</script>';
    //     echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
			
    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "success",
					title: "Success",
					showConfirmButton: false,
					text: "Train Details have been updated successfully!"
            
        }).then(function() {
          window.location = "../admin-managetrains.php";
        });
    }, 1000);
</script>';
   
}
}

if(isset($_GET['insertbtn'])){
  
  $trainnumber = $_GET['trainnumber'];
  $trainname = $_GET['trainname'];
  $trainsource = $_GET['trainsource'];
  $traindestination = $_GET['traindestination'];
  $traindeparturedt = $_GET['traindeparturedt'];
  $trainarrivaldt = $_GET['trainarrivaldt'];
  $trainstatus = "Available";
  $traintype = $_GET['traintype'];
  $trainpostalcode = $_GET['trainpostalcode'];


  //Checking empty fields	
  if(empty($trainname) || empty($trainsource) || empty($traindestination)|| empty($traindeparturedt) || empty($trainarrivaldt) || empty($trainnumber) || empty($traintype))   { 

    if(empty($trainname)) {
        //echo "<font color='red'>Name field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Train name field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
    }
if(empty($trainsource)) {
        //echo "<font color='red'>ISBN field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Train source field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
    }      	

 if(empty($traindestination)) {
        //echo "<font color='red'>Author field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Train destination field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
    }
    
 if(empty($traindeparturedt)) {
        //echo "<font color='red'>Category field is empty.</font><br/>";
  echo '<script language="javascript">';
  echo 'alert("Train departure date field is empty")';
  echo '</script>';
  echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
    }

    if(empty($trainarrivaldt)) {
      //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train arrival date field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
  }

  if(empty($trainnumber)) {
    //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train number field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
}

if(empty($traintype)) {
  //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train type field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
}

if(empty($trainpostalcode)) {
  //echo "<font color='red'>Category field is empty.</font><br/>";
echo '<script language="javascript">';
echo 'alert("Train postal code field is empty")';
echo '</script>';
echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
}


    }
    

          
 else { 
  // $u= "SELECT tr_number FROM train WHERE tr_number='$trainnumber'";
  // $uu= mysqli_query($conn,$u);
  // $uuu = mysqli_num_rows($uu);
  
  // if($uuu>0)
  // {
  //    //echo "<font color='green'>You have been registered successfully!";
  // echo '<script language="javascript">';
  // echo 'alert("Train number already exists")';
  // echo '</script>';
  // echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";
  // }else{

    $resultt=mysqli_query($conn,"SELECT * FROM admin where ad_username='$_SESSION[adminlogin]' ;");
    $row=mysqli_fetch_assoc($resultt);
    $adid = $row['ad_id'] ;

  $result = mysqli_query($conn, "INSERT INTO train(tr_number,tr_name,tr_type,tr_source,tr_destination,tr_departuredt,tr_arrivaldt,tr_status,tr_postalcode,ad_id)
  VALUES('$trainnumber','$trainname', '$traintype','$trainsource','$traindestination','$traindeparturedt','$trainarrivaldt','$trainstatus','$trainpostalcode','$adid')");      
  //redirectig to the display page.
    // echo '<script language="javascript">';
    // echo 'alert("Inserted Successfully")';
    // echo '</script>';
    // echo "<script type='text/javascript'> document.location ='../admin-managetrains.php'; </script>";

    echo '<script>
    setTimeout(function() {
        Swal.fire({
          icon: "success",
					title: "Success",
					showConfirmButton: false,
					text: "Train details inserted successfully!"
            
        }).then(function() {
          window.location = "../admin-managetrains.php";
        });
    }, 1000);
</script>';
    
  // }
}
}