<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController as customer;
use App\Models\company;
use App\Models\job_detail;
use Illuminate\Support\Facades\App;

// $count_job = new HomeController();
$count_job = App::make("App\Http\Controllers\HomeController");
$category = $count_job->getCategory();
?>
@extends('welcome')
@section('content')
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
                    <h2 class="m-b5">Ngành nghề phổ biến</h2>
                </div>
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter"><?php echo $count_job->job_total() ?></h2>
                    <h6 class="fw3">Công việc</h6>
                </div>
                <!-- <div class="head-counter-bx">
                    <h2 class="m-b5 counter">4500</h2>
                    <h6 class="fw3">Tasks Posted</h6>
                </div> -->
                <div class="head-counter-bx">
                    <h2 class="m-b5 counter"><?= $count_job->count_cv_candidate() ?></h2>
                    <h6 class="fw3">Ứng viên</h6>
                </div>
            </div>
            <div class="row sp20">
                @foreach($category as $item)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="icon-bx-wraper">
                        <div class="icon-content">
                            <div class="icon-md text-primary m-b20"><i class="ti-location-pin"></i></div>
                            <a href="#" class="dez-tilte">{{$item->category_name}}</a>
                            <p class="m-a0"><?= $count_job->getCountJobByCategory($item->id_category) ?> công việc</p>
                            <div class="rotate-icon"><i class="ti-location-pin"></i></div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                            <span><?php echo $count_job->count_job_distribution($value->id_distribution); ?> Công việc</span>
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
                                        // print_r(json_encode($image1));die;
                                        // $image_company = company::where('company_id', $image1['id_company'])->first();
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
                                        <span><?php echo $count_job->money_format($image1->salary_up)."tr"."-".$count_job->money_format($image1->salary_down)."tr"?></span>
                                    </div>
                                </div>
                                <span class="post-like fa fa-heart-o">
                                    <img src="pullic/frontend/images/icon/hearts.png" alt="">
                                </span>
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