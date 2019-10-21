<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>

<style>
  #header_balance{
    background:#ccc;
  }
</style>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Alokasi Biaya</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body">
                <div style = "margin-bottom:1px">
                  <input id="start_date" label="Start Date:" type="text" class="easyui-datebox" required="required" style="width:200px; height: 20px;">
                  <input id="end_date" label="s/d : " type="text" class="easyui-datebox" required="required" style="width:150px; height: 20px;" labelWidth="25px;">
                </div>
                <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:200px;  height: 20px; margin-top: 5px;" label="Kriteria">
                    <option value="">All kriteria</option>
                    <option>Kode rekening</option>
                    <option>Unit</option>
                  </select>
                  <input id="tb" type="text" style="width:125px; vertical-align: middle; height: 20px; margin-top: 0px; margin-left: 25px;">
                  <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-filter'" style="height: 20px; margin-top: 0px;">Filter</a>
                <hr>
                <table id="dg" title="Daftar Alokasi Biaya" style=";width:00px;height:400px; margin-top:1%;"
                    toolbar="#toolbar" pagination="true" idField="id"
                    rownumbers="true" fitColumns="true" singleSelect="true">
                  <thead>
                    <tr>
                      <th field="no_alokasi" width="50" editor="{type:'validatebox',options:{required:true}}">No. Alokasi</th>
                      <th field="tgl_alokasi" width="50" editor="{type:'validatebox',options:{required:true}}">Tgl. Alokasi</th>
                      <th field="kode_rekening" width="50" editor="text">Kode Rekening</th>
                      <th field="unit" width="50" editor="text">Unit</th>
                      <th field="total" width="50" editor="text">Total</th>
                      <th field="user_entry" width="50" editor="text">User Entry</th>
                      <th field="tgl_entry" width="50" editor="text">Tgl. Entry</th>
                      <th field="user_update" width="50" editor="text">User Update</th>
                      <th field="tgl_update" width="50" editor="text">Tgl. Update</th>
                    </tr>
                  </thead>
                </table>
                <div id="toolbar">
                  <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true"  id="open-window">Tambah</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-edit" plain="true"  id="open-window">Ubah</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-print" plain="true">Cetak</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>


  <div id="w" class="easyui-window" title="Entry Alokasi Biaya" data-options="" style="width:1000px;height:600px;padding:10px;">
    
    <input id="w_no_jurnal" type="text" style="width:40%; height: 20px;" label="No. Jurnal">
    <input id="w_tgl" label="Tgl. Alokasi:" type="text" class="easyui-datebox" required="required" style="width:30%; height: 20px;" labelWidth="70px;">
    <a href="#" class="easyui-linkbutton" style="height: 20px; width: 83px;">Open</a>
    <span style="font-size: 11px;"><b>Status: </b></span><span style="color: red; font-size: 11px;">Verified</span> <span style="color: red; font-size: 11px;">Tisna - 12/10/2019</span>
    <br>

    <div style="margin-top: 5px"></div>

    <select id="w_kode_rekening" class="easyui-combobox" name="kode_rekening" style="width:40%; height: 20px;" label="Kode Rekening" readonly="readonly">
      <option value="631102 - Listrik">631102 - Listrik</option>
    </select>
    <a href="#" class="easyui-linkbutton" style="margin-left: 293px; height: 20px" iconCls="icon-search">Cari Jurnal</a>
    
    <div style="margin-top: 5px"></div>

    <select id="w_unit" class="easyui-combobox" name="kode_rekening" style="width:40%; height: 20px;" label="Unit" readonly="readonly">
      <option value="Umum & Rumah tangga">Umum & Rumah tangga</option>
    </select>
    
    <div style="margin-top: 5px"></div>

    <input id="w_jumlah" type="text" style="width:40%; height: 20px;" label="Jumlah">
    <div style="margin-top: 10px;"></div>
    <div id="dgs-id">
      <table id="dgs" title="" style="width:70%;height:auto;" toolbar="#toolbars"
          pagination="false" idField="ids"
          rownumbers="false" fitColumns="true" singleSelect="true">
        <thead>
          <tr>
            <th field="no_alokasis" width="50%" editor="{type:'validatebox',options:{required:true}}">Unit</th>
            <th field="tgl_alokasis" width="20%" editor="{type:'validatebox',options:{required:true}}" data-options="align:'right'">Presentase</th>
            <th field="kode_rekenings" width="30%" editor="text" data-options="align:'right'">Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Akuntansi</td>
            <td>5,60%</td>
            <td><?php echo number_format('6720000'); ?></td>
          </tr>
          <tr>
            <td>Keuangan & Perpajakan</td>
            <td>15,00%</td>
            <td><?php echo number_format('18000000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap A</td>
            <td>12,00%</td>
            <td><?php echo number_format('14400000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap B</td>
            <td>11,00%</td>
            <td><?php echo number_format('13200000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap C</td>
            <td>8,00%</td>
            <td><?php echo number_format('9600000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap D</td>
            <td>10,00%</td>
            <td><?php echo number_format('12000000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap E</td>
            <td>12,40%</td>
            <td><?php echo number_format('14880000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap F</td>
            <td style="text-align: right;">40,00%</td>
            <td style="text-align: right;"><?php echo number_format('16800000'); ?></td>
          </tr>
          <tr>
            <td>Rawat Inap G</td>
            <td style="text-align: right;">12,00%</td>
            <td style="text-align: right;"><?php echo number_format('14400000'); ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="margin-top: 15px">
        <!-- <table id="dgs_balance" title="" style="width:70%;height:auto;" toolbar="#toolbars"
          pagination="false" idField="ids"
          rownumbers="false" fitColumns="true" singleSelect="true"> -->
        <!-- <table style="width:70%;height:auto;" border="border-collapse"> -->
        <table style="width:70%;height:auto;">
          <thead>
            <!-- <tr id="header_balance"> -->
            <tr>
              <th style="width:325px; text-align: right; padding-right: 5px;">Balance </th>
              <!-- <th width="130px" style="text-align: right; border: 0.5px solid black;"><b>100%</b></th> -->
              <th style="width:125px;">
                <input id="balance_persen" type="text" style="text-align: right; width: 100%" value="100%">
              </th>
              <th style="width: 5px;">&nbsp</th>
              <!-- <th width="190px" style="text-align: right; border: 0.5px solid black;"><b>120.000.000,00</b></th> -->
              <th style="width: 190px;">
                <input id="balance_total" type="text" style="text-align: right; width: 100%" value="120.000.000,00">
              </th>
              <th style="width: 20px;"></th>
            </tr>
          </thead>
        </table>
    </div>
    <div style="margin-left: 5px; margin-top: 15px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window" style="width: 80px; height: 20px;">Simpan</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="te"  id="open-window" style="width: 80px;height: 20px;">Batal</a>
          <!-- <span style="position: absolute;right: 320px">Balance :
          </span>
          <span style="position: absolute;right: 70px">

          <input class="easyui-textbox"  label="" value="100.000" labelPosition="top" style="width:120px;text-align: right;">

          <input class="easyui-textbox" label="" value="100.000" labelPosition="top" style="width:120px;text-align: right;">
          </span> -->
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
    var data = [
      {"no_alokasi":"","tgl_alokasi":"","kode_rekening":"631102 - Listrik","unit":"Umum & Rumah tangga","total":"120.000.000","user_entry":"Admin","tgl_entry":"30-09-2019 10:00:00","user_update":"Admin","tgl_entry":"30-09-2019 10:00:01"},
      {"no_alokasi":"","tgl_alokasi":"","kode_rekening":"631102 - Listrik","unit":"Umum & Rumah tangga","total":"125.000.000","user_entry":"Admin","tgl_entry":"31-09-2019 09:00:00","user_update":"Admin","tgl_entry":"31-09-2019 09:00:05"},
      ];

    dg.datagrid('loadData',data);
    $('#w_no_jurnal').textbox({});
    $('#w_jumlah').textbox({});
    // $('#balance_persen').textbox({value:'100%'});
    // $('#balance_total').textbox({value:'120.000.000,00'});

    $('#open-window').click(function(params) {
      $('#w').window({
        onOpen: function(){
          var dgs = $('#dgs').datagrid();
          var dgs_balance = $('#dgs_balance').datagrid();
          // $("#toolbars").insertAfter("#dgs-id .datagrid-view");
        }
      })  
    });
});
</script>
</body>
</html>
