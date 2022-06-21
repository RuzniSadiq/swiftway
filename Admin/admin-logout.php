<?php

	
//including the database connection file.
include_once("../connect.php");

//Start the Session
session_start();
//remove all session variables
session_unset();

//destroy the session
session_destroy();

header('location:../user-login.php');

?>
