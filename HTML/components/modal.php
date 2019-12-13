<div class="modal fade bd-example-modal-lg xs-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="fundpress-tab-nav-v5">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" href="#login" role="tab" data-toggle="tab">
							Login
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#signup" role="tab" data-toggle="tab">
							Signup
						</a>
					</li>
				</ul>
			</div>
			<!-- fundpress-tab-nav-v3 -->
			<!-- Tab panes for LOGIN -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fadeInRights show fade in active" id="login">
					<form action="authorization/login.php" method="POST" id="xs-login-form">
						<div class="xs-input-group-v2">
							<i class="icon icon-profile-male"></i>
							<input type="text" name="login" id="xs_user_login_name" class="xs-input-control" placeholder="Enter your username" required>

						</div>
						<div class="xs-input-group-v2">
							<i class="icon icon-key2"></i>
							<input type="password" name="password" id="xs_login_password" class="xs-input-control" placeholder="Enter your password" required>
						</div>
						<div class="xs-input-group-v2">
                            <input class="login_checkbox_1" type="checkbox" name="not_attach_ip"> 
                            <label>Are you agree? </label>
                        </div>
						<div class="xs-submit-wraper xs-mb-20">
							<input type="submit" name="submit" value="Login" id="xs_login_get_action" class="btn btn-warning btn-block">
						</div>
					</form>
				</div><!-- tab-pane for SIGN UP -->
				<div role="tabpanel" class="tab-pane fadeInRights fade" id="signup">
					<form action="authorization/register.php" method="POST" id="xs-register-form" enctype="multipart/form-data">
						<div class="xs-input-group-v2">
							<i class="icon icon-profile-male"></i>
							<input type="text" name="login" id="xs_register_name" class="xs-input-control" placeholder="Enter your username" required>
						</div>
						<div class="xs-input-group-v2">
							<i class="icon icon-profile-male"></i>
							<input type="text" name="firstname" id="xs_register_name" class="xs-input-control" placeholder="Firstname">
						</div>
						<div class="xs-input-group-v2">
							<i class="icon icon-profile-male"></i>
							<input type="text" name="lastname" id="xs_register_name" class="xs-input-control" placeholder="Lastname">
						</div>
						<div class="xs-input-group-v2">
							<i class="icon icon-key2"></i>
							<input type="password" name="password" id="xs_register_password" class="xs-input-control" placeholder="Enter your password" required>
						</div>
						<div class="xs-input-group-v2">
							<i class="icon icon-key2"></i>
							<input type="file" name="image" id="xs_register_repeat_pass" class="xs-input-control" placeholder="Upload photo" required>
						</div>
						<div class="xs-submit-wraper xs-mb-20">
							<input type="submit" name="submit" value="Register" id="xs_register_get_action" class="btn btn-warning btn-block">
						</div>
					</form>
				</div><!-- tab-pane -->
			</div><!-- tab-content -->
		</div>
	</div>
</div>



