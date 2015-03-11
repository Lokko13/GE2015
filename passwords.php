<!--
This PHP file is used to confirm the voters username as well as their password

-->
<!--START OF PHP FILE-->
<?php

	session_start();//STARTS OF SESSION
	
//Retrieves USERNAME & PASSWORD from loginForm.php
	//-------------------------------------------------		
	$username=$_POST['inputStudentID'];
	$userpass=$_POST['inputPassword'];
	//-------------------------------------------------

//Connect to the database
//Select Database
	//-------------------------------------------------
		include 'db_connect.php';
	//-------------------------------------------------

//Query to see if password & username matches in db
		//-------------------------------------------------
		$result = mysql_query("
			SELECT voting, voter_id, password, first_name AS 'name', college
			FROM voter
			WHERE voter_id = '" . $username . "' 
			      AND password = '" . $userpass . "'	
							
		")or die(mysql_error()); //END OF QUERY
		
//Check if query returned a result (meaning the password and username match)
		//-------------------------------------------------

		$voting=mysql_fetch_array($result);
		if($voting['voting'] == 'Y')
		{
		//Saves user's details to session
			$_SESSION['inputStudentID'] = $username;
			$_SESSION['college'] = $voting['college'];
			$_SESSION['name'] = $voting['name'];
			header("location:studentVote.php");	
		}
		else if( $username == '200907409696' && $userpass == '1ateneo1' )
		{
			$_SESSION['inputStudentID'] = $username;
			header('location:voteAdmin.php');
		}
		else{
			echo "<html><head><title>Oops!</title><link href='css/bootstrap.min.css' rel='stylesheet' /><script src='js/jquery.min.js'></script><script src='js/bootstrap.min.js'></script></head><body> <center><div style='width:500px;margin-top:100px;'><div class='panel panel-default'><div class='panel-body'><div class='alert alert-danger' role='alert'><b>Oops!</b> ";
			if($voting['voting'] == 'N')
			{
				echo "This ID number has already voted! ";
			}
			else
			{
				echo "Wrong Username or Password. ";
			}
			echo "<a href='index.php' class='alert-link'>Click here</a> to try again.</div>";
			echo $username . "<br>";
			echo $userpass . "<br>";
			echo "</div></div></div></center></body></html>";
				//header("location:index.php");
	}

?><!--END OF PHP -->