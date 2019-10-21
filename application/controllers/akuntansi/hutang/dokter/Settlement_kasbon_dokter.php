<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settlement_kasbon_dokter extends CI_Controller {

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
    	$this->load->view('akuntansi/hutang/dokter/v_settlement_kasbon_dokter', $this->data_respon);
    }
}
