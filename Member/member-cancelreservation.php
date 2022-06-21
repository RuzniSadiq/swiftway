<?php
	//including the database connection file
	include_once("../connect.php");
	 
	//getting id of the data from url
	
    $ti_id = $_GET['ti_id'];
	
	 
	//deleting the row from table
    $res = mysqli_query($conn, "UPDATE ticket SET ti_status = 'Cancelled' WHERE ti_id='$ti_id'");

	$num = mysqli_affected_rows($conn);
		if($num>0)
		{
			
			$em= '<script>alert("Reservation canceled Successfully")</script>';
					
			header("Location:member-myreservations.php?pass=$em");
		
		}
		else{
			$em= '<script>alert("We encountered some problem. Please try again.")</script>';
					
			header("Location:member-myreservations.php?fail=$em");
		}

	
	 
	//redirecting to the display page (index.php in our case)
	
?>