<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        redirect('beranda');
    }

    public function user()
    {
        $this->load->view('user/v_daftar_user', $this->data_respon);
    }

    public function get_daftar_user()
    {
        $daftar_user = $this->User_model->get_daftar_user();

        return $daftar_user;
        // $this->data_respon['data']['daftar_user'] = $daftar_user;
        //
        // $this->load->view('user/daftar_user', $this->data_respon);
    }

    public function tambah_user()
    {
        $this->load->view('user/v_tambah_user', $this->data_respon);
    }

    public function do_tambah_user()
    {
        $input['first_name'] = $this->input->post('nama_depan');
        $input['last_name'] = $this->input->post('nama_belakang');
        $input['username'] = $this->input->post('username');
        $input['email'] = $this->input->post('email');
        $input['phone'] = $this->input->post('phone');
        // $input['first_name'] = $this->input->post('alamat');
        $input['password'] = $this->input->post('password');
        $input['created_on'] = strtotime(date('Y-m-d H:i:s'));

        $this->User_model->tambah_user($input);

        $this->session->set_flashdata('notifikasi', 'Tambah User Berhasil');
        redirect(base_url('admin/user'));
    }

    public function logout()
    {
    	$this->session->unset_userdata('username');
    	redirect(base_url('login'));
    }
}
