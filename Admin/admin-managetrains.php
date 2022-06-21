<?php

//including the database connection file.
include_once("../connect.php");

session_start();

error_reporting(0);
if(strlen($_SESSION['adminlogin'])==0)
    {   
header('location:../user-login.php');
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

    
    <title>Manage Trains, SwiftWay - Sri Lanka Railways</title>
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
    padding: 3px;
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
<?php $page='admanagetrain'; include_once("assets/admin-nav.php"); ?>
<?php 
if (isset($_GET['pass'])): ?>
  <p><?php echo $_GET['pass']; ?></p>
<?php endif ?>
<?php if (isset($_GET['fail'])): ?>
<p><?php echo $_GET['fail']; ?></p>
<?php endif;
?>
    <div class="main-panel">
  
    <h2 style="margin-left:30px;">Manage Trains <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">

      
     
      <div class="form-container" style="margin-top:40px;">
      <input type="button" name="updatebtn" value="Add new Train" class="btn btn-info" data-toggle="modal" data-target="#addnewtrainmodal" style="padding:10px;border:none;position:relative;float:right;top:10px;right: 15px">
  
      <div style="float:left;margin-bottom:20px;position:absolute;top:230px;left:30px;z-index:10">
  <form class="custom-form" method='get' action='assets/admin-generatereportspdf.php' >
    
<input class="form-control" type="month" style="height:35px;width:90%;box-shadow:none;padding:5px" name="date" required><br>
    <input type='submit' name="trainyo" style="float:right;position:relative;left:95px;bottom:53px;padding:4px;font-size:11px" class="btn btn-warning" value='Download PDF'>
  </form>
</div>

<?php

    

    // find out the number of results stored in database
    $result=mysqli_query($conn, "SELECT * FROM train Order by tr_id");
    
    

?>

<table id="myTable" class="display fade-in-element dataTables_wrapper dataTables_filter input" style="margin-top:100px;width:95%;margin-right:30px;font-size:13px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
<thead>
  <tr>
    
    <th >Train ID</th>
    <th >Train Number</th>
    <th >Train Name</th>
    <th >Train Type</th>
    <th >Train Source</th>
    <th style="width:80px">Train Destination</th>
    <th style="width:120px">Train Departure Date</th>
    <th style="width:120px">Train Arrival Date</th>
    <th >Train Status</th>
    <th  style="width:80px">Actions</th>
  </tr>
</thead>
<?php
echo "<tbody>";
    while($row= mysqli_fetch_assoc($result))
			{
        
        
  
   echo "<tr style='text-align:left'>";
      
     
      echo "<td>"; echo $row['tr_id'];"</td>";
      echo "<td>"; echo $row['tr_number'];"</td>";
      echo "<td>"; echo $row['tr_name'];"</td>";
      echo "<td style='text-transform:uppercase'>"; echo $row['tr_type'];"</td>";
      echo "<td>"; echo $row['tr_source'];"</td>";
      echo "<td>"; echo $row['tr_destination'];"</td>";
      echo "<td>"; echo $row['tr_departuredt'];"</td>";
      echo "<td>"; echo $row['tr_arrivaldt'];"</td>";
      if($row['tr_status']=="Available"){
        echo "<td style='color:green'><strong>"; echo $row['tr_status'];"</strong></td>";
     
        }else{
         echo "<td style='color:red'><strong>"; echo $row['tr_status'];"</strong></td>";
        }
      
      
      ?> <td><button type="button" class="btn btn-primary" name="editbtn" data-toggle="modal" data-target="#myModal<?php echo $row['tr_id'];?>"><i class="fal fa-edit"></i></button>
			<?php	echo "| <a href=\"admin-deletetrain.php?tr_id=$row[tr_id]\" onClick=\"return confirm('Are you sure you want to delete?' )\" style='color:white;text-decoration:none'><button type='button' class='btn btn-danger'><i class='fal fa-trash'></i></button></a></td>";
    
      

    echo "</tr>";?>
    <!----------------------modal edit train---------->

    <div class="modal fade" id="myModal<?php echo $row['tr_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:10%;width:60%" >
        <div class="modal-content" style="height:80%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Edit Train Details</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:30px">
          
          
          <div style="color:grey;">
          
      
        
          
                                    <form method="get" action="Modal/managetrainsmodal.php">


                                    <div class="row">
        <div class="column" style="position:relative;left:50px">
        <label style="">Train ID</label>
        <input class="form-control" style="width:70%" type="text" name="trainid" readonly value="<?php echo $row['tr_id'];  ?>">
        <br>
        <label style="">Train Name</label>
        <input class="form-control" style="width:70%" type="text" name="trainname" value="<?php echo $row['tr_name'];  ?>">
       
        <br>
        <label style="">Train Destination</label>
        <input class="form-control" style="width:70%" type="text" name="traindestination" value="<?php echo $row['tr_destination'];  ?>">
        <br>
        <label>Train Arrival Date</label>
        <?php $arrdt=date("Y-m-d\TH:i:s",strtotime($row ['tr_arrivaldt']));?>
        <input class="form-control" style="width:70%" type="datetime-local" step='any' name="trainarrivaldt" value="<?php echo $arrdt;  ?>" />
        <br>
        <label>Train Type</label>
        <input class="form-control" style="width:70%" type="text" name="traintype" value="<?php echo $row['tr_type'];  ?>">
        <br>
        


        </div>
        <div class="column" style="position:relative;left:50px">
        <label style="">Train Number</label>
        <input class="form-control" style="width:70%" type="text" readonly name="trainnumber" value="<?php echo $row['tr_number'];  ?>">
        <br>
        <label style="">Train Source</label>
        <input class="form-control" style="width:70%" type="text" name="trainsource" value="<?php echo $row['tr_source'];  ?>">
        <br>
        <label>Train Departure Date</label>
        <?php $depdt=date("Y-m-d\TH:i:s",strtotime($row ['tr_departuredt']));
        ?>
        <input class="form-control" style="width:70%" type="datetime-local" step='any' name="traindeparturedt" value="<?php echo $depdt  ?>" />
        <br>
        <label>Train Status</label>
        <select class="form-control" style="width:70%" name="trainstatus">
        <option>Available</option>
        <option>Unavailable</option>
        </select>
        <br>
        <label>Train Postal Code</label>
        <input class="form-control" style="width:70%" type="text" name="trainpostalcode" value="<?php echo $row['tr_postalcode'];  ?>">
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
  
<!----------------------modal add train---------->

<div class="modal fade" id="addnewtrainmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
      <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
        <div class="modal-content" style="height:75%;width:80%;background-color:#fff">
          <div class="modal-header" style="height:70px;text-align:center">
            <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Add Train</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="margin-top:30px">
          
          
          <div style="color:grey;">
          
      
        
          
          <form class="" method="get" style="position:relative;top:20px" action="Modal/managetrainsmodal.php">
<div class="row" style="">

<div class="column" style="position:relative;left:50px">
<label style="">Train Number</label>
<input class="form-control" style="width:70%" type="text" name="trainnumber" >
<br>
<label style="">Train Source</label>
<input class="form-control" style="width:70%" type="text" name="trainsource">
<br>
<label>Train Departure Date & Time</label>
<input class="form-control" style="width:70%" type="datetime-local" name="traindeparturedt" />
<br>
<label style="">Train Type</label>
<input class="form-control" style="width:70%;" type="text" name="traintype">
</div>

<div class="column" style="position:relative;left:50px">
<label style="">Train Name</label>
<input class="form-control" style="width:70%" type="text" name="trainname">
<br>
<label style="">Train Destination</label>
<input class="form-control" style="width:70%" type="text" name="traindestination">
<br>
<label>Train Arrival Date & Time</label>
<input class="form-control" style="width:70%" type="datetime-local" name="trainarrivaldt" />
<br>
<label style="">Train Postal Code</label>
<input class="form-control" style="width:70%;" type="text" name="trainpostalcode">
</div>
</div>







<input type="submit" name="insertbtn" value="Add Train" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:50px;right:20px;">

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

<?php include_once("assets/footer.php"); ?>

</body>

</html>


<?php }?>
