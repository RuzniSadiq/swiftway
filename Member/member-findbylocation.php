<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("../connect.php");
//including the database connection file.




error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:../user-login.php');
}
else{
  $d=mysqli_query($conn, "SELECT DISTINCT tr_destination FROM train");

?>
<html lang="en">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js">
</script>


    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Reserve Ticket, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>





<style>
select:invalid { color: gray !important; }
input:invalid { color: gray !important; } 

.swing-in-top-fwd {
  animation: swing-in-top-fwd 1s;
}

@keyframes swing-in-top-fwd {
  0% {
    transform: rotateX(-100deg);
    transform-origin: top;
    opacity: 0;
  }
  100% {
    transform: rotateX(0deg);
    transform-origin: top;
    opacity: 1;
  }
}

</style>


</head>
<body style="background-color: #242424;" onload="getLocation()">

	<!-- preloader -->
  <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<div class="wrapz">
<?php $page='memfindbylocation'; include_once("assets/member-nav.php"); ?>
    <div class="main-panel">
    <?php if (isset($_GET['fail'])): ?>
		<p><?php echo $_GET['fail']; ?></p>
	<?php endif ?>
  <?php if (isset($_GET['pass'])): ?>
		<p><?php echo $_GET['pass']; ?></p>
	<?php endif ?>
  <h2 style="margin-left:30px;">Find by Location - Reserve Ticket <div id="theme-toggle"
          style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div>
      </h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
      <h3 style="margin-left:30px;margin-top:50px;color:grey;">Select Train</h3>


      <center>
        <div class="form-container" style="margin-top:40px;">

          <div style="margin-left:60px;">

            <!-- progressbar -->
            <center>
              <ul id="progressbar">
                <li class="active" id="sdd"><strong>Choose Source, Destination and Date</strong></li>
                <li class="active" id="selecttrain"><strong>Select Train</strong></li>
                <li id="payment"><strong>Payment</strong></li>

              </ul>

              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                  aria-valuemin="0" aria-valuemax="100" style="width:66.6%"></div>
              </div> <br> <!-- fieldsets -->
            </center>
     
     
<form id="myForm" class="custom-form">
  <input id="datee" style="width:20%;height:35px;box-shadow:none; margin-right: 100px;margin-bottom:0px;" class="form-control" type="date" name="datee">
  <div class="form-group inputWithIcon">
              <i class="fal fa-map-marker-alt" style="right:0%;left: 180px;"></i>
              <select class="form-control" style="width:20%;height:5%; margin-right: 100px;" id="destination" name="destinationn">
              <option selected>Destination</option>
                            <?php while($v = mysqli_fetch_array($d))
{
  ?>
 
 
              <option><?php echo $v['tr_destination'];?></option>
              
  <?php
}
  ?>            
                
              </select>
              </div>
  <button id="submit" class='custom-button reserve-button' style="padding:2px;border-radius:5px;background-color:#673AB7;font-size:12px;position:relative;bottom:82px;left:120px" >  Search</button>
  </form>
 <div id="demooo"></div>





					</div>
				</div>




        
    
    </div>
</div>
</center>








      
  </div>
  </div>
    <!-- Page Ends -->

	<!--for slider-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
        $(window).on("load",function(){
			
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
     
<?php include_once("assets/footer.php"); ?>

</body>

<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {

      //const KEY = "AIzaSyC9jJr7nrrroroRVkusQ9cqC0J7-V5xlFg";
      const KEY = "AIzaSyAGRWGA0oJWw7dPm1VeVkckxXUs2Cadusw";
      
      const LAT = position.coords.latitude;
      const LNG = position.coords.longitude;
      let url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${LAT},${LNG}&key=${KEY}`;
      //ajax request
      fetch(url)
        .then(response => response.json())
        .then(data => {
          console.log(data);
          let parts = data.results[0].address_components;

parts.forEach(part => {
           
  if (part.types.includes("postal_code")) {
    console.log(part.long_name);
    const dbParam = JSON.stringify(part.long_name);
    const myForm = document.getElementById('myForm');
    xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
  document.getElementById("demooo").innerHTML = this.responseText;
}
    
    myForm.addEventListener('submit', function (e) {
      e.preventDefault();
    
    
      const datee=$("#datee").val();
      const destination=$("#destination").val();
      const submit=$("#submit").val();
      
xmlhttp.open("GET","readJson.php?y=" + dbParam + "&q=" + datee + "&d=" + destination + "&s=" + submit);
    
//xmlhttps.open("GET","readJson.php?y=" + datee + "&q=" + cakey);
xmlhttp.send();
    });
xmlhttp.open("GET","readJson.php?x=" + dbParam);
xmlhttp.send();
  }
});

        })
        
}

/*
function getLooocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosiition(posiition) {

const KEY = "AIzaSyC9jJr7nrrroroRVkusQ9cqC0J7-V5xlFg";
const LAT = posiition.coords.latitude;
const LNG = posiition.coords.longitude;
let url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${LAT},${LNG}&key=${KEY}`;
//ajax request
fetch(url)
  .then(response => response.json())
  .then(data => {
    console.log(data);
    let parts = data.results[0].address_components;

parts.forEach(part => {
     
if (part.types.includes("postal_code")) {
console.log(part.long_name);
const dbParam = JSON.stringify(part.long_name);

xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
document.getElementById("demooo").innerHTML = this.responseText;
}
xmlhttp.open("GET","readJson.php?x=" + dbParam);
xmlhttp.send();
}
});

  })
  
}

*/

    </script>
     <script type="text/javascript">
    
   
    
            </script>


</html>
<?php } ?>