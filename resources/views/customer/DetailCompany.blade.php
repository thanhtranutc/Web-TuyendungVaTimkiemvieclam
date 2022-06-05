<?php use Illuminate\Support\Facades\App; ?>
<?php $job_info = App::make("App\Repositories\JobRepository"); ?>
@extends('welcome')
@section('content')
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url('public/images/company/<?= $company['company_logo']?>');">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Chi tiết công ty</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li>Chi tiết công ty</li>
                </ul>
            </div>
            <!-- Breadcrumb row END -->
        </div>
    </div>
</div>
<!-- inner page banner END -->
<!-- contact area -->
<div class="content-block">
    <!-- Job Detail -->
    <div class="section-full content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="m-b30">
                                    <img src="{{URL('public/images/company/'.$company['company_image'])}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    <h4 class="text-black font-weight-700 p-t10 m-b15"><?= __('Địa chỉ công ty')?></h4>
                                    <ul>
                                        <li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black"></strong><span class="text-black-light">{{$company['company_adress']}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="#" class="text-secondry m-r30"><?= __('Giới thiệu công ty')?></a>
                        </h3>
                        <ul class="job-info">
                            <li><strong>Nhân viên:&ensp;</strong>{{$company['company_staff']}}</li>
                        </ul>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <div><?= $company['company_desc']?></div>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <ul class="list-num-count no-round">
                            <!-- <li>The DexignLab Privacy Policy was updated on 25 June 2018.</li>
                            <li>Who We Are and What This Policy Covers</li> -->
                            <p></p>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail -->
    <!-- Our Jobs -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="block-relate">
                <span>Tin tuyển dụng</span>
            </div>
            <div class="row">
                @foreach($listRelate as $item)
                <?php $info = $job_info->getJobDetailByIdJob($item->job_id)?>
                <div class="col-xl-3 col-lg-6 col-md-6 block-relate-content">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="#"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="post-title"><a href="#">{{$item->job_desc}}</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i>{{$item->distribution['distribution_name']}}</li>
                                    <li class="post-author" style="height: auto;">{{$item->category['category_name']}}</li>
                                </ul>
                            </div>
                            <div style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" class="dez-post-text">
                                <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $info['detail_job_desc'] ?></p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="{{URL::to('/detail_job'.$item->job_id)}}" class="site-button outline"><?= __('Xem') ?><i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
    <!-- Our Jobs END -->
</div>
@endsection