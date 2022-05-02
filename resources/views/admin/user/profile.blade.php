@extends('layout_admin')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hồ sơ ứng viên</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Hồ sơ ứng viên</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{URL('public/images/user/'.$user_info->user_image)}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user_info['user_name']}}</h3>

                        <p class="text-muted text-center">Intern</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Điện thoại:</b> <span class="float-right">{{$user_info['user_phone']}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b> <span class="float-right">{{$user_info['user_email']}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Liên kết:</b> <span class="float-right">{{$user_profile['profile_link']}}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Giới thiệu</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Học vấn</strong>

                        <p class="text-muted">
                            {{$user_profile['profile_education']}}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                        <p class="text-muted">{{$user_info['user_adress']}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i>Kĩ năng</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">{{$user_profile['profile_skill']}}</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Thêm</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mục tiêu nghề nghiệp</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Kinh nghiệm</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Sở thích</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <!-- /.user-block -->
                                    <p>
                                    {{$user_profile->profile_career_goals}}
                                    </p>
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                @foreach($list_experience as $item)
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            Từ {{$item->experience_start}} tới {{$item->experience_end}}
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">

                                            <h3 class="timeline-header"><a href="#">Support Team</a> {{$item->experience_title}}</h3>

                                            <div class="timeline-body">
                                                {{$item->experience_desc}}
                                            </div>
                                            <!-- <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- END timeline item -->

                                </div>
                                @endforeach
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <p>
                                {{$user_profile->profile_interest}}
                                </p>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection