<!-- this whole view feels hardcoded -->
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
				<h2> VOTES SUMMARY </h2> <!-- votes summary isn't dynamic, more on hard coded and i feel bad -->
			</td>
		</tr>
		<tr>
			<td colspan='2'>Votes / Total Voters:</td>
			<td><?php echo $voteSummary['totalVotes'] . " / " . $voteSummary['totalVoters']; ?> </td>
		</tr>

		<tr>
			<td colspan='2'>CCS Votes / Total CCS Voters:</td>
			<td><?php echo $voteSummary['CCStotalVotes'] . " / " . $voteSummary['CCStotalVoters']; ?> </td>
		</tr>

		<tr>
			<td colspan='2'>RVR-COB Votes / Total RVR-COB Voters:</td>
			<td><?php echo $voteSummary['COBtotalVotes'] . " / " . $voteSummary['COBtotalVoters']; ?> </td>
		</tr>

		<tr>
			<td colspan='2'>CLA Votes / Total CLA Voters:</td>
			<td><?php echo $voteSummary['CLAtotalVotes'] . " / " . $voteSummary['CLAtotalVoters']; ?> </td>
		</tr>

		<tr>
			<td colspan='2'>GCOE Votes / Total GCOE Voters:</td>
			<td><?php echo $voteSummary['COEtotalVotes'] . " / " . $voteSummary['COEtotalVoters']; ?> </td>
		</tr>
		
		<tr>
			<td colspan="3">
				<h4> USG President </h4>
			</td>
		</tr>
		
		<?php foreach($usg_pres_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>

		<tr>
			<td colspan="3">
				<h4> VP Internals </h4>
			</td>
		</tr>

		<?php foreach($usg_vp_internal_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>

		<tr>
			<td colspan="3">
				<h4> VP Externals </h4>
			</td>
		</tr>

		<?php foreach($usg_vp_external_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>
		
		<tr>
			<td colspan="3">
				<h4> Executive Treasurer </h4>
			</td>
		</tr>
		
		<?php foreach($usg_treasurer_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>

		<tr>
			<td colspan="3">
				<h4> Executive Secretary </h4>
			</td>
		</tr>
		
		<?php foreach($usg_secretary_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>
		
		<tr>
			<td colspan="3">
				<h4> STC President </h4>
			</td>
		</tr>
		
		<?php foreach($stc_campus_pres_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>

		<tr>
			<td colspan="3">
				<h4> Legislative Assembly Representative </h4>
			</td>
		</tr>
		
		<?php foreach($stc_la_rep_votes as $x) :?>
			<tr>
				<?php if($x['name'] == "Abstains") : ?>
					<td><?php echo $x['name']; ?></td>
					<td></td>
					<td><?php echo $x['votes']; ?></td>
				<?php else :?>
					<td><?php echo $x['party']; ?></td>
					<td><?php echo $x['name']; ?></td>
					<td><?php echo $x['votes']; ?></td>
				<?php endif; ?>
			</tr>
		<?php endforeach;?>

		<tr>
			<td colspan="3">
				<h4> College Representatives </h4>
			</td>
		</tr>
		
		<?php foreach($stc_college_rep_votes as $x) :?>
			<tr>
				<td><?php echo $x['party']; ?></td>
				<td><?php echo $x['name'] . "(" . $x['position'] . ")"; ?></td>
				<td><?php echo $x['votes']; ?></td>
			</tr>
		<?php endforeach;?>
			
		<tr>
			<td colspan="3">
				<h4> College Representatives Abstains</h4>
			</td>
		</tr>

		<?php foreach($stc_college_rep_abstain as $x) :?>
			<tr>
				<td><?php echo $x['name']; ?></td>
				<td></td>
				<td><?php echo $x['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>
</center>