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
	<table id="voteTable">
		<tr>
			<td colspan="4">
				<h1>
					USG GENERAL ELECTIONS 2015
				</h1>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<h2> VOTES SUMMARY </h2>
			</td>
		</tr>
		<tr>
		<?php
			$getAllVotes = "SELECT COUNT(voter_id) AS votes
							FROM voter
							WHERE isVoted = 'Y'
								AND voter_id NOT LIKE '0%';";
			$getAllVotesDone = mysql_query($getAllVotes) or die(mysql_error());
			//
			$getAllVoters = "SELECT COUNT(voter_id) AS voters
							FROM voter
							WHERE voter_id NOT LIKE '0%';";
			$getAllVotersDone = mysql_query($getAllVoters) or die(mysql_error());
			//
			echo "<td colspan='2'>Total Ballots In:</td><td>" . mysql_result($getAllVotesDone, 0)  . "</td></tr>";
			//
			$getCCS = "SELECT COUNT(voter_id) AS C
							FROM voter
							WHERE college LIKE 'CCS';";
			$getCCSDone = mysql_query($getCCS) or die(mysql_error());
			//
			echo "<tr><td colspan='2'>Total CCS Students:</td><td>";
			echo mysql_result($getCCSDone,0);
			echo "</td></tr>";
			//
			$getCOE = "SELECT COUNT(voter_id) AS C
							FROM voter
							WHERE college LIKE 'GCOE';";
			$getCOEDone = mysql_query($getCOE) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Total GCOE Students:</td><td>";
			echo mysql_result($getCOEDone,0);
			echo "</td></tr>";
			//
			$getCOB = "SELECT COUNT(voter_id) AS C
							FROM voter
							WHERE college LIKE 'RVR-COB';";
			$getCOBDone = mysql_query($getCOB) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Total RVR-COB Students:</td><td>";
			echo mysql_result($getCOBDone,0);
			echo "</td></tr>";
			//
			$getCLA = "SELECT COUNT(voter_id) AS C
							FROM voter
							WHERE college LIKE 'CLA'
								AND voter_id NOT LIKE '0%';";
			$getCLADone = mysql_query($getCLA) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Total CLA Students:</td><td>";
			echo mysql_result($getCLADone,0);
			echo "</td></tr>";
			
			echo "<tr><td colspan='2'>Total Students:</td><td>" . mysql_result($getAllVotersDone, 0) . "</td>" ;
		?>
		</tr>
		<tr>
			<td colspan="3">
				<h4> USG President </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $usgpres[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgpres[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'USG President';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		<tr>
			<td colspan="3">
				<h4> VP Internals </h4>
			</td>
		</tr>
		<?php 
		
			//counter attack
			$i = 0; 
			//sparkles
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $usgvpi[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgvpi[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'VP Internals';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
		?>
		<tr>
			<td colspan="3">
				<h4> VP Externals </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $usgvpe[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgvpe[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'VP Externals';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		<tr>
			<td colspan="3">
				<h4> Executive Treasurer </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $usgtre[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgtre[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'Executive Treasurer';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		<tr>
			<td colspan="3">
				<h4> Executive Secretary </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $usgsec[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $usgsec[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'Executive Secretary';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		
		<tr>
			<td colspan="3">
				<h4> STC President </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $stcpre[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stcpre[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'STC President';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		<tr>
			<td colspan="3">
				<h4> Legislative Assembly Representative </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $stcla[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stcla[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'];
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'Legislative Assembly Representative';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
		<tr>
			<td colspan="3">
				<h4> College Representatives </h4>
			</td>
		</tr>
		
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
				$getName = "SELECT CONCAT(last_name, CONCAT(', ', first_name)) AS FULL, P.party_name AS PARTY
								FROM candidate AS C
								JOIN voter AS V
									ON C.candidate_id = V.voter_id
								JOIN party_candidate AS PC
									ON C.candidate_id = PC.candidate_id
								JOIN party as P
									ON P.party_id = PC.party_id
								 WHERE C.candidate_id = '". $stccolrep[$c] ."'";
				
				$getNameDone = mysql_query($getName) or die(mysql_error());
				
				$name = mysql_fetch_array($getNameDone);
				
				
				
				
				//get vote count of candidates
				$getCount = "SELECT candidate_id AS CID, COUNT(DISTINCT voter_id) AS C FROM votes_for WHERE candidate_id = '" . $stccolrep[$c] ."'";
				
				$getCountDone = mysql_query($getCount) or die(mysql_error());
				
				$row = mysql_fetch_array($getCountDone);
				
				echo "<tr><td>";
				echo $name['PARTY'];
				echo "</td><td>";
				echo $name['FULL'] . " (" . $col[$c] . ")";
				echo "</td><td>";
				echo $row['C'];
				echo "</td></tr>";
				
			}
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'CCS %';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>CCS Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'COE %';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>GCOE Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
			$getAbstains = "SELECT COUNT(position) AS C
							FROM abstain_tbl
							WHERE position LIKE 'COB %';";
			$getAbstainsDone = mysql_query($getAbstains) or die(mysql_error());
			
			echo "<tr><td colspan='2'>RVR-COB Abstains</td><td>";
			echo mysql_result($getAbstainsDone,0);
			echo "</td></tr>";
			
		?>
	</table>
	</center>
