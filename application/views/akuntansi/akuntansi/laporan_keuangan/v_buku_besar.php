<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Laporan Buku Besar</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body" style="height: 500px">
                <div style = "margin-bottom:10px">
                  <input id="start-date" label="Periode:" type="text" class="easyui-datebox" required="required" style="width:20%;" labelwidth="100px">
                  <input id="end-date" label="s/d : " type="text" class="easyui-datebox" required="required" style="width:20%;">
                </div>
                <div style = "margin-bottom:10px">
                    <input id="kode-rekening-coa-first" class="easyui-combobox" name="kode_rekening_coa_first" style="width:40%;" label="Kode Rekening" labelwidth="100px" data-options="
                                valueField : 'coa_code',
                                textField : 'coa',
                                url : '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>'
                                ">
                    <input id="kode-rekening-coa-last" class="easyui-combobox" name="kode_rekening_coa_last" style="width:40%;" label=" s/d " labelwidth="25%" data-options="
                                valueField : 'coa_code',
                                textField : 'coa',
                                url : '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>'
                                ">
                  <!-- <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:40%;" label="Kode Rekening" labelwidth="100px">
                    <option value="aa">aitem1</option>
                    <option>bitem2</option>
                    <option>bitem3</option>
                    <option>ditem4</option>
                    <option>eitem5</option>
                  </select> -->
                  <!-- <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:40%;" label="s/d">
                    <option value="aa">aitem1</option>
                    <option>bitem2</option>
                    <option>bitem3</option>
                    <option>ditem4</option>
                    <option>eitem5</option>
                  </select> -->
                </div>
                <div style = "margin-bottom:10px">
                    <input id="cost-center" class="easyui-combobox" name="cost_center" style="width:40%;" label="Cost Center" labelwidth="100px" data-options="
                                valueField : 'cc_id',
                                textField : 'cc_name',
                                url : '<?php echo base_url('akuntansi/master/template_alokasi_biaya/api_daftar_cost_center') ?>'
                                ">
                  <!-- <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:40%;" label="Cost Center" labelwidth="100px">
                    <option value="aa">aitem1</option>
                    <option>bitem2</option>
                    <option>bitem3</option>
                    <option>ditem4</option>
                    <option>eitem5</option>
                  </select> -->
                </div>
                <a href="#" class="easyui-linkbutton btn-cetak" iconCls="icon-print" plain="true" onclick="$('#w').window('open')">Tampil</a>
                <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="$('#w').window('open')">Export</a>
                <hr>
                <!-- <table id="dg" title="Daftar Buku Besar" style=";width:100%;height:auto"
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
    // var id_permohonan = $(this).attr("data-id");
    var start_date = document.getElementById("start-date").value;
    var end_date = document.getElementById("end-date").value;
    var kode_rekening_coa_first = document.getElementById("kode-rekening-coa-first").value;
    var kode_rekening_coa_last = document.getElementById("kode-rekening-coa-last").value;
    var cost_center = document.getElementById("cost-center").value;

    if (start_date && end_date && kode_rekening_coa_first && kode_rekening_coa_last) {
        $.ajax({
            url: '<?= site_url() ?>akuntansi/akuntansi/laporan_keuangan/buku_besar/cetak',
            type: "post",
            data: {
                'start_date': start_date,
                'end_date': end_date,
                'kode_rekening_coa_first': kode_rekening_coa_first,
                'kode_rekening_coa_last': kode_rekening_coa_last,
                'cost_center': cost_center,
            },
            dataType: "json",
            success: function (data) {
                // console.log(data);
                if (data.success === true) {
                    $("#frame_file_surat_detail").attr("src", "<?= base_url() ?>assets/file/cetak_buku_besar.pdf")
                    $("#form_file_surat_detail").modal("show");
                }
            },
            fail: function (e) {
                console.log('fail');
            }
        })
    } else {
        alert('Mohon untuk mengisi field Periode dan Kode Rekening yang disediakan');
    }
});
</script>
</body>
</html>
