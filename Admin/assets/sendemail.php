<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

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
    $mail->addAddress('swiftwayadmn@gmail.com');
    $mail->addAddress('ruznithegambit@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    //$alert = '<div class="alert-success" style="z-index:10;width:60%;">
      //           Message Sent! Thank you for contacting us.
        //        </div>';
        $em = '<script>alert("Message sent successfully! ")</script>';
        header("Location: member-support.php?pass=$em");
  } catch (Exception $e){
    //$alert = '<div class="alert-error">
      //          <span>'.$e->getMessage().'</span>
        //      </div>';
              $em = '<script>alert("'.$e->getMessage(). '")</script>';
        header("Location: member-support.php?fail=$em");
  }
}
?>