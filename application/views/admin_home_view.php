<div class="navbar">
    <div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="#" name="top">COMELEC</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active">
						<a href="<?php echo _controller_url() . 'admin';?>"><i class="icon-home"></i> Home</a>
					</li>
					
					<li class="divider-vertical"></li>
					
					<li class="">
						<a href="<?php echo _controller_url() . 'admin/ActiveSessions';?>"><i class="icon-eye-open"></i> Active Sessions</a>
					</li>
					
					<li class="divider-vertical"></li>
					
					<li class="">
						<a href="<?php echo _controller_url() . 'admin/ManagementTools';?>"><i class="icon-th-list"></i> Management Tools</a>
					</li>
					
					<li class="divider-vertical"></li>
                  	
                  	<li class="">
                  		<a href="<?php echo _controller_url() . 'admin/VoterTools';?>"><i class="icon-user"></i> Voter Tools</a>
              		</li>
					
					<li class="divider-vertical"></li>

				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-cog"></i> <?php echo $admin_name; ?><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo _controller_url() . 'logout'; ?>"><i class="icon-share"></i>Logout</a></li>
					</ul>
				</div>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</div>
	<!--/.navbar-inner -->
</div>
<!--/.navbar -->
	
	<center>
		<h1>
			USG GENERAL ELECTIONS 2015
		</h1>
		
		<h2> VOTES SUMMARY </h2>
		
		<h4> USG President </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$usgpres = array();
			
			//get candidates for USG PRESIDENT
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'USG President'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )
			{
				$usgpres[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($usgpres); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $usgpres[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgpres[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> VP Internals </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$usgvpi = array();
			
			//get candidates for VP Internals
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'VP Internals'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )
			{
				$usgvpi[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($usgvpi); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $usgvpi[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgvpi[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> VP Externals </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$usgvpe = array();
			
			//get candidates for VP Externals
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'VP Externals'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )
			{
				$usgvpe[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($usgvpe); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $usgvpe[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgvpe[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> Executive Treasurer </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$usgtre = array();
			
			//get candidates for Executive Treasurer
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'Executive Treasurer'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )	
			{
				$usgtre[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($usgtre); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $usgtre[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgtre[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> Executive Secretary </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$usgsec = array();
			
			//get candidates for Executive Secretary
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'Executive Secretary'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )	
			{
				$usgsec[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($usgsec); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $usgsec[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgsec[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> STC President </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$stcpre = array();
			
			//get candidates for STC President
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'STC President'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )	
			{
				$stcpre[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($stcpre); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $stcpre[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stcpre[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> Legislative Assembly Representative </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$stcla = array();
			
			//get candidates for Legislative Assembly Representative 
			$getCandidates = "SELECT voter_id AS ID FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE 'Legislative Assembly Representative'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )	
			{
				$stcla[$i] = $row['ID'];
				
				$i++;
				
			}
			
			for($c = 0; $c<count($stcla); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $stcla[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stcla[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
		
		<h4> College Representatives </h4>
		
		<?php 
		
			//counter
			$i = 0; 
			
			$stccolrep = array();
			$col = array();
			
			//get candidates for COLLEGE Representative 
			$getCandidates = "SELECT voter_id AS ID, position AS POS FROM voter JOIN candidate ON voter.voter_id = candidate_id WHERE position LIKE '% Representative' AND position NOT LIKE 'Legislative %'";
			
			$getCandidatesDone = mysql_query($getCandidates) or die(mysql_error());
			
			while( $row = mysql_fetch_array($getCandidatesDone) )	
			{
				$stccolrep[$i] = $row['ID'];
				$col[$i] = $row['POS'];
				$i++;
				
			}
			
			for($c = 0; $c<count($stccolrep); $c++)
			{
				//get candidate name
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL
								FROM candidate AS C JOIN voter AS V
								 ON C.candidate_id = V.voter_id
								 WHERE C.candidate_id = '". $stccolrep[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stccolrep[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo $name['FULL'];
				
				echo "(" . $col[$c] . ")";
				
				echo " - ";
				
				echo $row['C'];
				echo "<br>";
				
			}
			
		?>
	</center>