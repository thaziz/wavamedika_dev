<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Neraca_saldo extends CI_Controller {
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
        $this->load->view('akuntansi/akuntansi/laporan_keuangan/v_neraca_saldo', $this->data_respon);
    }

    function cetak() {

        $data=$this->neraca_saldo($_POST);
        $start_debit=0;
        $start_credit=0;
        $debit=0;
        $credit=0;
        $end_debit=0;
        $end_credit=0;
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
        <div align="center"><b><u>NERACA SALDO</u></b><br>
            Periode tanggal '.$_POST["tgl1"].' s/d '.$_POST["tgl2"].'</div>
        <br><br>
        <b>Kode Rekening Awal: '.$data["coa1"].'</b>
        <br>
        <b>Kode Rekening Akhir: '.$data["coa2"].'</b>
        <br><br>
        <table cellspacing="0" style="width: 100%; border:0.5px solid black;">
            <tr>
                <th align="center" rowspan="2" width="8%">Kode Rekening</th>
                <th align="center" rowspan="2" width="20%">Nama Rekening</th>
                <th align="center" colspan="2">Saldo Awal</th>
                <th align="center" colspan="2">Mutasi</th>
                <th align="center" colspan="2">Saldo Akhir</th>
            </tr>
            <tr>
                <th align="center">Debet</th>
                <th align="center">Kredit</th>
                <th align="center">Debet</th>
                <th align="center">Kredit</th>
                <th align="center">Debet</th>
                <th align="center">Kredit</th>
            </tr>';

                foreach ($data["rows"] as $key => $v) {
                    $html .='<tr>
                                <td style="border-right:0.5px solid black;" align="center">'.$v->coa_code.'</td>
                                <td style="border-right:0.5px solid black;">'.$v->coa_name.'</td>
                                <td style="border-right:0.5px solid black;" align="right">'.number_format($v->start_debit,'2',',','.').'</td>
                                <td style="border-right:0.5px solid black;" align="right">'.number_format($v->start_credit,'2',',','.').'</td>
                                <td style="border-right:0.5px solid black;" align="right">'.number_format($v->debit,'2',',','.').'</td>
                                <td style="border-right:0.5px solid black;" align="right">'.number_format($v->credit,'2',',','.').'</td>
                                <td style="border-right:0.5px solid black;" align="right">'.number_format($v->end_debit,'2',',','.').'</td>
                                <td align="right">'.number_format($v->end_credit,'2',',','.').'</td>
                            </tr>';
                    $start_debit+=$v->start_debit;
                    $start_credit+=$v->start_credit;
                    $debit+=$v->debit;
                    $credit+=$v->credit;
                    $end_debit+=$v->end_debit;
                    $end_credit+=$v->end_credit;
                }

     $html .='
            <tr>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" colspan="2" align="right">Total</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($start_debit,'2',',','.').'</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($start_credit,'2',',','.').'</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($debit,'2',',','.').'</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($credit,'2',',','.').'</td>
                <td style="border-right:0.5px solid black; border-top:0.5px solid black;" align="right">'.number_format($end_debit,'2',',','.').'</td>
                <td style="border-top:0.5px solid black;" align="right">'.number_format($end_credit,'2',',','.').'</td>
            </tr>
        </table>';

        // $pdf->Header();
        $pdf->writeHTML($html, true, false, true, false);
        // $pdf->Footer();
        $pdf->Output("assets/file/cetak_neraca_saldo.pdf", "F");
        $return["success"] = TRUE;

        echo json_encode($return);
    }
    function excel(){

        $this->data_respon['data'] = $this->neraca_saldo($_POST);

            $this->load->view('akuntansi/akuntansi/laporan_keuangan/v_print_neraca_saldo', $this->data_respon);             
    }

    function kode_rekening(){
        $coa=isset($_POST['q']) ? $_POST['q'] : '';

            $headers  = [
                'Content-Type: text/plain'
            ];

            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, 'http://36.92.178.100/ws_wavamedika/public/coa_master/search/'.$coa);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $buffer = curl_exec($curl_handle);


        if (curl_errno($curl_handle)) {
            $error_msg = curl_error($curl_handle);
        }
        curl_close($curl_handle);

        if (isset($error_msg)) {
         var_dump($error_msg);
         exit();
        }


        $result=json_decode($buffer);
        echo json_encode($result->list);
       

    }

    function neraca_saldo($param){

            $headers  = [
                        'Content-Type: text/plain'
                    ];
            $postData = [
                       'start_date' => date('Y-m-d',strtotime($param['tgl1'])),
                        'end_date' => date('Y-m-d',strtotime($param['tgl2'])),
                        'start_coa_code' => $param['coa1'],
                        'end_coa_code' => $param['coa2'],
                         ];

            // Alternative JSON version
            // $url = 'http://twitter.com/statuses/update.json';
            // Set up and execute the curl process
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, 'http://36.92.178.100/ws_wavamedika/public/trial_balance');
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, json_encode($postData));           
             
            // Optional, delete this line if your API is open
            $buffer = curl_exec($curl_handle);


            if (curl_errno($curl_handle)) {
                $error_msg = curl_error($curl_handle);
            }
            curl_close($curl_handle);

            if (isset($error_msg)) {
                    var_dump($error_msg);
                    exit(); 
             
            }


        $result=json_decode($buffer);
        
             
        $data['rows'] = $result->list;
        $data['coa1']=$this->cari_kode_rekening($param['coa1']);
        $data['coa2']=$this->cari_kode_rekening($param['coa2']);


         return $data;
       
    }



     function cari_kode_rekening($param){
            $coa=$param;

            $headers  = [
                'Content-Type: text/plain'
            ];

            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, 'http://36.92.178.100/ws_wavamedika/public/coa_master/search/'.$coa);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $buffer = curl_exec($curl_handle);


        if (curl_errno($curl_handle)) {
            $error_msg = curl_error($curl_handle);
        }
        curl_close($curl_handle);

        if (isset($error_msg)) {
         var_dump($error_msg);
         exit();
        }


        $result=json_decode($buffer);
        
        return '('.$result->list[0]->coa_code.') '.$result->list[0]->coa_name;
       

    }

   
}