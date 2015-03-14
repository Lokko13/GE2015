<div class="navbar">
    <div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="#" name="top">COMELEC</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="">
						<a href="<?php echo _controller_url() . 'admin';?>"><i class="icon-home"></i> Home</a>
					</li>
					
					<li class="divider-vertical"></li>
					
					<li class="">
						<a href="<?php echo _controller_url() . 'admin/ActiveSessions';?>"><i class="icon-file"></i> Active Sessions</a>
					</li>
					
					<li class="divider-vertical"></li>
					
					<li class="">
						<a href="<?php echo _controller_url() . 'admin/ManagementTools';?>"><i class="icon-envelope"></i> Management Tools</a>
					</li>
					
					<li class="divider-vertical"></li>
                  	
                  	<li class="active">
                  		<a href="<?php echo _controller_url() . 'admin/VoterTools';?>"><i class="icon-signal"></i> Voter Tools</a>
              		</li>
					
					<li class="divider-vertical"></li>

				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> <?php echo "admin_name"; ?><span class="caret"></span>
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
	<div class="span3"> 
		<div class="sidebar-nav">
	        <div class="well" style="width:300px; padding: 8px 0;">
				<ul class="nav nav-list"> 
					<li class="nav-header">Voter</li>
					<li><a href="#">View Voter</a></li>
					<li><a href="#">Voter Ballot</a></li>
	    		</ul>
	    	</div>
	    </div>
	</div>  

	<div class="span9">content</div>
</div>
