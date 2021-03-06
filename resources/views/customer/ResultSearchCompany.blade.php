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
                <!-- <h1 class="text-white"><?= __('C??ng ty') ?></h1> -->
                <!-- Breadcrumb row -->
                <!-- <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}"><?= __('Trang ch???') ?></a></li>
                        <li><?= __('C??ng ty') ?></li>
                    </ul>
                </div> -->
                <h2 class="text-company-custom"><?= __('Kh??m ph??') ?><br /> <span class="text-primary"><?= __('15000+') ?></span><?= __('C??ng ty tuy???n d???ng') ?></h2>
                <h3 class="text-company-custom"><?= __('Tra c???u th??ng tin c??ng ty v?? n??i l??m vi???c d??nh cho b???n.') ?></h3>
                <div class="find-job-bx">
                    <form class="dezPlaceAni form-search-company" method="get" action="{{URL::to('/searchcompany')}}">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="form-group">
                                    <label></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="<?= __('Ti??u ?????, t??n c??ng ty') ?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <button type="submit" class="site-button btn-block"><?= __('T??m ki???m') ?></button>
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
                    <h2 class="m-b5 custom-title-text"><?= __('K???t qu??? t??m ki???m') ?></h2>
                    <h6 class="fw4 m-b0"><?= __('C?? ').count($resultSearch).' '.__('k???t qu??? ???????c t??m th???y') ?></h5>
                </div>
                <div class="align-self-end">
                    <a href="{{URL::to('/job_browser')}}" class="site-button button-sm">T???t c???<i class="fa fa-long-arrow-right"></i></a>
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
                                <h4><?= __('T???o s??? kh??c bi???t v???i S?? y???u l?? l???ch tr???c tuy???n c???a b???n!') ?></h4>
                                <p><?= __('S?? y???u l?? l???ch c???a b???n trong v??i ph??t v???i tr??? l?? s?? y???u l?? l???ch JobBoard ???? s???n s??ng!') ?></p>
                                <a href="{{URL::to('/register_customer')}}" class="site-button"><?= __('T???o t??i kho???n') ?></a>
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