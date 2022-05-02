<?php

use Illuminate\Support\Facades\Session;

$user_id = Session::get('user_id');

?>
@extends('welcome')
@section('content')
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url(public/frontend/images/banner/bnr1.jpg);">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">Chi tiết công việc</h1>
            <!-- Breadcrumb row -->
            <div class="breadcrumb-row">
                <ul class="list-inline">
                    <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li>Chi tiết công việc</li>
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
    <?php
    $notifi = Session::get('notifi');
    if ($notifi) {
        echo '<span style="color:red;" class="text-alert">' . $notifi . '</span>';
        Session::put('notifi', null);
        echo '<br></br>';
        echo ' ';
    }
    ?>
    <div class="section-full content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="m-b30">
                                    <img src="images/blog/grid/pic1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    <h4 class="text-black font-weight-700 p-t10 m-b15">Chi tiết công việc</h4>
                                    <ul>
                                        <li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Địa chỉ</strong><span class="text-black-light"> {{$data->company['company_adress']}} </span></li>
                                        <li><i class="ti-money"></i><strong class="font-weight-700 text-black">Lương</strong>{{number_format($data->detail_job_salary,0,',','.')}} VND</li>
                                        <li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Kinh nghiệm</strong>6 Year Experience</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="#" class="text-secondry m-r30">{{$data->job['job_desc']}}</a>
                        </h3>
                        <ul class="job-info">
                            @php
                            use Carbon\Carbon;
                            @endphp
                            <li><strong>Education</strong> Web Designer</li>
                            <li><strong>Thời hạn:</strong> {{Carbon::parse($data->detail_job_duration)->format('m/d/Y');}}</li>
                            <li><i class="ti-location-pin text-black m-r5"></i> {{$distribution->distribution['distribution_name']}} </li>
                        </ul>
                        <p class="p-t20"><?php echo $data->company['company_desc'] ?></p>
                        <h5 class="font-weight-600">Mô tả công việc</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <p><?php echo $data->detail_job_desc ?></p>
                        <h5 class="font-weight-600">Yêu cầu ứng viên</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <ul class="list-num-count no-round">
                            <!-- <li>The DexignLab Privacy Policy was updated on 25 June 2018.</li>
                            <li>Who We Are and What This Policy Covers</li> -->
                            <p><?php echo $data->detail_job_request ?></p>

                        </ul>
                        <?php if ($user_id) { ?>
                            <a href="{{URL::to('/apply_job'.$user_id.$data->id_job)}}" class="site-button">Ứng tuyển</a>
                        <?php } else { ?>
                            <a href="{{URL::to('/login_user')}}" class="site-button">Ứng tuyển</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail -->
    <!-- Our Jobs -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="#"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="#">Title of blog post</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> London </li>
                                    <li class="post-author"><i class="ti-user"></i>By <a href="#">Jone</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="#" class="site-button outline">Apply Now <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="m-b30 blog-grid">
                        <div class="dez-post-media dez-img-effect "> <a href="#"><img src="images/blog/grid/pic2.jpg" alt=""></a> </div>
                        <div class="dez-info p-a20 border-1">
                            <div class="dez-post-title ">
                                <h5 class="post-title"><a href="#">Title of blog post</a></h5>
                            </div>
                            <div class="dez-post-meta ">
                                <ul>
                                    <li class="post-date"> <i class="ti-location-pin"></i> London </li>
                                    <li class="post-author"><i class="ti-user"></i>By <a href="#">Jone</a> </li>
                                </ul>
                            </div>
                            <div class="dez-post-text">
                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.</p>
                            </div>
                            <div class="dez-post-readmore">
                                <a href="#" class="site-button outline">Apply Now <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Jobs END -->
</div>
@endsection