<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Manajemen Settlement Kasbon Dokter</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body">
                <div style = "margin-bottom:10px">
                  <input id="start_date" label="Start Date:" type="text" class="easyui-datebox" required="required" style="width:20%;" labelwidth="100px">
                  <input id="end_date" label="s/d : " type="text" class="easyui-datebox" required="required" style="width:20%;">
                </div>
                <div style = "margin-bottom:10px">
                  <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:40%;" label="Dokter" labelwidth="100px">
                    <option value="aa">aitem1</option>
                    <option>bitem2</option>
                    <option>bitem3</option>
                    <option>ditem4</option>
                    <option>eitem5</option>
                  </select>
                </div>
                <table id="dg" title="Daftar Hutang Pembelian" style=";width:100%;height:auto"
                		toolbar="#toolbar" pagination="true" idField="id"
                		rownumbers="true" fitColumns="true" singleSelect="true">
                	<thead>
                		<tr>
                			<th field="first_name" width="50" editor="{type:'validatebox',options:{required:true}}">Nama Dokter</th>
                			<th field="last_name" width="50" editor="{type:'validatebox',options:{required:true}}">Jumlah Hutang</th>
                			<th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Jenis Hutang</th>
                		</tr>
                	</thead>
                </table>
                <div id="toolbar">
                	<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Tambah</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                	<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                </div>
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
    $('#dg').edatagrid();
});
</script>
</body>
</html>
