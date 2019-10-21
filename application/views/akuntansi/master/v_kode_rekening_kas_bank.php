<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Manajemen Kode Rekening Kas Bank</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body">
                <table id="dg" title="Daftar Kode Rekening Kas Bank" style=";width:100%;height:auto"
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
