<?php use Illuminate\Support\Facades\App; ?>
<?php $hepper = App::make("App\Http\Controllers\HomeController"); ?>
<?php $job = App::make("App\Models\job"); ?>
<?php $job_detail = App::make("App\Models\job_detail"); ?>
@extends('welcome')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url(public/frontend/images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Việc làm</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}">Home</a></li>
                        <li>Browse Jobs</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Browse Jobs -->
        <div class="section-full bg-white browse-job content-inner-2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <h5 class="widget-title font-weight-700 text-uppercase ">Công việc yêu thích của bạn</h5>
                        <?php if (isset($list_favouritejob)) { ?>
                            <ul class="post-job-bx">
                                @foreach($list_favouritejob as $value)
              
                                <?php $job_detail_info = $job_detail->getDetailJobByIdJob($value->id_job) ?>
                                <?php $job_info = $job->getJobById($value->id_job) ?>
                                <li>
                                    <a href="">
                                        <div class="d-flex m-b30">
                                            <div class="job-post-company">
                                                <span><img style="height:60px; width:60px;" src="{{URL('public/images/company/'.$job_detail_info->company['company_image'])}}" /></span>
                                            </div>
                                            <div class="job-post-info">
                                                <h4 class="custom-title-text"><?= $job_info->job_desc?></h4>
                                                <ul>
                                                    <li><i class="fa fa-map-marker"></i><?= $job_info->distribution['distribution_name'] ?></li>
                                                    <li><i class="fa fa-bookmark-o"></i><?= $job_info->working_format['working_format_name'] ?></li>
                                                    <li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($job_info->job_date)->diffForHumans()}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="job-time mr-auto">
                                                <span><?= $job_info->working_format['working_format_name'] ?></span>
                                            </div>
                                            <div class="salary-bx">
                                                <span><?php echo $hepper->money_format($job_detail_info->salary_up) . "tr" . "-" . $hepper->money_format($job_detail_info->salary_down) . "tr" ?></span>
                                            </div>
                                        </div>
                                        <span class="post-like fa fa-heart-o"></span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        <?php } else { ?>
                            <ul>
                                <p>Chưa có công việc nào được thêm vào yêu thích của bạn!</p>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Browse Jobs END -->
    </div>
</div>
@endsection