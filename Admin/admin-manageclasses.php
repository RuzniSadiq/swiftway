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

    
    <title>Manage Classes, SwiftWay - Sri Lanka Railways</title>
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

    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
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
<?php $page='admanageclasses'; include_once("assets/admin-nav.php"); ?>
<?php 
if (isset($_GET['pass'])): ?>
  <p><?php echo $_GET['pass']; ?></p>
<?php endif ?>
<?php if (isset($_GET['fail'])): ?>
<p><?php echo $_GET['fail']; ?></p>
<?php endif;
?>
    <div class="main-panel">
  
    <h2 style="margin-left:30px;">Manage Classes <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">


      <div class="form-container" style="margin-top:40px;">
      <input type="submit" name="adnewclass" value="Add new Class" class="btn btn-info" data-toggle="modal" data-target="#addclassmodal" style="padding:10px;border:none;position:relative;float:right;top:10px;right: 15px">
      
     

<?php


$res=mysqli_query($conn, "SELECT train.tr_id,tr_number,trainclass.cl_name,cl_seatcap,cl_occupiedseats,cl_id,cl_price FROM train inner join trainclass ON train.tr_id = trainclass.tr_id");

?>
 <table id="myTable" class="display fade-in-element dataTables_wrapper dataTables_filter input" style="margin-top:100px;width:95%;margin-right:30px;font-size:13px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<thead style="cursor:pointer">
  <tr>
    
<th>Class ID</th>
<th>Train ID</th>
<th>Train Number</th>
<th>Class Name</th>
<th>Seat Capacity</th>
<th>Occupied Seats</th>
<th>Class Price</th>
<th>Actions</th>
  </tr>
</thead>
<?php
echo "<tbody>";
    while($row= mysqli_fetch_assoc($res))
			{
        
        
  
   echo "<tr style='text-align:left'>";
      
     
   echo "<td>"; echo $row['cl_id'];"</td>";
   echo "<td>"; echo $row['tr_id'];"</td>";
   echo "<td>"; echo $row['tr_number'];"</td>";
   echo "<td>"; echo $row['cl_name'];"</td>";
   echo "<td>"; echo $row['cl_seatcap'];"</td>";
   echo "<td>"; echo (float)$row['cl_occupiedseats'];"</td>";
   echo "<td>"; echo $row['cl_price'];"</td>";
      
      
      ?> <td><button type="button" class="btn btn-primary" name="editbtn" data-toggle="modal" data-target="#myModal<?php echo $row['cl_id'];?>"><i class="fal fa-edit"></i></button>
			<?php	echo "| <a href=\"admin-deleteclass.php?cl_id=$row[cl_id]\" onClick=\"return confirm('Are you sure you want to delete?' )\" style='color:white;text-decoration:none'><button type='button' class='btn btn-danger'><i class='fal fa-trash'></i></button></a></td>";
    
      

    echo "</tr>";?>
    <!----------------------modal not searched---------->

    <div class="modal fade" id="myModal<?php echo $row['cl_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
        <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Edit Class Details</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:30px">
          
          
          <div style="color:grey;">
          
      
        
          
                                    <form method="get" action="Modal/manageclassesmodal.php">


                                    <div class="row">
        <div class="column" style="position:relative;left:50px">
        <label style="">Class ID</label>
        <input class="form-control" style="width:70%" type="text" name="classid" readonly value="<?php echo $row['cl_id'];  ?>">
        <br>
        <label style="">Train Number</label>
        <input class="form-control" style="width:70%" type="text" name="trainnumber" readonly value="<?php echo $row['tr_number'];  ?>">
       
        <br>
        <label style="">Seat Capacity</label>
        <input class="form-control" style="width:70%" type="text" name="seatcap" value="<?php echo $row['cl_seatcap'];  ?>">
        <br>
        <label style="">Occupied Seats</label>
        <input class="form-control" style="width:70%" type="text" name="occupiedseats" value="<?php echo $row['cl_occupiedseats'];  ?>">
       
        


        </div>
        <div class="column" style="position:relative;left:50px">
        <label style="">Train ID</label>
        <input class="form-control" style="width:70%" type="text" readonly name="trainid" readonly value="<?php echo $row['tr_id'];  ?>">
        <br>
        <label style="">Class Name</label>
        <input class="form-control" style="width:70%" type="text" name="classname" value="<?php echo $row['cl_name'];  ?>">
        <br>
        <label>Class Price</label>
        
         <input class="form-control" style="width:70%" type="text" name="classprice" value="<?php echo $row['cl_price'];  ?>">
        <br>
       
        </div>
    </div>
                                   

                      
                                    

                                   
                                    
    <input type="submit" name="updatebtn" value="Update" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:10px">
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
 
 </div>
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
<!----------------------modal---------->

<div class="modal fade" id="addclassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
        <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Add Class</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:80px">
          
          
          <div style="color:grey;">
          
      
        
          
                                    <form method="get" action="Modal/manageclassesmodal.php">


                                    <div class="row">
       
        <div class="column" style="position:relative;left:50px">
        <label style="">Train ID</label>
        <input class="form-control" style="width:70%" type="text" name="trainid">
        <br>
        <label style="">Seat Capacity</label>
        <input class="form-control" style="width:70%" type="text" name="seatcap">

        </div>
        <div class="column" style="position:relative;left:50px">
        <label style="">Class Name</label>
        <input class="form-control" style="width:70%" type="text" name="classname">
        <br>
        <label>Class Price</label>
         <input class="form-control" style="width:70%" type="text" name="classprice">
        </div>
    </div>
                                   

                      
                                    

                                   
                                    
    <input type="submit" name="insertbtn" value="Add Class" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:40px">
    </form>
          </div>
          
          <div>
          
          </div>
          
          </div>
          
          
          </div>
            
         
          
        </div>
      </div>
      
    </div>
    
    <!----------------------modal end---------->

</body>

</html>


<?php }?>
