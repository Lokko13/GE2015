<!--

	voteAdmin.php
	
	This is the admin page where the admin can see the current votes and manage voters and candidates

-->

<!doctype html>

<html>

	<head>
		<title> GE 2015 </title>
	
	
		<?php
		
			
			//connection to database
			include 'db_connect.php';
			session_start();
			
			if(!isset($_SESSION['inputStudentID']))
			{
				//redirect to unauthorizedAccess page
				header("location: unauthorizedAccess.php");
			}
			
			//candidate has been successfully added
			if(isset($_SESSION['added']))
			{
				if($_SESSION['added']=='Y')
				{
					$_SESSION['added']='N';
					
					echo "yay! added";
				}
			}
			
			?>
		
	</head>

	<body>
	
		<h1>
			USG GENERAL ELECTIONS 2015
		</h1>
		
		<details>
			<summary> VOTES SUMMARY </summary>
			
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
			
		</details>
		
		<br>
		
		<form method="POST" action="addCandidate.php" id="add">
		
		</form>
		
		<details>
			<summary>ADD CANDIDATE </summary>
			
			<h3>
				1. Pick student
			</h3>
				
			<select form="add" name="ID">
			
				<!-- CCS STUDENTS -->
			
				<optgroup label="CCS">
			
				<?php
				
					//-------------
					//		CCS
					//-------------
				
					//retrieve CCS voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'CCS' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- RVR-COB STUDENTS -->
				
				<optgroup label="RVR-COB">
			
				<?php
				
					//---------------------------
					//			RVR-COB
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'RVR%' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- CLA STUDENTS -->
				
				<optgroup label="CLA">
			
				<?php
				
					//---------------------------
					//			CLA
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'CLA' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- SOE STUDENTS -->
				
				<optgroup label="SOE">
			
				<?php
				
					//---------------------------
					//			SOE
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'SOE' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
				?>
				</optgroup>
				
				<!-- GCOE STUDENTS -->
				
				<optgroup label="GCOE">
			
				<?php
				
					//---------------------------
					//			GCOE
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'GCOE' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
				?>
				</optgroup>
				
				<!-- STUDENTS WITHOUT COLLEGE FOR SOME REASON -->
				
				<optgroup label="NO SPECIFIED COLLEGE IN DB">
			
				<?php
				
					//---------------------------
					//			?
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE '' AND voter_id NOT IN (SELECT candidate_id FROM candidate) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
					
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
					
				?>
				</optgroup>
				
			</select>
			
			<h3>
				2. Pick position
			</h3>
			
			<select form="add" name ="POS">
				
				<option value="USG President">
					USG President
				</option>
				
				<option value="VP Externals">
					VP Externals
				</option>
				
				<option value="VP Internals">
					VP Internals
				</option>
				
				<option value="Executive Secretary">
					Executive Secretary
				</option>
				
				<option value="Executive Treasurer">
					Executive Treasurer
				</option>
				
				<option value="STC President">
					STC President
				</option>
				
				<option value="Legislative Assembly Representative">
					Legislative Assembly Representative
				</option>
				
				<option value="College Representative">
					College Representative
				</option>
				
			</select>
			
			<h3>
				3. Pick Party
			</h3>
			
			<select form="add" name="PARTY">
				<?php
				
					//get parties
					$getParties = "SELECT * FROM party";
					
					$getPartiesDone = mysql_query($getParties) or die(mysql_error());
					
					$i=0;
					
					while($row = mysql_fetch_array($getPartiesDone))
					{
					
						echo '<option value="'.$row['party_id'].'">';
						echo $row['party_name'];
						echo '</option value=>';
						
						$i++;
					}
					
					if($i==0)
					{
						echo "<optgroup label='none'> </optgroup>";
					}
					
				?>
			</select>
			
			<br>
			<br>
		
		<input type="submit" form="add" />
			
		</details>
		
		<br>
		
		<form method="POST" action="resetVoter.php" id="reset" >
		</form>
		
		<details>
			<summary> RESET VOTER </summary>
			
			<br>
			
			<?php
				
				$q = "SELECT DISTINCT voter_id FROM votes_for";
				
				$result = mysql_query($q) or die(mysql_error());
				
				$count_of_voters = mysql_num_rows($result);
				
				// if nobody has voted yet
				if($count_of_voters==0)
				{
					echo "NOBODY HAS VOTED YET!";
				}
				else
				{
			?>
			
			<select form="reset" name="ID">
			
				<!-- CCS STUDENTS -->
			
				<optgroup label="CCS">
			
				<?php
				
					//-------------
					//		CCS
					//-------------
				
					//retrieve CCS voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'CCS' AND voter_id IN (SELECT DISTINCT voter_id FROM votes_for) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- RVR-COB STUDENTS -->
				
				<optgroup label="RVR-COB">
			
				<?php
				
					//---------------------------
					//			RVR-COB
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'RVR%' AND  voter_id IN (SELECT DISTINCT voter_id FROM votes_for) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- CLA STUDENTS -->
				
				<optgroup label="CLA">
			
				<?php
				
					//---------------------------
					//			CLA
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'CLA' AND voter_id IN (SELECT DISTINCT voter_id FROM votes_for) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
				?>
				</optgroup>
				
				<!-- SOE STUDENTS -->
				
				<optgroup label="SOE">
			
				<?php
				
					//---------------------------
					//			SOE
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'SOE' AND voter_id IN (SELECT DISTINCT voter_id FROM votes_for)  ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
				?>
				</optgroup>
				
				<!-- GCOE STUDENTS -->
				
				<optgroup label="GCOE">
			
				<?php
				
					//---------------------------
					//			GCOE
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college LIKE 'GCOE' AND voter_id IN (SELECT DISTINCT voter_id FROM votes_for) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
				
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
				?>
				</optgroup>
				
				<!-- STUDENTS WITHOUT COLLEGE FOR SOME REASON -->
				
				<optgroup label="NO SPECIFIED COLLEGE IN DB">
			
				<?php
				
					//---------------------------
					//			?
					//---------------------------
					
					//retrieve voters that are not yet candidates
					$getVoters = "SELECT voter_id AS ID, first_name AS FNAME, last_name AS LNAME, college AS COL FROM voter WHERE college NOT LIKE 'GCOE' AND college NOT LIKE 'SOE' AND college NOT LIKE 'CCS' AND college NOT LIKE 'RVR-COB' AND college NOT LIKE 'CLA' AND voter_id IN (SELECT DISTINCT voter_id FROM votes_for) ORDER BY last_name";
					
					$getVotersDone = mysql_query($getVoters) or die(mysql_error());
					
					
					
					while($voters = mysql_fetch_array($getVotersDone))
					{
						?>
						
						<option value ="<?php echo $voters['ID']?>">
						
							<?php
								echo $voters['LNAME'] . ", " . $voters['FNAME'];
							?>
						
						</option>
						
						<?php
					}
					
					
				?>
				</optgroup>
				
			</select>
			
			<input type="submit" form="reset" value="reset" />
			<?php } ?>
		</details>
		
		<a href="logout.php"> Log out </a>
	
	</body>
	
</html>