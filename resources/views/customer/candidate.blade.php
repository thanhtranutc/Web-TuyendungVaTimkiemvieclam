<?php

use Illuminate\Support\Facades\App; ?>
<?php $job = App::make("App\Http\Controllers\HomeController"); ?>
<?php $job_detail = App::make("App\Http\Controllers\JobController"); ?>
<?php $job_detail_info = App::make("App\Models\job_detail"); ?>
@extends('welcome')
@section('content')
<style>
    .form-editpassword {
        width: 50%;
        display: none;
    }

    .editpassword-title {
        width: 32%;
        margin: 10px;
        margin-left: 0;
    }

    .button-save-password {
        border-radius: 0.2rem;
        background-color: #2E55FA;
        border: none;
        color: white;
    }
</style>
<div class="page-content bg-white">
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="breadcrumb-row custom">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li>Hồ sơ</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-3">
                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                            <div class="image-user">
                                @php
                                if(isset($userInfor->user_image)){
                                @endphp
                                <img src="{{URL('public/images/user/'.$userInfor->user_image)}}" style="border-radius:50%;">
                                @php
                                }else{
                                @endphp
                                <img src="{{asset('public/frontend/images/icon/blank-profile.png')}}" style="border-radius:50%;">
                                @php } @endphp
                            </div>
                            <span class="infor-user">{{$userInfor->user_name}}</span>
                            <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true"> <img class="icon-form-user" src="{{asset('public/frontend/images/icon/icons8-user-male-26.png')}}"> Thông báo</a>
                            <a class="nav-link" id="vert-tabs-profile-tab" href="{{URL::to('/profile')}}" aria-selected="false"><img class="icon-form-user" src="{{asset('public/frontend/images/icon/icons8-user-male-26.png')}}"> <span>Hồ sơ của bạn</span></a>
                            <a class="nav-link" id="vert-tabs-settings-tab" href="{{URL::to('/favourite')}}" aria-selected="false"><img class="icon-form-user" src="{{asset('public/frontend/images/icon/icons8-heart-30.png')}}"> <span>Công việc yêu thích</span></a>
                        </div>
                    </div>
                    <div class="col-7 col-sm-9 ">
                        <div class="tab-content" id="vert-tabs-tabContent">
                            <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                <div class="col-12 col-sm-12">
                                    <div class="card card-primary card-outline card-outline-tabs block-infor-user">
                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Thông báo</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Tin nhắn</a>
                                                </li> -->
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Cài đặt</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-messages-1" data-toggle="pill" href="#custom-tabs-four-messages2" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Công việc đã ứng tuyển</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                    <!-- <div class="card card-primary card-outline"> -->
                                                    <div class="card">
                                                        <!-- <div class="card-header">
                                                            <div class="card-tools">
                                                                <div class="input-group input-group-sm">
                                                                    <input type="text" class="form-control" placeholder="Search Mail">
                                                                    <div class="input-group-append">
                                                                        <div class="btn btn-primary">
                                                                            <i class="fas fa-search"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                        </div> -->
                                                        <!-- /.card-header -->
                                                        <div class="card-body p-0">
                                                            <div class="mailbox-controls">
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive mailbox-messages">
                                                                <table class="table table-hover table-striped">
                                                                    <tbody>
                                                                        @foreach($notify as $value)
                                                                        <?php $info_job = $job_detail_info->getDetailJobByIdJob($value->id_job);  ?>
                                                                        <?php if ($info_job) { ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="icheck-primary">
                                                                                        <input type="checkbox" value="" id="check1">
                                                                                        <label for="check1"></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                                                <td class="mailbox-name"><a href="read-mail.html">{{$info_job->company['company_name']}}</a></td>
                                                                                <td class="mailbox-subject"><b><?= __('Thông báo') ?></b> - <a style="color: black;" href="{{URL::to('/detail_job'.$info_job->id_job)}}">{{$value->notification_title}}</a>
                                                                                </td>
                                                                                <td class="mailbox-attachment"></td>
                                                                                <td class="mailbox-date">{{$value->notification_date}}</td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        @endforeach
                                                                        <!-- <tr>
                                                                            <td>
                                                                                <div class="icheck-primary">
                                                                                    <input type="checkbox" value="" id="check2">
                                                                                    <label for="check2"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                                                            <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                                                            <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                                                                            </td>
                                                                            <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                                                            <td class="mailbox-date">28 mins ago</td>
                                                                        </tr> -->
                                                                    </tbody>
                                                                </table>
                                                                <!-- /.table -->
                                                            </div>
                                                            <!-- /.mail-box-messages -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                                    Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                                    <h4 class="form-tilte"><?= __('Bảo Mật') ?></h4><br><br>
                                                    <span>Mật khẩu: <input class="text-password" type="password" disabled value="{{$userInfor->user_password}}"><br><br></p></span>
                                                    <div class="edit">
                                                        <a id="hide" style="color: none;">
                                                            <img style="width:25px; height:25px;" src="{{asset('public/frontend/images/icon/icons8-edit-64.png')}}" />
                                                            <span>chỉnh sửa</span>
                                                        </a>
                                                    </div>
                                                    <div class="form-editpassword">
                                                        <form>
                                                            @csrf
                                                            <label class="editpassword-title"><?= __('Mật khẩu cũ:') ?></label><input name="password-old" class="text-password-old" /><br>
                                                            <label class="editpassword-title"><?= __('Mật khẩu mới:') ?></label><input name="password-new" class="text-password-new" /><br>
                                                            <label class="editpassword-title"><?= __('Xác nhận mật khẩu:') ?></label><input name="re-password" class="text-repassword" /><br>
                                                            <button class="button-save-password">Lưu</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="custom-tabs-four-messages2" role="tabpanel" aria-labelledby="custom-tabs-four-messages-1">
                                                    <ul class="post-job-bx">
                                                        @foreach($list_job as $item)
                                                        <?php $job_info =  $job_detail->getDetailJobById($item->job_id) ?>
                                                        <li>
                                                            <a href="{{URL::to('/detail_job'.$item->job_id)}}">
                                                                <div class="d-flex m-b30">
                                                                    <div class="job-post-company">
                                                                        <span><img style="height:60px; width:60px;" src="{{URL('public/images/company/'.$job_info->company['company_image'])}}" /></span>
                                                                    </div>
                                                                    <div class="job-post-info">
                                                                        <h4 class="custom-title-text">{{$item->job_desc}}</h4>
                                                                        <ul>
                                                                            <li><i class="fa fa-map-marker"></i>{{$item->distribution['distribution_name']}}</li>
                                                                            <li><i class="fa fa-bookmark-o"></i> {{$item->working_format['working_format_name']}}</li>
                                                                            <li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($item->job_date)->diffForHumans()}}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex">
                                                                    <div class="job-time mr-auto">
                                                                        <span>{{$item->working_format['working_format_name']}}</span>
                                                                    </div>
                                                                    <div class="salary-bx">
                                                                        <span><?php echo $job->money_format($job_info->salary_up) . "tr" . "-" . $job->money_format($job_info->salary_down) . "tr" ?></span>
                                                                    </div>
                                                                </div>
                                                                <!-- <span class="post-like fa fa-heart-o"></span> -->
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
</div>

</div>
<!-- /.container-fluid -->
</section>


</div>
<script>
    $(document).ready(function() {
        $("#hide").click(function() {
            $(".form-editpassword").show();

            var id_user = $(this).data('job_id');

            $.ajax({
                url: "{{url('/editpassword')}}",
                method: 'POST',
                data: {
                    id_user: id_user,
                },
            });
        });
    });
</script>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('.button-save-password').click(function() {
            var password_old = $('.text-password-old').val();
            var password_new = $('.text-password-new').val();
            var re_password = $('.text-repassword').val();

            $.ajax({
                url: "{{url('/savepassword')}}",
                method: 'POST',
                data: {
                    password_old: password_old,
                    password_new: password_new,
                    re_password: re_password,
                },
                success: function(response) {
                    if (response.status == true) {
                        console.log('asdasd');
                        swal("Công việc này đã có ", "", "error");
                    }
                    if (response.status == false) {
                        console.log('sai roi');
                        swal(" trong yêu thích của bạn!", "", "error");
                    }
                },
                error: function(data) {
                	swal("Công việc này đã có trong yêu thích của bạn!", "", "error");
                }
            });
        });
    });
</script> -->

@endsection