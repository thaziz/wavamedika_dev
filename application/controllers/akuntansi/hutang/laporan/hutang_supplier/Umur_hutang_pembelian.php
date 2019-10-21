<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umur_hutang_pembelian extends CI_Controller {

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
    	$this->load->view('akuntansi/hutang/laporan/hutang_supplier/v_umur_hutang_pembelian', $this->data_respon);
    }

    function cetak_summary_per_jenis_hutang() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("L", "A4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th, td {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>AGING HUTANG PER JENIS HUTANG (SUMMARY)</u></b><br>
            Per tanggal 9 September 2019</div>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th rowspan="2" width="5%" valign="middle" align="center"><b>No.</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Jenis Hutang</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Total Hutang</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Uang Muka</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Pembayaran</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Outstanding</b></th>
                <th colspan="6" width="45%" valign="middle" align="center"><b>Umur Hutang (hari)</b></th>
            </tr>
            <tr>
                <th align="center"><b/> &lt;= 7 hr.</th>
                <th align="center"><b>8 - 14 hr.</b></th>
                <th align="center"><b>15 - 30 hr.</b></th>
                <th align="center"><b>31 - 60 hr.</b></th>
                <th align="center"><b>61 - 90 hr.</b></th>
                <th align="center"><b>&gt; 90 hr.</b></th>
            </tr>
            <tr>
                <td align="center">1</td>
                <td>Obat & Alkes</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="center">2</td>
                <td>General</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Total</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_umur_hutang_pembelian_summary_per_jenis_hutang.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }

    function cetak_summary_per_supplier() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("L", "A4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th, td {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>AGING HUTANG PER SUPPLIER (SUMMARY)</u></b><br>
            Per tanggal 9 September 2019</div>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th rowspan="2" width="15%" valign="middle" align="center"><b>Supplier</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Total Hutang</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Uang Muka</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Pembayaran</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Outstanding</b></th>
                <th colspan="6" width="45%" valign="middle" align="center"><b>Umur Hutang (hari)</b></th>
            </tr>
            <tr>
                <th align="center"><b/> &lt;= 7 hr.</th>
                <th align="center"><b>8 - 14 hr.</b></th>
                <th align="center"><b>15 - 30 hr.</b></th>
                <th align="center"><b>31 - 60 hr.</b></th>
                <th align="center"><b>61 - 90 hr.</b></th>
                <th align="center"><b>&gt; 90 hr.</b></th>
            </tr>
            <tr>
                <td colspan="11"><b>Obat & Alkes</b></td>
            </tr>
            <tr>
                <td>Adi Buana Citra Dharmala, PT.</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td>Antarmitra Sembada, PT.</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="right"><b> Sub Total Obat & Alkes</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="11"><b>General</b></td>
            </tr>
            <tr>
                <td>Adi Buana Citra Dharmala, PT.</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td>Antarmitra Sembada, PT.</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="right"><b> Sub Total Obat & Alkes</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td align="right"><b> Grand Total</b></td>
                <td align="right"><b>4.000.000,00</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>3.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_umur_hutang_pembelian_summary_per_supplier.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
    
    function cetak_detail() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("L", "A4");
        $pdf->SetFont("helvetica", "", 9);

        // $source_img = base_url('assets/global/img/header.png');

        // $html = '<img src="'.$source_img.'" >';
        $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html .= '
        <style>
            table, thead, tr, th, td {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>AGING HUTANG (DETAIL)</u></b><br>
            Per tanggal 9 September 2019</div>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th rowspan="2" width="8%" valign="middle" align="center"><b>Tanggal</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>No. Dokumen</b></th>
                <th rowspan="2" width="10%" valign="middle" align="center"><b>Keterangan</b></th>
                <th rowspan="2" width="8%" valign="middle" align="center"><b>Total Hutang</b></th>
                <th rowspan="2" width="8%" valign="middle" align="center"><b>Uang Muka</b></th>
                <th rowspan="2" width="8%" valign="middle" align="center"><b>Pembayaran</b></th>
                <th rowspan="2" width="8%" valign="middle" align="center"><b>Outstanding</b></th>
                <th colspan="6" width="40%" valign="middle" align="center"><b>Umur Hutang (hari)</b></th>
            </tr>
            <tr>
                <th align="center"><b/> &lt;= 7 hr.</th>
                <th align="center"><b>8 - 14 hr.</b></th>
                <th align="center"><b>15 - 30 hr.</b></th>
                <th align="center"><b>31 - 60 hr.</b></th>
                <th align="center"><b>61 - 90 hr.</b></th>
                <th align="center"><b>&gt; 90 hr.</b></th>
            </tr>
            <tr>
                <td colspan="13"><b>Obat & Alkes</b></td>
            </tr>
            <tr>
                <td colspan="13"><b>Adi Bhuana Citra Dharmala, PT.</b></td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909051</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909052</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Sub Total Adi Bhuana Citra Dharmala, PT.</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="13"><b>Citra Mandiri Cipta, PT.</b></td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909053</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909054</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Sub Total Citra Mandiri Cipta, PT.</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Total Obat & Alkes</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="13"><b>General</b></td>
            </tr>
            <tr>
                <td colspan="13"><b>Adi Bhuana Citra Dharmala, PT.</b></td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909051</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909052</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Sub Total Adi Bhuana Citra Dharmala, PT.</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="13"><b>Citra Mandiri Cipta, PT.</b></td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909053</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">1.000.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td align="center">21-09-2019</td>
                <td align="center">HTG-WH-1909054</td>
                <td>Pembelian Umum</td>
                <td align="right">1.000.000,00</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">0</td>
                <td align="right">500.000,00</td>
                <td align="right">0</td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Sub Total Citra Mandiri Cipta, PT.</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Total General</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b> Grand Total</b></td>
                <td align="right"><b>2.000.000,00</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.500.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>1.000.000,00</b></td>
                <td align="right"><b>0</b></td>
                <td align="right"><b>500.000,00</b></td>
                <td align="right"><b>0</b></td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_umur_hutang_pembelian_detail.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
