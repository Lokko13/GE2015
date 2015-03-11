<!--

	db_connect.php
	
	THIS PHP FILE contains the necessary code in order to connect the system to the database

-->

<?php

		//Connect to the database	
		//-------------------------------------------------
		mysql_connect("localhost", "root", "louie69")
			or die(mysql_error());
		//-------------------------------------------------
	
		//Select Database
		//-------------------------------------------------
		mysql_select_db("elecom") 
			or die(mysql_error());
		//-------------------------------------------------
		
?>