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
                      <th>Username</th>
                      <th>Date registered</th>
                      <th>Role</th>
                      <th>Status</th>                                          
                  </tr>
              </thead>   
              <tbody>
                <tr>
                    <td>Donna R. Folse</td>
                    <td>2012/05/06</td>
                    <td>Editor</td>
                    <td><span class="label label-success">Active</span>
                    </td>                                       
                </tr>
                <tr>
                    <td>Emily F. Burns</td>
                    <td>2011/12/01</td>
                    <td>Staff</td>
                    <td><span class="label label-important">Banned</span></td>                                       
                </tr>
                <tr>
                    <td>Andrew A. Stout</td>
                    <td>2010/08/21</td>
                    <td>User</td>
                    <td><span class="label">Inactive</span></td>                                        
                </tr>
                <tr>
                    <td>Mary M. Bryan</td>
                    <td>2009/04/11</td>
                    <td>Editor</td>
                    <td><span class="label label-warning">Pending</span></td>                                       
                </tr>
                <tr>
                    <td>Mary A. Lewis</td>
                    <td>2007/02/01</td>
                    <td>Staff</td>
                    <td><span class="label label-success">Active</span></td>                                        
                </tr>                                   
              </tbody>
            </table>
        </div>
	</div>
</div>