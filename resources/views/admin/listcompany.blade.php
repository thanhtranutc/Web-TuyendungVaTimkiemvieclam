@extends('layout_admin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách công ty</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danh sách công ty</li>
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
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0?>
                        @foreach($data as $key =>$value)
                        <?php $i++?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$value->company_name}}</td>
                            <td style="white-space: normal;">{{$value->company_adress}}</td>
                            <?php
                            if ($value->company_status == 1) {
                            ?>
                                <td>Đang hoạt động</td>
                            <?php
                            } else {
                            ?>
                                <td>Ngừng hoạt động</td>
                            <?php
                            }
                            ?>
                            <td style="white-space: normal;"><?php echo $value->company_desc; ?></td>
                            <td>
                                <a class="btn btn-app bg-success" href="{{URL::to('/editcompany'.$value->company_id)}}">
                                    <i class="fas fa-edit "></i> Sửa
                                </a>
                                <a class="btn btn-app bg-warning" href="{{URL::to('/deletecompany'.$value->company_id)}}">
                                    <i class="fas fa-save"></i> Xóa
                                </a>
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
            {{ $data->appends(request()->query())->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection