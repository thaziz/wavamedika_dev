<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_besar extends CI_Controller {

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
    	$this->load->view('akuntansi/akuntansi/laporan_keuangan/v_buku_besar', $this->data_respon);
    }

    function cetak() {
        $start_date = date("Y-m-d", strtotime($this->input->post('start_date')));
        $end_date = date("Y-m-d", strtotime($this->input->post('end_date')));
        $kode_rekening_coa_first = $this->input->post('kode_rekening_coa_first');
        $kode_rekening_coa_last = $this->input->post('kode_rekening_coa_last');
        $cost_center = $this->input->post('cost_center') == "" ? 0 : $this->input->post('cost_center');

        $param = [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_coa_code' => $kode_rekening_coa_first,
            'end_coa_code' => $kode_rekening_coa_last,
            'cc_id' => $cost_center
        ];
        $API_BUKU_BESAR = "http://36.92.178.100/ws_wavamedika/public/ledger";

        $c = curl_init($API_BUKU_BESAR);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($param));
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($c);
		curl_close($c);
        $result = json_decode($response, true);
        // echo json_encode($result['list']);
        // die();

        $this->load->library('Pdf');
        $pdf = tcpdf();

        //initialize document
        $pdf->AddPage("P", "F4");
        $pdf->SetFont("helvetica", "", 9);

        $source_img = base_url('assets/global/img/header.png');
        $html = '<img src="'.$source_img.'" >';
        // $html = '<img src="http://localhost/wavamedika/assets/global/img/header.png" >';
        $html = '
        <style>
            table, thead, tr, th {
                border:0.5px solid black;
                font-size: 7.5px;
            }
        </style>
        <div align="center"><b><u>BUKU BESAR</u></b><br>
            Periode tanggal '.convert_date_to_indonesia($start_date).' s/d '.convert_date_to_indonesia($end_date).'</div>
        <br>';

        $result['list'][] = [
            'coa_code' => ""
        ];

        $table = "";
        $code = "";
        $kode_rekening_coa_awal = "";
        $kode_rekening_coa_akhir = "";
        for ($i = 0 ; $i < sizeof($result['list'])-1 ; $i++) {
            if ($code != $result['list'][$i]['coa_code']) {
                if ($code == "") {
                    $kode_rekening_coa_awal = $result['list'][$i]['coa_code'].' '.$result['list'][$i]['coa_name'];
                }

                $code = $result['list'][$i]['coa_code'];
                $table .=
                    '<b>'.$result['list'][$i]['coa_code'].' '.$result['list'][$i]['coa_name'].'</b>
                    <br>
                    <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
                        <tr>
                            <th width="10%" valign="middle" align="center">Tanggal</th>
                            <th width="12%" valign="middle" align="center">No. Bukti</th>
                            <th width="6%" align="center">Cost Center</th>
                            <th width="25%" valign="middle" align="center">Keterangan</th>
                            <th width="15%" align="center">Debet</th>
                            <th width="15%" align="center">Kredit</th>
                            <th width="17%" align="center">Saldo</th>
                        </tr>
                        <tr>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['lg_date'].'</b></td>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['ref_no'].'</b></td>
                            <td style="border-right:0.5px solid black;" align="center"><b>'.$result['list'][$i]['unit_code'].'</b></td>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['lg_desc'].'</b></td>
                            <td style="border-right:0.5px solid black;" align="right"><b>'.((int)$result['list'][$i]['debit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['debit']).'</b></td>
                            <td style="border-right:0.5px solid black;" align="right"><b>'.((int)$result['list'][$i]['credit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['credit']).'</b></td>
                            <td align="right"><b>'.((int)$result['list'][$i]['amount'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['amount']).'</b></td>
                        </tr>';
            } else {
                if ($code != $result['list'][$i+1]['coa_code']) {
                    $table .=
                        '<tr>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['lg_date'].'</b></td>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['ref_no'].'</b></td>
                            <td style="border-right:0.5px solid black;" align="center"><b>'.$result['list'][$i]['unit_code'].'</b></td>
                            <td style="border-right:0.5px solid black;"><b>'.$result['list'][$i]['lg_desc'].'</b></td>
                            <td style="border-right:0.5px solid black;" align="right"><b>'.((int)$result['list'][$i]['debit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['debit']).'</b></td>
                            <td style="border-right:0.5px solid black;" align="right"><b>'.((int)$result['list'][$i]['credit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['credit']).'</b></td>
                            <td align="right"><b>'.((int)$result['list'][$i]['amount'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['amount']).'</b></td>
                        </tr></table><br><br>';
                } else {
                    $table .=
                        '<tr>
                            <td style="border-right:0.5px solid black;">'.$result['list'][$i]['lg_date'].'</td>
                            <td style="border-right:0.5px solid black;">'.$result['list'][$i]['ref_no'].'</td>
                            <td style="border-right:0.5px solid black;" align="center">'.$result['list'][$i]['unit_code'].'</td>
                            <td style="border-right:0.5px solid black;">'.$result['list'][$i]['lg_desc'].'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.((int)$result['list'][$i]['debit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['debit']).'</td>
                            <td style="border-right:0.5px solid black;" align="right">'.((int)$result['list'][$i]['credit'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['credit']).'</td>
                            <td align="right">'.((int)$result['list'][$i]['amount'] == 0 ? 0 : 'Rp. '.$result['list'][$i]['amount']).'</td>
                        </tr>';
                }
            }
            if ($i == sizeof($result['list']) - 2) {
                $kode_rekening_coa_akhir = $result['list'][$i]['coa_code'].' '.$result['list'][$i]['coa_name'];
                // $table .= '</table>';
            }
        }

        $kode_rekening_html =
            '<br><b>Kode Rekening Awal: '.$kode_rekening_coa_awal.'</b><br><b>Kode Rekening Akhir: '.$kode_rekening_coa_akhir.'</b>
            <br><br>';

        $html .= $kode_rekening_html . $table;

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/cetak_buku_besar.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
}
