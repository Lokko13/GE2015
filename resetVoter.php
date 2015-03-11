<!--
	resetVoter.php
	
		-This php file handles resetting of voter voting status.
		 voting = 'N'
		 deletes votes of user if voter has voted already
-->

<?php

	//connection to database
	include 'db_connect.php';
	session_start();
	
	obj_start();
	
	if(!isset($_SESSION['inputStudentID']))
	{
		//redirect to unauthorizedAccess page
		header("location: unauthorizedAccess.php");
	}
	
	//delete previous votes of user
	// -------------------------------
		$deleteStuff = "DELETE FROM votes_for WHERE voter_id = '" . $_SESSION['inputStudentID'] ."'";
		
		$deleteStuffDone = mysql_query($deleteStuff) or die(mysql_error());
	// -------------------------------
	
	
	//reset voter status set voting to 'Y'
	//-----------------------------------------
		$updateUserStatus = "UPDATE voter SET voting = 'Y' WHERE voter_id = '" . $id . "';";
		
		$updateUserStatusDone = mysql_query($updateUserStatus) or die(mysql_error());
	//-----------------------------------------

	obj_end_flush();
	
	header("location: voteAdmin.php");
?>