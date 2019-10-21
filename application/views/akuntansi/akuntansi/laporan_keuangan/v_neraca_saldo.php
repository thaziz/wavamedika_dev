<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>
<style type="text/css">
  main{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 4fr;
  }
</style>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Laporan Neraca Saldo</h1>
   
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body" style="height: 500px">
                <main>
                  <div style="height: 20px; width: 80px;margin-top: 2px;">
                    Start Date :
                  </div>
                  <div style = "height: 20px;margin-bottom: 10px;width: 120px;">
                    <input id="start_date" type="text" class="easyui-datebox" required="required" style="width:100px;height: 20px;" name="start_date">
                  </div>
                  <div style="height: 20px;  width: 50px;margin-right: 1px;margin-top:2px">
                    End Date :
                  </div>
                  <div style = "height: 20px;margin-bottom: 12px;margin-right: 600px">
                    <input id="end_date" type="text" class="easyui-datebox" required="required" style="width:100px;height: 20px" name="end_date">
                  </div>
                  <div></div>
                  <div></div>
                  <div></div>
                </main>

                <div style = "margin-bottom:10px">
                <main>
                    <input id="kode-rekening-coa-first" class="easyui-combobox" name="coa1" style="width:40%;" label="Kode Rekening" labelwidth="100px" data-options="
                                valueField : 'coa_code',
                                textField : 'coa',
                                url : '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>'
                                ">
                    <input id="kode-rekening-coa-last" class="easyui-combobox" name="coa2" style="width:40%;" label=" s/d " labelwidth="25%" data-options="
                                valueField : 'coa_code',
                                textField : 'coa',
                                url : '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>'
                                ">
                </main>
                </div>
                <a href="#" class="easyui-linkbutton btn-cetak" iconCls="icon-print" plain="true" onclick="$('#w').window('open')">Tampil</a>
                <a href="#" class="easyui-linkbutton btn-export" iconCls="icon-reload" plain="true" onclick="$('#w').window('open')">Export</a>
                <hr>
                
                <!-- <table id="dg" title="Daftar Neraca Saldo" style=";width:100%;height:auto"
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
   $( "#title" ).autocomplete({
              source: "<?php echo site_url('akuntansi/akuntansi/laporan_keuangan/neraca_saldo?');?>"
            });
$(function(){
  

    $('#dg').edatagrid({
        url: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        saveUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        updateUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>',
        destroyUrl: '<?php echo base_url('sistem/manajemen_user/daftar_user') ?>'
    });
});

$('body').on('click', '.btn-export', function () {
  var tgl1=$("input[name=start_date]").val();
  var tgl2=$("input[name=end_date]").val();
  var coa1=$("input[name=coa1]").val();
  var coa2=$("input[name=coa2]").val();
  if(tgl1=='' || tgl2=='' || coa1=='' || coa2==''){
 $.messager.alert('Warning','Form Harus Di isi');
    return false;
  }
 
    $('body').append($('<form/>')
    .attr({'action': 'http://localhost/wavamedika/akuntansi/akuntansi/laporan_keuangan/neraca_saldo/excel', 'method': 'POST', 'id': 'replacer'})
    .append($('<input/>')
    .attr({'type': 'hidden', 'name': 'tgl1', 'value': ""+tgl1+""})
    ) 
    .append($('<input/>')
    .attr({'type': 'hidden', 'name': 'tgl2', 'value':  ""+tgl2+""})
    )
    .append($('<input/>')
      .attr({'type': 'hidden', 'name': 'coa1', 'value':  ""+coa1+""})
    )
    .append($('<input/>')
      .attr({'type': 'hidden', 'name': 'coa2', 'value':  ""+coa2+""})
    ) 
 
    ).find('#replacer').submit();
})
$('body').on('click', '.btn-cetak', function () {
  var tgl1=$("input[name=start_date]").val();
  var tgl2=$("input[name=end_date]").val();
  var coa1=$("input[name=coa1]").val();
  var coa2=$("input[name=coa2]").val();
  if(tgl1=='' || tgl2=='' || coa1=='' || coa2==''){
    alert('Input Required')
    return false;
  }
  
    var id_permohonan = $(this).attr("data-id");
    $.ajax({
        url: '<?= site_url() ?>akuntansi/akuntansi/laporan_keuangan/neraca_saldo/cetak',
        type: "post",
        data: {'tgl1': tgl1, 'tgl2': tgl2, 'coa1': coa1, 'coa2': coa2},
        dataType: "json",
        success: function (data) {
            if (data.success === true) {
                $("#frame_file_surat_detail").attr("src", "<?= base_url() ?>assets/file/cetak_neraca_saldo.pdf")
                $("#form_file_surat_detail").modal("show");
            }
        },
        fail: function (e) {
            console.log('fail');
        }
    })
});

$(function() {

/*  $('#cc').combobox({
    url:'http://localhost/wavamedika/akuntansi/akuntansi/laporan_keuangan/neraca_saldo/kode_rekening',
    valueField:'coa_code',
    textField:'coa_name'
});*/

 

$('#cc').combogrid({
    delay: 500,
    mode: 'remote',
    url: '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>',
    idField: 'coa_code',
    textField: 'coa_code',
    columns: [[
        {field:'coa_code',title:'Coa ID',width:50,sortable:true},
        {field:'coa_name',title:'Coa Name',width:200,sortable:true}
    ]]
});

$('#ccb').combogrid({
    delay: 500,
    mode: 'remote',
    url: '<?php echo base_url('akuntansi/master/kode_rekening_coa/api_daftar_kode_rekening_coa') ?>',
    idField: 'coa_code',
    textField: 'coa_name',
    columns: [[
        {field:'coa_code',title:'Coa ID',width:50,sortable:true},
        {field:'coa_name',title:'Coa Name',width:200,sortable:true}
    ]]
});
    });

</script>
</body>
</html>
