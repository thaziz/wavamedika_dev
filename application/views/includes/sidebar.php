<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/images/avatar/user-man.png') ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrator</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">DAFTAR MENU</li>
      <!-- <li class="active treeview"> -->
      <li>
        <a href="<?php echo base_url('beranda') ?>">
          <i class="fa fa-dashboard"></i> <span>Beranda</span>
          <!-- <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span> -->
        </a>
      </li>
      <li class="treeview">
        <!-- <a href="#">
          <i class="fa fa-gear"></i> <span>Sistem</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a> -->
        <a href="#">
          <i class="fa fa-gear"></i> <span>Sistem</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url('sistem/manajemen_modul') ?>"><i class="fa fa-play-circle"></i> Manajemen Modul</a></li>
            <li><a href="<?php echo base_url('sistem/manajemen_user') ?>"><i class="fa fa-play-circle"></i> Manajemen User</a></li>
        </ul>
      </li>
      <li class="header">AKUNTANSI</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-balance-scale"></i> <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="<?php echo base_url('akuntansi/master/kode_rekening_coa') ?>"><i class="fa fa-arrow-circle-right"></i> Kode Rekening (COA)</a>
          </li>
          <li>
            <a href="<?php echo base_url('akuntansi/master/kode_rekening_arus_kas') ?>"><i class="fa fa-arrow-circle-right"></i> Kode Rekening Arus Kas</a>
          </li>
          <li>
            <a href="<?php echo base_url('akuntansi/master/template_alokasi_biaya') ?>"><i class="fa fa-arrow-circle-right"></i> Alokasi Biaya</a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-balance-scale"></i> <span>Akuntansi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-play-circle"></i> <span>Transaksi</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/transaksi/jurnal_memorial') ?>"><i class="fa fa-arrow-circle-right"></i> Jurnal Memorial</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/transaksi/daftar_transaksi_jurnal') ?>"><i class="fa fa-arrow-circle-right"></i> Daftar Transaksi Jurnal</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/transaksi/alokasi_biaya') ?>"><i class="fa fa-arrow-circle-right"></i> Alokasi Biaya</a>
                </li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-play-circle"></i> <span>Laporan Keuangan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/buku_besar') ?>"><i class="fa fa-arrow-circle-right"></i> Buku Besar</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/neraca_saldo') ?>"><i class="fa fa-arrow-circle-right"></i> Neraca Saldo</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/rugi_laba') ?>"><i class="fa fa-arrow-circle-right"></i> Laba Rugi</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/neraca') ?>"><i class="fa fa-arrow-circle-right"></i> Neraca</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/arus_kas') ?>"><i class="fa fa-arrow-circle-right"></i> Arus Kas</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/pajak') ?>"><i class="fa fa-arrow-circle-right"></i> Pajak</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/akuntansi/laporan_keuangan/analisa_rasio') ?>"><i class="fa fa-arrow-circle-right"></i> Analisa Rasio</a>
                </li>
              </ul>
            </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-balance-scale"></i> <span>Hutang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-play-circle"></i> <span>Supplier</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('akuntansi/hutang/supplier/hutang_pembelian') ?>"><i class="fa fa-arrow-circle-right"></i> Hutang Pembelian</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/hutang/supplier/hutang_jasa_dan_service') ?>"><i class="fa fa-arrow-circle-right"></i> Hutang Jasa Servis</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-play-circle"></i> <span>Dokter</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('akuntansi/hutang/dokter/hutang_dokter') ?>"><i class="fa fa-arrow-circle-right"></i> Hutang Dokter</a>
                </li>
                <li>
                  <a href="<?php echo base_url('akuntansi/hutang/dokter/settlement_kasbon_dokter') ?>"><i class="fa fa-arrow-circle-right"></i> Settlement Kasbon Dokter</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="<?php echo base_url('akuntansi/hutang/jurnal_hutang/jurnal_hutang') ?>"><i class="fa fa-play-circle"></i> <span>Jurnal Hutang</span></a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-play-circle"></i> <span>Laporan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#"><i class="fa fa-arrow-circle-right"></i> Hutang Dokter
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_dokter/jasa_medis_dokter_per_pasien') ?>"><i class="fa fa-play-circle"></i> <span>Jasa Dokter Per Pasien</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_dokter/jasa_medis_dokter_per_pelayanan') ?>"><i class="fa fa-play-circle"></i> <span>Jasa Dokter Per Pelyanan</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_dokter/pajak_penghasilan_dokter') ?>"><i class="fa fa-play-circle"></i> <span>Pajak Penghasilan Dokter</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_dokter/hutang_pelayanan_dokter') ?>"><i class="fa fa-play-circle"></i> <span>Hutang Pelayanan Dokter</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_dokter/umur_hutang_dokter') ?>"><i class="fa fa-play-circle"></i> <span>Umur Hutang Dokter</span></a>
                    </li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-arrow-circle-right"></i> Hutang Supplier
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_supplier/hutang_belum_proses') ?>"><i class="fa fa-play-circle"></i> <span>Hutang Belum Proses</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_supplier/umur_hutang_pembelian') ?>"><i class="fa fa-play-circle"></i> <span>Umur Hutang Pembelian</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_supplier/hutang_jatuh_tempo') ?>"><i class="fa fa-play-circle"></i> <span>Hutang Jatuh Tempo</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_supplier/pembayaran_hutang') ?>"><i class="fa fa-play-circle"></i> <span>Pembayaran Hutang</span></a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('akuntansi/hutang/laporan/hutang_supplier/rekap_hutang_pembelian') ?>"><i class="fa fa-play-circle"></i> <span>Rekap Hutang Pembelian</span></a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-balance-scale"></i> <span>Piutang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#"><i class="fa fa-arrow-circle-right"></i> Penjamin
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Tagihan Piutang Penjamin</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-arrow-circle-right"></i> Pasien Umum
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Tagihan Piutang Pasien Umum</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-arrow-circle-right"></i> Pasien Karyawan
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-chevron-circle-right"></i> Tagihan Piutang Pasien Karyawan</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-server"></i> <span>Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-user"></i> Manajemen User</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li> -->
      <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('assets/adminlte/') ?>pages/widgets.html">
          <i class="fa fa-th"></i> <span>Widgets</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Charts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>UI Elements</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Forms</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Tables</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>ages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url('assets/adminlte/') ?>pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red">3</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('assets/adminlte/') ?>pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Mailbox</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Examples</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
          <li><a href="<?php echo base_url('assets/adminlte/') ?>pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>Multilevel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i> Level One
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Level Two
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
