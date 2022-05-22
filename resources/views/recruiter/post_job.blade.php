<?php

use Illuminate\Support\Facades\Session; ?>
@extends('layout_admin')
@section('content')
<style>
    .form-custom {
        display: flex;
    }

    select {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
    }

    .scrollable-menu {
        height: auto;
        max-height: 200px;
        overflow-x: hidden;
        text-align: center;
    }

    .custom-add-company {
        color: black;
    }

    .custom-form-company {
        display: none;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

                <h1 class="m-0">Đăng bài tuyển dụng</h1>

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>

                    <li class="breadcrumb-item active">Đăng bài tuyển dụng</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php

        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:#79EE56;" class="text-alert">' . $message . '</span>';
            Session::put('message', null);
            echo '<br></br>';
            echo '  ';
        }
        ?>
        <?php
        $notify = Session::get('notifi');
        if ($notify) {
            echo '<span style="color:#00FF00;" class="text-alert">' . $notify . '</span>';
            Session::put('notifi', null);
            echo '<br></br>';
            echo '  ';
        }
        ?>
    </div><!-- /.container-fluid -->
</div>

<div class="col-md-11">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Vui lòng điền thông tin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{URL::to('/insert_job')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>

                    <input type="text" class="form-control" name="job_title" id="exampleInputEmail1" placeholder="Nhập tiêu đề">

                </div>
                <div class="form-custom">
                    <div class="form-group col-md-6">
                        <label for="exampleSelectRounded0">Ngành nghề</label>
                        <select class="custom-select rounded-0" name="category" id="selectcategory">
                            @foreach($category as $item)
                            <option>{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 time-job">
                        <label for="exampleSelectRounded0">Thời gian làm việc</label>
                        <select class="custom-select rounded-0" name="working_format" id="selectworking">
                            @foreach($working_format as $item)
                            <option>{{$item->working_format_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-8 form-custom">

                    <label for="exampleSelectRounded0">Mức lương: từ&ensp;</label>
                    <input type="text" class="form-control col-md-3" name="salary_up">&ensp;

                    <label for="exampleSelectRounded0">đến&ensp;</label>
                    <input type="text" class="form-control col-md-3" name="salary_down">

                </div>
                <div class="form-custom">
                    <div class="form-group col-md-6 time-job">
                        <label for="exampleSelectRounded0">Khu vực</label>
                        <select class="custom-select rounded-0" name="distribution" id="selectdistribution">
                            @foreach($distribution as $item)
                            <option>{{$item->distribution_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 time-job">
                        <label for="exampleSelectRounded0">Thời hạn nộp hồ sơ</label>
                        <input type="date" class="form-control col-md-6" name="job_duration">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>


                    <input type="text" class="form-control" name="company_adress" id="exampleInputPassword1" placeholder="Nhập địa chỉ">

                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Mô tả</label>

                            <textarea id="textarea1" cols="80" rows="20" name="job_desc" placeholder="Nhập"></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Yêu cầu</label>
                            <textarea id="textarea2" cols="80" rows="20" name="job_requirement" placeholder="Nhập"></textarea>

                        </div>
                    </div>
                </div>
                <div class="form-custom">
                    <div class="form-group col-md-6 form-select-company">
                        <label for="exampleSelectRounded0">Công ty</label>
                        <select class="custom-select rounded-0" name="company_id" id="selectcompany">
                            @foreach($list_company as $item)
                            <option>{{$item->company_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-11 ">
                        <label for="exampleSelectRounded0">Công ty khác</label>
                        <div class="d-flex justify-content-between align-items-center experience"><a class="border px-3 p-1 custom-add-company" onclick="showFormCompany()"><i class="fa fa-plus"></i>&nbsp;Thêm</a></div><br>
                        <div class="custom-form-company">

                            <label for="exampleSelectRounded0">Tên công ty</label>&ensp;
                            <input type="text" class="form-control col-md-11" name="company_name" />


                            <label for="exampleSelectRounded0">Địa chỉ</label>&ensp;
                            <input type="text" class="form-control col-md-11" name="company_adress" />


                            <label for="exampleSelectRounded0">Giới thiệu công ty</label>&ensp;
                            <textarea id="textarea3" cols="80" rows="20" name="company_desc" placeholder="Nhập"></textarea>

                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleSelectRounded0">Tình trạng</label>
                    <select class="custom-select rounded-0" name="company_status" id="exampleSelectRounded0">
                        <option>Kích hoạt </option>
                        <option>Không kích hoạt</option>
                    </select>
                </div> -->
            </div>

            <div class="card-footer">
                <!-- <button type="submit" class="btn btn-primary">Thêm</button> -->
                <button type="submit" class="btn btn-primary toastrDefaultSuccess">
                    Thêm
                </button>
                <!-- <button type="submit" class="btn btn-primary">Hủy</button> -->
            </div>

        </form>
    </div>
</div>
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
    function showFormCompany() {
        const boxes = document.querySelectorAll('.custom-form-company');
        const boxes2 = document.querySelectorAll('.form-select-company');
        boxes.forEach(box => {
            box.style.display = 'block';
        });
        boxes2.forEach(box => {
            box.style.display = 'none';
        });
    }
</script>
<script>
    $(document).ready(function() {
        $('#selectcompany').select2();
    });
    $(document).ready(function() {
        $('#selectdistribution').select2();
    });
    $(document).ready(function() {
        $('#selectworking').select2();
    });
    $(document).ready(function() {
        $('#selectcategory').select2();
    });
    // $('select:not(.normal)').each(function() {
    //     $(this).select2({
    //         dropdownParent: $(this).parent()
    //     });
    // });
    // $('select').select2({
    //     dropdownCssClass: 'custom-dropdown'
    // });
    // $('select').on('select2:open', function(e) {
    //     $('.custom-dropdown').parent().css('z-index', 99999);
    // });
</script>
@endsection