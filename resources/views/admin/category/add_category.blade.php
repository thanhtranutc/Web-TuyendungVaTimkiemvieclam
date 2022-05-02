<?php
use Illuminate\Support\Facades\Session;

?>
@extends('layout_admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>

                    <li class="breadcrumb-item active">Thêm</li>

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
        <form action="{{URL::to('/add_category')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên</label>

                    <input type="text" class="form-control" name="category_name"  id="exampleInputEmail1" placeholder="Nhập tên ngành nghề">

                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputFile">Ảnh</label>
                    <div class="">
                        <div class="">
                            <img class="#" width="100px" height="100px" id="img-preview" src="">
                            <input type="hidden" name="img_old" value="" />
                            <input type="file" accept="image/*" id="file-input" name="company_image" value="">
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-10">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="textarea1" cols="80" rows="20" name="category_desc" placeholder="Nhập"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleSelectRounded0">Tình trạng</label>
                    <select class="custom-select rounded-0" name="category_status" id="exampleSelectRounded0">
                        <option>Kích hoạt</option>
                        <option>Không kích hoạt</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <!-- <button type="submit" class="btn btn-primary">Thêm</button> -->
                <button type="submit" class="btn btn-primary toastrDefaultSuccess">
                    Lưu
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
@endsection