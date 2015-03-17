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

<div class="row-fluid">
	<h1>USG GENERAL ELECTIONS 2015</h1>
			
	<h5>TOTAL VOTES CASTED : <?php echo $totalVotes;?> </h5>
	<h5>TOTAL VOTERS : <?php echo $totalVoters;?> </h5>
	<hr />	
			
	<h4> USG President </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($usg_pres_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>
	 
	<hr />
	<h4> VP Internals </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($usg_vp_internal_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>

	<hr />
	<h4> VP Externals </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($usg_vp_external_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>
			
	<hr />
	<h4> Executive Treasurer </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($usg_treasurer_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>

	<hr />
	<h4> Executive Secretary </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($usg_secretary_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>	

	<hr />		
	<h4> STC President </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($stc_campus_pres_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>	

	<hr />		
	<h4> Legislative Assembly Representative </h4>
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
		</tr>

		<?php foreach($stc_la_rep_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>	
			
	<hr />
	<h4> College Representatives </h4>
			
	<table class="table">
		<tr>
			<th>Candidate Name</th>
			<th>Votes</th>
			<th>Position</th>
		</tr>

		<?php foreach($stc_college_rep_votes as $single_vote) :?>
			<tr>
				<td><?php echo $single_vote['name']; ?></td>
				<td><?php echo $single_vote['votes']; ?></td>
				<td><?php echo $single_vote['position']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>	

	<h4> College Representatives Abstains </h4>
			
	<table class="table">
		<tr>
			<th>College Representative</th>
			<th>Abstains</th>
		</tr>

		<?php foreach($stc_college_rep_abstain as $single_abstain) :?>
			<tr>
				<td><?php echo $single_abstain['name']; ?></td>
				<td><?php echo $single_abstain['votes']; ?></td>
			</tr>
		<?php endforeach;?>
	</table>	
</div>