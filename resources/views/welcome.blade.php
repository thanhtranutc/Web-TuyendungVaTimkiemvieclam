<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="JobBoard - Tuyển Dụng" />
	<meta property="og:title" content="JobBoard - Tuyển Dụng" />
	<meta property="og:description" content="JobBoard - Tuyển Dụng" />
	<meta property="og:image" content="JobBoard - Tuyển Dụng" />
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

	<!-- PAGE TITLE HERE -->
	<title>JobBoard - Tuyển Dụng</title>

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
	<link rel="stylesheet" href="public/frontend/plugins/datepicker/css/bootstrap-datetimepicker.min.css" />
	<!-- Revolution Slider Css -->
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/plugins/revolution/revolution/css/navigation.css">
	<!-- Revolution Navigation Style -->

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="public/backend/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="public/frontend/plugins/fontawesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="public/backend/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="public/backend/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="public/backend/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="public/backend/plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="public/backend/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="public/frontend/css/custom.css">
	<link rel="stylesheet" href="public/frontend/css/customless.css">
	<!-- <link rel="stylesheet" href="public/frontend/css/sweetalert.css"> -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>


	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="public/backend/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="public/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
							<a href="{{URL::to('/')}}"><img src="public/frontend/images/logo.png" class="logo" alt=""></a>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="{{URL::to('/')}}">Trang chủ</a>
								</li>
								<li>
									<a href="#">Việc làm<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="{{URL::to('/job_browser')}}" class="dez-page">Công việc</a></li>
										<li><a href="{{URL::to('/company')}}" class="dez-page">Công ty</a></li>
									</ul>
								</li>
								@php
								$user_id = Session::get('user_id');
								if($user_id){
								@endphp
								<li>
									<a href="{{URL::to('/candidates')}}"><?= __('Hồ sơ của bạn') ?></a>
								</li>
								@php
								}
								@endphp

								<li>
									<a href="#">Trang khác <i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
										<li><a href="about-us.html" class="dez-page">Thông tin</a></li>
										<li><a href="error-404.html" class="dez-page">Error 404</a></li>
										<li><a href="{{URL::to('/contact')}}" class="dez-page">Liên hệ</a></li>
									</ul>
								</li>
							</ul>
							<?php

							use Illuminate\Support\Facades\App; ?>
							<?php $hepper = App::make('App\Models\favourite_job'); ?>
							<?php

							use Illuminate\Support\Facades\Session;

							$user_id = Session::get('user_id');
							$user_name = Session::get('user_name');
							if ($user_id) {
							?>
								<a class="button-login" href="{{URL::to('/register_customer')}}"><i class="fa fa-user"></i>Đăng ký</a>
								<a class="button-register" href="{{URL::to('/logout_customer')}}"><i class="fa fa-lock"></i> Đăng xuất</a>
							<?php
							} else {
							?>
								<a class="button-login" href="{{URL::to('/register_customer')}}"><i class="fa fa-user"></i>Đăng ký</a>
								<a class="button-register" href="{{URL::to('/login_customer')}}"><i class="fa fa-lock"></i> Đăng nhập</a>
							<?php } ?>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item dropdown">
									<a class="nav-link" href="{{URL::to('/favourite')}}">
										<i class="far fa-heart"></i>
										<span class="badge badge-warning navbar-badge"><?= isset($user_id) ? $hepper->getCountFavouriteJob($user_id) : "" ?></span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link" data-toggle="dropdown" href="#">
										<i class="far fa-bell"></i>
										<span class="badge badge-warning navbar-badge">15</span>
									</a>
									<!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
										<span class="dropdown-item dropdown-header">15 Notifications</span>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item">
											<i class="fas fa-envelope mr-2"></i> 4 new messages
											<span class="float-right text-muted text-sm">3 mins</span>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item">
											<i class="fas fa-users mr-2"></i> 8 friend requests
											<span class="float-right text-muted text-sm">12 hours</span>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item">
											<i class="fas fa-file mr-2"></i> 3 new reports
											<span class="float-right text-muted text-sm">2 days</span>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
									</div> -->
								</li>
							</ul>
							<?php
							if ($user_name) {
							?>
								&ensp;Id:<span data-user_id="{{$user_id}}" name="user">{{$user_name}}</span>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>
		<!-- header END -->
		<!-- Content -->
		<!-- Section Banner -->
		@yield('content');
		<!-- Our Job END -->
		<!-- Call To Action -->

		<!-- Call To Action END -->
		<!-- Our Latest Blog -->
		<!-- Our Latest Blog -->
		<!-- Footer -->
		@extends('footer');
		<!-- Footer END -->
		<!-- scroll top button -->
		<button class="scroltop fa fa-arrow-up"></button>
	</div>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="public/ckeditor/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('textarea1');
		CKEDITOR.config.entities = false;
	</script>
	<script>
		CKEDITOR.replace('textarea2');
		CKEDITOR.config.entities = false;
	</script>
	<script>
		CKEDITOR.replace('textarea3');
		CKEDITOR.config.entities = false;
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.add-to-favourite').click(function() {
				var job_id = $(this).data('job_id');

				$.ajax({
					url: "{{url('/addtofavourite')}}",
					method: 'GET',
					data: {
						id_job: job_id,
					},
					success: function(data) {
						swal("Đã thêm công việc vào yêu thích của bạn!", "", "success");
					},
					error: function(data) {
						swal("Công việc này đã có trong yêu thích của bạn!", "", "error");
					}
				});
			});
		});
	</script>
	<script src="public/frontend/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
	<script src="public/frontend/plugins/wow/wow.js"></script><!-- WOW JS -->
	<script src="public/frontend/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="public/frontend/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
	<script src="public/frontend/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
	<script src="public/frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
	<script src="public/frontend/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
	<script src="public/frontend/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
	<script src="public/frontend/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
	<script src="public/frontend/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
	<script src="public/frontend/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
	<script src="public/frontend/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
	<script src="public/frontend/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
	<script src="public/frontend/plugins/rangeslider/rangeslider.js"></script><!-- Rangeslider -->
	<script src="public/frontend/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
	<script src="public/frontend/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
	<script src='public/frontend/js/recaptcha/api.js'></script> <!-- Google API For Recaptcha  -->
	<script src="public/frontend/js/dz.ajax.js"></script><!-- CONTACT JS  -->
	<script src="public/frontend/plugins/paroller/skrollr.min.js"></script><!-- PAROLLER -->
	<script src="public/frontend/js/sweetalert.min.js"></script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->


	<!-- jQuery -->
	<script src="public/backend/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="public/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="public/backend/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="public/backend/plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="public/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="public/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="public/backend/plugins/moment/moment.min.js"></script>
	<script src="public/backend/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="public/backend/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="public/backend/dist/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="public/backend/dist/js/demo.js"></script>
	<script src="public/backend/plugins/toastr/toastr.min.js"></script>
	<!-- <script src="public/backend/plugins/sweetalert2/sweetalert2.min.js"></script> -->
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="public/backend/dist/js/pages/dashboard.js"></script>
	<script src="public/ckeditor/ckeditor.js"></script>

	<script src="public/backend/plugins/select2/js/select2.full.min.js"></script>


</body>

</html>