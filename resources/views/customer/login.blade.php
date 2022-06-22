@extends('welcome')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(public/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"><?= __('Đăng nhập')?></h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}"><?= __('Trang chủ')?></a></li>
                        <li><?= __('Đăng nhập')?></li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner-2 shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-700 m-t0 m-b20">Đăng nhập tài khoản của bạn</h3>
                </div>
            </div>
            <div>
                <div class="max-w500 m-auto m-b30">
                    <div class="p-a30 border-1 seth">
                        <div class="tab-content nav">
                            <form id="login" class="tab-pane active col-12 p-a0" action="{{URL::to('/user_login')}}" method="POST">
                                @csrf
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $message = Session::get('notifi');
                                if ($message) {
                                    echo '<span style="color:red;" class="text-alert">' . $message . '</span>';
                                    Session::put('notifi', null);
                                    echo '<br></br>';
                                    echo '  ';
                                }
                                ?>
                                <h4 class="font-weight-700">ĐĂNG NHẬP</h4>
                                <p class="font-weight-600">Nếu bạn đã có tài khoản của chúng tối, hay đăng nhập.</p>
                                <?php


                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span style="color:red;" class="text-alert">' . $message . '</span>';
                                    Session::put('message', null);
                                    echo '<br></br>';
                                    echo '  ';
                                }
                                ?>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="user_email" required="" class="form-control" placeholder="Your Email Id" type="email">
                                </div>
                                @error('user_email')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="form-group">
                                    <label class="font-weight-700">MẬT KHẨU *</label>
                                    <input name="user_password" required="" class="form-control " placeholder="Type Password" type="password">
                                </div>
                                @error('user_password')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="text-left">
                                    <button type="submit" style="background-color: #007BFF !important;" class="site-button m-r5 button-lg">Đăng nhập</button>
                                    <a data-toggle="tab" href="#forgot-password" class="m-l5"><i class="fa fa-unlock-alt"></i> Quên mật khẩu</a>
                                </div>
                                <div class="social-auth-links text-center mt-2 mb-3">
                                    <a href="{{URL::to('/login_facebook')}}" class="btn btn-block btn-primary">
                                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                                    </a>
                                </div>
                            </form>
                            <form action="{{URL::to('/forget_password')}}" id="forgot-password" class="tab-pane fade  col-12 p-a0">
                                <h4 class="font-weight-700">QUÊN MẬT KHẨU ?</h4>
                                <p class="font-weight-600">Chúng tôi sẽ gửi email cho bạn để đặt lại mật khẩu. </p>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="emailreset" required="" class="form-control" placeholder="Your Email Id" type="email">
                                </div>
                                <div class="text-left">
                                    <a class="site-button outline gray button-lg" data-toggle="tab" href="#login">Quay lại</a>
                                    <button class="site-button pull-right button-lg">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product END -->
    </div>
    <!-- contact area  END -->
</div>
@endsection