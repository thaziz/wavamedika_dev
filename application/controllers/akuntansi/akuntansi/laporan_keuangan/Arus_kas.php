<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arus_kas extends CI_Controller {

    private $data_respon = [];

    function __construct()
 	{
 		parent::__construct();
        if ($this->session->userdata('username') == '') {
        	$this->session->set_flashdata('notifikasi', '<div id="notifikasi">SILAKAN LOGIN TERLEBIH DAHULU</div>');
            redirect('login');
        }
        $this->data_respon['head'] = [];
        $this->data_respon['navbar'] = [
            'username' => $this->session->userdata('username'),
        ];
        $this->data_respon['sidebar'] = [];
 	}

    public function index()
    {
        $this->data_respon['data'] = '';
    	$this->load->view('akuntansi/akuntansi/laporan_keuangan/v_arus_kas', $this->data_respon);
    }

    function cetak_summary() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>LAPORAN ARUS KAS</u></b><br>
            Per Tanggal 31 Desember 2018</div><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th colspan="2" valign="center" align="center" width="40%">Keterangan</th>
                <th width="15%" align="center">Desember 2018</th>
                <th width="15%" align="center">Desember 2017</th>
                <th width="15%" align="center">s/d Desember 2018</th>
                <th width="15%" align="center">s/d Desember 2017</th>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS OPERASIONAL</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran kas kepada pemasok dan pihak ketiga lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran kas untuk beban usaha dan lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran biaya keuangan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Kas netto diperoleh dari operasional</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS INVESTASI</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran uang muka dan pembelian aset tetap lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Aset tetap dan perangkat lunak</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan hasil penjualan aset lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Arus kas netto digunakan untuk aktivitas investasi</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS PENDANAAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan dari pinjaman bank</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran dari pinjaman bank</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan dari (Pembayaran kepada) pihak berelasi</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Arus netto digunakan untuk aktivitas pendanaan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KENAIKAN (PENURUNAN) NETO KAS DAN SETARA KAS</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KAS DAN SETARA KAS AWAL BULAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KAS DAN SETARA KAS AKHIR BULAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/cetak_arus_kas_summary.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }

    function cetak_detail() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>LAPORAN ARUS KAS DETAIL</u></b><br>
            Per Tanggal 31 Desember 2018</div><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th colspan="2" valign="center" align="center" width="40%">Keterangan</th>
                <th width="15%" align="center">Desember 2018</th>
                <th width="15%" align="center">Desember 2017</th>
                <th width="15%" align="center">s/d Desember 2018</th>
                <th width="15%" align="center">s/d Desember 2017</th>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS OPERASIONAL</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran kas kepada pemasok dan pihak ketiga lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran kas untuk beban usaha dan lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran biaya keuangan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Kas netto diperoleh dari operasional</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS INVESTASI</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran uang muka dan pembelian aset tetap lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Aset tetap dan perangkat lunak</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan hasil penjualan aset lainnya</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Arus kas netto digunakan untuk aktivitas investasi</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>ARUS KAS DARI AKTIVITAS PENDANAAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan dari pinjaman bank</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Pembayaran dari pinjaman bank</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Penerimaan dari (Pembayaran kepada) pihak berelasi</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td width="39%">Arus netto digunakan untuk aktivitas pendanaan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KENAIKAN (PENURUNAN) NETO KAS DAN SETARA KAS</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KAS DAN SETARA KAS AWAL BULAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
            <tr>
                <td colspan="2"><b>KAS DAN SETARA KAS AKHIR BULAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/cetak_arus_kas_detail.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
