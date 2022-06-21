<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("../connect.php");
//including the database connection file.




error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:member-login.php');
}
else{

?>
<html lang="en">
<head>
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
<!--<link id="theme" rel="stylesheet" type="text/css" href="../css/dark-theme.css" />-->
<script type="text/javascript" src="../js/tog.js"></script>





<style>
select:invalid {
      color: gray !important;
    }

    @keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in {
  animation: fade-in 1s;
}


body {
    font: 14px/22px "Raleway", Arial, Helvetica, sans-serif;
    color: #555;

overflow-x:hidden;
	 
}
.progress-bar {
    background-color: #673AB7
}
</style>


</head>
<body style="background-color: #242424;">
<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);
//$obk = json_decode($_GET["y"], false);
//echo $obj;
//echo $obk;
//var_dump($_POST);
//echo $_POST['datee'];

if(isset($_GET["s"])){

  //echo $obj;
  $obko = json_decode($_GET["y"], false);
//echo $obko;


if(!empty($_GET["q"]) && $_GET["d"]=="Destination"){
   $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_departuredt LIKE '%$_GET[q]%' AND tr_postalcode='$obko' AND trainclass.cl_occupiedseats<trainclass.cl_seatcap");
  //echo "date is not empty destination is";
}

if(empty($_GET["q"]) && $_GET["d"]!=="Destination"){
 // echo "date is empty destination is NOT";
   $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_postalcode='$obko' AND tr_destination LIKE '%$_GET[d]%' AND trainclass.cl_occupiedseats<trainclass.cl_seatcap");

}

if(!empty($_GET["q"]) && $_GET["d"]!=="Destination"){
  //echo "Both aren't empty";
   $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_departuredt LIKE '%$_GET[q]%' AND tr_postalcode='$obko' AND tr_destination LIKE '%$_GET[d]%' AND trainclass.cl_occupiedseats<trainclass.cl_seatcap");
}

if(empty($_GET["q"]) && $_GET["d"]=="Destination"){
  //echo "Both aren't empty";
  $res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_postalcode='$obko' AND trainclass.cl_occupiedseats<trainclass.cl_seatcap");
}

 //$res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_departuredt LIKE '%$_GET[q]%' AND tr_postalcode='$obko' AND tr_destination LIKE '%$_GET[d]%' ");
//if no match found
if(mysqli_num_rows($res)==0)
{
  
  echo "<div style='position:relative;right:20px'>Sorry no trains found matching the search criteria</div>";
}
//if match found 
else
{
  while($row= mysqli_fetch_assoc($res))
  {
    ?>

        <form name="form" class="fade-in" action="member-reserveticket.php" method="get">
          <?php
          echo "<div style='padding:35px 20px;background-color:#0d0d0d;width:80%;border-radius:10px;margin: 15px;color:#e6e6e6;position:relative;margin-right:70px'>";
          echo "<img src='../img/train.png' style='height:60px;width:70px;float:left;position:relative;top:-10'>"; 
          echo "<strong style='font-size:20px;position:relative;top:-20;float:left;'>". "Train number . ". $row['tr_number'] . " - " . $row ['tr_name'] . " - " . $row ['tr_type'] ."</strong>";
          echo "<br>";
          echo "<span style='font-size:14px;position:relative;top:0;float:left;left:65px'>". $row ['tr_source'] . "</span>" ."<i class='fal fa-long-arrow-alt-right' style='margin-left:100px;margin-right:20px;font-size:30px;float:left;position:relative;'></i>". "<span style='font-size:14px;position:relative;top:0;float:left;left:20px'>". $row ['tr_destination'] . "</span>" ;
         echo "<span style='font-size:14px;position:relative;top:30;left:-30%;'>". $row ['tr_departuredt']. "</span>";
         echo "<span style='font-size:14px;position:relative;top:30;left:-27%;'>". $row ['tr_arrivaldt']. "</span>";
         
         //
        echo "<input type='hidden' name='classid' value=$row[cl_id] />";
  
          echo "<a style='color:white;text-decoration:none'><button class='custom-button reserve-button' style='border-radius:10px;float:right;background-color:#673AB7;position:relative;top:-20;padding:10px;font-size:12px' 
          type='submit' name='reserve'><span>Reserve</span></button></a>";
          echo "<strong style='font-size:20px;position:relative;top:-19;float:right;right:3%;margin-right:50px'>" . " Class Name "."</strong>"."<strong style='font-size:18px;position:relative;top:-40;float:right;right:5%;margin-right:200px'>"." No of Passengers "."</strong>";
          echo "<div style='position:absolute;margin-top:-70px;right:3%;z-index:100;font-size:17px;'><strong style='font-size:20px'>Rs. </strong>". $row ['cl_price']. "</div>";
            
          echo "<span style='text-transform: uppercase;position:absolute;top:13;float:left;left:66%;font-size:17px;'> Available Seats: ". $row ['cl_seatcap']-$row['cl_occupiedseats']. "</span>";
          echo "<br>";
          echo "<span style='text-transform: uppercase;position:absolute;top:75;float:left;left:70.5%;font-size:17px;'>". $row ['cl_name']. "</span>";
         
          
          echo "<input type=number value='1' min=1 max=20 class='count' name=passengers style='position:absolute;right:43%'>";

    
    
  
    echo "</div>";
    echo "</form>";
    
    

  }

}
}else{


$res=mysqli_query($conn, "SELECT train.tr_source,tr_number,tr_name,tr_type,tr_departuredt,tr_destination,tr_arrivaldt,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id WHERE tr_postalcode='$obj' AND trainclass.cl_occupiedseats<trainclass.cl_seatcap");
  while($row= mysqli_fetch_assoc($res))
    {
      ?>

          <form name="form" class="fade-in" action="member-reserveticket.php" method="get">
            <?php
           echo "<div style='padding:35px 20px;background-color:#0d0d0d;width:80%;border-radius:10px;margin: 15px;color:#e6e6e6;position:relative;margin-right:70px'>";
           echo "<img src='../img/train.png' style='height:60px;width:70px;float:left;position:relative;top:-10'>"; 
           echo "<strong style='font-size:20px;position:relative;top:-20;float:left;'>". "Train number . ". $row['tr_number'] . " - " . $row ['tr_name'] . " - " . $row ['tr_type'] ."</strong>";
           echo "<br>";
           echo "<span style='font-size:14px;position:relative;top:0;float:left;left:65px'>". $row ['tr_source'] . "</span>" ."<i class='fal fa-long-arrow-alt-right' style='margin-left:100px;margin-right:20px;font-size:30px;float:left;position:relative;'></i>". "<span style='font-size:14px;position:relative;top:0;float:left;left:20px'>". $row ['tr_destination'] . "</span>" ;
          echo "<span style='font-size:14px;position:relative;top:30;left:-30%;'>". $row ['tr_departuredt']. "</span>";
          echo "<span style='font-size:14px;position:relative;top:30;left:-27%;'>". $row ['tr_arrivaldt']. "</span>";
          
          //
         echo "<input type='hidden' name='classid' value=$row[cl_id] />";
   
           echo "<a style='color:white;text-decoration:none'><button class='custom-button reserve-button' style='border-radius:10px;float:right;background-color:#673AB7;position:relative;top:-20;padding:10px;font-size:12px' 
           type='submit' name='reserve'><span>Reserve</span></button></a>";
           echo "<strong style='font-size:20px;position:relative;top:-19;float:right;right:3%;margin-right:50px'>" . " Class Name "."</strong>"."<strong style='font-size:18px;position:relative;top:-40;float:right;right:5%;margin-right:200px'>"." No of Passengers "."</strong>";
           echo "<div style='position:absolute;margin-top:-70px;right:3%;z-index:100;font-size:17px;'><strong style='font-size:20px'>Rs. </strong>". $row ['cl_price']. "</div>";
             
           echo "<span style='text-transform: uppercase;position:absolute;top:13;float:left;left:66%;font-size:17px;'> Available Seats: ". $row ['cl_seatcap']-$row['cl_occupiedseats']. "</span>";
           echo "<br>";
           echo "<span style='text-transform: uppercase;position:absolute;top:75;float:left;left:70.5%;font-size:17px;'>". $row ['cl_name']. "</span>";
          
           
           echo "<input type=number value='1' min=1 max=20 class='count' name=passengers style='position:absolute;right:43%'>";
      
      
    
      echo "</div>";
      echo "</form>";
      
      
  
    }


}
  //echo "hi".$obj;
 


//print_r($dat);

// Takes raw data from the request
//$json = file_get_contents('php://checklocation.php');

// Converts it into a PHP object
//$data = json_decode($json);

//echo $data;

                }

?>
	<!--for slider-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
