<!-- get_header('Page Name','Title')-->
<?php
include "db.php";
	$page = 1;
	
	if(isset($_GET['page'])&&strlen($_GET['page']) >0){
		$page = $_GET["page"];
	}
	$link=mysqli_connect("localhost","root","","Zhasa");


	$limit = 3;
	
	$skip = ($page - 1)* $limit;

	$query = $db -> query ("SELECT * FROM blogs b LEFT OUTER join users u ON 
							b.user_id = u.user_id ORDER BY b.date DESC LIMIT $skip, $limit");
	$query2 = $db -> query("SELECT COUNT(id) AS number FROM blogs");

	$count = $query2 -> fetch_object();
	$pages_number = ceil($count -> number/$limit);
?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>ZHASA - News Feed Version 3</title>
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
<?php $title = "News Feeds"; $pagename = "Details"; $subtitle = ""; ?>
<?php include "components/section.php"; ?>



<main class="xs-all-content-wrapper">
	<!-- blog post details -->
	<div class="xs-blog-details xs-content-section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="xs-blog-details-wraper">
					<!-- format standard -->
					<?php
							if($query -> num_rows>0){
							while ($row = $query -> fetch_object()){

						?>
					<article class="post format-standard hentry">
						
						<div class="post-media xs-post-image post-image">
							<img src="<?php echo $row -> img; ?>" class="img-responsive" alt="">
						</div><!-- .post-media END -->

						<div class="post-body xs-content-padding xs-style-border">
							<div class="entry-header row xs-mb-30">
								<div class="col-md-2 xs-padding-0">
					 				<div class="post-meta">
					 					<div class="xs-post-meta-date xs-mb-30">
						 					<span class="post-meta-date xs-navy-blue-bg color-white xs-border-radius">
						 						<?php
						 							
													echo $row -> date;
												?>
											</span>
						 				</div>

						 				<div class="xs-post-author post-author xs-font-alt">
											<div class="full-round xs-mb-10 fundpress-avatar fundpress-avatar-medium">
												<img class="img-responsive" src="<?php echo $row -> user_img; ?>" alt="">
											</div>
											<a href="#" class="xs-font-italic">By <?php
												echo $row -> firstname;?> <?php echo $row -> lastname;
												?></a>
										</div><!-- .xs-post-author END -->
					 				</div>
					 			</div><!-- .xs-entry-header-date END -->
					 			<div class="col-md-10 xs-padding-0">
					 				<div class="post-meta xs-mb-20 xs-post-meta-list">
										<span class="post-cat xs-font-alt">
											<i class="fa fa-folder-open"></i><a href="#"> Funding consultancy</a>
										</span>

										<span class="tags-links xs-font-alt">
											<i class="fa fa-tags"></i>
											<a href="" rel="tag">Fund</a>, 
											<a href="" rel="tag">Crowd</a>
										</span>
									</div>
									<h2 class="entry-title xs-mb-20 xs-post-entry-title">
							 			<a href="blog-single.php" class="color-navy-blue bold">
							 				<?php
												echo $row -> title;
											?>
										</a>
						 			</h2>
						 			<div class="xs-entry-content entry-content xs-font-alt">
										<p class="xs-mb-0">
											<?php
											echo $row -> description;
											?>
										</p>
									</div><!-- .xs-entry-content END -->
					 			</div><!-- .xs-entry-header-content END -->
							</div><!-- header end -->

							<div class="post-footer content-right">
								<a href="blog-single.html" class="xs-btn round-btn navy-blue-btn">Continue Read</a>
							</div><!-- .post-footer END -->
						</div><!-- post-body end -->
					</article><!-- .post  END -->
					<!-- format standard closed -->
				<?php }
					}
				?>
					
					
					
					<!-- post pagination -->
					<div class="post-pagination xs-pagination-wraper text-center">
						<ul class="xs-pagination fundpress-pagination fundpress-pagination-v3">
							<li class="xs-pagination-next">
								<a class="next page-numbers" href="?page=<?php if($page==$pages_number) {echo $page;} else{ echo $page-1;} ?>">
									<span class="pagination-next"><i class="fa fa-angle-left"></i></span>
								</a>
							</li>
							<?php 
									for ($i=1; $i <= $pages_number; $i++) { 
										# code...
									
								?>
							<li>
								<span aria-current="page" class="page-numbers current"><a class="page-numbers" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></span>
							</li>
							<?php
									}
								?>
							<li class="xs-pagination-prev">
								<a class="prev page-numbers" href="?page=<?php if($page==$pages_number) {echo $page;} else{ echo $page+1;} ?>">
									<span class="pagination-prev"><i class="fa fa-angle-right"></i></span>
								</a>
							</li>
						</ul>
					</div>
					<!-- post pagination end -->
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<!-- sidebar content -->
				<div class="xs-sidebar-content">
	<div class="sidebar sidebar-right" id="sidebar">
		<!-- search bar start -->
		<div class="widget widget_search xs-single-sidebar">	
			<form class="search-form xs-serachForm xs-font-alt" role="search" method="get" action="GET">
				<input type="search" class="xs-serach-filed search-field" name="s" value="" placeholder="Type keywords...">
				<input type="submit" class="search-submit" value="">
			</form>
		</div>
		<!-- search bas stop -->
		<!-- recent post start -->
		<div class="widget recent-posts xs-single-sidebar border xs-content-padding">
			<h3 class="widget-title xs-widget-title">Trending Post</h3>
			<ul class="unstyled clearfix xs-recent-post-widget">
				<?php
							if($query -> num_rows>0){
							while ($row = $query -> fetch_object()){

						?>
				<li>
					<div class="posts-thumb float-left w-25"> 
						<a href="#" class="d-block"><img alt="img" class="img-responsive" src="<?php echo $row -> img; ?>"></a>
					</div>
					<div class="post-info float-right w-75">
						<div class="post-meta xs-font-alt text-uppercase xs-mb-10">
							<span class="post-author">Posted by <a href="#">
								By <?php echo $row -> firstname; ?></a></span>
							<span class="post-meta-date">Posted in <?php
												echo $row -> date;?></span>
						</div>
						<h4 class="entry-title">
							<a href="" class="color-navy-blue semi-bold">
								<?php echo $row -> title;?></a>
						</h4>
					</div>
					<div class="clearfix"></div>
				</li><!-- 1st post end-->
			<?php }
					}
				?>
				
			</ul>
		</div>
		<!-- recent post end -->
		
		<!-- widget tags -->
		<div class="widget widget-social-share xs-single-sidebar xs-content-padding border">
			<h3 class="widget-title xs-widget-title">Social Share</h3>

			<ul class="xs-social-list xs-social-list-v6 fundpress-social-list">
				<li><a href="" class="color-facebook"><i class="fa fa-facebook"></i>Facebook</a></li>
				<li><a href="" class="color-twitter"><i class="fa fa-twitter"></i>twitter</a></li>
				<li><a href="" class="color-dribbble"><i class="fa fa-dribbble"></i>Pinterest</a></li>
				<li><a href="" class="color-pinterest"><i class="fa fa-pinterest"></i>Dribbble</a></li>
				<li><a href="" class="color-instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
				<li><a href="" class="color-linkedin"><i class="fa fa-linkedin"></i>Linkedin</a></li>
			</ul>
		</div>
		<!-- widget tags closed -->
	</div>
</div>				<!-- End sidebar content -->
			</div>
		</div>
	</div>
</div>	<!-- End blog post details -->
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