<?php
//Start the Session
session_start();	

error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:member-login.php');
}
else{
//including the database connection file.
include_once("../connect.php");
include_once("assets/sendemail.php");
//including the database connection file.
?>

<html lang="en">
<head>
<style>
.roll-in-bottom {
  animation: roll-in-bottom 0.9s;
}


@keyframes roll-in-bottom {
  0% {
    transform: translateY(800px) rotate(540deg);
    opacity: 0;
  }
  100% {
    transform: translateY(0) rotate(0deg);
    opacity: 1;
  }
}


</style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <!-- Responsive meta tag-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/logo.png">


  <title>Reserve Ticket, SwiftWay - Sri Lanka Railways</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
  <script type="text/javascript" src="../js/tog.js"></script>
</head>

<body style="background-color: #242424;">

<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
  <?php if (isset($_GET['fail'])): ?>
		<p><?php echo $_GET['fail']; ?></p>
	<?php endif ?>
  <?php if (isset($_GET['pass'])): ?>
		<p><?php echo $_GET['pass']; ?></p>
	<?php endif ?>
  <div class="wrapz">
    <?php $page='memsupport'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
      <h2 style="margin-left:30px;">Contact Us
        <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span
            class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <center>
        <div style="margin-top:10%">
        <div id="contactsupportimg" class="roll-in-bottom"></div>
          <!-- Form Starts --><?php echo $alert; ?>
          <form class="custom-form" style="margin-left:30px; margin-right:75px;margin-left:60px;" method="post">
            <div class="form-group inputWithIcon">
            <i class="fas fa-signature" style="right:0%;left: 265px;"></i>
              <input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:50px;" type="text"
                name="name" required placeholder="Name">
                <i class="far fa-envelope" style="right:0%;left: 265px;"></i>
              <input class="form-control"
                style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:60px;" type="text"
                name="email" required placeholder="Email">

              <textarea style="width:30%;box-shadow:none; margin-right: 30px;margin-bottom:50px;" name="message"
                class="form-control" rows="5" placeholder="Your Message" required></textarea>

            </div>

            <!-- Submit Form Button Starts -->
            <div class="form-group">
              <button class="custom-button next-button"
                style="border-radius:10px;float:right;margin-right:11%;background-color:#673AB7 !important"
                type="submit" name="submit" value="Send">Send Message</button>
            </div>
          </form>
          
          
          <!-- Form Ends -->
        </div>
      </center>
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
  <?php include_once("assets/footer.php"); ?>
  <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>

</body>

</html>

<?php } ?>