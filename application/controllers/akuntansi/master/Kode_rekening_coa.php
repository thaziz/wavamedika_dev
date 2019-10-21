<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode_rekening_coa extends CI_Controller {

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
    	$this->load->view('akuntansi/master/v_kode_rekening_coa', $this->data_respon);
    }

    public function api_daftar_kode_rekening_coa()
    {
        $API_KODE_REKENING_COA = "http://36.92.178.100/ws_wavamedika/public/coa_master/search/";

		$result = json_decode($this->curl->simple_get($API_KODE_REKENING_COA), true);

        $daftar_kode_rekening_coa = [];
        foreach ($result['list'] as $kode_rekening_coa) {
            $daftar_kode_rekening_coa[] = (object) [
                'coa_id' => $kode_rekening_coa['coa_id'],
                'coa_code' => $kode_rekening_coa['coa_code'],
                'coa_name' => $kode_rekening_coa['coa_name'],
                'coa' => $kode_rekening_coa['coa']
            ];
        }
        
        echo json_encode($daftar_kode_rekening_coa);
    }
}
