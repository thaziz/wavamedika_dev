<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Laporan Umur Hutang Pembelian</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body" style="height: 500px">
                <!-- <form id="ff">
                  <div style="margin-bottom:15px">
                    <input class="easyui-radiobutton" name="summary" value="1" label="Summary Per Jenis Hutang" labelwidth="165px" labelPosition="after">
                    <input class="easyui-radiobutton" name="summary" value="2" label="Summary Per Supplier" labelwidth="165px" labelPosition="after">
                    <input class="easyui-radiobutton" name="summary" value="3" label="Detail" labelwidth="130px" labelPosition="after">
                  </div>
                </form> -->
                <div style = "margin-bottom:5px">
                  <input id="start_date" label="Periode tanggal:" type="text" class="easyui-datebox" required="required" style="width:20%;" labelwidth="100px">
                </div>

                <div style = "margin-bottom:5px">
                  <select id="jenis_pembelian" class="easyui-combobox" name="jenis_pembelian" style="width:20%;" label="Jenis Pembelian:" labelwidth="100px">
                      <option value="all">All</option>
                      <option>General</option>
                      <option>Alkes</option>
                  </select>
                  <select id="jenis_laporan" class="easyui-combobox" name="jenis_laporan" style="width:30%;" label="Jenis Laporan:" labelwidth="100px">
                      <option value="summary_per_jenis_hutang">Summary Per Jenis Hutang</option>
                      <option value="summary_per_supplier">Summary Per Supplier</option>
                      <option value="detail">Detail</option>
                  </select>
                </div>

                <div style = "margin-bottom:5px">
                  <select id="nama_supplier" class="easyui-combobox" name="nama_supplier" style="width:50.2%;" label="Nama Supplier:" labelwidth="100px">
                      <option value=""></option>
                      <option></option>
                  </select>
                </div>
                <a href="#" class="easyui-linkbutton btn-cetak" iconCls="icon-print" plain="true" onclick="$('#w').window('open')">Tampil</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="$('#w').window('open')">Export</a>
                <hr>
                <!-- <table id="dg" title="Daftar Umur Hutang Pembelian" style=";width:100%;height:auto"
                		toolbar="#toolbar" pagination="true" idField="id"
                		rownumbers="true" fitColumns="true" singleSelect="true">
                	<thead>
                		<tr>
                			<th field="first_name" width="50" editor="{type:'validatebox',options:{required:true}}">First Name</th>
                			<th field="last_name" width="50" editor="{type:'validatebox',options:{required:true}}">Last Name</th>
                			<th field="phone" width="50" editor="text">Phone</th>
                			<th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th>
                		</tr>
                	</thead>
                </table>
                <div id="toolbar">
                	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Tambah</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
    </section>

    <div id="form_file_surat_detail" class="modal fade" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-detail" style="width: 1000px">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <iframe id="frame_file_surat_detail" name="frame_file_surat_detail" width="100%" height ="520px"></iframe>
          </div>
        </div>
      </div>
    </div>

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

$('body').on('click', '.btn-cetak', function () {
    var id_permohonan = $(this).attr("data-id");
    var jenis_laporan = $( "#jenis_laporan").val();

    var function_cetak = null;
    var file_cetak = null;

    if(jenis_laporan=="summary_per_jenis_hutang") {
      function_cetak = 'cetak_summary_per_jenis_hutang';
      file_cetak = 'cetak_umur_hutang_pembelian_summary_per_jenis_hutang.pdf';
    }
    else if(jenis_laporan=="summary_per_supplier") {
      function_cetak = 'cetak_summary_per_supplier';
      file_cetak = 'cetak_umur_hutang_pembelian_summary_per_supplier.pdf';
    }
    else if(jenis_laporan=="detail") {
      function_cetak = 'cetak_detail';
      file_cetak = 'cetak_umur_hutang_pembelian_detail.pdf';
    }
    // console.log(function_cetak, file_cetak);
    $.ajax({
        url: '<?= site_url() ?>akuntansi/hutang/laporan/hutang_supplier/umur_hutang_pembelian/'+function_cetak,
        type: "post",
        data: {'id_permohonan': $(this).attr("data-id"), 'id_instalasi': $(this).attr("data-instalasi")},
        dataType: "json",
        success: function (data) {
            if (data.success === true) {
                $("#frame_file_surat_detail").attr("src", "<?= base_url() ?>assets/file/"+file_cetak)
                $("#form_file_surat_detail").modal("show");
            }
        },
        fail: function (e) {
            console.log('fail');
        }
    })
});
</script>
</body>
</html>
