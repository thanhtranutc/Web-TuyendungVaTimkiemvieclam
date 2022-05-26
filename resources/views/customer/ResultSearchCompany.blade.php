@extends('welcome')
@section('content')
<style>
    .container-company-page {
        width: 90%;
        margin: auto;
        height: auto;
    }

    .block-title-pagecompany {
        width: 100%;
        text-align: center;
        margin: 15px;
    }

    .text-title {
        font-size: 25px;
        font-weight: 700;
    }

    .container-block-company {
        width: 100%;
    }

    .block-company-content {
        width: 30%;
        height: 400px;
        margin: 10px 1.6%;
        float: left;
        border: 0.5px solid;
        border-color: antiquewhite;
        background-color: white;
        box-shadow: 0 0 10px 0 rgb(0 24 128 / 10%) !important;
    }

    .content-image-company {
        height: 40%;
        width: 100%;
    }

    .content-logo-company {
        height: 60px;
        width: 70px;
        position: relative;
        bottom: 45px;
        left: 10px;
        border-radius: 6px;
        background-color: white;
        border: 0px;
    }

    .image-company {
        width: 100%;
        height: 100%;
    }

    .content-desc-company {
        margin-top: 30px !important;
        width: 95%;
        margin: auto;
    }

    /* p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 18px;
    } */
    p {
        /* line-height: 18px; */
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* .job-post-info p{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    } */

    .page-content.bg-white.container-company-custom {
        height: 1200px !important;
    }

    .text-company-custom {
        color: white;
        text-align: left;
    }

    .form-search-company {
        width: 50%;
    }

    .image-company-custom {
        width: 100px !important;
        height: 100px !important;
    }

    .text-introduce-custom {
        margin-top: 10px !important;
        max-height: 30px;
        /* background-color: red; */
        /* white-space: nowrap; */
        overflow: hidden;
        text-overflow: ellipsis;
        color: black !important;
    }
</style>
<div class="page-content bg-white container-company-custom">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(public/frontend/images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <!-- <h1 class="text-white"><?= __('Công ty') ?></h1> -->
                <!-- Breadcrumb row -->
                <!-- <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}"><?= __('Trang chủ') ?></a></li>
                        <li><?= __('Công ty') ?></li>
                    </ul>
                </div> -->
                <h2 class="text-company-custom"><?= __('Khám phá') ?><br /> <span class="text-primary"><?= __('15000+') ?></span><?= __('Công ty tuyển dụng') ?></h2>
                <h3 class="text-company-custom"><?= __('Tra cứu thông tin công ty và nơi làm việc dành cho bạn.') ?></h3>
                <div class="find-job-bx">
                    <form class="dezPlaceAni form-search-company" method="get" action="{{URL::to('/searchcompany')}}">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="<?= __('Tiêu đề, tên công ty') ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <button type="submit" class="site-button btn-block"><?= __('Tìm kiếm') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Breadcrumb row END -->
            </div>

        </div>
    </div>
    <div class="section-full bg-white content-inner-2">
        <div class="container">
            <div class="d-flex job-title-bx section-head">
                <div class="mr-auto">
                    <h2 class="m-b5 custom-title-text"><?= __('Kết quả tìm kiếm') ?></h2>
                    <h6 class="fw4 m-b0"><?= __('Có ').count($resultSearch).' '.__('kết quả được tìm thấy') ?></h5>
                </div>
                <div class="align-self-end">
                    <a href="{{URL::to('/job_browser')}}" class="site-button button-sm">Tất cả<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <ul class="post-job-bx">
                        @foreach($resultSearch as $item)
                        <li>
                            <a href="{{URL::to('/detail-company'.$item->company_id)}}">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">
                                        <span class="image-company-custom"><img style="height:100px; width:100px;" src="{{URL('public/images/company/'.$item->company_image)}}" /></span>
                                    </div>
                                    <div class="job-post-info">
                                        <!-- <h4>Digital Marketing Executive</h4> -->
                                        <h4 class="custom-title-text">{{$item->company_name}}</h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i>{{$item->company_adress}}</li><br>
                                            <li class="text-introduce-custom"><span><?= $item->company_desc ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <!-- <div class="col-lg-3">
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
                                <h4><?= __('Tạo sự khác biệt với Sơ yếu lý lịch trực tuyến của bạn!') ?></h4>
                                <p><?= __('Sơ yếu lý lịch của bạn trong vài phút với trợ lý sơ yếu lý lịch JobBoard đã sẵn sàng!') ?></p>
                                <a href="{{URL::to('/register_customer')}}" class="site-button"><?= __('Tạo tài khoản') ?></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->

</div>
@endsection