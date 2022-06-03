<?php use Illuminate\Support\Facades\App; ?>
<?php $job_info = App::make("App\Repositories\JobRepository"); ?>
@extends('layout_admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?= __('Thống kê') ?></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$countPost}}</h3>

            <p><?= __('Tin tuyển dụng') ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer"><?= __('Xem thêm') ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><sup style="font-size: 20px"></sup>1</h3>

            <p><?= __('Tin chờ duyệt') ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer"><?= __('Xem thêm') ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$countUserApply}}</h3>

            <p><?= __('Ứng tuyển') ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer"><?= __('Xem thêm') ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <div class="col-lg-6 col-6">
        <h4>Tin tuyển dụng được xem nhiều nhất</h4>
        @foreach($jobTopViews as $index =>$item)
        <p class="text-info-job"><?= ++$index . '. ' . $item->job_desc ?> : <i><?= $item->job_view . __(' lượt xem') ?></i></p>
        @endforeach
      </div>
      <div class="col-lg-6 col-6">
        <h4>Tin tuyển dụng được ứng tuyển nhiều nhất</h4>
        @foreach($getCountUserApply as $index =>$item)
        <?php $job = $job_info->getJobById($item->id_job) ?>
        <p class="text-info-job"><?= ++$index . '. ' . $job->job_desc ?> : <i><?= $item->total . __(' lượt ứng tuyển') ?></i></p>
        @endforeach
      </div>
    </div>


    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  <div class="col-lg-6 col-6">
    <label>Năm:</label>
    <input class="year" type="number" min="1900" max="2099" step="1" value="2022" />
    <input class="button-submit--custom" id="filter-year" type="submit" value="Lọc">
  </div>
  <canvas id="myChart" style="width: 900px !important; height:500px !important; margin: auto;">
  </canvas>
</section>
<script>
  const ctx = document.getElementById('myChart').getContext('2d');
  var data = <?= json_encode($staticJobs); ?>;
  var data2 = <?= json_encode($staticApply); ?>;
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [{
        label: '# Tin tuyển dụng ',
        data: data,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }, {
        label: '# Ứng viên ',
        data: data2,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        },
      }
    }
  });
</script>

@endsection