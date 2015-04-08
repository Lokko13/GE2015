<!-- 
  
  This is the login for the site


Copyright 2013
Layout by Kristoffer Ross Cruz and Ian De Jesus
Made with Bootstrap v2.3.2
 *
 * Copyright 2012 Twitter, Inc
 * Licensed under the Apache License v2.0
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * CSS Designed and built with all the love in the world @twitter by @mdo and @fat.
-->

<center>
	<div class="hero-unit">
		<!-- Start header -->
		<img src="<?php echo _img_url() . 'stc-header2.png' ?>"/>
		<h1>Exercise your right to vote!</h1>
		<br/>
		<!-- End header -->
		<!-- Start login page -->

		<div class="container row-fluid">
			<!-- login errors -->
			<?php if( $this->session->flashdata('login_error') != null ): ?>
				<div class="row clearfix">
					<div class="span6 offset3 column">
						<div id="form_error" class="flash_msg">
							<?php echo $this->session->flashdata('login_error'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="span4 offset4">
				<!--Begin Form-->
				<?php 
					$attr = array(
						'class' => 'form-signin login-form'
					);
					echo form_open('login/signInSubmit', $attr);
				?>
					<?php
						//user id input attributes
						$id_attr = array(
							'name' => 'inputStudentID',
							'id' => 'inputStudentID',
							'class' => 'form-control',
							'placeholder' => 'Student Number',
							'style' => 'margin-bottom: 3px;'
						);

						//password input attributes
						$pass_attr = array(
							'name' => 'inputPassword',
							'id' => 'inputPassword',
							'class' => 'form-control',
							'placeholder' => 'Password',
							'style' => 'margin-bottom: 15px;'
						);

						echo form_input($id_attr) . "<br />";
						echo form_password($pass_attr) . "<br />";
						echo form_submit('formSubmit', 'Start Voting!', "class='btn btn-large btn-success'");
					?>
				<?php
					echo form_close();
				?>
			</div>
		</div>
		<!-- End login page -->
	</div>
</center>