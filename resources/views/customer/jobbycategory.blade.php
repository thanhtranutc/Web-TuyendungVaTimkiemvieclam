<?php

use Illuminate\Support\Facades\App; ?>
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
                        <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li>{{$category->category_name}}</li>
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
                    <div class="col-xl-12 col-lg-12">
                        <h5 class="widget-title font-weight-700 text-uppercase ">Công việc {{$category->category_name}}</h5>
                        <ul class="post-job-bx">
                            @foreach($listjob as $item)
                            <?php $info = $job_detail->getDetailJobByIdJob($item->job_id) ?>
                            <li class="col-xl-6 col-lg-6 block-job-custom">
                                <a href="{{URL::to('/detail_job'.$item->job_id)}}">
                                    <div class="d-flex m-b30">
                                        <div class="job-post-company">
                                            <span><img style="height:60px; width:60px;" src="{{URL('public/images/company/'.$info->company['company_image'])}}" /></span>
                                        </div>
                                        <div class="job-post-info">
                                            <h4 class="custom-title-text">{{$item->job_desc}}</h4>
                                            <ul>
                                                <li><i class="fa fa-map-marker"></i>{{$item->distribution['distribution_name']}}</li>
                                                <li><i class="fa fa-bookmark-o"></i>{{$item->working_format['working_format_name']}}</li>
                                                <li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($item->job_date)->diffForHumans()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="job-time mr-auto">
                                            <span>{{$item->working_format['working_format_name']}}</span>
                                        </div>
                                        <div class="salary-bx">
                                            <span><?php echo $hepper->money_format($info->salary_up) . "tr" . "-" . $hepper->money_format($info->salary_down) . "tr" ?></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $listjob->links() }}
                </div>
            </div>
        </div>
        <!-- Browse Jobs END -->
    </div>
</div>
@endsection