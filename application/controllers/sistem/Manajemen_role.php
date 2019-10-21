<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_role extends CI_Controller {

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
        // $user = $this->User_model->get_user();
        // $this->data_respon['data'] = $user;
    	$this->load->view('sistem/v_manajemen_user', $this->data_respon);
    }

    public function daftar_user_old()
    {
        $user = $this->User_model->daftar_user_old();
        // helper_dd($user);
		echo json_encode($user);
    }

    public function daftar_role()
    {
        $page = !is_null($this->input->post('page')) ? $this->input->post('page') : 1;
    	$rows = !is_null($this->input->post('rows')) ? $this->input->post('rows') : 10;
    	$offset = ($page - 1) * $rows;

        $result = $this->User_model->daftar_user($offset, $rows);

		echo json_encode($result);
    }

    public function tambah_role()
    {
        $input['nama_depan'] = ucwords(strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $this->input->post('nama_depan'))));
        $input['nama_belakang'] = ucwords(strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $this->input->post('nama_belakang'))));
        $input['username'] = $this->input->post('username');
        $input['email'] = $this->input->post('email');
        $input['nomor_hp'] = $this->input->post('nomor_hp');

        $input['nama'] = $input['nama_depan'].' '.$input['nama_belakang'];
        $input['ip_address'] = $this->input->ip_address();
        $input['password'] = md5('rahasia');

        $result = $this->User_model->tambah_user($input);

        if ($result) {
            $input['id'] = $result;
            unset(
                $input['nama'],
                $input['ip_address'],
                $input['password'],
                $input['created_on']
            );
        }

        echo json_encode($input);
    }

    public function ubah_role()
    {
        $id = $this->input->post('id');
        $update['nama_depan'] = ucwords(strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $this->input->post('nama_depan'))));
        $update['nama_belakang'] = ucwords(strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $this->input->post('nama_belakang'))));
        $update['username'] = $this->input->post('username');
        $update['email'] = $this->input->post('email');
        $update['nomor_hp'] = $this->input->post('nomor_hp');

        $update['nama'] = $update['nama_depan'].' '.$update['nama_belakang'];
        $update['ip_address'] = $this->input->ip_address();

        $where['id'] = $id;
        $result = $this->User_model->ubah_user($update, $where);

        if ($result) {
            $update['id'] = $id;
            unset(
                $update['nama'],
                $update['ip_address']
            );
        }

        echo json_encode($update);
    }

    public function hapus_role()
    {
        $id = $this->input->post('id');

        $where['id'] = $id;
        $result = $this->User_model->hapus_user($where);

        $status['success'] = false;
        if ($result) {
            $status['success'] = true;
        }

        echo json_encode($status);
    }
}
