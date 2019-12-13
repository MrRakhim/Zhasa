<header class="xs-header-height xs-menu-style-transparent xs-menu-style-border  	fundpress-header-main-version color-navy-blue v3" >
	<div class="container">
		<nav class="xs-menus fundpress-menu">
			<div class="nav-header">
				<div class="nav-toggle"></div>
				<a class="nav-brand nav-logo" href="index.php">
					<img src="assets/images/logo.png" alt="">
				</a>
			</div>
			<div class="nav-menus-wrapper">
				<div class="xs-logo-wraper">
					<a class="nav-brand xs-logo fundpress-logo-v1" href="index.php">
						<img src="assets/images/logo.png" alt="">
					</a>
				</div>
				<ul class="nav-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">about</a></li>
					<li><a href="#">pages</a>
						<ul class="nav-dropdown">
							<li><a href="team-member-details.php ">team details</a></li>
							<li><a href="progress.php ">progress</a></li>
							<li><a href="fund-details.php ">fund-details</a></li>
						</ul>
					</li>
				</ul>
				<div class="xs-navs-button">
					<ul class="xs-icon-with-text fundpress-icon-menu">
						<li id="user_div"><a href="" data-toggle="modal" data-target=".bd-example-modal-lg"></a></li>
						<?php
							session_start();
							if (!isset($_SESSION["user_id"])) {
							
						?>
						<li id="login_div"><a href="" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-unlock-alt color-green"></i>Log In</a></li>
						<?php
							}	else {


						?>
						<li ><a href="authorization/logout.php" <i class="fa fa-unlock-alt color-green"></i>Log Out</a></li>
						<li class="d-block d-lg-none d-xl-block"><a href="user.php" class="xs-btn round-btn green-btn">start a campaign</a>
						</li>
						<?php
							}	
						?>

					</ul>
				</div>
			</div><!-- .nav-menus-wrapper END -->
		</nav><!-- .xs-menus .fundpress-menu END -->
	</div>
</header>
