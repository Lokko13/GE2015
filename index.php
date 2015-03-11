<!DOCTYPE html>
<!-- 
  
  This is the login for the site


Copyright 2013
Layout by Kristoffer Ross Cruz and Ian De Jesus
Made with Bootstrap v2.3.2
 *
 * Copyright 2012 Twitter, Inc
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * CSS Designed and built with all the love in the world @twitter by @mdo and @fat.
-->
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>DLSU | Anivote Login</title>
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="css/bootstrap-responsive.css"/>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
</head>

<body>
	
	<center>
	
	<div class="hero-unit">
		<!-- Start header -->
		<img src="img/stc-header2.png"/>
		<h1>Exercise your right to vote!</h1>
		<br/>
		<!-- End header -->
		<!-- Start login page -->
		<div class="container row-fluid">
			<div class="span4">
			</div>
			<div class="span4">
			<!--I added this to test out the passwords.php-->
				<form class="form-signin" class="login-form" action="passwords.php" method="post">
					<input name="inputStudentID" type="text" class="form-control" id="inputStudentID" name="inputStudentID" placeholder="Student Number" style="margin-bottom: 3px;"><br />
					<input name="inputPassword" type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" style="margin-bottom: 15px;"><br />
				<button type="submit" class="btn btn-large btn-success">Start voting!
				</form>
			</div>
			<div class="span4">
			</div>
		</div>
		<!-- End login page -->
	</div>
	</center>
	



</body>
</html>