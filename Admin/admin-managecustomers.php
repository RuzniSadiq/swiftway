<?php

//including the database connection file.
include_once("../connect.php");

session_start();

error_reporting(0);
if(strlen($_SESSION['adminlogin'])==0)
    {   
header('location:admin-login.php');
}
else{



?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Manage Customers, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>
<style> 
select:invalid { color: gray !important; } 
.column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    

@keyframes fade-in {
    from {opacity: 0; transform: scale(.07,.07)}
    to {opacity: 1;}
}
.fade-in-element {
  animation: fade-in 1s;
  
}
</style>
</head>
<body style="background-color: #242424;">
<!-- preloader -->
<div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>
	<!-- preloader end-->
<div class="wrapz">
<?php $page='admanagecustomers'; include_once("assets/admin-nav.php"); ?>
<?php 
if (isset($_GET['pass'])): ?>
  <p><?php echo $_GET['pass']; ?></p>
<?php endif ?>
<?php if (isset($_GET['fail'])): ?>
<p><?php echo $_GET['fail']; ?></p>
<?php endif;
?>
    <div class="main-panel">
  
    <h2 style="margin-left:30px;">Manage Customers <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">

      <div style="float:left;margin-bottom:20px;position:absolute;top:230px;left:30px;z-index:10">
  <form class="custom-form" method='get' action='assets/admin-generatereportspdf.php' >
    
<input class="form-control" type="month" style="height:35px;width:90%;box-shadow:none;padding:5px" name="date" required><br>
    <input type='submit' name="customeryo" style="float:right;position:relative;left:95px;bottom:53px;padding:4px;font-size:11px" class="btn btn-warning" value='Download PDF'>
  </form>
</div>
     
<?php

		
  $rez=mysqli_query($conn, "SELECT * FROM customer order by cus_id");

  ?>
  <table id="myTable" class="display fade-in-element dataTables_wrapper dataTables_filter input" style="margin-top:150px;width:95%;margin-right:30px;font-size:13px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
    <thead style="cursor:pointer">
  <tr>
    
<th>Customer ID</th>
<th>Customer Name</th>
<th>Email</th>
<th>Gender</th>
<th>Username</th>
<th>Contact Number</th>
<th>NIC Number</th>
<th>Customer Status</th>
<th style="width:120px;">Actions</th>
  </tr>
</thead>
<?php
echo "<tbody>";
    while($row= mysqli_fetch_assoc($rez))
			{
        
        
  
   echo "<tr style='text-align:left'>";
      
     
   echo "<td>"; echo $row['cus_id'];"</td>";
   echo "<td>"; echo $row['cus_name'];"</td>";
   echo "<td>"; echo $row['cus_email'];"</td>";
   echo "<td>"; echo $row['cus_gender'];"</td>";
   echo "<td>"; echo $row['cus_username'];"</td>";
   echo "<td>"; echo $row['cus_no'];"</td>";
   echo "<td>"; echo $row['cus_nicnum'];"</td>";
   if($row['cus_status']=="Active"){
   echo "<td style='color:green'><strong>"; echo $row['cus_status'];"</strong></td>";

   }elseif($row['cus_status']=="Blocked"){
    echo "<td style='color:red'><strong>"; echo $row['cus_status'];"</strong></td>";
   }elseif($row['cus_status']=="Pending"){
    echo "<td style='color:#4d4dff'><strong>"; echo $row['cus_status'];"</strong></td>";
   }
  
  ?> <td><button type="button" class="btn btn-light" name="editbtn" data-toggle="modal" data-target="#myModalshowmore<?php echo $row['cus_id'];?>"><span style="color:black;font-size:11px">Show more</span></button>
  | <button type="button" class="btn btn-primary" name="showmorebtn" data-toggle="modal" data-target="#myModal<?php echo $row['cus_id'];?>"><i class="fal fa-edit"></i></button>
  			<?php	echo "</td>";

  

echo "</tr>";?>

    
    
    
    
    
    <!----------------------modal show more ---------->

    <div class="modal fade" id="myModalshowmore<?php echo $row['cus_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
        <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Customer NIC Details</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:30px">
          
          
          <div style="color:grey;">
          <?php 
          $hu = $row['cus_id'];
          $sql = mysqli_query($conn, "SELECT * FROM customer WHERE cus_id = '$hu'");
$rowzy= mysqli_fetch_assoc($sql); ?>
<div style="position:relative;bottom:20px">
<label style="color:black;font-weight:300px">Customer ID:</label>
<label><?php echo $rowzy['cus_id']; ?></label><br>
<label style="color:black;font-weight:300px">Username:</label>
<label style="text-transform:uppercase"><?php echo $rowzy['cus_username']; ?></label>
  </div>

          <img src="../Member/uploads/NIC front side/<?=$rowzy['cus_NICFront']?>" style="width:300px;height:350px;border-radius:5px;margin-left:30px;position:relative;bottom:10px">
          <img src="../Member/uploads/NIC back side/<?=$rowzy['cus_NICBack']?>" style="width:300px;height:350px;border-radius:5px;margin-left:45px;position:relative;bottom:10px">
        
          
          </div>
          
          <div>
          
          </div>
          
          </div>
          
          
          </div>
            
         
          
        </div>
      </div>
      
    </div>
         
          
       
    
    <!----------------------modal end---------->
    
    
    
    <!----------------------modal searched ---------->

    <div class="modal fade" id="myModal<?php echo $row['cus_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
        <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Edit Customer Details</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:30px">
          
          
          <div style="color:grey;">
          
      
        
          
                                    <form method="get" action="Modal/managecustomersmodal.php">


                                    <div class="row">
        <div class="column" style="position:relative;left:50px">
        <label style="">Customer ID</label>
        <input class="form-control" style="width:70%" type="text" name="customerid" readonly value="<?php echo $row['cus_id'];  ?>">
        <br>
        <label style="">Customer Email</label>
        <input class="form-control" style="width:70%" type="text" name="customeremail" readonly value="<?php echo $row['cus_email'];  ?>">
       
        <br>
        <label style="">Customer Username</label>
        <input class="form-control" style="width:70%" type="text" readonly name="customerusername" value="<?php echo $row['cus_username'];  ?>">
        <br>
       
        


        </div>
        <div class="column" style="position:relative;left:50px">
        <label style="">Customer Name</label>
        <input class="form-control" style="width:70%" type="text" readonly name="customername" readonly value="<?php echo $row['cus_name'];  ?>">
        <br>
        <label style="">Customer Gender</label>
        <input class="form-control" style="width:70%" type="text" readonly name="customergender" value="<?php echo $row['cus_gender'];  ?>">
        <br>
        <label>Account Status</label>
        
         <select class="form-control" style="width:70%" type="text" name="customerstatus">
         <option>Active</option>
         <option>Blocked</option>
        <br>
       
        </div>
    </div>
                                   

                      
                                    

                                   
                                    
    <input type="submit" name="updatebtn" value="Update" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:50px;right:80px">
    </form>
          </div>
          
          <div>
          
          </div>
          
          </div>
          
          
          </div>
            
         
          
        </div>
      </div>
      
    </div>
    
    <!----------------------modal end----------><?php
  }

  echo "</tbody>";
  echo "</table>";
  ?>
<!-- form container Ends -->





 
  </div>
  </div>
    <!-- Page Ends -->

	<!--for slider-->
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/jquery.dataTables.js"></script>
  <script src="../js/dataTables.bootstrap.js"></script>
  
  
  <script>
  $("#myTable").dataTable( {
    //"dom": ;
    
    lengthMenu: [5, 10, 20, 50, 100, 200],
    //dom: 'Pfrtip' 
    columnDefs: [
    {
        targets: -1,
        className: 'dt-body-right'
    }
  ],

} );


  </script>


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


<?php }?>
