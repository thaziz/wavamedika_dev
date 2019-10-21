<!DOCTYPE html>
<html>

<?php $this->load->view("includes/head.php", $head) ?>
<style type="text/css">
  main{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 4fr;
  }
  main.two{
    display: grid;
    grid-template-columns: 4fr 1fr 2fr; 
  }
  main.one{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 4fr; 
  }
  main.four{
    display: grid;
    grid-template-columns: 1fr 1fr 2fr 7fr 6fr;
  }

  .cell{
    display: table-cell;
    border: 1px solid black;
    height:100px;
  }

  .wr{
    color: red;
  }
  .thick {
  font-weight: bold;
}

hr.new1 {
  border-top: 1px solid black;
}
div {
  font-size: 11px;
}
</style>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

<?php $this->load->view("includes/navbar.php", $navbar) ?>
<?php $this->load->view("includes/sidebar.php", $sidebar) ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Hutang Jasa Dan Servis</h1>
    </section>

    <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div id="width-sensor" class="box-body">
                
<!--                 <div style = "margin-bottom:10px;border-style: solid">
                  <input id="start_date" label="Start Date:" type="text" class="easyui-datebox" required="required" style="width:20%;height: 20px" labelwidth="80px">
                  <input id="end_date" label=" s/d : " labelposition="right" type="text" class="easyui-datebox" required="required" style="width:20%;height: 20px; text-align: right;">
                </div> -->
                <main class="four">
                  <div style=" width:70px;">
                    Start Date :
                  </div>
                  <div style="margin-left: 10px;">
                    <input id="start_date" type="text" class="easyui-datebox" required="required" style="height: 20px" labelwidth="80px">
                  </div>
                  <div style=" width:70px; margin-left: 25px; text-align: right;margin-top: 3px">
                    End Date :
                  </div>
                  <div style="margin-right: 40px;">
                    <input id="end_date" labelposition="right" type="text" class="easyui-datebox" required="required" style="height: 20px; text-align: left;">
                  </div>
                </main>
                <main class="four" style="margin-top: 5px">
                  <div style="width: 75px; ">
                    Kriteria :
                  </div>
                  <div style="width: 100px;margin-left: 5px;">
                    <select id="combo-kriteria" class="easyui-combobox" name="dept" style="margin-left:50px;width:223px;height: 20px"  >
                        <option value="aa">Kriteria A</option>
                        <option>Kriteria B</option>
                    </select>
                  </div >
                  <div style="width: 90px;  margin-left: 30px; "></div>
                  <div style="margin-left: 22px">
                    <input id="tb" type="text" style="height:20px; width:50%;">
                      <a href="#" style="margin-bottom: 4px;height: 20px" class="easyui-linkbutton" data-options="iconCls:'icon-filter'">Filter</a>
                  </div>
                </main>

                  <div style = "margin-bottom:10px; margin-top: 2px">
                    <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:40%;height: 20px" label="Supplier :" labelwidth="80px">
                      <option value="aa">Supplier A</option>
                      <option>Supplier B</option>
                    </select>
                  </div>


                <table id="dg" title="Daftar Hutang Jasa Dan Servis" style=";width:99%;height:700px; margin-top:1%;"
                    toolbar="#toolbar" pagination="true" idField="id"
                    rownumbers="true" fitColumns="true" singleSelect="true">
                  <thead>
                    <tr>
                      <th field="no_jurnal" width="50" editor="{type:'validatebox',options:{required:true}}">No Hutang</th>
                      <th field="tanggal" width="50" editor="{type:'validatebox',options:{required:true}}">Tgl. Hutang</th>
                      <th field="keterangan" width="50" editor="text">Jenis Hutang</th>
                      <th field="status" width="50" editor="text">Supplier</th>
                      <th field="user_entry" width="50" editor="text">No. Po</th>
                      <th field="tgl_entry" width="50" editor="text">No. Invoice Supplier</th>
                       <th field="tgl_entry" width="50" editor="text">Tgl. Jatuh Tempo</th>
                      <th field="user_update" width="50" editor="text">Total</th>
                      <th field="tgl_update" width="50" editor="text">Keterangan</th>


                       <th field="tgl_entry" width="50" editor="text">Status</th>
                      <th field="user_update" width="50" editor="text">User Entry</th>
                      <th field="tgl_update" width="50" editor="text">Tanggal Entry</th>

                      <th field="user_update" width="50" editor="text">User Update</th>
                      <th field="tgl_update" width="50" editor="text">Tanggal Update</th>
                    </tr>
                  </thead>
                </table>
                <div id="toolbar">
                  <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="te" style="height: 25px" id="open-window">Tambah</  a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" style="height: 25px" onclick="javascript:$('#dg').edatagrid('destroyRow')">Hapus</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" style="height: 25px" onclick="javascript:$('#dg').edatagrid('saveRow')">Simpan</a>
                  <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" style="height: 25px" onclick="javascript:$('#dg').edatagrid('cancelRow')">Batal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <div id="w" class="easyui-window" title="Input Hutang Jasa Dan Servis" data-options="iconCls:''" style="width:1120px;height:570px;padding:10px;">
    <form id="tbl2" >
      <main style="height: 25px;">
        <div style="margin-top: 2px;text-align: right;height: 20px;margin-right: 3px">
          No. Hutang :
        </div>
        <div style="margin-left: 4px">
          <input class="easyui-textbox" name="name" style="width:100%;height: 20px" data-options="label:'' ">
        </div>
        <div style="margin-left: 62px; width: 54%;margin-top: 4px">
          Tanggal :
        </div>
        <div style="margin-left: 5px;">
          <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
        </div>
        <div style="margin-left: 10px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window" style="height: 25px">Verifikasi</a>
        </div>
        <div style="margin-top: 5px; ">
          Status : Verified
        </div>
        <div style="margin-top: 5px; text-align: left" class="wr">
          Tisna - 12/10/2019
        </div>

        
      </main>
      <main style="height: 25px; ">
        <div style="margin-top: 2px;text-align: right;margin-right: 8px">Jenis Hutang :</div>
          <div style="margin-bottom: 12px;margin-right: 10px;">
            <select id="combo-hutang" class="easyui-combobox" name="dept" style="width:100%;height: 20px" labelwidth="100px">
            <option value="aa">General</option>
            <option>Obat & Alkes</option>
            </select>
        </div>
        <div style="margin-top: 5px;"></div>
        <div style="margin-top: 5px;"></div>
        <div style="margin-top: 5px;"></div>
        <div style="margin-top: 5px; "  class="wr"></div>
        <div style="margin-top: 5px;"></div>
      </main>
      <main class="four" style="margin-top: 1px;height: 25px;">
        <div style="margin-top: 3px;margin-left: 20px; width: 74px;text-align: right; ">Supplier :</div>
        <div style="margin-bottom: 14px; margin-left: 10px;">
          <select id="combo-kriteria" class="easyui-combobox" name="dept" style="height: 20px; width:200px;margin-left: 4px;" >
            <option value="aa">Royal ATK</option>
            <option>Lancar Sejahtera</option>
          </select>
        </div>
      </main>
      <main style="height: 25px; ">
          <div style="margin-top: 2px; text-align: right;margin-right: 6px;">No. PO :
          </div>
          <div style="margin-bottom: 15px;margin-left: 3px">
            <input id="combo-po" data-options="prompt:'Search No PO',searcher:doSearch" class="easyui-searchbox"  name="name" style="width:100%;height: 20px" data-options="label:'' ">
            <!-- <input id="combo-po" data-options="prompt:'Search No PO',searcher:doSearch" class="easyui-searchbox" name="dept" style="width:100%;"> -->
          </div>
       
          <div style="margin-top: 2px; text-align: right;">Tgl. PO :
          </div>
          <div style="margin-bottom: 15px; margin-left: 3px">
            <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
          </div>
          <div style="margin-top: 5px; margin-left: 5px" class="thick">
            Kelengkapan :            
          </div>
          <div style="margin-top: 5px;"></div>
          <div style="margin-top: 5px;"></div>
      </main>
      <main style="height: 25px;">
        <div style="margin-top: 2px;text-align: right;margin-right: 6px">Nilai PO :</div>
          <div style="margin-bottom: 15px;margin-left: 4px">
            <input class="easyui-textbox" name="name" style="width:100%;height: 20px" data-options="label:'' ">
          </div>
          <div style="margin-top: 2px; text-align: right;">Term Of Payment :</div>
          <div style="margin-bottom: 15px; margin-left: 3px">
            <input class="easyui-textbox" name="name" style="width:100%;height: 20px" data-options="label:'' ">
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px;height: 20px">
            <input class="easyui-radiobutton" name="" style="height: 20px;"> PO
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px">
            <input class="easyui-radiobutton" name=""> Faktur Pajak
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px; width: 150px">
            <input class="easyui-radiobutton" name="">Bukti Potong
          </div>
      </main>
      <main style="height: 25px">
          <div style="margin-top:  2px;text-align: right;margin-right: 4px">No. Inv. Supp :</div>
          <div style="margin-bottom:  15px;margin-left: 4px">
            <input class="easyui-textbox" name="name" style="width:100%;height: 20px" data-options="label:'' ">
          </div>
          <div style="margin-top: 2px; text-align: right;">Tgl Jatuh Tempo :</div>
          <div style="margin-bottom: 15px; margin-left: 3px">
            <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px">
            <input class="easyui-radiobutton" name=""> Faktur/Invoice
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px">
            <input class="easyui-radiobutton" name=""> Nota Retur
          </div>
          <div style="margin-top: 5px;width: 150px;"></div>
      </main>
      <main style="height: 25px">
          <div style="margin-top: 2px;margin-right: 4px;text-align: right">No. Faktur Pajak :</div>
          <div style="margin-bottom: 15px;margin-left: 4px">
            <input class="easyui-textbox" name="name" style="width:100%;height: 20px" data-options="label:'' ">
          </div>
          <div style="margin-top: 3px; text-align: right;margin-left: 5px">Tgl. Faktur Pajak :</div>
          <div style="margin-bottom: 15px; margin-left: 3px">
            <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px">
            <input class="easyui-radiobutton" name=""> BPB
          </div>
          <div style="margin-bottom: 15px; margin-left: 10px">
            <input class="easyui-radiobutton" name=""> Berita Acara
          </div>
          <div style="margin-top: 5px;width: 150px"></div>
      </main>
    
    <main  style=" height: 37px; ">
      <div style="margin-bottom: 5px; width: 70px;margin-left: 35px; text-align: center;">Keterangan :</div>
      <div style="margin-bottom: 15px;;margin-right: 50px">
        <input class="easyui-textbox" labelPosition="left" multiline="true" style="width:600px;height:30px;">
      </div>
    </main>
    <div style="margin-left: 10px; ">
          <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="te"  id="open-window" style="height: 25px">Tambah Jasa</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="te" style="height: 25px" id="open-window">Hapus Jasa</a>
    </div>
    <main class="two" style="margin-left: 10px;margin-top: 3px">
      <div style="margin-top: 4px">
        <table class="easyui-datagrid" style="height: 200px; margin-top: 1px;width: 700px">
          <thead>
              <tr>
                  <th data-options="field:'no'" align="center" style="width: 40px;">No</th>
                  <th data-options="field:'no_bpb'" align="center" style="width: 145px" >No. BPB</th>
                  <th data-options="field:'tgl_bpb'" align="center" style="width: 130px">Tgl. BPB</th>
                  <th data-options="field:'no_do'" align="center" style="width: 200px">No. DO</th>
                  <th data-options="field:'nilai_bpb'" align="center" style="width: 170px">Nilai BPB</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
              <!-- <tr>
                  <td>002</td><td>name2</td><td>4612</td><td>2323</td><td>2323</td><td>2323</td>
              </tr> -->
          </tbody>
        </table>  


      </div>
      <div>
        <div style="text-align: right;">Sub Total : </div>
        <div style="text-align: right; margin-top: 15px">Diskon : </div>
        <!-- <div style="text-align: right; margin-top: 11px"> 
          <a href="#" class="easyui-linkbutton" plain="te"  id="ow_return" style="height: 20px">Return : </a>
        </div> -->
        <div style="text-align: right; margin-top: 12px" >
          <a href="#" class="easyui-linkbutton" plain="te" style="height: 20px" id="ow_uang_muka">Uang Muka :</a>
        </div>
        <div style="text-align: right; margin-top: 5px">PPN : 
          <input class="easyui-textbox" name="name" style="width:30px;height: 20px" data-options="label:'' "> %
        </div>
        <div style="text-align: right; margin-top: 6px">Jenis PPh : 
          <input class="easyui-textbox" name="name" style="width:30px;height: 20px" data-options="label:'' "> %
        </div>
        <div style="text-align: right; margin-top: 6px">PPh : </div>
        <div style="text-align: right; margin-top: 12px">Biaya Lain-lain : </div>
        <div style="text-align: right; margin-top: 12px">Total Hutang : </div>
      </div>
      <div>
        <div style="margin-left: 5px;width:120px; ">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
         <!--  <div style="margin-left: 5px;margin-top: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div> -->
          <div style="margin-top: 5px; margin-left: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
          <div style="margin-top: 5px; margin-left: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
          <div style="margin-top: 5px; margin-left: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
          <div style="margin-top: 5px; margin-left: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
          <div style="margin-top: 5px; margin-left: 5px;width:120px;">
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
        <div style="margin-top: 4px; margin-left: 5px;width:120px;"> 
          <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>
        <div style="margin-top: 2px; margin-left: 5px;width:120px;">
            <input class="easyui-textbox" name="name" style="width:120px;height: 20px" data-options="label:'' ">
        </div>

      </div>
      <!-- <div>Payment</div>
      <div>Payment</div>
      <div>Payment</div>
      <div>Payment</div> -->
    </main>
    <div style="margin-left: 10px;margin-top: 10px;">
          <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="te" style="height: 25px;width: 70px" id="open-window">Simpan</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" plain="te" style="height: 25px; width: 70px" id="open-window">Batal</a>
    </div>
  </form>
  </div>

  <!-- THORIQ -->

  <div id="wreturn" class="easyui-window" title="Return" data-options="iconCls:'icon'" style="width:900px;height:550px;padding:10px;">
    <form id="tbl2" style="margin-left: 20px">
      
          <main>
          <div style="margin-top: 7px; width: 70px; text-align: right">Tanggal :
          </div>
          <div style="margin-top: 5px;">
            <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
          </div>
          
          <div style="margin-top: 7px; text-align: right;">s.d
          </div>
          <div style="margin-top: 5px; margin-left: 3px">
            <input class="easyui-datebox" label="" labelPosition="top" style="width:100%;height: 20px">
          </div>
        </main>
        <main>
          <div style="margin-top: 8px; width: 70px; text-align: right; ">Kriteria :
          </div>
          <div style="margin-top: 5px;margin-left: 5px">
            <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:150px;height: 20px" >
            <option value="aa">Kriteria A</option>
            <option>Kriteria Sejahtera</option>
          </select>
          </div>
          
          <div style="margin-top: 5px; margin-left: 3px">
            <input class="easyui-textbox" label="" labelPosition="top" style="width:250px;height: 20px">
          </div>
          <div style="margin-top: 7px; margin-left: 3px">
             <a href="#" class="easyui-linkbutton"  plain="te" style="height: 20px;margin-top: 7px" id="open-window">Filter</a>
          </div>
        </main>
       
    <div>
      <hr class="new1">
    </div>
    <main class="two">
      <div>
        <table class="easyui-datagrid" style="height: 300px; margin-top: 1px;width: 800px">
          <thead>
              <tr style="height: 30px">
                  <th data-options="field:'no'" style="width: 100px;">No</th>
                  <th data-options="field:'no_bpb'" style="width: 185px" >No. Return</th>
                  <th data-options="field:'tgl_bpb'" style="width: 150px">Tgl. Return</th>
                  <th data-options="field:'no_do'" style="width: 200px">Keterangan</th>
                  <th data-options="field:'nilai_bpb'" style="width: 160px">Nilai Return</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
              <!-- <tr>
                  <td>002</td><td>name2</td><td>4612</td><td>2323</td><td>2323</td><td>2323</td>
              </tr> -->
          </tbody>
        </table>  


      </div>      
    </main>



   
    <div style="margin-left: 10px; margin-top: 15px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window">Pilih</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="te"  id="open-window">Batal</a>
    </div>
  </form>        
  </div>




  <!-- uang muka -->
<div id="wuangmuka" class="easyui-window" title="Cari Uang Muka" data-options="iconCls:'icon'" style="width:900px;height:550px;padding:10px;">
    <form id="tbl2" style="margin-left: 20px">
      
         
        <main>
          <div style="margin-top: 5px; width: 70px">Kriteria :
          </div>
          <div style="margin-top: 5px;">
            <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:150px;height: 20px" >
            <option value="aa">All Criteria</option>
            <option>No. Um</option>
             <option>Keterangan</option>
          </select>
          </div>
          
          <div style="margin-top: 5px; margin-left: 3px">
            <input class="easyui-textbox" label="" labelPosition="top" style="width:250px;height: 20px">
          </div>
          <div style="margin-top: 5px; margin-left: 3px">
             <a href="#" class="easyui-linkbutton"  plain="te" style="height: 20px"  id="open-window">Filter</a>
          </div>
        </main>
       
    <div>
      <hr class="new1">
    </div>
    <main class="two">
      <div>
        <table class="easyui-datagrid" style="height: 300px; margin-top: 1px;width: 800px">
          <thead>
              <tr>
                  <th data-options="field:'no'" style="width: 100px;">No</th>
                  <th data-options="field:'no_bpb'" style="width: 185px" >No. UM</th>
                  <th data-options="field:'tgl_bpb'" style="width: 150px">Tgl. UM</th>
                  <th data-options="field:'no_do'" style="width: 200px">Keterangan</th>
                  <th data-options="field:'nilai_bpb'" style="width: 160px">Nilai UM</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td><td></td><td></td><td></td><td></td><td></td>
              </tr>
              <!-- <tr>
                  <td>002</td><td>name2</td><td>4612</td><td>2323</td><td>2323</td><td>2323</td>
              </tr> -->
          </tbody>
        </table>  


      </div>      
    </main>



   
    <div style="margin-left: 10px; margin-top: 15px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window">Pilih</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="te"  id="open-window">Batal</a>
    </div>
  </form>        
  </div>

  <!-- uang muka -->





  <!-- PO -->
<div id="wnopo" class="easyui-window" title="Search PO" data-options="iconCls:'icon-'" style="width:900px;height:550px;padding:10px;">
    <form id="tbl2" style="margin-left: 20px">
      
         
        <main>
          <div style="margin-top: 5px; width: 70px">Kriteria :
          </div>
          <div style="margin-top: 5px;">
            <select id="combo-kriteria" class="easyui-combobox" name="dept" style="width:150px;height: 20px" >
            <option value="aa">All PO</option>
            <option>No. PO</option>
             <option>Keterangan</option>
          </select>
          </div>
          
          <div style="margin-top: 5px; margin-left: 3px">
            <input class="easyui-textbox" label="" labelPosition="top" style="width:250px;height: 20px">
          </div>
          <div style="margin-top: 5px; margin-left: 3px">
             <a href="#" class="easyui-linkbutton" style="height: 20px" plain="te"  id="open-window">Filter</a>
          </div>
        </main>
       
    <div>
      <hr class="new1">
    </div>
    <main class="two">
      <div>
        <table class="easyui-datagrid" style="height: 300px; margin-top: 1px;width: 650px">
          <thead>
              <tr>
                  <th data-options="field:'no'" style="width: 100px;">No</th>
                  <th data-options="field:'no_bpb'" style="width: 185px" >No. PO</th>
                  <th data-options="field:'tgl_bpb'" style="width: 150px">Tgl. PO</th>
                  <th data-options="field:'no_do'" style="width: 200px">Keterangan</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td></td><td></td><td></td><td></td>
              </tr>
              <!-- <tr>
                  <td>002</td><td>name2</td><td>4612</td><td>2323</td><td>2323</td>
              </tr> -->
          </tbody>
        </table>  


      </div>      
    </main>



   
    <div style="margin-left: 10px; margin-top: 5px">
          <a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="te"  id="open-window">Pilih</a>
          <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="te"  id="open-window">Batal</a>
    </div>
  </form>        
  </div>
  <?php $this->load->view("includes/footer.php") ?>
  <?php $this->load->view("includes/sidebar_control.php") ?>
</div>
<?php $this->load->view("includes/js.php") ?>
<script type="text/javascript">
$(function(){
    $(function(){
  $('#w').window('close');
  $('#wreturn').window('close');
  $('#wuangmuka').window('close');
  $('#wnopo').window('close');
  var dg = $('#dg').datagrid();
  var data = [
      {}
  ];
    dg.datagrid('loadData',data);
    $('#tbs').textbox({
    })

    $('#open-window').click(function(params) {
      $('#w').window({
        onOpen: function(){
          var dgs = $('#dgs').datagrid();
        }
      })  
    });



    $('#ow_return').click(function(params) {
      $('#wreturn').window({
        onOpen: function(){
          var dgs = $('#dgs').datagrid();
        }
      })  
    });



    $('#ow_uang_muka').click(function(params) {
      $('#wuangmuka').window({
        onOpen: function(){
          var dgs = $('#dgs').datagrid();
        }
      })  
    });


    

    $('#buka-window').click(function(params) {
      $('#um').window({
        onOpen: function(){
          var umk = $('#umk').datagrid();
        }
      })  
    });
    
    // dgs.datagrid('loadData',data);
    // $('#dg').edatagrid('enableFilter');
});
});

    function doSearch(value){
          $('#wnopo').window({
                    onOpen: function(){
                      var dgs = $('#dgs').datagrid();
                    }
          })
    }

    function retur(value){
        alert('You input: ' + value);
    }

    function uangMuka(value){
        alert('You input: ' + value);
    }

    function btn_close_return(value){
     
  $('#wreturn').window('close');
    }
    function btn_close_uang_muka(value){
        
  $('#wuangmuka').window('close');
  
    }
    function btn_close_po(value){
  $('#wnopo').window('close');
    }

</script>
</body>
</html>
