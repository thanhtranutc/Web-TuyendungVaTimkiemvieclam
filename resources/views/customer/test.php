<!DOCTYPE html>

<head>
    <style>
        .header-info {
            background-color: black;
            width: 100%;
            height: 25px;
        }

        .text-info {
            color: white;
            font-size: 13px;
            margin: auto 5px;
            padding-top: 3px;
        }

        .text-info.left {
            float: left;
        }

        .text-info.right {
            float: right;
        }
        .container-header{
            width: 100%;
        }
        .header-menu{
            background-color: red;
            width: 90%;
            margin: auto;
            display: flex;
        }
        .header-logo{
            width: 20%;
            background-color: blue;
        }
        .container-menu{
            display: flex;
            height: 100px;
        }
        li{
            list-style: none;
            margin: auto 10px;
        }
        li:hover{
            width: 100px;
            height: 50px;
            border: 1px solid;
            background-color: tan;
            border-radius: 5px;
        }
        .menu-navbar-nav{
            display: flex;
        }
        .sub-menu-item{
            display: none;
        }
    </style>
</head>
<html>

<body>
    <div class="container-header">
        <div class="header-info">
            <span class="text-info left"><i>Phone: 0869984922</i></span>
            <span class="text-info right">Instagram</span>
        </div>
        <div class="header-menu">
            <div class="header-logo">sdfdsf</div>
            <div class="container-menu">
                <div class="menu-item">
                <ul class="menu-navbar-nav">
								<li class="active">
									<a href="{{URL::to('/')}}">Trang chủ</a>
								</li>
								<li>
									<a href="#">Việc làm<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu-item">
										<li><a href="{{URL::to('/job_browser')}}" class="dez-page">Công việc</a></li>
										<li><a href="{{URL::to('/company')}}" class="dez-page">Công ty</a></li>
									</ul>
								</li>
							
								<li>
									<a href="{{URL::to('/candidates')}}"><?= __('Hồ sơ của bạn') ?></a>
								</li>
								<li>
									<a href="#">Trang khác <i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu-item">
										<li><a href="about-us.html" class="dez-page">Thông tin</a></li>
										<li><a href="error-404.html" class="dez-page">Error 404</a></li>
										<li><a href="{{URL::to('/contact')}}" class="dez-page">Liên hệ</a></li>
									</ul>
								</li>
							</ul>
                </div>
                <div class="menu-item">asdasdasd</div>
                <div class="menu-item">asdasdasd</div>
            </div>
        </div>
    </div>
</body>

</html>