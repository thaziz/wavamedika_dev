<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang_belum_proses extends CI_Controller {

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
    	$this->load->view('akuntansi/hutang/laporan/hutang_supplier/v_hutang_belum_proses', $this->data_respon);
    }

    function cetak_summary() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "A4");
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
        <div align="center"><b><u>LAPORAN SUMMARY OUTSTANDING BPB</u></b><br>
            Periode tanggal 31 Juli 2019</div>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th width="5%" valign="middle" align="center"><b>No.</b></th>
                <th width="50%" valign="middle" align="center"><b>Nama Supplier</b></th>
                <th width="20%" align="center"><b>Total Pre Hutang</b></th>
                <th width="15%" valign="middle" align="center"><b>Jumlah BPB</b></th>
            </tr>
            <tr>
                <td align="center">1</td>
                <td>Adi Buana Citra Dharmala, PT.</td>
                <td align="center">1.394.541,83</td>
                <td align="center">2</td>
            </tr>
            <tr>
                <td align="center">2</td>
                <td>Adi Buana Citra Dharmala, PT.</td>
                <td align="center">2.000.000,00</td>
                <td align="center">1</td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Total</b></td>
                <td align="center"><b>1.394.541,83</b></td>
                <td align="center"><b>3</b></td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_hutang_belum_proses_summary.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
    
    function cetak_detail() {
        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "A4");
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
        <div align="center"><b><u>LAPORAN DETAIL SUMMARY OUTSTANDING BPB</u></b><br>
            Per tanggal 9 September 2019</div>
        <br><br>
        <b>Adi Buana Citra Dharmala, PT</b>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th width="5%" valign="middle" align="center"><b>No.</b></th>
                <th width="15%" valign="middle" align="center"><b>No. BPB</b></th>
                <th width="15%" valign="middle" align="center"><b>Tgl. BPB</b></th>
                <th width="15%" valign="middle" align="center"><b>No. PO</b></th>
                <th width="20%" align="center"><b>Total Pre Hutang</b></th>
                <th width="15%" valign="middle" align="center"><b>Jenis Pembelian</b></th>
                <th width="15%" valign="middle" align="center"><b>Operator BPB</b></th>
            </tr>
            <tr>
                <td align="center">1</td>
                <td align="center">TF-1901-00057</td>
                <td align="center">04-09-2019</td>
                <td align="center">P0001</td>
                <td align="right">1.394.541,83</td>
                <td>Obat dan Alkes</td>
                <td>Farmasi IDE</td>
            </tr>
            <tr>
                <td align="center">2</td>
                <td align="center">TF-1901-00057</td>
                <td align="center">04-09-2019</td>
                <td align="center">P0002</td>
                <td align="right">1.000.000,00</td>
                <td>Obat dan Alkes</td>
                <td>Farmasi IDE</td>
            </tr>
            <tr>
                <td align="center">3</td>
                <td align="center">TF-1901-00057</td>
                <td align="center">04-09-2019</td>
                <td align="center">P0003</td>
                <td align="right">1.000.000,00</td>
                <td>Obat dan Alkes</td>
                <td>Farmasi IDE</td>
            </tr>
            <tr>
                <td colspan="4" align="right"><b>Total</b></td>
                <td align="right"><b>3.394.541,83</b></td>
                <td colspan="2" bgcolor="grey"></td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_hutang_belum_proses_detail.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
