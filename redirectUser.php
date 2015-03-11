<!--
	redirectUser.php -- redirects unauthorized access of users to certain pages
-->

<?php
	
	//if the user has not logged in yet
	if(!isset($_SESSION['inputStudentID']))
	{
		//redirect to unauthorizedAccess page
		header("location: unauthorizedAccess.php");
	}
?>