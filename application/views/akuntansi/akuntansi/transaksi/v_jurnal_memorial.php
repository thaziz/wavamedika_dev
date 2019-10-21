<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>
<style type="text/css">
  label.rg{
    /*text-align: right;*/
  }
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
      <h1>Jurnal Memorial</h1>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body">
                <main>
                  <div style="width: 80px;margin-top: 3px">
                    Start Date :
                  </div>
                  <div style = "margin-bottom:1px">
                      <input id="start_date" type="text" class="easyui-datebox" required="required" style="width:100px;height: 20px">
                  </div> 
                  <div style="width: 30px;text-align: center;margin-top: 3px">
                    s.d :
                  </div>
                  <div style="margin-right: 700px">
                    <input id="end_date" type="text"  class="easyui-datebox" required="required" style="width:100px;height: 20px">
                  </div>
                </main>
              <div style="margin-top: 2px"></div>
                <div style="margin-top: 5px">
                  <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:20%;height: 20px; margin-top: 5px" label="Kriteria :">
                    <option value="aa">Kriteria A</option>
                    <option>Kriteria B</option>
                    
                  </select>
                </div>
                <div style="margin-left: 80px;margin-top: 5px">
                  <input id="tb" type="text" style="width:250px;height: 20px;margin-top: 2px">
                  <a href="#" style="height: 20px;margin-bottom: 3px " class="easyui-linkbutton" data-options="iconCls:'icon-filter'">Filter</a>
                </div>
                  <hr>
                <table id="dg" title="Daftar Jurnal Memorial" style=";width:00px;height:500px; margin-top:1%;"
                    toolbar="#toolbar" pagination="true" idField="id"
                    rownumbers="true" fitColumns="true" singleSelect="true">
                  <thead>
                    <tr>
                      <th field="no_jurnal" width="50" editor="{type:'validatebox',options:{required:true}}">No Jurnal</th>
                      <th field="tanggal" width="50" editor="{type:'validatebox',options:{required:true}}">Tanggal</th>
                      <th field="keterangan" width="50" editor="text">Keterangan</th>
                      <th field="status" width="50" editor="text">Status</th>
                      <th field="user_entry" width="50" editor="text">User Entry</th>
                      <th field="tgl_entry" width="50" editor="text">Tgl Entry</th>
                      <th field="user_update" width="50" editor="text">User Update</th>
                      <th field="tgl_update" width="50" editor="text">Tanggal Update</th>
                    </tr>
                  </thead>
                </table>
                <div id="toolbar">
                  <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"  id="open-window">Tambah</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                  <a href="#"  class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <div id="w" class="easyui-window" title="Tambah Jurnal Memorial" data-options="iconCls:''" style="width:1200px;height:580px;padding:10px;">
    <!-- <div class="row"> -->
      <!-- <div class="col-md-12"> -->
        <input id="tbs" type="text" style="width:20%;height: 20px" label="No. Jurnal :">
        <input id="tanggal" label="Tanggal:" type="text" class="easyui-datebox" required="required" style="width:20%;margin-left: right:30px;height: 20px">
          <a href="<?php echo base_url().'excel/template.xls' ?>" class="easyui-linkbutton" style="height: 20px;width: 80px" iconCls="icon-add" plain="te"  >Template</a>
          <!-- <?php echo base_url().'index.php/akuntansi/akuntansi/transaksi/jurnal_memorial/template' ?> -->
          
      <!-- </div> -->
      <div style="margin-top: 5px"></div>
    <!-- </div> -->
    <input class="easyui-textbox" label="Keterangan :" labelPosition="left" multiline="true" style="width:233px;height:30px;margin-top: 5px">
   <form method="post"  id="form_ticketing" style="display: inline;">
      <input class="easyui-filebox" label="Upload:" labelPosition="left" data-options="prompt:'Choose a file...'" style="width:232px;height: 20px" name="file">
      <button style="text-align: center;height: 20px;width: 80px" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window" type="submit">Import</button>
       <input type="hidden" name="preview" value="Preview">
    </form>
    <!--<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#w').window('open')">Tambah</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#w').window('open')">Tambah</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="$('#w').window('open')">Tambah</a> -->
    <div style=" margin-top:5px;"></div>
    <table id="dgs" title="Daftar Jurnal Memorial" style=";width:100%;height:400px"
        pagination="true" idField="ids"
        rownumbers="true" fitColumns="true" singleSelect="true">
      <thead>
        <tr>
          <th field="A" width="50" editor="{type:'validatebox',options:{required:true}}">Kode Rekening</th>
          <th field="B" width="50" editor="{type:'validatebox',options:{required:true}}">Cost Center</th>
          <th field="C" width="50" editor="text">Deskripsi</th>
          <th field="D" width="50" editor="text">Debet</th>
          <th field="E" width="50" editor="text">Kredit</th>
        
        </tr>
      </thead>
      <tbody>
      <!--   <tr>
        <td>111101 - Kas Besar Rumah Sakit</td>
        <td>1207 -  Klinik Bedah</td>
        <td>Penerimaan Lain-lain</td>
        <td>100.000</td>
        <td>0.00</td>  
        </tr>
        <tr>
        <td>113203 - Piutang Lain-lain</td>
        <td>1207 - Klinik Bedah</td>
        <td>Penerimaan Lain-lain</td>
        <td>0.00</td>
        <td>100.000</td>  
        </tr> -->
      </tbody>
    </table>

     <div id="wk" style="margin-left: 5px; margin-top: 20px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="te" style="width: 75px" id="simpan" >Simpan</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="te" style="width: 75px"  id="close-window">Batal</a>
          <span style="position: absolute;right: 320px;margin-top: 6px">Balance :
          </span>
          <span style="position: absolute;right: 70px">

          <input class="easyui-textbox" id="vdebit" label="" value="0" labelPosition="top" style="width:120px;text-align: right;height: 25px">

          <input class="easyui-textbox" id="vkredit" label="" value="0" labelPosition="top" style="width:120px;text-align: right;height: 25px">
          </span>
    </div>
     

  </div>
  <?php $this->load->view("includes/footer.php") ?>
  <?php $this->load->view("includes/sidebar_control.php") ?>
</div>
<?php $this->load->view("includes/js.php") ?>
<script type="text/javascript">
$(function(){
  $('#w').window('close');
  var dg = $('#dg').datagrid();
   var dgs = $('#dgs').datagrid();
  var data = [
      {}
  ];
    dg.datagrid('loadData',data);
    $('#tbs').textbox({
    })
    $('#open-window').click(function(params) {
      $('#w').window({
        onOpen: function(){
         /* dgs = $('#dgs').datagrid();*/
        }
      })  
    });

     $('#close-window').click(function(params) {
      $('#w').window('close');
    });

     
    // dgs.datagrid('loadData',data);
    // $('#dg').edatagrid('enableFilter');
});

$('form#form_ticketing').on('submit', function(e) {
          e.preventDefault();
          
          $.ajax({
              url : "<?php echo base_url("akuntansi/akuntansi/transaksi/jurnal_memorial/form"); ?>",
              type: "POST",
              data : $('#form_ticketing').serialize(),
              dataType: 'json',
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success:function(data, textStatus, jqXHR){
                    var dgs = $('#dgs').datagrid();
                    dgs.datagrid('loadData',data);
                    $('#vkredit').textbox('setValue',data['kredit']);
                    $('#vdebit').textbox('setValue',data['debit']);
                    if(data['status']==true){
                        $('#simpan').linkbutton('enable');
                    }
                    else if(data['status']==false){                    
                        $('#simpan').linkbutton('disable');
                         $.messager.alert('Warning','Jurnal Belum Balance');
                    }
              },
              error: function(jqXHR, textStatus, errorThrown){
                  alert('Error,something goes wrong');
              },
              complete: function(){
                $('#btn-save').prop('disabled', false);
                 $('#btn-save').html('Save');
              }
          });


       });
</script>
</body>
</html>
