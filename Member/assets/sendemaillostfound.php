
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/logo.png">

    
      <!-- <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" /> -->

<!-- Bootstrap CSS -->

<script src="jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
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
<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $itemname = $_POST['itemname'];
  $itemmodel = $_POST['itemmodel'];
  $nic = $_POST['nic'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'swiftwaysmtpserver@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'reignsruzni'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );

    $mail->setFrom('swiftwaysmtpserver@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('swiftwayadmn@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Lost and Found Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>NIC: $nic <br>Item Name: $itemname <br>Item Model: $itemmodel <br>Item Description : $message</h3>";

    $mail->send();
    //$alert = '<div class="alert-success" style="z-index:10;width:60%;">
      //           Message Sent! Thank you for contacting us.
        //        </div>';
        echo '<script>
        setTimeout(function() {
            Swal.fire({
              icon: "success",
              title: "Success",
              showConfirmButton: false,
              text: "Message Sent! Thank you for contacting us"
                
            })
        }, 1000);
    </script>';
      //  header("Location: member-landf.php?pass=$em");
  } catch (Exception $e){
   // $alert = '<div class="alert-error">
     //           <span>'.$e->getMessage().'</span>
       //       </div>';
       echo '<script>
       setTimeout(function() {
           Swal.fire({
             icon: "error",
             title: "Error",
             showConfirmButton: false,
             text: "'.$e->getMessage(). '"
               
           })
       }, 1000);
   </script>';
     //  header("Location: member-landf.php?fail=$em");
  }
}
?>