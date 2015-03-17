<div class="row-fluid">
	<div class="span3"> 
		<div class="sidebar-nav">
	        <div class="well" style="width:300px; padding: 8px 0;">
	    		<ul class="nav nav-list">
	    			<li class="active"><a href="<?php echo _controller_url() . 'admin/ManagementTools';?>"> Management Tools Home </a></li>
					
					<li class="nav-header">Admin</li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/viewAdmin';?>">View Admins</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/addAdmin';?>">Add Admin</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/removeAdmin';?>">Remove Admin</a></li>					

					<li class="nav-header">Candidate</li>
					<li class= "active"><a href="<?php echo _controller_url() . 'admin/ManagementTools/viewCandidate';?>">View Candidates</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/addCandidate';?>">Add Candidate</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/removeCandidate';?>">Remove Candidate</a></li>
					
					<li class="nav-header">Party</li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/viewParty';?>">View Parties</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/addParty';?>">Add Party</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/removeParty';?>">Remove Party</a></li>
	    		</ul>
	    	</div>
	    </div>
	</div>  

	<div class="span9">
		<table class="table table-striped table-condensed">
			<thead>
				<tr>
					<th>Candidate Student ID</th>
					<th>Candidate Name</th>
					<th>Candidate Party</th>
					<th>Candidate Position</th>
				</tr>
			</thead>   
			<tbody>
				<?php foreach($all_candidate as $single_candidate): ?>
					<tr>
						<td><?php echo $single_candidate['candidate_id']; ?></td>
						<td><?php echo $single_candidate['name']; ?></td>
						<td><?php echo $single_candidate['party']->party_name; ?></td>
						<td><?php echo $single_candidate['position']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>