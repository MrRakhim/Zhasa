<?php
include "db.php";
	$page = 1;
	
	if(isset($_GET['page'])&&strlen($_GET['page']) >0){
		$page = $_GET["page"];
	}
	$link=mysqli_connect("localhost","root","","Zhasa");


	$limit = 3;
	
	$skip = ($page - 1)* $limit;

	$query = $db -> query ("SELECT * FROM projects b LEFT OUTER join users u ON 
							b.user_id = u.user_id ORDER BY b.date DESC");
	$query2 = $db -> query("SELECT COUNT(id) AS number FROM blogs");

	$count = $query2 -> fetch_object();
	$pages_number = ceil($count -> number/$limit);
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>ZHASA - In Progress</title>
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
<?php $title = "ZhasaKZ In Progress Projects"; $pagename = "Progress"; $subtitle = "People just like you have raised more money on FundPress than anywhere else."; ?>
<?php include "components/section.php"; ?>


<main class="xs-all-content-wrapper">
	<!-- in progress section -->
	<section class="waypoint-tigger xs-content-section-padding">
	<div class="container">
		<div class="xs-isotope-grid-wraper">
			<!-- .xs-isotope-nav .fundpress-isotope-nav END -->
			<div class="xs-col-3-isotope-grid">
				<?php
					if($query -> num_rows>0){
					while ($row = $query -> fetch_object()){

				?>
				<div class="xs-col-3-isotope-grid-item comics crafts">
					<div class="fundpress-grid-item-content xs-mb-30">
						<div class="xs-item-header fundpress-item-header">
							<img src="<?php echo $row -> img; ?>" >
							<div class="xs-item-header-content">
								<div class="xs-skill-bar">
									<div class="xs-skill-track">
										<p><span class="number-percentage-count number-percentage" data-value="65" data-animation-duration="3500">0</span>%</p>
									</div>
								</div>
							</div>
						</div><!-- .xs-item-header .fundpress-item-header END -->
						<div class="xs-item-content fundpress-item-content">
							
							<a href="fund-details.php?id=<?php echo $row-> id; ?>" class="xs-post-title color-navy-blue fundpress-post-title">
								<?php
								echo $row -> title;
								?>
							</a>
							<ul class="xs-list-with-content fundpress-list-item-content">
								<li>$<?php
									echo $row -> sum;
								?><span>Pledged</span></li>
								<li><span class="number-percentage-count number-percentage" data-value="65" data-animation-duration="3500">0</span>% <span>Funded</span></li>
								<li><?php
									echo $row -> time;
									?><span>Days to go</span>
								</li>
							</ul>
						</div><!-- .xs-item-content .fundpress-item-content END -->
					</div>
				</div><!-- .xs-col-3-isotope-grid-item END -->
				
	
				<?php
					}
				}
				?>
	
			</div>
		</div>
	</div>
</section>	
</main>

<!-- footer section -->
		<footer class="xs-footer-section xs-fixed-footer fundpress-footer-section">
			<div class="fundpress-footer-top-layer">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="fundpress-single-footer">
								<div class="xs-footer-logo">
									<a href="index.html">
										<img src="assets/images/logo.png" alt="">
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
										<li><a href="index.php">Home</a></li>
										<li><a href="progress.php">Gadgets</a></li>
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
										<li><a href="about.php">About Us</a></li>
										<li><a href="news-feed-v3.php">Blog</a></li>
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
							<p>All Right Reserved <i class="fa fa-heart"></i> Zhasa.kz</p>
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
<!-- end footer section -->