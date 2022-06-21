<div class="sidebar" id="mobilesidebar">
    
      
      <!-- Logo Starts -->
      
				
      <span style="width:80%;height:7%;margin: 0px 0px 0px 20px;position:relative;top:25px" class="logo1 highlight"></span><a style="text-decoration: none; cursor: default;" class="logo1">
					<img id="single-logo" class="img-responsive" src="../img/trans-nav.png" alt="logo" style="position:absolute;bottom:15px">
				</a>

				<!-- Logo Ends -->
         
        <div class="sidebar-background" style="background-image: url(../img/sidebar-2.jpg) "></div>  
      <div class="sidebar-wrapper">
      <div style="position:relative;bottom:50px;margin-left:20px">
                                <?php $sql = mysqli_query($conn, "SELECT * FROM customer WHERE cus_username = '$_SESSION[login]'");
$row= mysqli_fetch_assoc($sql);

if($row['cus_profileimg']==null){
  ?><div><img src="https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg" style="height:60px;width:60px;border-radius: 100%;position:relative;top:70px" alt="User-Profile-Image"></div><?php
}else{?>
  <div><img src="uploads/<?=$row['cus_profileimg']?>" style="height:60px;width:60px;border-radius: 100%;position:relative;top:70px" alt="Customer-Profile-Image"></div><?php
}
?><a class="nav-link" href="member-profile.php" style="text-decoration: none;">
  <p style="color:black;z-index:100;font-size:20px;position:relative;left:80px;top:15px;font-weight: bold;color:#a9afbbd1;text-transform:uppercase" >
<?php echo $row['cus_name']; ?></p></a></div>
        <ul class="nav">
          <li class="nav-item <?php if($page=='memdashboard'){echo 'active';} ?>">
            <a class="nav-link" href="member-dashboard.php">
            <i class="fas fa-chart-network"></i>
            <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='memchoose_sdcd'){echo 'active';} ?>">
            <a class="nav-link" href="member-choose_sdcd.php">
            <i class="far fa-book-user"></i>
              <p>Reserve Ticket</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='memfindbylocation'){echo 'active';} ?>">
            <a class="nav-link" href="member-findbylocation.php">
            <i class="fal fa-globe-asia"></i>
              <p>Find by location</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='memmyreservations'){echo 'active';} ?>">
            <a class="nav-link" href="member-myreservations.php">
            <i class="far fa-book-reader"></i>
              <p>My Reservations</p>
            </a>
          </li>
          <!-- <li class="nav-item <?php if($page=='memredeemcoupons'){echo 'active';} ?>">
            <a class="nav-link" href="member-support.php">
            <i class="fas fa-headset"></i>
              <p>Use Points</p>
            </a>
          </li> -->
          <li class="nav-item <?php if($page=='memtravelpoints'){echo 'active';} ?>">
            <a class="nav-link" href="member-travelpoints.php">
            <i class="far fa-stars"></i>
              <p>Travel Points</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='memlandf'){echo 'active';} ?>">
            <a class="nav-link" href="member-landf.php">
            <i class="far fa-binoculars"></i>
              <p>Lost and Found</p>
            </a>
          </li>
          <li class="nav-item <?php if($page=='memsupport'){echo 'active';} ?>">
            <a class="nav-link" href="member-support.php">
            <i class="fas fa-headset"></i>
              <p>Contact Support</p>
            </a>
          </li>
          <!--
          <li class="nav-item <?php if($page=='memprofile'){echo 'active';} ?>">
            <a class="nav-link" href="member-profile.php">
            <i class="fal fa-id-card"></i>
              <p>User Profile</p>
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="member-logout.php">
            <i class="far fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <span id="content-mobile" onclick="myFunction()" style="cursor:pointer;position:absolute;z-index:100;top:0;left:0;" ><i class="fas fa-bars"></i></span>