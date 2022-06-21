<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/logo.png">

    
    <title>Home, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!--<link rel="stylesheet" type="text/css" href="../css/styles.css" />-->
<link id="theme" rel="stylesheet" type="text/css" href="css/light-theme.css" />
<style>
@keyframes move_wave {
    0% {
        transform: translateX(0) translateZ(0) scaleY(1)
    }
    50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55)
    }
    100% {
        transform: translateX(-50%) translateZ(0) scaleY(1)
    }
}
.waveWrapper {
    overflow: hidden;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    margin: auto;
    
}
.waveWrapperInner {
    position: absolute;
    width: 100%;
    overflow: hidden;
    height: 100%;
    /*
    bottom: -100px;
    background-image:url("../img/slrr.jpg");*/
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("img/slrr.jpg");
}
.bgTop {
    z-index: 15;
    opacity: 0.5;
}
.bgMiddle {
    z-index: 10;
    opacity: 0.75;
}
.bgBottom {
    z-index: 5;
}
.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}
.waveTop {
    background-size: 50% 100px;
}
.waveAnimation .waveTop {
  animation: move-wave 3s;
   -webkit-animation: move-wave 3s;
   -webkit-animation-delay: 1s;
   animation-delay: 1s;
}
.waveMiddle {
    background-size: 50% 120px;
}
.waveAnimation .waveMiddle {
    animation: move_wave 10s linear infinite;
}
.waveBottom {
    background-size: 50% 100px;
}
.waveAnimation .waveBottom {
    animation: move_wave 15s linear infinite;
}

.iframe-container{
  position: relative;
  width: 100%;
  padding-bottom: 56.25%; 
  height: 0;
}
.iframe-container iframe{
  position: absolute;
  top:0;
  left: 0;
  width: 100%;
  height: 100%;
}


	</style>
</head>
<body>
    <!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->

<section id="sectionhome">
                
				<img src="img/trans-nav.png" style="width:40%;z-index:50;position:relative;top:250px;left:420px;">
                <div style="z-index:50;position:relative;top:300px;left:40%;"><a class="btn btn-warning" style="" href="#sectionaboutus">Explore</a><a class="btn btn-primary" href="user-login.php" style="position:relative;left:8%;">Login</a></div> 
        <div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>
</section>

<section style="z-index:100;margin-top:700px;text-align:center" id="sectionaboutus">
<h1>About us</h1>
<p style="margin-right:500px;margin-left:500px">Sri Lanka Railways is a mass transport service provider and the country's only rail transportation organization. Sri Lanka Railways has some of the most spectacular and unforgettable rail journeys in the world. 
    Swiftway will enable you to experience a simple way to find out everything you need to know and provide the services to you digitally all in one easy place. 
    There's no better way to enjoy Sri Lanka's outback, cities, coastal towns and regional areas in comfort.</p>
    <!--<iframe style="border-radius:30px" width="560" height="315" src="https://www.youtube.com/embed/hRrPIK6Y8WY?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
    <video width="560" height="315" style="border-radius:30px" controls>
    <source src="img/index.mp4" type="video/mp4">
</video>
</section>

<section style="z-index:100;margin-top:100px;text-align:center" id="sectiontestimonials">
<h1>Testimonials</h1>
<center>
<div style="width:50%;height:100%;margin-bottom:400px">

<div style="position:relative;top:70px"><img src="img/testimonials/1.jpg" style="height:200px;width:200px;border-radius: 100%;position:relative;left:-250px" alt="User-Profile-Image">
<footer style="position:relative;right:250px;top:20px"><span>Serena Williams</span></footer>
<div id="fontawesime">
<span>
<p style="margin-left:300px;margin-right:30px;position:relative;bottom:130px">Simply reserved my ticket on SwiftWay. A user friendly system. Thank you!</p>
</span>
</div>
</div>

<div style="position:relative;top:70px"><img src="img/testimonials/2.jpg" style="height:200px;width:200px;border-radius: 100%;position:relative;left:250px" alt="User-Profile-Image">
<footer style="position:relative;top:20px;left:250px;"><span>Nuski Nizwar</span></footer>
<div id="fontawesime">
<span>
<p style="margin-right:300px;position:relative;bottom:130px">Really wonderful to have a website which provides the servies of Sri Lanka Railways digitally to reach us.</p>
</span>
</div>
</div>

<div style="position:relative;top:70px"><img src="img/testimonials/3.jpg" style="height:200px;width:200px;border-radius: 100%;position:relative;left:-250px" alt="User-Profile-Image">
<footer style="position:relative;right:250px;top:20px"><span>Charlotte Linlin</span></footer>
<div id="fontawesime">
<span>
<p style="margin-left:300px;margin-right:30px;position:relative;bottom:130px">Had to reserve a ticket to travel ASAP. It was possible using SwiftWay. Got my tickets reserved on a flash. </p>
</span>
</div>
</div></center>
</section>



        
        
    </body>
    <?php include_once('assets/footer-index.php')?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!--for slider-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
        $(window).on("load",function(){
			
          $(".loader-wrapper").delay(300).fadeOut("slow");
        });
    </script>
</html>
