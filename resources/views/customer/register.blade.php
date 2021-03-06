@extends('welcome')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url(public/frontend/images/banner/bnr2.jpg);">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"><?= __('Đăng ký')?></h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{URL::to('/')}}"><?= __('Trang chủ')?></a></li>
                        <li><?= __('Đăng ký')?></li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner shop-account">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="font-weight-700 m-t0 m-b20"><?= __('Tài khoản mới')?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 m-b30">
                    <div class="p-a30 border-1  max-w500 m-auto">
                        <div class="tab-content">
                            <form id="login" method="POST" action="{{URL::to('/add_user')}}" class="tab-pane active">
                                @csrf
                                <h4 class="font-weight-700"><?= __('THÔNG TIN NGƯỜI DÙNG')?></h4>
                                <p class="font-weight-600"><?= __('Nếu bạn đã có tài khoản của chúng tối, hay đăng nhập.')?></p>
                                <p>
                                    <?php
                                    use Illuminate\Support\Facades\Session;
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<span style="color:#69D72A;" class="text-alert">' . $message . '</span>';
                                        Session::put('message', null);
                                        echo '<br></br>';
                                        echo '  ';
                                    }
                                    ?>
                                </p>
                                <div class="form-group">
                                    <label class="font-weight-700">Họ và tên *</label>
                                    <input name="user_name" required="" class="form-control" placeholder="Nhập họ và tên" type="text">
                                </div>
                                @error('user_name')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="user_email" required="" class="form-control" placeholder="Nhập địa chỉ email" type="email">
                                </div>
                                @error('user_email')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="form-group">
                                    <label class="font-weight-700">Mật khẩu *</label>
                                    <input name="user_password" required="" class="form-control " placeholder="Nhập mật khẩu" type="password">
                                </div>
                                @error('user_password')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="form-group">
                                    <label class="font-weight-700">Xác nhận mật khẩu *</label>
                                    <input name="re_password" required="" class="form-control " placeholder="Xác nhận mật khẩu" type="password">
                                </div>
                                @error('re_password')
                                <ul>
                                    <li style="color:red;">{{$message}}</li>
                                </ul>
                                @enderror
                                <div class="text-left">
                                    <button class="site-button button-lg outline outline-2"><?= __('Xác nhận')?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
@endsection