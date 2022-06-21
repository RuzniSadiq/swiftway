<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<!-- Responsive meta tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Favicon -->
      <link rel="shortcut icon" href="img/logo.png">

    
      <link id="theme" rel="stylesheet" type="text/css" href="../css/light-theme.css" />

<!-- Bootstrap CSS -->

<script src="jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	.swal2-popup {
  font-size: 1.6rem !important;
}
	.swal2-container {
  zoom: 0.8;
}
	.swal2-icon {
  width: 5em !important;
  height: 5em !important;
  border-width: .25em !important;
}
	</style>


</head>
<?php 
session_start();
include_once("../../connect.php");

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "../../connect.php";

  

	echo "<pre>";
	//print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
/*125000*/
	if ($error === 0) {
		if ($img_size > 3145728) {
			// $em ='<script>alert("Sorry, your file is too large.")</script>';
		    // header("Location: ../admin-profile.php?error=$em");
			echo '<script>
			setTimeout(function() {
				Swal.fire({
				  icon: "warning",
				  title: "Warning",
				  showConfirmButton: false,
				  text: "Sorry, your file is too large"
					
				}).then(function() {
					window.location = "../admin-profile.php";
				  });
			}, 1000);
		</script>';

		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				//$sql = "INSERT INTO customer(ad_profileimg) 
				  //    VALUES('$new_img_name')";
				//mysqli_query($conn, $sql);
				$nw = mysqli_query($conn, "SELECT * FROM admin WHERE ad_username = '$_SESSION[adminlogin]'");
$row= mysqli_fetch_assoc($nw);
$file_pointer = '../uploads/'.$row['ad_profileimg'];

// Use unlink() function to delete a file 
// if (!unlink($file_pointer)) { 
//     echo ("$file_pointer cannot be deleted due to an error"); 
// } 
// else { 
//     echo ("$file_pointer has been deleted"); 
// }

				$sql = mysqli_query($conn,"UPDATE admin SET ad_profileimg = '$new_img_name' WHERE ad_username = '$_SESSION[adminlogin]'");
			
				
				// $em ='<script>alert("Your image has been Changed Successfully")</script>';

				 
			
			
				// header("Location: ../admin-profile.php?pass=$em");

				echo '<script>
                setTimeout(function() {
                    Swal.fire({
                      icon: "success",
                      title: "Success",
                      showConfirmButton: false,
                      text: "Your image has been changed successfully."
                        
                    }).then(function() {
                        window.location = "../admin-profile.php";
                      });
                }, 1000);
            </script>';
			}else {
				// $em ='<script>alert("You cant upload files of this type")</script>';
				
		        // header("Location: ../admin-profile.php?fail=$em");

				echo '<script>
                setTimeout(function() {
                    Swal.fire({
                      icon: "warning",
                      title: "Warning",
                      showConfirmButton: false,
                      text: "You cant upload files of this type"
                        
                    }).then(function() {
                        window.location = "../admin-profile.php";
                      });
                }, 1000);
            </script>';
			}
		}
	}else {
		// $em ='<script>alert("unknown error occurred!")</script>';
		
		// header("Location: ../admin-profile.php?fail=$em");
		echo '<script>
		setTimeout(function() {
			Swal.fire({
			  icon: "error",
			  title: "Error",
			  showConfirmButton: false,
			  text: "unknown error occurred!"
				
			}).then(function() {
				window.location = "../admin-profile.php";
			  });
		}, 1000);
	</script>';
	}

}


if(isset($_GET['changenamebtn'])){
	$newname = $_GET['newname'];
$username = $_GET['username'];
$cpw = $_GET['cpw'];
	//$cusid = mysqli_query($conn, "SELECT * FROM customer WHERE ad_username = '$_SESSION[login]'");
	$sqll = mysqli_query($conn, "UPDATE admin SET ad_name='$newname' WHERE ad_username='$username' AND ad_password='$cpw'");
	

	//if(mysqli_query($conn, "UPDATE customer SET ad_name='$newname' WHERE ad_username='$username'
	//AND ad_password='$cpw'"))
	$num = mysqli_affected_rows($conn);
	if($num>0)
	{
		
		// $em= '<script>alert("Your name has been changed successfully")</script>';
				
		//         header("Location: ../admin-profile.php?pass=$em");

		
		echo '<script>
		setTimeout(function() {
			Swal.fire({
			  icon: "success",
			  title: "Success",
			  showConfirmButton: false,
			  text: "Your name has been changed successfully"
				
			}).then(function() {
				window.location = "../admin-profile.php";
			  });
		}, 1000);
	</script>';
	
	}
	else{
		// $em= '<script>alert("Invalid details")</script>';
				
		//         header("Location: ../admin-profile.php?fail=$em");

		echo '<script>
		setTimeout(function() {
			Swal.fire({
			  icon: "error",
			  title: "Error",
			  showConfirmButton: false,
			  text: "Invalid details"
				
			}).then(function() {
				window.location = "../admin-profile.php";
			  });
		}, 1000);
	</script>';
	}







}

if(isset($_GET['changepwbtn'])){
	

$username = $_GET['username'];
$cpw = $_GET['cpw'];
$newpw =$_GET['newpw'];

$sqly = mysqli_query($conn, "UPDATE admin SET ad_password='$newpw' WHERE ad_username='$username'
	AND ad_password='$cpw'");
		$num = mysqli_affected_rows($conn);
		if($num>0)
		{
			
			// $em= '<script>alert("Your password has been changed successfully")</script>';
					
			// 		header("Location: ../admin-profile.php?pass=$em");

			echo '<script>
			setTimeout(function() {
				Swal.fire({
				  icon: "success",
				  title: "Success",
				  showConfirmButton: false,
				  text: "Your password has been changed successfully"
					
				}).then(function() {
					window.location = "../admin-profile.php";
				  });
			}, 1000);
		</script>';
		
		}
		else{
			// $em= '<script>alert("Invalid details")</script>';
					
			// 		header("Location: ../../admin-profile.php?fail=$em");

			echo '<script>
			setTimeout(function() {
				Swal.fire({
				  icon: "error",
				  title: "Error",
				  showConfirmButton: false,
				  text: "Invalid details"
					
				}).then(function() {
					window.location = "../admin-profile.php";
				  });
			}, 1000);
		</script>';
		}


}