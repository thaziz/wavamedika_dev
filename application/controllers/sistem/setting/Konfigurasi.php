<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

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
        $user = $this->User_model->get_user();
        $this->data_respon['data'] = $user;
    	$this->load->view('sistem/setting/v_konfigurasi', $this->data_respon);
    }

    public function daftar_user()
    {
        $user = $this->User_model->daftar_user();
        // helper_dd($user);
		echo json_encode($user);
    }
}
