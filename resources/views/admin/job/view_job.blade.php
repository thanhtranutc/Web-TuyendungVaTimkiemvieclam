<?php use App\Http\Controllers\HomeController; ?>
<?php $count_job = new HomeController();  ?>
@extends('layout_admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết công việc</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Chi tiết công việc</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> {{$jobview->job['job_desc']}}.
                                <small class="float-right">Ngày đăng: {{$jobview->job['job_date']}}</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address>
                            Công ty: <strong>{{$jobview->company['company_name']}}.</strong><br>
                                Địa chỉ: {{$jobview->company['company_adress']}}<br>
                                Điện thoại: <br>
                                Email: 
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <address>
                                Ngành nghề: {{$infor_job->category['category_name']}}<br>
                                Hình thức: {{$infor_job->working_format['working_format_name']}} <br>
                                Hạn nộp hồ sơ: {{$jobview->detail_job_duration}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Mức lương:</b><?php echo " ".$count_job->money_format($jobview->salary_up)."triệu"." - ".$count_job->money_format($jobview->salary_down)."triệu" ?> <br>
                        </div>
                        <!-- /.col -->
                    </div>
              

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Mô tả công việc:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                               <?= $jobview->detail_job_desc ?>
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Yêu cầu:</p>

                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                               <?= $jobview->detail_job_request ?>
                            </p>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection