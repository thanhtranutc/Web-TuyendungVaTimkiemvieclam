<?php use Illuminate\Support\Facades\Session; ?>
<?php $message = Session::get('message'); ?>
@extends('layout_admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách bài đăng chờ xác nhận</h1>
                <?php
                if ($message) {
                    echo '<span style="color:#79EE56;" class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                    echo '<br></br>';
                    echo '  ';
                }
                ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách bài đăng chờ xác nhận</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Người Đăng</th>
                            <th>Ngành nghề</th>
                            <th>Ngày đăng bài</th>
                            <th>Khu vực</th>
                            <th>Hình thức</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_job as $value)
                        <tr>
                            <td>{{$value->job_id}}</td>
                            <td>{{$value->job_desc}}</td>
                            <td>{{$value->customer['user_name']}}</td>
                            <td>{{$value->category['category_name']}}</td>
                            <td>{{$value->job_date}}</td>
                            <td>{{$value->distribution['distribution_name']}}</td>
                            <td>{{$value->working_format['working_format_name']}}</td>
                            <td>
                                <a class="btn btn-app bg-success" href="{{URL::to('/confirm_job'.$value->job_id)}}">
                                    <i class="fas fa-edit "></i> Xác nhận
                                </a>
                                <a class="btn btn-app bg-warning" href="{{URL::to('/deletecompany')}}">
                                    <i class="fas fa-save"></i> Hủy
                                </a>
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection