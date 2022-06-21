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
<?php $sql = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$row= mysqli_fetch_assoc($sql);?>
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
      <h2 style="margin-left:30px;">Travel Points
        <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <center>
        <div style="margin-top:10%">
       
        <form name="form" class="fade-in" action="member-reserveticket.php" method="post">
         
<?php
if($row['cus_travelpoints']>=500){
  echo "<label>500</label><br>";
  echo "<input type='hidden' name='500voucher' value='500'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#500exampleModal' style='margn-left:100px'>Redeem</button><br>";
}else{
  echo "<label>500</label><br>";
  echo "<button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px' name='deletebtnnotallowed'>Unreedemable</button><br>";
}

if($row['cus_travelpoints']>=200){
  echo "<label>200</label><br>";
  echo "<input type='hidden' name='200voucher' value='200'><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#200exampleModal' style='margn-left:100px'>Redeem</button><br>";
}else{
  echo "<label>200</label><br>";
  echo "<button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px' name='deletebtnnotallowed'>Unreedamble</button><br>";
}
?>


          
  </form>
          
          <!-- Form Ends -->
        </div>
      </center>
      <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="200exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Redeem Rs.200 Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="200voucher" value="200">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">
      <span style="color:black;font-size:14px">Your Travel Points <?php echo (float)$row['cus_travelpoints']; ?></span>
      <input type="submit" name="btn200" class="btn btn-primary">
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="500exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Redeem Rs.500 Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="500voucher" value="500">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">
      <span style="color:black;font-size:14px">Your Travel Points <?php echo (float)$row['cus_travelpoints']; ?></span>
      <input type="submit" name="btn500" class="btn btn-primary">
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



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