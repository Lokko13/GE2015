<!--

	voteValidationSubmit.php
	
	checks the validation of the submitted votes if they are of the right count per position and then records the vote

-->
<?php

	session_start();
	
	ob_start(); //output buffer something
	
	if(!isset($_SESSION['inputStudentID']))
	{
		//redirect to unauthorizedAccess page
		header("location: unauthorizedAccess.php");
	}
	else
	{
	
		$id = $_SESSION['inputStudentID'];
	
		// TODO destroy session here, but keep the $id variable for SQL
	
		//Connect to the database	
		//-------------------------------------------------
			include 'db_connect.php';
		//-------------------------------------------------
	
		$usgP = $_POST['usgpresident'];
		$usgVPI = $_POST['usgvicepresidentint'];
		$usgVPE = $_POST['usgvicepresidentext'];
		$usgS = $_POST['usgsecretary'];
		$usgT = $_POST['usgtreasurer'];
		$stcCP = $_POST['stcpresident'];
		$stcCR = $_POST['stccolrep'];
		
		//array
		$stcLA = $_POST['stclarep'];
		$stcLA1 = $stcLA[0];
		$stcLA2 = $stcLA[1];
	
		if( isset( $usgP, $usgVPI, $usgVPE, $usgS, $usgT, $stcCP, $stcCR, $stcLA1, $stcLA2 ) )
		{
			//record votes
			//---------------
			$updateVoteCount = "INSERT INTO `votes_for` VALUES ". 
								"( '". $id ."', '". $usgP ."'),".
								"( '". $id ."', '". $usgVPI ."'),".
								"( '". $id ."', '". $usgVPE ."'),".
								"( '". $id ."', '". $usgS ."'),".
								"( '". $id ."', '". $usgT ."'),".
								"( '". $id ."', '". $stcCP ."'),".
								"( '". $id ."', '". $stcLA1 ."'),".
								"( '". $id ."', '". $stcLA2 ."');";
							
			$updateVoteCountDone = mysql_query($updateVoteCount) or die(mysql_error());
			//----------------------------------------------------------------------
			
			
		
			//user has already voted. set voting to 'N'
			//-----------------------------------------
			$updateUserStatus = "UPDATE voter SET voting = 'N' WHERE voter_id = '" . $id . "';";
			
			$updateUserStatusDone = mysql_query($updateUserStatus) or die(mysql_error());
			//-----------------------------------------
		
		
		
			// destroy all variables
			// ----------------------
			unset($id);
			unset($usgP);
			unset($usgVPI);
			unset($usgVPE);
			unset($usgS);
			unset($usgT);
			unset($stcCP);
			unset($stcCR);
			unset($stcLA);
			unset($stcLA1);
			unset($stcLA2);
			// ----------------------
		
		
			ob_end_flush(); //stop output buffer something
			
			
			header("location: logout.php");
			
			exit();
		}
		else
		{
			echo "<br /><br />An error has occurred! Contact COMELEC immediately!<br /><br />";
			echo "Validation check returned NULL value(s).\n";
			echo "User number: " . $id;
			
			ob_end_flush();
		}
		
	}
	
?>