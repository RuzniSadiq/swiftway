<?php
//Start the Session
session_start();	

error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:../user-login.php');
}
else{
//including the database connection file.
include_once("../connect.php");
include_once("assets/sendemaillostfound.php");
//including the database connection file.
?>

<html lang="en">
<head>
<style>
  @keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in-element {
  animation: fade-in 1.4s;
}

.bounce-in-top {
  animation: bounce-in-top 1.4s;
}

@keyframes bounce-in-top {
  0% {
    transform: translateY(-500px);
    animation-timing-function: ease-in;
    opacity: 0;
  }
  38% {
    transform: translateY(0);
    animation-timing-function: ease-out;
    opacity: 1;
  }
  55% {
    transform: translateY(-65px);
    animation-timing-function: ease-in;
  }
  72% {
    transform: translateY(0);
    animation-timing-function: ease-out;
  }
  81% {
    transform: translateY(-28px);
    animation-timing-function: ease-in;
  }
  90% {
    transform: translateY(0);
    animation-timing-function: ease-out;
  }
  95% {
    transform: translateY(-8px);
    animation-timing-function: ease-in;
  }
  100% {
    transform: translateY(0);
    animation-timing-function: ease-out;
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
    <?php $page='memlandf'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
      <h2 style="margin-left:30px;">Lost and Found
        <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span
            class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <center>
        <div style="margin-top:10%">
        <div id="lostfoundimg" class="bounce-in-top"></div>
          <!-- Form Starts --><?php echo $alert; ?>
          <h3 style="position:relative;right:60px;bottom:20px"><strong>Lost Item</strong></h3>
          <form class="custom-form" style="margin-left:30px; margin-right:75px;margin-left:60px;" method="post">
            <div class="form-group inputWithIcon">
            <i class="fas fa-signature" style="right:0%;left: 265px;"></i>
              <input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:20px;" type="text"
                name="name" required placeholder="Name">
                <i class="far fa-envelope" style="right:0%;left: 265px;"></i>
              <input class="form-control"
                style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:20px;" type="text"
                name="email" required placeholder="Email">
                
                <i class="far fa-id-card" style="right:0%;left: 265px;"></i>
              <input class="form-control"
                style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:20px;" type="text"
                name="nic" required placeholder="NIC">
                <i class="fas fa-signature" style="right:0%;left: 265px;"></i>
              <input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:20px;" type="text"
                name="itemname" required placeholder="Item Name">
                <i class="far fa-cog" style="right:0%;left: 265px;"></i>
              <input class="form-control" style="width:30%;height:35px;box-shadow:none; margin-right: 30px;margin-bottom:35px;" type="text"
                name="itemmodel" required placeholder="Item Model (If Applicable)">
                

              <textarea style="width:30%;box-shadow:none; margin-right: 30px;margin-bottom:50px;" name="message"
                class="form-control" rows="5" placeholder="Item Description" required></textarea>

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