@extends('layout_admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">STT</th>
                            <th style="width: 200px">Tên</th>
                            <th>Email</th>
                            <th>Chức vụ</th>
                            <th style="width: 250px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <form action="{{URL::to('/update_roles')}}" enctype="multipart/form-data" method="post"> -->
<?php $i=0?>
                        @foreach($data as $key =>$value)
                        <?php $i++?>
                        <form action="{{URL::to('/update_roles'.$value->id_admin)}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$value->admin_name}}</td>
                                <td>{{$value->admin_email}}</td>
                                <td>
                                    <div class="form-group">
                                        <fieldset>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="1" name="admin_roles" {{$value->hasRoles('1') ? 'checked' : ''}}>
                                                <label class="form-check-label">Quản lý</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="2" name="admin_roles" {{$value->hasRoles('2') ? 'checked' : ''}}>
                                                <label class="form-check-label">Tuyển dụng</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </td>
                                <td>
                                    <!-- <a class="btn btn-app  bg-success" href="{{URL::to('/update_roles'.$value->id_admin)}}">
                                        <i class="fas fa-edit "></i> Sửa
                                    </a> -->
                                    <button type="submit" class="btn btn-app  bg-success">
                                    <i class="fas fa-edit "></i> Cập nhật
                                    </button>
                                    <a  href="{{URL::to('/deleteuser'.$value->id_admin)}}" onclick="return confirm('Bạn có muốn xóa không')" class="btn btn-app bg-warning">
                                        <i class="fas fa-save"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                        <!-- </form> -->
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            {{ $data->appends(request()->query())->links() }}
                <!-- <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
@endsection