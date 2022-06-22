<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\CustomerController; ?>
<?php App::make("App\Http\Controllers\HomeController"); ?>
<?php $user_id = Session::get('user_id') ?>
<?php $customer = App::make("App\Http\Controllers\CustomerController"); ?>
<?php $profile = $customer->getProfileByIdUser($user_id) ?>
@extends('welcome')
@section('content')
<div class="page-content bg-white">
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(public/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Hồ sơ</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}"><?= __('Trang chủ')?></a></li>
                        <li><?= __('Hồ sơ')?></li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <div>
        <?php
        $notifi = Session::get('notifi');
        if ($notifi) {
            echo ' <div style="background-color: #a3eb7a;max-width: 500px;height: 30px;margin: 10px;max-width: 350px;"><span style="color: white;width: 100%;margin-left: 15px;" class="text-alert">' . $notifi . '</span>  </div>';
            Session::put('notifi', null);
            echo '<br></br>';
            echo ' ';
        }
        ?>
    </div>
    <div>
        <form method="post" action="{{URL::to('/save_profile'.$user_id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-4 border-right" style="background-color: antiquewhite;">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <?php if (empty($user->user_image)) { ?>
                            <img class="rounded-circle mt-5" width="150px" id="img-preview" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <?php } else { ?>
                            <img class="rounded-circle mt-5" width="150px" id="img-preview" src="{{URL('public/images/user/'.$user->user_image)}}">
                        <?php } ?>
                        <div class="form-img">
                            <!-- <form action="#" method="POST" enctype="multipart/form-data"> -->
                            <input type="file" style="color:transparent; width:100px;" name="user_image" accept="image/*" id="file-input">
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="p-3 py-5 profile-custom">
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Họ và tên</label><input type="text" class="form-control" name="user_name" placeholder="first name" value="{{$user->user_name}}"></div>
                            <div class="col-md-6"><label class="labels">Số điện thoại</label><input type="text" class="form-control" name="user_sdt" value="{{$user->user_phone}}" placeholder="Nhập số điện thoại"></div>
                            <div class="col-md-12"><label class="labels">Liên kết</label><input type="text" class="form-control" name="user_link" placeholder="Nhập liên kết" value="<?php if (isset($profile)) {
                                                                                                                                                                                            echo $profile->profile_link;
                                                                                                                                                                                        } ?>"></div>

                            <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" placeholder="enter address" name="user_adress" value="{{$user->user_adress}}"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" disabled class="form-control" placeholder="enter email" name="user_email" value="{{$user->user_email}}"></div>
                            <div class="col-md-12"><label class="labels">Kĩ năng</label> <textarea id="textarea3" name="user_skill" cols="50" rows="5"><?php if (isset($profile)) {
                                                                                                                                                            echo $profile->profile_skill;
                                                                                                                                                        } ?></textarea></div>
                        </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <!-- <form method="post" action="{{URL::to('/save_profile')}}"> -->
                    <div class="p-3 py-5">
                        <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span></div><br> -->
                        <!-- <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br> -->
                        <!-- <div class="col-md-12">
                        <label class="labels">Experience</label>
                        <textarea id="textarea1" class="form-control" cols="" rows="20" placeholder="Enter"></textarea>
                    </div><br> -->
                        <div class="col-md-12"><label class="labels">Mục tiêu nghề nghiệp</label><br> <textarea name="career_goals" id="textarea2" cols="80" rows="5"><?php if (isset($profile)) {
                                                                                                                                                                            echo $profile->profile_career_goals;
                                                                                                                                                                        } ?></textarea>
                        </div>
                        <div class="col-md-12"><label class="labels">Học vấn</label><br> <textarea name="univerity" id="" cols="80" rows="5"><?php if (isset($profile)) {
                                                                                                                                                    echo $profile->profile_education;
                                                                                                                                                } ?></textarea></div><br>
                        <input id="count_experien" name="count_experien" type="text" value="" hidden />
                        <div class="col-md-12" id="test">
                            <div class="d-flex justify-content-between align-items-center experience"> <label class="labels">Kinh nghiệm làm việc</label><a class="border px-3 p-1 add-experience" onclick="myFunction()"><i class="fa fa-plus"></i>&nbsp;Thêm</a></div><br>
                            @foreach($list_experience as $item)
                            <div class="timeline timeline-inverse">
                                <div class="time-label">
                                    <span class="bg-danger">
                                        <label>Từ</label>
                                        <input class="myInput1" name="timestart" type="date" value="{{$item->experience_start}}" />
                                        <label>Tới</label>
                                        <input class="myInput2" name="timeend" type="date" value="{{$item->experience_end}}" />
                                    </span>
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">

                                        <h3 class="timeline-header"><a href="#">Mô tả chi tiết</a></h3>

                                        <div class="timeline-body">
                                            <label>Tên công ty, dự án tham gia:</label><br>
                                            <input class="myInput2" id="company" value="{{$item->experience_title}}" name="experience_title"  type="text" />
                                        </div>
                                        <div class="timeline-body">
                                            <label>Công việc:</label>
                                            <div>
                                                <textarea name="experience_desc" cols="70" rows="5">{{$item->experience_desc}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <br>
                            <!-- <input type="submit" /> -->
                        </div><br>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Lưu thông tin</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var i = 0;

    function myFunction() {
        i++;
        const time_start = "time_start" + i;
        const time_end = "time_end" + i;
        const experience_title = "experience_title" + i;
        const experience_desc = "experience_desc" + i;
        const node = document.createElement("div");
        node.className = "timeline timeline-inverse";
        node.id = "timeline timeline-inverse";
        document.getElementById("test").appendChild(node);
        addCode(node.id);
        document.getElementById("time_start").setAttribute('name', time_start);
        document.getElementById("time_start").id = time_start;
        document.getElementById("time_end").setAttribute('name', time_end);
        document.getElementById("time_end").id = time_end;
        document.getElementById("experience_title").setAttribute('name', experience_title);
        document.getElementById("experience_title").id = experience_title;
        document.getElementById("experience_desc").setAttribute('name', experience_desc);
        document.getElementById("experience_desc").id = experience_desc;
        document.getElementById("count_experien").setAttribute('value', i);
    }
</script>
<script>
    const input = document.getElementById("file-input");
    const image = document.getElementById("img-preview");

    input.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            image.src = src;
        }
    });
</script>
<script>
    function addCode(id) {
        document.getElementById(id).innerHTML +=
            '<div class="time-label"><span class="bg-danger"><label>Từ</label><input class="time_start" id="time_start" type="date" /><label>Tới</label><input class="time_end" id="time_end" type="date" /></span></div><div><i class="fas fa-envelope bg-primary"></i><div class="timeline-item"><h3 class="timeline-header"><a href="#">Mô tả chi tiết</a></h3><div class="timeline-body"><label>Công ty, tên dự án tham gia:</label><br><input class="myInput2" id="experience_title" name="" type="text" /></div><div class="timeline-body"><label>Công việc:</label><div><textarea  id="experience_desc"  name="" cols="70" rows="5"></textarea></div></div></div></div>';
    }
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>
@endsection