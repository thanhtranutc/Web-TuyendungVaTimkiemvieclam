@extends('welcome')
@section('content')
@php
use App\Models\job_detail;
use App\Http\Controllers\HomeController;
$count_job = new HomeController(); 
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
						<h5 class="widget-title font-weight-700 text-uppercase">Recent Jobs</h5>
						<ul class="post-job-bx">
							@foreach($job_list as $value)
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
											<h4>{{$value->job_desc}}</h4>
											<ul>
												<li><i class="fa fa-map-marker"></i>{{$value->distribution['distribution_name']}}</li>
												<li><i class="fa fa-bookmark-o"></i> {{$value->working_format['working_format_name']}}</li>
												<li><i class="fa fa-clock-o"></i> Published 11 months ago</li>
											</ul>
										</div>
									</div>
									<div class="d-flex">
										<div class="job-time mr-auto">
											<span>{{$value->working_format['working_format_name']}}</span>
										</div>
										<div class="salary-bx">
											<span><?php echo $count_job->money_format($image1->salary_up)."tr"."-".$count_job->money_format($image1->salary_down)."tr"?></span>
										</div>
									</div>
									<span class="post-like fa fa-heart-o"></span>
								</a>
							</li>
							@endforeach
						</ul>
						<div class="pagination-bx m-t30">
							<ul class="pagination">
								<li class="previous"><a href="#"><i class="ti-arrow-left"></i> Prev</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li class="next"><a href="#">Next <i class="ti-arrow-right"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4">
						<div class="sticky-top">
							<div class="clearfix m-b30">
								<h5 class="widget-title font-weight-700 text-uppercase">Keywords</h5>
								<div class="">
									<input type="text" class="form-control" placeholder="Search">
								</div>
							</div>
							<div class="clearfix m-b10">
								<h5 class="widget-title font-weight-700 m-t0 text-uppercase">Location</h5>
								<input type="text" class="form-control m-b30" placeholder="Location">
								<!-- <div class="input-group m-b20">
									<input type="text" class="form-control" placeholder="120">
									<select>
										<option>Km</option>
										<option>miles</option>
									</select>
								</div> -->
							</div>
							<div class="clearfix m-b30">
								<h5 class="widget-title font-weight-700 text-uppercase">Job type</h5>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										@foreach($work_type as $item)
										<div class="product-brand">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="check1" name="example1">
												<label class="custom-control-label" for="check1">{{$item->working_format_name}}</label>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="clearfix">
								<h5 class="widget-title font-weight-700 text-uppercase">Category</h5>
								<select>
									@foreach($category as $cate)
									<option>{{$cate->category_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Browse Jobs END -->
	</div>
</div>
@endsection