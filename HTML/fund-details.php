<?php
include "db.php";
	$page = 1;
	
	if(isset($_GET['page'])&&strlen($_GET['page']) >0){
		$page = $_GET["page"];
	}

	$limit = 3;
	
	$skip = ($page - 1)* $limit;
	$query = $db -> query ("SELECT * FROM projects b LEFT OUTER join users u ON 
							b.user_id = u.user_id ORDER BY b.date DESC LIMIT $skip, $limit");
	$query2 = $db -> query("SELECT COUNT(id) AS number FROM blogs");

	$count = $query2 -> fetch_object();
	$pages_number = ceil($count -> number/$limit);


	
?>

<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta ZHASA-equiv="x-ua-compatible" content="ie=edge">
		<title>FundPress - Fund Details</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CPoppins:200,400,500,600,700%7CPlayfair+Display:400,700i" rel="stylesheet">
		<link rel="icon" type="image/png" href="favicon.ico">
		<!-- Place favicon.ico in the root directory -->
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="stylesheet" type="text/css" href="assets/css/all.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
		<script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		
	</head>

	<body class="woocommerce">
		<!--[if lt IE 10]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		
		<div id="preloader">
			<div class="spinner">
				<div class="double-bounce1"></div>
				<div class="double-bounce2"></div>
			</div>
		</div><!-- #preloader -->

<?php include "components/header.php"; ?>


<?php include "components/modal.php"; ?>
<?php
		if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
		$id = $_GET["id"];
		$querytitle = $db -> query("SELECT * FROM projects where id = $id");

		if($querytitle -> num_rows>0) {
			while ($row = $querytitle -> fetch_object()){
				$title = $row -> title;
	
			}
		}
	}
?>
<?php $pagename = "Details"; $subtitle = "Technology, Design"; ?>
<?php include "components/section.php"; ?>

<main class="xs-all-content-wrapper">
	<!-- fund details -->
	<?php
						if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
						$id = $_GET["id"];
						$querytitle = $db -> query("SELECT * FROM projects where id = $id");

						if($querytitle -> num_rows>0) {
							while ($row = $querytitle -> fetch_object()){
					?>
	<section class="xs-content-section-padding xs-fund-details fundpress-fund-details">
	<div class="container">
		<div class="row">
			
			<div class="col-md-12 col-sm-12 col-lg-7">
				<div class="xs-sync-slider-wraper xs-mb-50">
					<div class="owl-carousel xs-sync-slider-preview xs-mb-10">
						<div class="xs-sync-slider-preview-content">
							<img src="<?php echo $row -> img; ?>" alt="">
						</div>
					</div><!-- xs-sync-slider-preview -->

					<div class="owl-carousel xs-sync-slider-thumb">
						<div class="xs-sync-slider-thumb-content">
							<img src="<?php echo $row -> img; ?>" alt="">
						</div>
					</div><!-- xs-sync-slider-thumb -->
				</div><!-- xs-sync-slider-wraper -->
				<div class="xs-text-content-tab">
					<!-- Nav tabs -->
					<div class="xs-tab-nav fundpress-tab-nav-v2 xs-mb-30">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#description" role="tab" data-toggle="tab">
									Description
								</a>
							</li>
							
						</ul>
					</div><!-- xs-tab-nav fundpress-tab-nav-v2 xs-mb-30 -->
					<!-- Tab panes -->
					<div class="tab-content xs-text-tab-content">
						<div role="tabpanel" class="tab-pane fadeInRights show fade in active" id="description">
							<?php echo $row -> description; ?>
						</div><!-- tab-pane fadeInRights -->
						<div role="tabpanel" class="tab-pane fadeInRights fade" id="updates">
							<div class="xs-ul-list fundpress-content-text-list-wraper">
								
								<div class="xs-navy-blue-bg fundpress-porject-lunch xs-content-padding text-center content-left">
									<h3 class="color-white xs-mb-10 regular">january 16, 2018</h3>
									<h4 class="color-white xs-mb-0 semi-bold">Project Launched</h4>
								</div>
							</div>
						</div>
						
						
					</div><!-- tab-content xs-text-tab-content -->
				</div><!-- xs-text-content-tab -->
			</div>
			<div class="col-md-12 col-sm-12 col-lg-5">
				<div class="xs-sidebar-wraper">
					<div class="xs-single-sidebar xs-mb-20">
						<div class="xs-pie-chart-wraper fundpress-pie-chart-wraper">
							<div class="xs-pie-chart" data-percent="<?php $p = $row -> sum; echo 2000*100/$p; ?>">
								<div class="xs-pie-chart-percent-wraper icon-position-center bold color-navy-blue xs-spilit-container">
									<div class="xs-pie-chart-percent"></div>
									<span>%</span>
								</div>
							</div>
							<div class="xs-pie-chart-label">Fund Raised</div>
						</div><!-- xs-pie-chart-wraper -->
					</div>

					<div class="xs-single-sidebar xs-mb-30">
						<ul class="xs-list-with-content fundpress-simple-list-content">
							<li class="color-navy-blue bold xs-mb-20">US $2000<span class="color-semi-black regular">Pledged</span></li>
							
							<li class="color-green bold xs-mb-20">Tenge <?php echo $row -> sum; ?><span class="color-semi-black regular">Goal</span></li>

							<li class="color-brick-light-2 bold">2<span class="color-semi-black regular">Backers</span></li>
						</ul><!-- xs-list-with-content fundpress-simple-list-content -->
					</div>

					

					<div class="xs-single-sidebar xs-mb-50">
						<div class="xs-spilit-container">
							<div class="xs-btn-wraper">
								<a href="#" class="icon-btn xs-btn radius-btn green-btn xs-btn-medium"><i class="fa fa-heart"></i>invest Now</a>
							</div>
							<div class="xs-social-list-wraper">
								<ul class="xs-social-list xs-social-list-v3 fundpress-social-list">
									<li><a href="" class="color-facebook xs-box-shadow full-round"><i class="fa fa-facebook"></i></a></li>
									<li><a href="" class="xs-box-shadow color-google-plus full-round"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="" class="xs-box-shadow color-twitter full-round"><i class="fa fa-twitter"></i></a></li>
									<li><a href="" class="xs-box-shadow color-navy-blue full-round"><i class="fa fa-plus"></i></a></li>
								</ul>
							</div>
						</div><!-- xs buttons and social list -->
					</div>

				</div>
			</div>
		</div>
	</div>
</section>	<!-- End fund details -->
<?php }}}?>
	<!-- popular campaigns -->
	<section class="waypoint-tigger xs-gray-bg xs-section-padding">
	<div class="container">
		<div class="xs-section-heading row xs-margin-0">
			<div class="fundpress-heading-title xs-padding-0 col-xl-9 col-md-9">
				<h2 class="color-navy-blue">Other Project</h2>
				<span class="xs-separetor dashed-separetor fundpress-separetor"></span>
				<p>Zhasa has built a platform focused on aiding entrepreneurs, startups, and companies raise capital from anyone.</p>
			</div><!-- .xs-heading-title .fundpress-heading-title .xs-col-9 END -->
			<div class="xs-btn-wraper xs-padding-0 col-xl-3 col-md-3 d-flex-center-end">
				<a href="progress.php" class="xs-btn round-btn navy-blue-btn">all Projects</a>
			</div><!-- .xs-btn-wraper .xs-col-3 .d-flex-center-end END -->
		</div><!-- .xs-section-heading .fundpress-section-heading .xs-spilit-container END -->
		<div class="row">
			<?php
						if (isset($_GET["id"] )&&strlen($_GET ["id"] )>0 ){
						$id = $_GET["id"];
						$querytitle = $db -> query("SELECT * FROM projects LIMIT 3");

						if($querytitle -> num_rows>0) {
							while ($row = $querytitle -> fetch_object()){
					?>
			<div class="col-lg-4">
				<div class="xs-box-shadow fundpress-popular-item xs-bg-white">
					<div class="fundpress-item-header">
						<img src="<?php echo $row -> img ?>" alt="">
						<div class="xs-item-header-content">
							<div class="xs-skill-bar">
								<div class="xs-skill-track">
									<p><span class="number-percentage-count number-percentage" data-value="<?php $p = $row -> sum; echo 2000*100/$p; ?>" data-animation-duration="3500">0</span>%</p>
								</div>
							</div>
						</div>
					</div><!-- .xs-item-header .fundpress-item-header END -->
					<div class="fundpress-item-content xs-content-padding bg-color-white">
						<ul class="xs-simple-tag fundpress-simple-tag">
							<li><a href="">Funding</a></li>
							<li><a href="">Charity</a></li>
						</ul>
						<a href="fund-details.php?id=<?php echo $row-> id; ?>" class="d-block color-navy-blue fundpress-post-title"><?php echo $row -> title ?></a>
						<ul class="xs-list-with-content fundpress-list-item-content">
							<li>$<?php echo $row -> sum ?><span>Pledged</span></li>
							<li><span class="number-percentage-count number-percentage" data-value="<?php $p = $row -> sum; echo 2000*100/$p; ?>" data-animation-duration="3500">0</span>% <span>Funded</span></li>
							<li><?php echo $row -> time ?><span>Days to go</span></li>
						</ul>
						<span class="xs-separetor border-separetor xs-separetor-v2 fundpress-separetor"></span>
						
					</div><!-- .fundpress-item-content END -->
				</div>
			</div>
		<?php }}} ?>
		</div>
	</div>
</section>	<!-- End popular campaigns -->
</main>


		<footer class="xs-footer-section xs-fixed-footer fundpress-footer-section">
			<div class="fundpress-footer-top-layer">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="fundpress-single-footer">
								<div class="xs-footer-logo">
									<a href="index.html">
										<img src="assets/images/footer_logo.png" alt="">
									</a>
								</div>
								<div class="fundpress-footer-content">
									<p>FundPress online and raise money for charity and causes you’re passionate about. FundPress is an innovative, cost-effective online fundraising website for personal fundraising pages.</p>
								</div><!-- . END -->
								<ul class="xs-social-list fundpress-social-list">
									<li><a href="" class="color-facebook full-round"><i class="fa fa-facebook"></i></a></li>
									<li><a href="" class="color-twitter full-round"><i class="fa fa-twitter"></i></a></li>
									<li><a href="" class="color-dribbble full-round"><i class="fa fa-dribbble"></i></a></li>
									<li><a href="" class="color-pinterest full-round"><i class="fa fa-pinterest"></i></a></li>
									<li><a href="" class="color-instagram full-round"><i class="fa fa-instagram"></i></a></li>
								</ul><!-- .xs-social-list .fundpress-social-list END -->
							</div><!-- .fundpress-single-footer END -->
						</div>
						<div class="col-md-3">
							<div class="fundpress-single-footer">
								<div class="xs-footer-title">
									<h4 class="color-white">Explore Campaigns</h4>
								</div><!-- .xs-footer-title END -->
								<nav class="xs-footer-menu">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="#">Gadgets</a></li>
										<li><a href="#">Monuments</a></li>
										<li><a href="#">Travels</a></li>
										<li><a href="#">Accessoriers</a></li>
										<li><a href="#">Books</a></li>
										<li><a href="#">Community Programs</a></li>
										<li><a href="#">Design</a></li>
									</ul>
								</nav><!-- .xs-footer-menu .xs-block-menu END -->
							</div><!-- .fundpress-single-footer END -->
						</div>
						<div class="col-md-2">
							<div class="fundpress-single-footer">
								<div class="xs-footer-title">
									<h4 class="color-white">About</h4>
								</div><!-- .xs-footer-title END -->
								<nav class="xs-footer-menu">
									<ul>
										<li><a href="about.html">About Us</a></li>
										<li><a href="#">How It Works</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Press</a></li>
										<li><a href="news-feed.html">Blog</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav><!-- .xs-footer-menu .xs-block-menu END -->
							</div><!-- .fundpress-single-footer END -->
						</div>
						<div class="col-md-2">
							<div class="fundpress-single-footer">
								<div class="xs-footer-title">
									<h4 class="color-white">Help</h4>
								</div><!-- .xs-footer-title END -->
								<nav class="xs-footer-menu">
									<ul>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="#">Our Rules</a></li>
										<li><a href="#">Trust & Safety</a></li>
										<li><a href="#">Support</a></li>
										<li><a href="#">Terms of Use</a></li>
										<li><a href="#">Privacy Policy</a></li>
									</ul>
								</nav><!-- .xs-footer-menu .xs-block-menu END -->
							</div><!-- .fundpress-single-footer END -->
						</div>
					</div>
				</div>
			</div><!-- .xs-footer-wraper .fundpress-footer-top-layer END -->
			<div class="xs-footer-bottom-layer fundpress-footer-bottom">
				<div class="container">
					<div class="xs-footer-bottom-wraper">
						<div class="xs-copyright-text fundpress-copyright-text">
							<p>Built with <i class="fa fa-heart"></i> by <a href="https://xpeedstudio.com/">XpeedStudio</a></p>
						</div>
						<div class="xs-back-to-top-wraper">
							<a href="#" class="xs-back-to-top full-round green-btn xs-back-to-top-btn show-last-pos">
								<i class="fa fa-angle-up"></i>
							</a>
						</div><!-- .xs-back-to-top-wraper END -->
					</div>
				</div>
			</div><!-- .xs-footer-bottom-layer .fundpress-footer-bottom END -->
		</footer>


		<script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/Popper.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/isotope.pkgd.min.js"></script>
		<script src="assets/js/jquery.easing.1.3.js"></script>
		<script src="assets/js/jquery.countdown.min.js"></script>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/parallax.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/spectragram.min.js"></script>
		<script src="assets/js/jquery.waypoints.min.js"></script>
		<script src="assets/js/scrollax.js"></script>

		<script src="assets/js/main.js"></script>
	</body>
</html>
