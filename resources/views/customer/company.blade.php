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
        padding-top: 5px;
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

    p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

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
</style>
<div style="background-color: aliceblue !important;" class="page-content bg-white container-company-custom">
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
    <div class="content-block">
        <div class="container-company-page">
            <div class="block-title-pagecompany">
                <p class="text-title"><?= __('DANH SÁCH CÁC CÔNG TY NỔI BẬT') ?></p>
            </div>
            <div class="container-block-company">
                @foreach($listcompany as $item)
                <div class="block-company-content">
                    <a href="{{URL::to('/detail-company'.$item->company_id)}}">
                        <div class="content-image-company">
                            <img class="image-company" src="{{URL::to('public/images/company/'.$item->company_logo)}}" />
                            <div class="content-logo-company">
                                <span><img style="height:60px; width:70px; border-radius:6px;" src="{{URL('public/images/company/'.$item->company_image)}}" /></span>
                            </div>
                        </div>
                    </a>
                    <div class="content-desc-company">
                        <h3>{{$item->company_name}}</h3>
                        <div class="company-desc">
                            <p><?= $item->company_desc ?></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
</div>
@endsection