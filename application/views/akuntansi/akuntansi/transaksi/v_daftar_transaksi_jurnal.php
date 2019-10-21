<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Manajemen Transaksi Jurnal</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary" style="height: 500px">
              <div id="width-sensor" class="box-body">
                <div style = "margin-bottom:1px">
                  <input id="start_date" label="Start Date:" type="text" class="easyui-datebox" required="required" style="width:20%;">
                  <input id="end_date" label="s/d : " type="text" class="easyui-datebox" required="required" style="width:20%;">
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <?php $this->load->view("includes/footer.php") ?>
  <?php $this->load->view("includes/sidebar_control.php") ?>
</div>
<?php $this->load->view("includes/js.php") ?>
<script type="text/javascript">
$(function(){
    $('#dg').edatagrid({
        url: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        saveUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        updateUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        destroyUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>'
    });
});
</script>
</body>
</html>
