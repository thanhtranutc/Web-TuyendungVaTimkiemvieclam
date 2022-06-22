<?php use Illuminate\Support\Facades\App; ?>
<?php use App\Models\distribution; ?>
<?php $distribution = App::make("App\Models\distribution")->getListDistribution() ?>
<?php $work_type = App::make("App\Models\working_format")->getListWorkingFormat() ?>
<?php $category = App::make("App\Models\category")->getListCategory() ?>
<!--  -->
@extends('welcome')
@section('content')
@php
use App\Models\job_detail;
use App\Http\Controllers\HomeController;
$count_job = App::make("App\Http\Controllers\HomeController");
@endphp
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
						<li>Việc làm</li>
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
							<h5 class="widget-title font-weight-700 text-uppercase ">Kết quả tìm kiếm</h5>
							<ul class="post-job-bx">
								@foreach($result_search as $value)
								@php
								$image1 = job_detail::where('id_job', $value->job_id)->with('company')->first();
								@endphp
								<li>
									<a href="{{URL::to('/detail_job'.$value->job_id)}}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{URL('public/images/company/'.$image1->company['company_image'])}}" /></span>
											</div>
											<div class="job-post-info">
												<h4 class="custom-title-text">{{$value->job_desc}}</h4>
												<ul>
													<li><i class="fa fa-map-marker"></i>{{$value->distribution['distribution_name']}}</li>
													<li><i class="fa fa-bookmark-o"></i> {{$value->working_format['working_format_name']}}</li>
													<li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($value->job_date)->diffForHumans()}}</li>
												</ul>
											</div>
										</div>
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span>{{$value->working_format['working_format_name']}}</span>
											</div>
											<div class="salary-bx">
												<span><?php echo $count_job->money_format($image1->salary_down) . "tr" . "-" . $count_job->money_format($image1->salary_up) . "tr" ?></span>
											</div>
										</div>
										<!-- <span class="post-like fa fa-heart-o"></span> -->
									</a>
								</li>
								@endforeach
							</ul>
							{{ $result_search->appends(request()->query())->links() }}
						</div>
					<div class="col-xl-3 col-lg-4">
						<div class="sticky-top">
							<form method="get" action="{{URL::to('/searchjob')}}">
								@csrf
								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Từ khóa </h5>
									<div class="">
										<input type="text" class="form-control" placeholder="Tìm kiếm">
									</div>
								</div>
								<div class="clearfix m-b30">

									<h5 class="widget-title font-weight-700 text-uppercase">Khu vực</h5>

									<select class="form-control" name="distribution" id="selectdistribution" style="width: 100%;">
										<option selected="selected custom-select">Tất cả khu vực</option>
										@foreach($distribution as $value)
										<option value="{{$value->distribution_name}}">{{$value->distribution_name}}</option>
										@endforeach
									</select>

								</div>

								<div class="clearfix m-b30">
									<h5 class="widget-title font-weight-700 text-uppercase">Thời gian làm việc</h5>
									<select class="form-control" name="workingformat" id="selectcategory" style="width: 100%;">
										<option selected="selected custom-select">Tất cả</option>
										@foreach($work_type as $item)
										<option value="{{$item->working_format_name}}">{{$item->working_format_name}}</option>
										@endforeach
									</select>
								</div>
								<div class="clearfix">
									<h5 class="widget-title font-weight-700 text-uppercase">Ngành nghề</h5>

									<select class="form-control" name="category" id="selectcategory" style="width: 100%;">
										<option selected="selected custom-select">Tất cả ngành nghề</option>
										@foreach($category as $cate)
										<option value="{{$cate->category_name}}">{{$cate->category_name}}</option>
										@endforeach
									</select>

								</div>
								<div class="clearfix m-b30">
								</div>
								<button type="submit" href="#" class="site-button">Tìm kiếm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Browse Jobs END -->
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#selectcategory').select2();
	});
	$(document).ready(function() {
		$('#selectdistribution').select2();
	});
</script>
@endsection