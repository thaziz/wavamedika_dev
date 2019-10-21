<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca extends CI_Controller {

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
    	$this->load->view('akuntansi/akuntansi/laporan_keuangan/v_neraca', $this->data_respon);
    }

    function cetak() {
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
        <div align="center"><b><u>NERACA</u></b><br>
            Per Tanggal 31 Oktober 2019</div><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th colspan="3" valign="center" align="center" width="60%">Keterangan</th>
                <th width="20%" align="center">Periode Sebelumnya</th>
                <th width="20%" align="center">Periode Berjalan</th>
            </tr>
            <tr>
                <td colspan="3"><b>Aktiva</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td colspan="2" width="59%"><b>Aktiva Lancar</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%">Kas dan setara kas</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%">Piutang Usaha</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%">Piutang lain-lain</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%"><b>Jumlah Aktiva Lancar</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td width="1%"></td>
                <td colspan="2" width="59%"><b>Aktiva Tetap</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%">Harga Perolehan</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%">Akumulasi Penyusutan</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td></td>
                <td width="3%"></td>
                <td width="56%"><b>Nilai Buku</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
            <tr>
                <td style="border-top:0.5px solid black;"></td>
                <td style="border-top:0.5px solid black;"></td>
                <td style="border-top:0.5px solid black;"><b>Jumlah Aktiva</b></td>
                <td style="border-top:0.5px solid black; border-left:0.5px solid black;" align="right" width="20%">0</td>
                <td style="border-top:0.5px solid black; border-left:0.5px solid black;" align="right" width="20%">0</td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/cetak_neraca.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
