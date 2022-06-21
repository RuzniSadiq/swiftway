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

.shine-animation{
  animation: shine 4s ease-in-out infinite; 
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
#logo {
position: absolute;
top: 0;
left: 0;
width: 140px;
height: 140px;
overflow: hidden;
}

#logo img {
width: 100%;
}
#logo:before {
content: '';
position: absolute;
top: 0;
left: -100px;
width: 70px;
height: 100%;
background: rgba(255,255,255, 0.3);
transform: skewX(-30deg);
animation-name: slide;
animation-duration: 3s;
animation-timing-function: ease-in-out;
animation-delay: 0s;
animation-iteration-count: infinite;
animation-direction: alternate;
background: linear-gradient(
    to right, 
    rgba(255, 255, 255, 0.13) 0%,
    rgba(255, 255, 255, 0.13) 77%,
    rgba(255, 255, 255, 0.5) 92%,
    rgba(255, 255, 255, 0.0) 100%
  );
}
@keyframes slide {
  0% {
    left: -100;
    top: 0;
  }
  50% {
    left: 120px;
    top: 0px;
  }
  100% {
    left: 290px;
    top: 0;
  }
}

.Bzct0b {
    font-family: 'Google Sans',Roboto,Arial,sans-serif;
    font-size: 1.75rem;
  
    letter-spacing: 0;
    line-height: 2.25rem;
    font-weight: 500;
    display: flex;
}

.ZbTJwf {
    letter-spacing: .00625em;
    font-family: 'Google Sans',Roboto,Arial,sans-serif;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.5rem;
    font-weight: 400;
    color: #5f6368;
    font-size:16px;
}

.progress-bar-container {
  height: 50px;
  margin: 50px 0px;
  background: black;
  position:relative; /* relative here */
}

.progress-bar-indicator-bronze {
  height: 100%;
  border-radius: 25px;
   /* this will do the magic */
  -webkit-mask:linear-gradient(#fff 0 0);
          mask:linear-gradient(#fff 0 0);
}
.progress-bar-indicator-bronze::before {
  content:"";
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-image: linear-gradient(to right, #e6ab83 , #855325 ); /* your gradient here */
}

.progress-bar-indicator-silver {
  height: 100%;
  border-radius: 25px;
   /* this will do the magic */
  -webkit-mask:linear-gradient(#fff 0 0);
          mask:linear-gradient(#fff 0 0);
}
.progress-bar-indicator-silver::before {
  content:"";
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-image: linear-gradient(to right, #c4c7cc , #858b94 ); /* your gradient here */
}

.progress-bar-indicator-gold {
  height: 100%;
  border-radius: 25px;
   /* this will do the magic */
  -webkit-mask:linear-gradient(#fff 0 0);
          mask:linear-gradient(#fff 0 0);
}
.progress-bar-indicator-gold::before {
  content:"";
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-image: linear-gradient(to right, #f2cf32 , #d1a803 ); /* your gradient here */
}

.progress-bar-indicator-platinum {
  height: 100%;
  border-radius: 25px;
   /* this will do the magic */
  -webkit-mask:linear-gradient(#fff 0 0);
          mask:linear-gradient(#fff 0 0);
}
.progress-bar-indicator-platinum::before {
  content:"";
  position:absolute;
  top:0;
  left:0;
  right:0;
  bottom:0;
  background-image: linear-gradient(to right, #cedee5 , #8fa5b3 ); /* your gradient here */
}

.progress {
    height: 15px !important;
    width: 35% !important;
    margin-right: 100px;
    border-radius: 25px;
}

.progress {
    height: 15px !important;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
    box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
    border-radius: 25px !important;
}

.nav-tabs {
    border-bottom: transparent !important;
}
a {

    text-decoration: none !important;
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
    <?php $page='memtravelpoints'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
      <h2 style="margin-left:30px;">Travel Points
        <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <center>
        <div style="margin-top:10%">
        <div style="position:relative;bottom:130px;background-size: cover;width:100%;height:50%;background-image: url('https://www.pnglib.com/wp-content/uploads/2020/11/white-wave_5fb280dde871c.png');overflow:auto;">

        
<div style="margin-top:150px;">

        
        <!-- Bronze start ----->
<?php
        
        if($row['cus_totalearnedtp']<150){
?>
<div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/bronze.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#9E6839;font-size:28px;position:relative;bottom:50px;margin-left:450px;margin-top:100px" class="Bzct0b">Bronze</span>
<div><span class="ZbTJwf" style="position:relative;bottom:20px;right:90px">Earning 1 points per Rs.100</span></div>

<span style="position:relative;left:270px;color:#595959;font-size:16px;bottom:75px"><?php echo $row['cus_travelpoints'];?></span>
<button style="position:relative;left:180px;border:1px solid #dadce0;z-index:100;background-color: transparent;color:#9E6839;bottom:42px">Level Benefits</button>

<?php $neededpoints = 150 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/150)*100;
   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-bronze" style="width: <?php echo $new; ?>%"></div>
</div>
<div class="ZbTJwf" style="position:relative;right:128px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to <span style="font-weight: bold;"> Gold</span></div>

<div><img src="../img/star.gif" style="position:relative;left:170px;bottom:190px;width:125px;height:100px"></div>
      <?php  }
        
        ?>
<!-- Bronze END ----->



<!-- SIlver start ----->
<?php
        
        if($row['cus_totalearnedtp']>=150 && $row['cus_totalearnedtp']<600){
?>
<div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/silver.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#6F7785;font-size:28px;position:relative;bottom:50px;margin-left:450px;margin-top:100px" class="Bzct0b">Silver</span>
<div><span class="ZbTJwf" style="position:relative;bottom:20px;right:82px">Earning 1.1 points per Rs.100</span></div>

<span style="position:relative;left:270px;color:#595959;font-size:16px;bottom:75px"><?php echo $row['cus_travelpoints'];?></span>
<button style="position:relative;left:180px;border:1px solid #dadce0;z-index:100;background-color: transparent;color:#6F7785;bottom:42px">Level Benefits</button>

<?php $neededpoints = 600 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/600)*100;
   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-silver" style="width: <?php echo $new; ?>%"></div>
</div>
<div class="ZbTJwf" style="position:relative;right:128px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to <span style="font-weight: bold;"> Gold</span></div>

<div><img src="../img/star.gif" style="position:relative;left:170px;bottom:190px;width:125px;height:100px"></div>
      <?php  }
        
        ?>
<!-- SIlver END ----->



<!-- Gold start ----->
<?php
        
        if($row['cus_totalearnedtp']>=600 && $row['cus_totalearnedtp']<3000){
?>
<div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/gold.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#6F7785;font-size:28px;position:relative;bottom:50px;margin-left:450px;margin-top:100px" class="Bzct0b">Gold</span>
<div><span class="ZbTJwf" style="position:relative;bottom:20px;right:82px">Earning 1.2 points per Rs.100</span></div>

<span style="position:relative;left:270px;color:#595959;font-size:16px;bottom:75px"><?php echo $row['cus_travelpoints'];?></span>
<button style="position:relative;left:180px;border:1px solid #dadce0;z-index:100;background-color: transparent;color:#6F7785;bottom:42px">Level Benefits</button>

<?php $neededpoints = 3000 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/3000)*100;
   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-gold" style="width: <?php echo $new; ?>%"></div>
</div>
<div class="ZbTJwf" style="position:relative;right:108px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to <span style="font-weight: bold;"> Platinum</span></div>

<div><img src="../img/star.gif" style="position:relative;left:170px;bottom:190px;width:125px;height:100px"></div>
      <?php  }
        
        ?>
<!-- Gold END ----->



<!-- Platinum start ----->
<?php
        
        if($row['cus_totalearnedtp']>=3000){
?>
<div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/platinum.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#6F7785;font-size:28px;position:relative;bottom:50px;margin-left:450px;margin-top:100px" class="Bzct0b">Platinum</span>
<div><span class="ZbTJwf" style="position:relative;bottom:20px;right:82px">Earning 1.4 points per Rs.100</span></div>

<span style="position:relative;left:270px;color:#595959;font-size:16px;bottom:75px"><?php echo $row['cus_travelpoints'];?></span>
<button style="position:relative;left:180px;border:1px solid #dadce0;z-index:100;background-color: transparent;color:#6F7785;bottom:42px">Level Benefits</button>

<?php $neededpoints = 4000 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/4000)*100;
   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-platinum" style="width: <?php echo $new; ?>%"></div>
</div>
<div class="ZbTJwf" style="position:relative;right:38px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to stay on platinum through <span style="font-weight: bold;"> 2022</span></div>

<div><img src="../img/star.gif" style="position:relative;left:170px;bottom:190px;width:125px;height:100px"></div>
      <?php  }
        
        ?>
<!-- Platinum END ----->




        </div>
</div>
        <!---nav startttttt ---->
        <nav style="position:relative;bottom:152px;border-bottom:hidden">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    
    <a class="nav-item nav-link active" id="nav-silver-tab" style="position:relative;margin-right:1100px;bottom:28px;font-weight:bold;font-size:16px;color:#5f6368" data-toggle="tab" href="#use" role="tab" aria-controls="nav-use" aria-selected="false">Use</a>
   
  </div>
</nav>


<div class="tab-content" id="nav-tabContent" style="float:left;margin-left:30px;position:relative;bottom:90px">

  <div class="fade in active" id="use" role="tabpanel" aria-labelledby="nav-silver-tab">
  
  <form name="form" class="fade-in" action="member-reserveticket.php" method="post">
  
  
  <div style="margin-bottom:0px;">
  <div style="height:90px;width:90px;border-radius:10px;background-color:black">
  <img src="../img/logo.png" style="height:50px;width:50px;margin-top:20px">
  </div>
  <span style="position:relative;left:180px;bottom:30px;font-weight:bold">Rs. 180 SwiftWay Credits</span>
  <div>
    <img src="../img/star.png" style="position:relative;left:150px;bottom:130px;width:125px;height:100px">
    <span style="position:relative;left:115px;bottom:127px;font-size:16px;font-weight:bold">100</span>
        </div>
        <?php 
        if($row['cus_travelpoints']>=100){
         
          echo "<input type='hidden' name='180redeem' value='180'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#100exampleModal' style='position:relative;left:505px;bottom:185px;'>Redeem</button><br>";
        }else{
         
          echo "<button type='button' class='btn btn-primary' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px;position:relative;left:505px;bottom:185px;' name='deletebtnnotallowed'>Unreedamble</button><br>";
        }
        ?>
  </div>

  <div style="">
  <div style="height:90px;width:90px;border-radius:10px;background-color:black">
  <img src="../img/logo.png" style="height:50px;width:50px;margin-top:20px">
  </div>
  <span style="position:relative;left:180px;bottom:30px;font-weight:bold">Rs. 400 SwiftWay Credits</span>
  <div>
    <img src="../img/star.png" style="position:relative;left:150px;bottom:130px;width:125px;height:100px">
    <span style="position:relative;left:115px;bottom:127px;font-size:16px;font-weight:bold">200</span>
        </div>
        <?php 
        if($row['cus_travelpoints']>=200){
         
          echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#200exampleModal' style='position:relative;left:505px;bottom:185px;'>Redeem</button><br>";
        }else{
         
          echo "<button type='button' class='btn btn-info' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px;position:relative;left:505px;bottom:185px;' name='deletebtnnotallowed'>Unreedamble</button><br>";
        }
        ?>
  </div>
         




  <div style="">
  <div style="height:90px;width:90px;border-radius:10px;background-color:black">
  <img src="../img/logo.png" style="height:50px;width:50px;margin-top:20px">
  </div>
  <span style="position:relative;left:180px;bottom:30px;font-weight:bold">Rs. 800 SwiftWay Credits</span>
  <div>
    <img src="../img/star.png" style="position:relative;left:150px;bottom:130px;width:125px;height:100px">
    <span style="position:relative;left:115px;bottom:127px;font-size:16px;font-weight:bold">390</span>
        </div>
        <?php 
        if($row['cus_travelpoints']>=390){
         
          echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#390exampleModal' style='position:relative;left:505px;bottom:185px;'>Redeem</button><br>";
        }else{
         
          echo "<button type='button' class='btn btn-info' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px;position:relative;left:505px;bottom:185px;' name='deletebtnnotallowed'>Unreedamble</button><br>";
        }
        ?>
  </div>
         




  
  <div style="">
  <div style="height:90px;width:90px;border-radius:10px;background-color:black">
  <img src="../img/logo.png" style="height:50px;width:50px;margin-top:20px">
  </div>
  <span style="position:relative;left:180px;bottom:30px;font-weight:bold">Rs. 1000 SwiftWay Credits</span>
  <div>
    <img src="../img/star.png" style="position:relative;left:150px;bottom:130px;width:125px;height:100px">
    <span style="position:relative;left:115px;bottom:127px;font-size:16px;font-weight:bold">480</span>
        </div>
        <?php 
        if($row['cus_travelpoints']>=480){
         
          echo "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#480exampleModal' style='position:relative;left:505px;bottom:185px;'>Redeem</button><br>";
        }else{
         
          echo "<button type='button' class='btn btn-info' style='background-color:#a6a6a6;border:none;cursor:not-allowed;padding:4px;position:relative;left:505px;bottom:185px;' name='deletebtnnotallowed'>Unreedamble</button><br>";
        }
        ?>
  </div>
         





         
         
                   
           </form>
                   
                   <!-- Form Ends -->


  </div>
  
</div>
<!---nav enddddddddd ---->


       
        </div>
      </center>
      



<!-- Modal -->
<div class="modal fade" id="100exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="position:relative;left:25%;top:25%;width:80%">
    <div class="modal-content" style="height:40%;width:50%;background-color:#fff">
      
      <div class="modal-body" style="margin-top:10px">
      
      <span style="margin-top:0px;font-size:18px;color:#333;font:500 20px Roboto,RobotoDraft,Helvetica,Arial,sans-serif;margin-left:220px;position:relative;bottom:33px">Rs. 180 SwiftWay Credits<img src="../img/star.png" style="position:relative;right:-15px;bottom:3px;width:125px;height:100px"><span style="position:relative;bottom:65px;float:right">100</span></span>
      
      <div style="height:130px;width:135px;border-radius:10px;background-color:black;position:relative;bottom:160px;left:20px">
  <img src="../img/logo.png" style="height:80px;width:80px;margin-top:30px;margin-left:25px">
  </div>

  <div style="position:relative;bottom:50px">
      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="180credits" value="180">
      <input type="hidden" name="100points" value="100">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">

      <div style="position:relative;bottom:130px;right:110px">
      <span style="color:black;font-size:14px;float:right">Travel Points: <img src="../img/star.gif" style="position:relative;right:35px;bottom:3px;width:125px;height:100px"><span style="position:relative;right:80px"> <?php echo (float)$row['cus_travelpoints']; ?></span></span><br>
      <span style="color:black;font-size:14px;float:right;position:relative;top:50px;left:135px">Current Credits: <?php echo (float)$row['cus_credit']; ?></span><br>
      <strong style="color:black;font-size:14px;float:right;word-break: break-all;width: 220px;position:relative;left:222px;top:60px">You are about to redeem Rs.180 SwiftWay Credits</strong>
        </div>
      <button type="submit" style="position:relative;left:510px;top:0px" name="btn180" class="btn btn-warning">Confirm</button>
      </form>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal End-->



<!-- Modal -->
<div class="modal fade" id="200exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="position:relative;left:25%;top:25%;width:80%">
    <div class="modal-content" style="height:40%;width:50%;background-color:#fff">
      
      <div class="modal-body" style="margin-top:10px">
      
      <span style="margin-top:0px;font-size:18px;color:#333;font:500 20px Roboto,RobotoDraft,Helvetica,Arial,sans-serif;margin-left:220px;position:relative;bottom:33px">Rs. 400 SwiftWay Credits<img src="../img/star.png" style="position:relative;right:-15px;bottom:3px;width:125px;height:100px"><span style="position:relative;bottom:65px;float:right">200</span></span>
      
      <div style="height:130px;width:135px;border-radius:10px;background-color:black;position:relative;bottom:160px;left:20px">
  <img src="../img/logo.png" style="height:80px;width:80px;margin-top:30px;margin-left:25px">
  </div>

  <div style="position:relative;bottom:50px">
      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="400credits" value="400">
      <input type="hidden" name="200points" value="200">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">

      <div style="position:relative;bottom:130px;right:110px">
      <span style="color:black;font-size:14px;float:right">Travel Points: <img src="../img/star.gif" style="position:relative;right:35px;bottom:3px;width:125px;height:100px"><span style="position:relative;right:80px"> <?php echo (float)$row['cus_travelpoints']; ?></span></span><br>
      <span style="color:black;font-size:14px;float:right;position:relative;top:50px;left:135px">Current Credits: <?php echo (float)$row['cus_credit']; ?></span><br>
      <strong style="color:black;font-size:14px;float:right;word-break: break-all;width: 220px;position:relative;left:222px;top:60px">You are about to redeem Rs.400 SwiftWay Credits</strong>
        </div>
      <button type="submit" style="position:relative;left:510px;top:0px" name="btn400" class="btn btn-warning">Confirm</button>
      </form>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal End-->




<!-- Modal -->
<div class="modal fade" id="390exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="position:relative;left:25%;top:25%;width:80%">
    <div class="modal-content" style="height:40%;width:50%;background-color:#fff">
      
      <div class="modal-body" style="margin-top:10px">
      
      <span style="margin-top:0px;font-size:18px;color:#333;font:500 20px Roboto,RobotoDraft,Helvetica,Arial,sans-serif;margin-left:220px;position:relative;bottom:33px">Rs. 800 SwiftWay Credits<img src="../img/star.png" style="position:relative;right:-15px;bottom:3px;width:125px;height:100px"><span style="position:relative;bottom:65px;float:right">390</span></span>
      
      <div style="height:130px;width:135px;border-radius:10px;background-color:black;position:relative;bottom:160px;left:20px">
  <img src="../img/logo.png" style="height:80px;width:80px;margin-top:30px;margin-left:25px">
  </div>

  <div style="position:relative;bottom:50px">
      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="800credits" value="800">
      <input type="hidden" name="390points" value="390">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">

      <div style="position:relative;bottom:130px;right:110px">
      <span style="color:black;font-size:14px;float:right">Travel Points: <img src="../img/star.gif" style="position:relative;right:35px;bottom:3px;width:125px;height:100px"><span style="position:relative;right:80px"> <?php echo (float)$row['cus_travelpoints']; ?></span></span><br>
      <span style="color:black;font-size:14px;float:right;position:relative;top:50px;left:135px">Current Credits: <?php echo (float)$row['cus_credit']; ?></span><br>
      <strong style="color:black;font-size:14px;float:right;word-break: break-all;width: 220px;position:relative;left:222px;top:60px">You are about to redeem Rs.800 SwiftWay Credits</strong>
        </div>
      <button type="submit" style="position:relative;left:510px;top:0px" name="btn800" class="btn btn-warning">Confirm</button>
      </form>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal End-->




<!-- Modal -->
<div class="modal fade" id="480exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="position:relative;left:25%;top:25%;width:80%">
    <div class="modal-content" style="height:40%;width:50%;background-color:#fff">
      
      <div class="modal-body" style="margin-top:10px">
      
      <span style="margin-top:0px;font-size:18px;color:#333;font:500 20px Roboto,RobotoDraft,Helvetica,Arial,sans-serif;margin-left:220px;position:relative;bottom:33px">Rs. 1000 SwiftWay Credits<img src="../img/star.png" style="position:relative;right:-15px;bottom:3px;width:125px;height:100px"><span style="position:relative;bottom:65px;float:right">480</span></span>
      
      <div style="height:130px;width:135px;border-radius:10px;background-color:black;position:relative;bottom:160px;left:20px">
  <img src="../img/logo.png" style="height:80px;width:80px;margin-top:30px;margin-left:25px">
  </div>

  <div style="position:relative;bottom:50px">
      <form method="get" action="modal/redeemcouponmodal.php">
      <input type="hidden" name="1000credits" value="1000">
      <input type="hidden" name="480points" value="480">
      <input type="hidden" name="cusid" value="<?php echo $row['cus_id']; ?>">

      <div style="position:relative;bottom:130px;right:110px">
      <span style="color:black;font-size:14px;float:right">Travel Points: <img src="../img/star.gif" style="position:relative;right:35px;bottom:3px;width:125px;height:100px"><span style="position:relative;right:80px"> <?php echo (float)$row['cus_travelpoints']; ?></span></span><br>
      <span style="color:black;font-size:14px;float:right;position:relative;top:50px;left:135px">Current Credits: <?php echo (float)$row['cus_credit']; ?></span><br>
      <strong style="color:black;font-size:14px;float:right;word-break: break-all;width: 220px;position:relative;left:222px;top:60px">You are about to redeem Rs.1000 SwiftWay Credits</strong>
        </div>
      <button type="submit" style="position:relative;left:510px;top:0px" name="btn1000" class="btn btn-warning">Confirm</button>
      </form>
      </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal End-->


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
    $('#nav-tab a').on('load', function (e) {
 
  $('#nav-tab a[href="#bronze"]').tab('show')
})

$('#nav-bronze-tab a').on('load', function (e) {
  e.preventDefault()
  $('#nav-bronze-tab a[href="#bronze"]').tab('show')
})
    </script>

</body>

</html>

<?php } ?>