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
a.active>a#nav-platinum-tab.nav-item.nav-link a.active{
  color:black !important;
}

a:active#nav-bronze-tab {
  color: #9E6839 !important;
}
a:active#nav-silver-tab {
  color: #6F7785 !important;
}
a:active#nav-gold-tab {
  color: #f2cf32 !important;
}
a:active#nav-platinum-tab {
  color: #6F7785 !important;
}
a{
  text-decoration:none !important;
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
     
      <h3 style="margin-left:160px;margin-top:100px;color:grey;">Levels</h3>
      <center>
        <div style="margin-top:10%">
        <div style="position:relative;bottom:130px;background-size: cover;width:100%;height:100%;background-image: url('https://www.pnglib.com/wp-content/uploads/2020/11/white-wave_5fb280dde871c.png');overflow:auto;">

        
<div style="margin-top:120px;">

   
        <!---nav startttttt ---->
        <nav style="float:left;margin-left:160px;">
  <div class="nav nav-tabs" id="nav-tab" role="tablist" style="position:relative;z-index:1000;bottom:50px;font-size:16px">
    <a class="nav-item nav-link active" id="nav-bronze-tab" data-toggle="tab" href="#bronze" role="tab" aria-controls="nav-home" aria-selected="true" style="">Bronze</a>
    <a class="nav-item nav-link" id="nav-silver-tab" data-toggle="tab" href="#silver" role="tab" aria-controls="nav-profile" aria-selected="false" style="margin-left:20px">Silver</a>
    <a class="nav-item nav-link" id="nav-gold-tab" data-toggle="tab" href="#gold" role="tab" aria-controls="nav-contact" aria-selected="false" style="margin-left:20px">Gold</a>
    <a class="nav-item nav-link" id="nav-platinum-tab" data-toggle="tab" href="#platinum" role="tab" aria-controls="nav-contact" aria-selected="false" style="margin-left:20px">Platinum</a>
  </div>
</nav>


<div class="tab-content" id="nav-tabContent" style="position:relative;right:150px;top:100px">

<!--bronze-->
  <div class="fade in active" id="bronze" role="tabpanel" aria-labelledby="nav-bronze-tab">

  <div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/bronze.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#9E6839;font-size:28px;position:relative;bottom:20px;margin-left:450px;margin-top:100px;" class="Bzct0b">Bronze Benefits</span>
<div><span class="ZbTJwf" style="position:relative;top:100px;z-index:1000;right:230px;"><img src="../img/star.gif" style="position:relative;left:20px;bottom:2px;width:125px;height:100px">Earn 1 point per Rs.100<br>
<p align="left" style="max-width:200px;overflow:hidden;margin-left:155px;position:relative;bottom:30px" >Earn points when you purchase tickets from SwiftWay</p></span></div>







  </div>
<!--bronze end-->

<!--silver start-->
  <div class="tab-pane fade" id="silver" role="tabpanel" aria-labelledby="nav-silver-tab" style="position:relative;bottom:270px">
  <div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/silver.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#6F7785;font-size:28px;position:relative;bottom:30px;margin-left:450px;margin-top:100px" class="Bzct0b">Silver Benefits</span>

<?php $neededpoints = 150 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/150)*100;
   
   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-silver" style="width: <?php echo $new; ?>%"></div>
</div>
<?php if($row['cus_totalearnedtp']<150){ ?>
<div class="ZbTJwf" style="position:relative;right:100px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to unlock <span style="font-weight: bold;"> Silver</span></div>
<?php }else{
  ?>
  <div class="ZbTJwf" style="position:relative;right:90px;bottom:10px"><span>You have unlocked <span style="font-weight: bold;"> Silver</span></div>
<?php
} ?>
<div><span class="ZbTJwf" style="position:relative;top:50px;z-index:1000;right:230px;"><img src="../img/star.gif" style="position:relative;left:20px;bottom:2px;width:125px;height:100px">Earn 1.1 point per Rs.100<br>
<p align="left" style="max-width:200px;overflow:hidden;margin-left:143px;position:relative;bottom:30px" >Earn points when you purchase tickets from SwiftWay</p></span></div>



  </div>
    <!-- silver end -->

  <!-- Gold Start -->
  <div class="tab-pane fade" id="gold" role="tabpanel" aria-labelledby="nav-gold-tab" style="position:relative;bottom:270px">
    
  <div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/gold.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#f2cf32;font-size:28px;position:relative;bottom:30px;margin-left:450px;margin-top:100px" class="Bzct0b">Gold Benefits</span>


<?php $neededpoints = 600 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/600)*100;

   ?>
     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-gold" style="width: <?php echo $new; ?>%"></div>
</div>
<?php if($row['cus_totalearnedtp']<600){ ?>
<div class="ZbTJwf" style="position:relative;right:100px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to unlock <span style="font-weight: bold;"> Gold</span></div>
<?php }else{
  ?>
  <div class="ZbTJwf" style="position:relative;right:90px;bottom:10px"><span>You have unlocked <span style="font-weight: bold;"> Gold</span></div>
<?php
} ?>
<div><span class="ZbTJwf" style="position:relative;top:50px;z-index:1000;right:230px;"><img src="../img/star.gif" style="position:relative;left:20px;bottom:2px;width:125px;height:100px">Earn 1.2 point per Rs.100<br>
<p align="left" style="max-width:200px;overflow:hidden;margin-left:143px;position:relative;bottom:30px" >Earn points when you purchase tickets from SwiftWay</p></span></div>

  </div>
<!-- Gold End ---->

<!-- PLatinum start---->
  <div class="tab-pane fade" id="platinum" role="tabpanel" aria-labelledby="nav-platinum-tab" style="position:relative;bottom:270px">
    
  <div style="position:relative;bottom:60px;margin-left:290px">
<div id = "logo">


<img src="../img/platinum.png" style="height:140px;width:140px;">

</div>
        </div>
<span style="color:#6F7785;font-size:28px;position:relative;bottom:30px;margin-left:450px;margin-top:100px" class="Bzct0b">Platinum Benefits</span>


<?php $neededpoints = 3000 - $row['cus_totalearnedtp']; ?>


  <?php $new = ($row['cus_totalearnedtp']/3000)*100;

   ?>

     <div class="progress active" style="position:relative;margin-left:175px;bottom:10px">
<div class="progress-bar progress-bar-indicator-platinum" style="width: <?php echo $new; ?>%"></div>
</div>
<?php if($row['cus_totalearnedtp']<3000){ ?>
<div class="ZbTJwf" style="position:relative;right:80px;bottom:10px"><span style="font-weight: bold;"><?php echo $neededpoints; ?></span> pts to unlock <span style="font-weight: bold;"> Platinum</span></div>
<?php }else{
  ?>
  <div class="ZbTJwf" style="position:relative;right:80px;bottom:10px"><span>You have unlocked <span style="font-weight: bold;"> Platinum</span></div>
<?php
} ?>
  <div><span class="ZbTJwf" style="position:relative;top:50px;z-index:1000;right:230px;"><img src="../img/star.gif" style="position:relative;left:20px;bottom:2px;width:125px;height:100px">Earn 1.4 point per Rs.100<br>
<p align="left" style="max-width:200px;overflow:hidden;margin-left:143px;position:relative;bottom:30px" >Earn points when you purchase tickets from SwiftWay</p></span></div>

<div style="float:right;position:relative;bottom:130px"><span class="ZbTJwf" style="position:relative;top:50px;z-index:1000;right:300px;"><img src="../img/phone.png" style="position:relative;left:0px;bottom:2px;width:24px;height:24px"><span style="position:relative;left:20px">Premium Support</span><br>
<p align="left" style="max-width:200px;overflow:hidden;margin-left:143px;position:relative;bottom:-10px" >Enjoy customer support with faster response times and dedicated agents, available 24/7</p></span></div>

    </div>
  <!-- PLatinum End ---->


  </div>
<!---nav enddddddddd ---->
</div>
</div>

       
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
  
</body>

</html>

<?php } ?>