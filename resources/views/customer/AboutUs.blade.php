@extends('welcome')
@section('content')
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(public/frontend/images/banner/bnr1.jpg);">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Giới thiệu</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="#">Trang chủ</a></li>
                    <li>Giới thiệu</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<div class="content-block">
    <div class="section-full content-inner overlay-white-middle">
        <div class="container">
            <div class="row align-items-center m-b50">
                <div class="col-md-12 col-lg-6 m-b20">
                    <h2 class="m-b5">Giới thiệu về chúng tôi</h2>
                    <h3 class="fw4">Tuyển dụng công nghệ số</h3>
                    <p class="m-b15">Nền tảng ứng dụng sâu công nghệ AI, chủ động tìm & gợi ý ứng viên phù hợp từ hơn 5.000.000 ứng viên (60% ứng viên có trên 2 năm kinh nghiệm).</p>
                    <p>Kênh tìm việc chất lượng, uy tín hàng đầu Việt Nam với 30.000+ việc làm được cập nhật mỗi ngày từ 130.000+ doanh nghiệp đã được xác thực.</p>
                    <p class="m-b15">Ứng dụng tự động gợi ý công việc phù hợp với nhu cầu của ứng viên. Tích hợp nhiều tính năng nổi bật giúp ứng viên không chỉ tìm việc, ứng tuyển một cách nhanh chóng mà còn phát triển bản thân thông qua nhiều công cụ hữu ích.</p>
                    <a href="{{URL::to('/job_browser')}}" class="site-button"><?= __('Tìm việc')?></a>
                </div>
                <div class="col-md-12 col-lg-6">
                    <img src="public/frontend/images/our-work/pic1.jpg" alt="" />
                </div>
            </div>
           
        </div>
    </div>
    <!-- Why Chose Us -->
    <!-- Call To Action -->
    <div class="section-full content-inner-2 call-to-action overlay-black-dark text-white text-center bg-img-fix" style="background-image: url(public/frontend/images/background/bg4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="m-b10"><?= __('Tạo sự khác biệt với Sơ yếu lý lịch trực tuyến của bạn!')?></h2>
                   
                    <a href="/login_customer" class="site-button m-t20 outline outline-2 radius-xl"><?= __('Tạo tài khoản')?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action END -->
    <!-- Our Latest Blog -->
   
    <!-- Our Latest Blog -->
</div>
@endsection