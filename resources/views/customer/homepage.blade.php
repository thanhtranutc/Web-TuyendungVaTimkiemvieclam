@extends('welcome')
@section('content')

<?php

use App\Http\Controllers\HomeController;
use App\Models\job_detail;
?>
<div class="page-content">
    <div class="dez-bnr-inr dez-bnr-inr-md" style="background-image:url(public/frontend/images/main-slider/slide2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry align-m ">
                <div class="find-job-bx">
                    <p class="site-button button-sm">Find Jobs, Employment & Career Opportunities</p>
                    <h2>Search Between More Them <br /> <span class="text-primary">50,000</span> Open Jobs.</h2>
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
                @foreach($city as $key=>$value)
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <div class="city-bx align-items-end  d-flex" style="background-image:url(images/city/pic1.jpg)">
                        <div class="city-info">
                            <h5>{{$value->distribution_name}}</h5>
                            <span><?php
                            $count_job = new HomeController(); 
                            echo $count_job->count_job_distribution($value); ?> Jobs</span>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        @foreach($list_job as $key=>$job_list)
                        <li>
                            <a href="{{URL::to('/detail_job'.$job_list->job_id)}}">
                                <div class="d-flex m-b30">
                                    <div class="job-post-company">

                                        <?php
                                        $image1 = job_detail::where('id_job', $job_list->job_id)->with('company')->first();
                                        ?>
                                        <span><img style="height:60px; width:60px;" src="{{URL('public/images/company/'.$image1->company['company_image'])}}"/></span>
                                    </div>
                                    <div class="job-post-info">
                                        <!-- <h4>Digital Marketing Executive</h4> -->
                                        <h4>{{$job_list->job_desc}}</h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i> {{$job_list->distribution['distribution_name']}}</li>
                                            <li><i class="fa fa-bookmark-o"></i> {{$job_list->working_format['working_format_name']}}</li>
                                            <li><i class="fa fa-clock-o"></i> Published 11 months ago</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="job-time mr-auto">
                                        <span>{{$job_list->working_format['working_format_name']}}</span>
                                    </div>
                                    <div class="salary-bx">
                                        <span>$1200 - $ 2500</span>
                                    </div>
                                </div>
                                <span class="post-like fa fa-heart-o"></span>
                            </a>
                        </li>
                        @endforeach
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
</div>
@endsection