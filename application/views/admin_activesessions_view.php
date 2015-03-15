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
					
					<li class="active">
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


<div class="container">
	<div class="row">
		<div class="span12">    
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
              <th>Session ID</th>
              <th>Voter ID</th>
              <th>IP Address</th>
          </tr>
        </thead>   
        <tbody>
          <?php foreach($active_sessions as $user_session): ?>
            <tr>
              <td><?php echo $user_session->session_id; ?></td>
              <td><?php echo $user_session->user_id; ?></td>
              <td><?php echo $user_session->session_ip_address; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
	</div>
</div>