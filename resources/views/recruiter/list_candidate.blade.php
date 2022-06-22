<?php

use Illuminate\Support\Facades\Session; ?>
<?php $job_id = Session::get('id_job') ?>
@extends('layout_admin')
@section('content')
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <?php if (isset($list_candidate)) { ?>
            <div class="card-body pb-0">
                <div class="row">
                    @foreach($list_candidate as $item)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                INTERN
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$item->user_name}}</b></h2>
                                        <!-- <p class="text-muted text-sm"><b><?= __('About:')?> </b> test test test </p> -->
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Địa chỉ: {{$item->user_adress}}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Điện thoại #: {{$item->user_phone}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{URL('public/images/user/'.$item->user_image)}}" width="128px;" height="128px;" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <!-- <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a> -->
                                    <form method="post" action="{{URL::to('/viewprofile'.$item->user_id)}}">
                                        @csrf
                                        <input hidden name="job" value="{{$job_id}}" />
                                        <div class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i>
                                            <input type="submit" value="Xem" class="btn btn-sm btn-primary"/>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
        <?php } else { ?>
            <h3>Công việc này chưa có ai ứng tuyển</h3>
        <?php } ?>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection