<?php
//Start the Session
session_start();

error_reporting(0);
if(strlen($_SESSION['adminlogin'])==0)
    {   
header('location:admin-login.php');
}
else{
	
//including the database connection file.
include_once("../connect.php");
//including the database connection file.

?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="../img/logo.png">

    
    <title>Profile, SwiftWay - Sri Lanka Railways</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />
<script type="text/javascript" src="../js/tog.js"></script>





<style>

input:invalid { color: gray !important; } 
.modal-content  {
    -webkit-border-radius: 30px !important;
    -moz-border-radius: 30px !important;
    border-radius: 30px !important; 
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
<?php $page='adprofile'; include_once("assets/admin-nav.php"); ?>
    <div class="main-panel">

    
  
    <h2 style="margin-left:30px;">Profile <!--<img id="theme-toggle" src="../img/togglethemee.png" style="cursor:pointer;width:40px;position:relative;left:75%" >--> 
    <div id="theme-toggle" style="cursor:pointer; position:absolute;left:93%;top:15px"><span class="sunandmoon"></span></div></h2>
      <hr style="width:92%;margin-left:30px;opacity: 0.5;border-width: 2;">
    



      <div class="page-content page-container" id="page-content">
    <div style="padding: 3rem !important">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card" style="overflow:hidden">
                    <div class="row cardbg" style="margin-right: 0px;margin-left: 0px">
                        <div class="col-sm-4 bg-c-lite-green" style="padding: 20px 0">
                            <div class="text-center text-white" style="padding: 1.25rem">
                            



                                <div class="m-b-25">
                                <?php $sql = mysqli_query($conn, "SELECT * FROM admin WHERE ad_username = '$_SESSION[adminlogin]'");
$row= mysqli_fetch_assoc($sql);

if($row['ad_profileimg']==null){
  ?><div><img src="https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg" style="height:300px;width:300px;border-radius: 100%;position:relative;top:70px" alt="User-Profile-Image"></div><?php
}else{?>
  <div><img src="uploads/<?=$row['ad_profileimg']?>" style="height:300px;width:300px;border-radius: 100%;position:relative;top:70px" alt="Admin-Profile-Image"></div><?php
}
?></div>
  <?php if (isset($_GET['fail'])): ?>
		<p><?php echo $_GET['fail']; ?></p>
	<?php endif ?>
  <?php if (isset($_GET['pass'])): ?>
		<p><?php echo $_GET['pass']; ?></p>
	<?php endif ?>
	
                                <p style="text-transform:uppercase;font-size:20px;color:#fff"><strong><?php echo $row['ad_name']; ?></strong></p>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div style="padding: 1.25rem">
                                <h2 class="" style="margin-bottom: 20px">Information</h2>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="">Name</h4>
                                        <h6 style="text-transform:capitalize;"><?php echo $row['ad_name']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <h4 class="">Email</h4>
                                        <h6><?php echo $row['ad_email']; ?></h6>
                                    </div>
                                    <div style="margin-top:80px" id="content-desktop">
                                    
                                    <div class="col-sm-6">
                                    <h4 class="">Gender</h4>
                                        <h6 class=""><?php echo $row['ad_gender']; ?></h6>
                                    </div>
                                    </div>
                                    <div id="content-mobile">
                                    
                                    <div class="col-sm-6">
                                        <h4 class="">Gender</h4>
                                        <h6 class=""><?php echo $row['ad_gender']; ?></h6>
                                    </div>
                                    </div>
                           
                                    <button type="button" style="position:relative;float:right;right:10px;top:180px" class="btn btn-success" name="changepwbtn" data-toggle="modal" data-target="#changepwModal">Change Password</button>
                                    <button type="submit" style="position:relative;float:right;right:30px;top:180px" class="btn btn-primary" name="editbtn" data-toggle="modal" data-target="#myModal">Edit</button>
                              
                                </div>
                                
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      


<!----------------------modal---------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:13%;top:13%;width:60%" >
    <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
      <div class="modal-header" style="height:70px;text-align:center">
        <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Edit Account</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-top:30px">
      
      
      <div style="color:grey;">
      
  
                                <form action="modal/manageadminprofilemodal.php" method="post" enctype="multipart/form-data">
                                <p style="color:black">Update Profile Picture</p>

                                  <input type="file" 
                                        name="my_image" style="background-color:black;position:relative;" >

                                  <input type="submit" name="submit" value="Upload" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:10px">
                            
                                </form>
                                <br>
                                <hr>
                                <form method="get" action="modal/manageadminprofilemodal.php">

                                <p style="color:black">Change Name</p>
                                <input class="form-control" style="width:40%" type="text" name="newname" required placeholder="New Name"/>

                                <br>
                                <input class="form-control" style="width:40%" type="text" name="username" required placeholder="Username"/>
                                <br>

                                <input class="form-control" style="width:40%" type="password" name="cpw" required placeholder="Current Password"/>

                                <input type="submit" name="changenamebtn" value="Save" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;top:10px">
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

<!----------------------change pw modal---------->

<div class="modal fade" id="changepwModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document" style="position:relative;left:8%;top:13%;height:80%" >
    <div class="modal-content" style="height:70%;width:80%;background-color:#fff">
      <div class="modal-header" style="height:70px;text-align:center">
        <h3 class="modal-title" id="exampleModalLongTitle" style="" ><strong style="margin-top:500px;color:#bfbfbf;">Change Account Password</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:relative;top:-40;color:#000000">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-top:30px">
      
      
      <div style="color:grey;position:relative;left:35px;margin-top:20px">

      <form method="get" action="modal/manageadminprofilemodal.php">
           
                                
                                <input class="form-control" style="width:80%" type="text" name="username" required placeholder="Username"/>


                                <br>

                                <input class="form-control" style="width:80%" type="password" name="cpw" required placeholder="Current Password"/>

                                <br>

                                <input class="form-control" style="width:80%" type="password" name="newpw" required placeholder="New Password"/>

                                <input type="submit" name="changepwbtn" value="Save" class="btn btn-primary" style="background-color:black;border:none;position:relative;float:right;right:50px;top:50px">
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
