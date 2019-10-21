<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>76</h3>

              <p>Kamar Kosong</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>279</h3>
              <!-- <sup style="font-size: 20px">%</sup> -->

              <p>Pasien Masuk</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>36</h3>

              <p>Pasien UGD</p>
            </div>
            <div class="icon">
              <i class="ion ion-medkit"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>171</h3>

              <p>Pasien Keluar</p>
            </div>
            <div class="icon">
              <i class="ion ion-log-out"></i>
            </div>
            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-6">



        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-12">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik Jumlah Pasien Masuk Tiap Quarter</h3>

              <!-- <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div> -->
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 400px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php $this->load->view("includes/footer.php") ?>
  <!-- FOOTER.PHP -->
   <?php $this->load->view("includes/sidebar_control.php") ?>
  <!-- SIDEBAR_CONTROL.PHP -->
</div>
<!-- ./wrapper -->
 <?php $this->load->view("includes/js.php") ?>
<!-- JS.PHP -->
<script>
  $(function () {
    "use strict";

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      smooth: true,
      data: [
        {y: '2011 Q1', jumlahPasien: 2666},
        {y: '2011 Q2', jumlahPasien: 2778},
        {y: '2011 Q3', jumlahPasien: 4912},
        {y: '2011 Q4', jumlahPasien: 3767},
        {y: '2012 Q1', jumlahPasien: 6810},
        {y: '2012 Q2', jumlahPasien: 5670},
        {y: '2012 Q3', jumlahPasien: 4820},
        {y: '2012 Q4', jumlahPasien: 15073},
        {y: '2013 Q1', jumlahPasien: 10687},
        {y: '2013 Q2', jumlahPasien: 8432},
        {y: '2013 Q3', jumlahPasien: 9687},
        {y: '2013 Q4', jumlahPasien: 12432},
        {y: '2014 Q1', jumlahPasien: 2666},
        {y: '2014 Q2', jumlahPasien: 2778},
        {y: '2014 Q3', jumlahPasien: 4912},
        {y: '2014 Q4', jumlahPasien: 3767},

      ],
      xkey: 'y',
      ykeys: ['jumlahPasien'],
      labels: ['Jumlah pasien '],
      lineColors: ['#3c8dbc'],
      hideHover: 'false'
    });

  });
</script>
</body>
</html>
