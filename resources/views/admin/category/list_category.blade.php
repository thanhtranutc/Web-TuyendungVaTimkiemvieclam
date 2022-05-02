@extends('layout_admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách ngành nghề</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách ngành nghề</li>
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
            <div class="card-body table-responsive p-0" style="">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_category as $key =>$value)
                        <tr>
                            <td>{{$value->id_category}}</td>
                            <td>{{$value->category_name}}</td>
                            <td></td>
                            <?php
                            if ($value->category_status == 1) {
                            ?>
                                <td>Đang hoạt động</td>
                            <?php
                            } else {
                            ?>
                                <td>Ngừng hoạt động</td>
                            <?php
                            }
                            ?>

                            <td><?php echo $value->category_desc; ?></td>
                            <td>
                                <a class="btn btn-app bg-success" href="{{URL::to('/editcategory'.$value->id_category)}}">
                                    <i class="fas fa-edit "></i> Sửa
                                </a>
                                <a class="btn btn-app bg-warning" href="{{URL::to('/deletecategory'.$value->id_category)}}">
                                    <i class="fas fa-save"></i> Xóa
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