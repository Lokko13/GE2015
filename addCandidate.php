<!--
	addCandidate.php
	
		-This php file contains the adding of a new candidate
-->

<?php
	//connection to database
	include 'db_connect.php';
	session_start();
	
	ob_start();
	
	if(!isset($_SESSION['inputStudentID']))
	{
		//redirect to unauthorizedAccess page
		header("location: unauthorizedAccess.php");
	}
	
	
	
	//the id of candidate to be added
	$id = $_POST['ID'];
	
	//the position of the candidate
	$pos = $_POST['POS'];
	
	//the party of the candidate
	$part = $_POST['PARTY'];
	
	//if the position of candidate is college representative, get the college of the candidate
	if($pos == "College Representative")
	{
		//get the college of the candidate
		$getCollege = "SELECT college AS COL FROM voter WHERE voter_id LIKE '". $id ."'";
		
		$getCollegeDone = mysql_query($getCollege) or die(mysql_error());
		
		$row = mysql_fetch_array($getCollegeDone);
		
		$col = $row['COL'];
		
		// COL REP EDITING: '<insert college here> Representative'
		$pos = $col . " Representative";
	}
	
	
	
	//insertion of candidate
	//--------------------------------------
	$addPls = "INSERT INTO candidate VALUES('". $id ."', '". $pos ."');";
	
	$addPlsDone = mysql_query($addPls) or die(mysql_error());
	//--------------------------------------
	
	
	//insertion of candidate's party
	//------------------------------------------
	$addPart = "INSERT INTO party_candidate VALUES('". $part ."', '". $id ."');";
	
	$addPartDone = mysql_query($addPart) or die(mysql_error());
	//------------------------------------------
	
	ob_end_flush();
	
	//yay successfully added
	$_SESSION['added'] = 'Y';
	
	header("location: voteAdmin.php");
?>