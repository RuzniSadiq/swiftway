<?php include_once("../connect.php");?>

<div class="sidebar" id="mobilesidebar">
    
      
      <!-- Logo Starts -->
      
				
      <span style="width:80%;height:7%;margin: 0px 0px 0px 20px;position:relative;top:25px" class="logo1 highlight"></span><a style="text-decoration: none; cursor: default;" class="logo1">
					<img id="single-logo" class="img-responsive" src="../img/trans-nav.png" alt="logo" style="position:absolute;bottom:15px">
				</a>

				<!-- Logo Ends -->
         
        <div class="sidebar-background" style="background-image: url(../img/sidebar-2.jpg) "></div>  
      <div class="sidebar-wrapper">
      <div style="position:relative;bottom:50px;margin-left:20px">
                                <?php $sql = mysqli_query($conn, "SELECT * FROM admin WHERE ad_username = '$_SESSION[adminlogin]'");
$row= mysqli_fetch_assoc($sql);

if($row['ad_profileimg']==null){
  ?><div><img src="https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg" style="height:60px;width:60px;border-radius: 100%;position:relative;top:70px" alt="User-Profile-Image"></div><?php
}else{?>
  <div><img src="uploads/<?=$row['ad_profileimg']?>" style="height:60px;width:60px;border-radius: 100%;position:relative;top:70px" alt="Admin-Profile-Image"></div><?php
}
?><a class="nav-link" href="admin-profile.php" style="text-decoration: none;">
  <p style="font-family:Arial, Helvetica, sans-serif;color:black;z-index:100;font-size:20px;position:relative;left:80px;top:15px;font-weight: bold;color:#a9afbbd1;text-transform:uppercase" >
<?php echo $row['ad_name']; ?></p></a></div>
        <ul class="nav" style="">
          <li class="nav-item <?php if($page=='addashboard'){echo 'active';} ?>">
            <a class="nav-link" href="admin-dashboard.php">
            <i class="fas fa-chart-network"></i>
            <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='admanagetrain'){echo 'active';} ?>">
            <a class="nav-link" href="admin-managetrains.php">
            <i class="far fa-train"></i>
              <p>Manage Trains</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='admanageclasses'){echo 'active';} ?>">
            <a class="nav-link" href="admin-manageclasses.php">
            <i class="fad fa-loveseat"></i>
              <p>Manage Classes</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='admanagetickets'){echo 'active';} ?>">
            <a class="nav-link" href="admin-managetickets.php">
            <i class="far fa-ticket-alt"></i>
              <p>Manage Tickets</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='admanagecustomers'){echo 'active';} ?>">
            <a class="nav-link" href="admin-managecustomers.php">
            <i class="fas fa-users"></i>
              <p>Manage Customers</p>
            </a>
          </li>
          <!--<li class="nav-item <?php //if($page=='adgeneratereports'){echo 'active';} ?>">
            <a class="nav-link" href="admin-generatereports.php">
            <i class="fas fa-users"></i>
              <p>Generate Reports</p>
            </a>
          </li>
          <li class="nav-item <?php //if($page=='adprofile'){echo 'active';} ?>">
            <a class="nav-link" href="admin-profile.php">
            <i class="fal fa-id-card"></i>
              <p>User Profile</p>
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="admin-logout.php">
            <i class="far fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <span id="content-mobile" onclick="myFunction()" style="cursor:pointer;position:absolute;z-index:100;top:0;left:0;" ><i class="fas fa-bars"></i></span>