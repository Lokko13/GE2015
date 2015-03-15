<div class="row-fluid">
	<div class="span3"> 
		<div class="sidebar-nav">
	        <div class="well" style="width:300px; padding: 8px 0;">
	    		<ul class="nav nav-list">
	    			<li class="active"><a href="<?php echo _controller_url() . 'admin/ManagementTools';?>"> Management Tools Home </a></li>
					
					<li class="nav-header">Admin</li>
					<li class= "active"><a href="<?php echo _controller_url() . 'admin/ManagementTools/viewAdmin';?>">View Admins</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/addAdmin';?>">Add Admin</a></li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/removeAdmin';?>">Remove Admin</a></li>					

					<li class="nav-header">Candidate</li>
					<li class= ""><a href="<?php echo _controller_url() . 'admin/ManagementTools/viewCandidate';?>">View Candidates</a></li>
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
		VIEW ADMIN CONTENT
	</div>
</div>