
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
	//including the database connection file
	include_once("../connect.php");
	 
	//getting id of the data from url
	
    $ti_id = $_GET['ti_id'];
	
	 
	//deleting the row from table
    $res = mysqli_query($conn, "DELETE FROM ticket WHERE ti_id='$ti_id'");

	$num = mysqli_affected_rows($conn);
		if($num>0)
		{
			
			// $em= '<script>alert("Deleted Successfully")</script>';
					
			// header("Location:admin-managetickets.php?pass=$em");
			echo '<script>
			setTimeout(function() {
				Swal.fire({
				  icon: "success",
							title: "Success",
							showConfirmButton: false,
							text: "Deleted successfully!"
					
				}).then(function() {
				  window.location = "admin-managetickets.php";
				});
			}, 1000);
		</script>';
		
		}
		else{
			// $em= '<script>alert("We encountered some problem. Please try again.")</script>';
					
			// header("Location:admin-managetickets.php?fail=$em");

			echo '<script>
			setTimeout(function() {
				Swal.fire({
				  icon: "error",
							title: "Error",
							showConfirmButton: false,
							text: "We encountered some problem. Please try again."
					
				}).then(function() {
				  window.location = "admin-managetickets.php";
				});
			}, 1000);
		</script>';
		}

	
	 
	//redirecting to the display page (index.php in our case)
	
?>