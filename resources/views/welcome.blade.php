<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
		<meta name="description" content="JobBoard - HTML Template" />
	<meta property="og:title" content="JobBoard - HTML Template" />
	<meta property="og:description" content="JobBoard - HTML Template" />
	<meta property="og:image" content="JobBoard - HTML Template" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
	
	<!-- PAGE TITLE HERE -->
	<title>JobBoard - HTML Template</title>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="public/frontend/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="public/frontend/css/skin/skin-1.css">
	<link rel="stylesheet" href="public/frontend/plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->
</head>
<body id="bg">
<!-- id="loading-area" -->
<div></div>
<div class="page-wraper">
	<!-- header -->
    <header class="site-header mo-left header fullwidth">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="index-2.html"><img src="public/frontend/images/logo.png" class="logo" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="register.html" class="site-button"><i class="fa fa-user"></i>Đăng ký</a>
                            <a href="login.html" class="site-button"><i class="fa fa-lock"></i> Đăng nhập</a>
                        </div>
                    </div>
                    <!-- Quik search -->
                    <div class="dez-quik-search bg-primary">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="flaticon-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li class="active">
								<a href="#">Home</a>
							</li>
							<li>
								<a href="#">Việc làm<i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="#" class="dez-page">Công việc</a></li>
									<li><a href="#" class="dez-page">Công ty</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Ứng viên</a>
								
							</li>
							<li>
								<a href="#">Pages <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="about-us.html" class="dez-page">Thông tin</a></li>
									<li><a href="error-404.html" class="dez-page">Error 404</a></li>
									<li><a href="contact.html" class="dez-page">Liên hệ</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Blog <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic.html" class="dez-page">Classic</a></li>
									<li><a href="blog-classic-sidebar.html" class="dez-page">Classic Sidebar</a></li>
									<li><a href="blog-detailed-grid.html" class="dez-page">Detailed Grid</a></li>
								</ul>
							</li>
						</ul>			
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
		<!-- Section Banner -->
		<div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(public/frontend/images/main-slider/slide2.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m ">
					<div class="find-job-bx">
						<p class="site-button button-sm">Find Jobs, Employment & Career Opportunities</p>
						<h2>Search Between More Them <br/> <span class="text-primary">50,000</span> Open Jobs.</h2>
						<form class="dezPlaceAni">
							<div class="row">
								<div class="col-lg-4 col-md-6">
									<div class="form-group">
										<label>Job Title, Keywords, or Phrase</label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="">
											<div class="input-group-append">
											  <span class="input-group-text"><i class="fa fa-search"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="form-group">
										<label>City, State or ZIP</label>
										<div class="input-group">
											<input type="text" class="form-control" placeholder="">
											<div class="input-group-append">
											  <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6">
									<div class="form-group">
										<select>
											<option>Select Sector</option>
											<option>Construction</option>
											<option>Corodinator</option>
											<option>Employer</option>
											<option>Financial Career</option>
											<option>Information Technology</option>
											<option>Marketing</option>
											<option>Quality check</option>
											<option>Real Estate</option>
											<option>Sales</option>
											<option>Supporting</option>
											<option>Teaching</option> 
										</select>
									</div>
								</div>
								<div class="col-lg-2 col-md-6">
									<button type="submit" class="site-button btn-block">Find Job</button>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
		<!-- Section Banner END -->
        <!-- About Us -->
		<div class="section-full job-categories content-inner-2 bg-white" style="background-image:url(../images/pattern/pic1.html);">
			<div class="container">
				<div class="section-head d-flex head-counter clearfix">
					<div class="mr-auto">
						<h2 class="m-b5">Popular Categories</h2>
						<h6 class="fw3">20+ Catetories work wating for you</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5 counter">1800</h2>
						<h6 class="fw3">Jobs Posted</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5 counter">4500</h2>
						<h6 class="fw3">Tasks Posted</h6>
					</div>
					<div class="head-counter-bx">
						<h2 class="m-b5 counter">1500</h2>
						<h6 class="fw3">Freelancers</h6>
					</div>
				</div>
				<div class="row sp20">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-location-pin"></i></div>
								<a href="#" class="dez-tilte">Design, Art & Multimedia</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-location-pin"></i></div> 
							</div>
						</div>				
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-wand"></i></div>
								<a href="#" class="dez-tilte">Education Training</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-wand"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-wallet"></i></div>
								<a href="#" class="dez-tilte">Accounting / Finance</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-wallet"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-cloud-up"></i></div>
								<a href="#" class="dez-tilte">Human Resource</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-cloud-up"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-bar-chart"></i></div>
								<a href="#" class="dez-tilte">Telecommunications</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-bar-chart"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-tablet"></i></div>
								<a href="#" class="dez-tilte">Restaurant / Food Service</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-tablet"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-camera"></i></div>
								<a href="#" class="dez-tilte">Construction / Facilities</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-camera"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="icon-bx-wraper">
							<div class="icon-content">
								<div class="icon-md text-primary m-b20"><i class="ti-panel"></i></div>
								<a href="#" class="dez-tilte">Health</a>
								<p class="m-a0">198 Open Positions</p>
								<div class="rotate-icon"><i class="ti-panel"></i></div> 
							</div>
						</div>
					</div>
					<div class="col-lg-12 text-center m-t30">
						<button class="site-button radius-xl">All Categories</button>
					</div>
				</div>
			</div>
		</div>
		<!-- About Us END -->
		<!-- Call To Action -->
		<div class="section-full content-inner bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 section-head text-center">
						<h1 class="m-b5">Thành phố nổi bật</h1>
						<h6 class="fw4 m-b0">20+ Thành phố đã được thêm</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
						<div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic1.jpg)">
							<div class="city-info">
								<h5>Iraq</h5>
								<span>765 Jobs</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
						<div class="city-bx align-items-end  d-flex" style="background-image:url(public/frontend/images/city/pic2.jpg)">
							<div class="city-info">
								<h5>Argentina</h5>
								<span>352 Jobs</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
						<div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic3.jpg)">
							<div class="city-info">
								<h5>Indonesia</h5>
								<span>893 Jobs</span>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 m-b30">
						<div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic4.jpg)">
							<div class="city-info">
								<h5>Gambia</h5>
								<span>502 Jobs</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Call To Action END -->
		<!-- Our Job -->
		<div class="section-full bg-white content-inner-2">
			<div class="container">
				<div class="d-flex job-title-bx section-head">
					<div class="mr-auto">
						<h2 class="m-b5">Việc làm mới</h2>
						<h6 class="fw4 m-b0">+20 việc làm mới được thêm gần đây</h5>
					</div>
					<div class="align-self-end">
						<a href="#" class="site-button button-sm">Tất cả<i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						<ul class="post-job-bx">
							<li>
								<a href="#">
									<div class="d-flex m-b30">
										<div class="job-post-company">
											<span><img src="images/logo/icon1.png"/></span>
										</div>
										<div class="job-post-info">
											<h4>Digital Marketing Executive</h4>
											<ul>
												<li><i class="fa fa-map-marker"></i> Sacramento, California</li>
												<li><i class="fa fa-bookmark-o"></i> Full Time</li>
												<li><i class="fa fa-clock-o"></i> Published 11 months ago</li>
											</ul>
										</div>
									</div>
									<div class="d-flex">
										<div class="job-time mr-auto">
											<span>Full Time</span>
										</div>
										<div class="salary-bx">
											<span>$1200 - $ 2500</span>
										</div>
									</div>
									<span class="post-like fa fa-heart-o"></span>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="d-flex m-b30">
										<div class="job-post-company">
											<span><img src="images/logo/icon1.png"/></span>
										</div>
										<div class="job-post-info">
											<h4>Digital Marketing Executive</h4>
											<ul>
												<li><i class="fa fa-map-marker"></i> Sacramento, California</li>
												<li><i class="fa fa-bookmark-o"></i> Full Time</li>
												<li><i class="fa fa-clock-o"></i> Published 11 months ago</li>
											</ul>
										</div>
									</div>
									<div class="d-flex">
										<div class="job-time mr-auto">
											<span>Full Time</span>
										</div>
										<div class="salary-bx">
											<span>$1200 - $ 2500</span>
										</div>
									</div>
									<span class="post-like fa fa-heart-o"></span>
								</a>
							</li>
							
							<li>
								<a href="#">
									<div class="d-flex m-b30">
										<div class="job-post-company">
											<span><img src="images/logo/icon1.png"/></span>
										</div>
										<div class="job-post-info">
											<h4>Digital Marketing Executive</h4>
											<ul>
												<li><i class="fa fa-map-marker"></i> Sacramento, California</li>
												<li><i class="fa fa-bookmark-o"></i> Full Time</li>
												<li><i class="fa fa-clock-o"></i> Published 11 months ago</li>
											</ul>
										</div>
									</div>
									<div class="d-flex">
										<div class="job-time mr-auto">
											<span>Full Time</span>
										</div>
										<div class="salary-bx">
											<span>$1200 - $ 2500</span>
										</div>
									</div>
									<span class="post-like fa fa-heart-o"></span>
								</a>
							</li>
						</ul>
						<div class="m-t30">
							<div class="d-flex">
								<a class="site-button button-sm mr-auto" href="#"><i class="ti-arrow-left"></i> Prev</a>
								<a class="site-button button-sm" href="#">Next <i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="sticky-top">
							<div class="candidates-are-sys m-b30">
								<div class="candidates-bx">
									<div class="testimonial-pic radius"><img src="images/testimonials/pic3.jpg" alt="" width="100" height="100"></div>
									<div class="testimonial-text">
										<p>I just got a job that I applied for via careerfy! I used the site all the time during my job hunt.</p>
									</div>
									<div class="testimonial-detail"> <strong class="testimonial-name">Richard Anderson</strong> <span class="testimonial-position">Nevada, USA</span> </div>
								</div>
							</div>
							<div class="quote-bx">
								<div class="quote-info">
									<h4>Make a Difference with Your Online Resume!</h4>
									<p>Your resume in minutes with JobBoard resume assistant is ready!</p>
									<a href="#" class="site-button">Create an Account</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Our Job END -->	
		<!-- Call To Action -->
		
		<!-- Call To Action END -->
		<!-- Our Latest Blog -->
		<!-- Our Latest Blog -->
	</div>
	<!-- Footer -->
    @extends('footer');
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="public/frontend/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="public/frontend/plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="public/frontend/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="public/frontend/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="public/frontend/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="public/frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="plugins/rangeslider/rangeslider.js" ></script><!-- Rangeslider -->
<script src="public/frontend/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="public/frontend/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src='public/frontend/js/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->
<script src="public/frontend/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="public/frontend/plugins/paroller/skrollr.min.js"></script><!-- PAROLLER -->
<!-- Go to www.addthis.com/dashboard to customize your tools --> 

</body>

</html>