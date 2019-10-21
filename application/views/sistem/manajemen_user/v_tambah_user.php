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
        Tambah User
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
        <li class="active"><i class="fa fa-user"></i> Manajemen User&nbsp;&nbsp; Tambah User</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- @if(strcasecmp(explode(' ', $active_submenu->name)[0], 'Add') != 0)
            <div class="box-header">
              <a href="{{ URL::to($active_submenu->link) }}">
                <button type="submit" class="btn btn-xs btn-primary">&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back&nbsp;&nbsp;&nbsp;</button>
              </a>
            </div>
          @endif -->

          <!-- /.box-header -->
          <div class="box-body">
              <!-- <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Warning!</h4>
                {!! $message !!}
              </div> -->
            <form role="form" method="POST" action="<?php echo base_url('admin/do_tambah_user') ?>">
            <!-- @csrf -->
              <div class="form-group col-md-6">
				<label>Nama Depan</label>
				<input type="text" class="form-control" name="nama_depan" placeholder="Masukkan Nama Depan ..." required>
              </div>
              <div class="form-group col-md-6">
				<label>Nama Belakang</label>
				<input type="text" class="form-control" name="nama_belakang" placeholder="Masukkan Nama Belakang ..." required>
              </div>
              <div class="form-group col-md-4">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Masukkan Nama Belakang ..." required>
              </div>
              <div class="form-group col-md-4">
				<label>Email</label>
				<input type="text" class="form-control" name="email" placeholder="Masukka Alamat Email ..." required>
              </div>
              <!-- <div class="form-group col-md-4">
				<label>Jenis Kelamin</label>
				<input type="text" class="form-control" name="jk" placeholder="Masukkan Jenis Kelamin ..." required>
              </div> -->
              <div class="form-group col-md-4">
				<label>No HP</label>
				<input type="number" class="form-control" name="phone" placeholder="Masukkan No HP ..." required>
              </div>
              <div class="form-group col-md-12">
              	<label>Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Rumah ..." rows="4" style="resize: vertical" required></textarea>
              </div>
              <div class="form-group col-md-6">
				<label>Kata Sandi</label>
				<input type="password" class="form-control password" name="password" placeholder="Masukkan Password ..." required>
              </div>
              <div class="form-group col-md-6">
				<label>Konfirmasi Kata Sandi</label>
				<input type="password" class="form-control konfirmasi_password" name="konfirmasi_password" placeholder="Masukkan Ulang Password ..." required>
              </div>
              <div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary col-md-2 submit"><i class="fa fa-save"></i> Submit</button>
			  </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
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
  $(document).ready(function () {
    $('.submit').click(function() {
      password = $("input.password").val();
      konfirmasi_password = $("input.konfirmasi_password").val();

      if(password != konfirmasi_password){
        alert('Password tidak sama');
        return false;
      }
    });
  });
</script>
</body>
</html>
