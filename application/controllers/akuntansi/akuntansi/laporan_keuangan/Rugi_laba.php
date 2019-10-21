<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rugi_laba extends CI_Controller {

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
    	$this->load->view('akuntansi/akuntansi/laporan_keuangan/v_rugi_laba', $this->data_respon);
    }

    function cetak() {
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
            table, thead, tr, th {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>LAPORAN LABA RUGI</u></b><br>
            Per Tanggal 31 Oktober 2019</div><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th rowspan="2" colspan="4" valign="center" align="center" width="40%">Keterangan</th>
                <th colspan="2" width="20%" align="center">Bulan ini</th>
                <th colspan="2" width="20%" align="center">Bulan lalu</th>
                <th colspan="2" width="20%" align="center">s/d Bulan ini</th>
            </tr>
            <tr>
                <th align="center" width="15%">31-10-2019</th>
                <th align="center" width="5%">%</th>
                <th align="center" width="15%">30-09-2019</th>
                <th align="center" width="5%">%</th>
                <th align="center" width="15%">s/d 2019</th>
                <th align="center" width="5%">%</th>
            </tr>
            <tr>
                <td colspan="4"><b>PENDAPATAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">1.000.000,00</td>
                <td align="right" width="5%">100</td>
                <td align="right" width="15%">1.000.000,00</td>
                <td align="right" width="5%">100</td>
                <td align="right" width="15%">1.000.000,00</td>
                <td style="border-right:0.5px solid black;" align="right" width="5%">100</td>
            </tr>
            <tr>
                <td colspan="4">Rawat Inap</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td colspan="3" width="203.5px;">Jasa Tenaga Medis</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Kamar Rawat Inap</td>
                <td align="right" width="15%" style="border-left:0.5px solid black;border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Sub Total:</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="4">Rawat Jalan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td colspan="3" width="203.5px;">Jasa Tenaga Medis</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Kamar Rawat Inap</td>
                <td align="right" width="15%" style="border-left:0.5px solid black;border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Sub Total:</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>JUMLAH:</td>
                <td style="border-left:0.5px solid black; border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="5%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="5%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="4"><b>BEBAN POKOK PENDAPATAN</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">1.000.000,00</td>
                <td align="right" width="5%">100</td>
                <td align="right" width="15%">1.000.000,00</td>
                <td align="right" width="5%">100</td>
                <td align="right" width="15%">1.000.000,00</td>
                <td style="border-right:0.5px solid black;" align="right" width="5%">100</td>
            </tr>
            <tr>
                <td colspan="4">Rawat Inap</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td colspan="3" width="203.5px;">Jasa Tenaga Medis</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Kamar Rawat Inap</td>
                <td align="right" width="15%" style="border-left:0.5px solid black;border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Sub Total:</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="4">Rawat Jalan</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td width="10px"></td>
                <td colspan="3" width="203.5px;">Jasa Tenaga Medis</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">Kamar Rawat Inap</td>
                <td align="right" width="15%" style="border-left:0.5px solid black;border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
                <td align="right" width="15%" style="border-bottom:0.5px solid black;">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%" style="border-bottom:0.5px solid black;">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Sub Total:</td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>JUMLAH:</td>
                <td style="border-left:0.5px solid black; border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="5%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="5%">0</td>
                <td style="border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black; border-bottom:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Laba Bruto:</b></td>
                <td style="border-left:0.5px solid black;" align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td align="right" width="5%">0</td>
                <td align="right" width="15%">0</td>
                <td style="border-right:0.5px solid black;" align="right" align="right" width="5%">0</td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        $pdf->Footer();
        $pdf->Output("assets/file/cetak_rugi_laba.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
