<!--

	idValidation.php
	
	This validates the studentID of the user if he/she is allowed to vote.
	
-->

<?php
	//*just include this file wherever ID validation is needed*
	
	
	//connect to database
	include 'db_connect.php';
	
	session_start();
	
	//save user ID
	$id = $_SESSION['inputStudentID'];
	
	
	// QUERY for getting current voter status
	// ----------------------------------------------------------------
	
		$getStatus = "SELECT voting FROM voter WHERE voterID LIKE '" . $id ."'";
		
		$getStatusDone = mysql_result($getStatus) or die(mysql_error());
		
		$getStatusResult = mysql_fetch_assoc($getStatusDone);
	
	// ----------------------------------------------------------------
	
	$_SESSION['voteStatus'] = $getStatusResult['voting'];
	
	//logout user if user has already voted
	if($_SESSION['voteStatus'] == 'N')
	{
		header("location: logout.php"); //TODO add page/popout to redirect to that says "user has already voted!"
		exit(0);
	}
	
?>