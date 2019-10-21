<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_alokasi_biaya extends CI_Controller {

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
    	$this->load->view('akuntansi/master/v_template_alokasi_biaya', $this->data_respon);
    }

    public function api_daftar_cost_center()
    {
        $API_COST_CENTER = "http://36.92.178.100/ws_wavamedika/public/cc_master/search/";

		$result = json_decode($this->curl->simple_get($API_COST_CENTER), true);

        $daftar_cost_center = [];
        foreach ($result['list'] as $cost_center) {
            $daftar_cost_center[] = (object) [
                'cc_id' => $cost_center['cc_id'],
                'cc_name' => $cost_center['cc_name'],
            ];
        }

        echo json_encode($daftar_cost_center);
    }
}
