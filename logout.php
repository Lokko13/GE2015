<?php

 	session_start();
	// $var1 = $_SESSION['inputStudentID'];
    
	// Unset all of the session variables.
	$_SESSION = array();
	
	session_unset();
	
    session_destroy();
	
    header('location:success.php');
    exit();

?>