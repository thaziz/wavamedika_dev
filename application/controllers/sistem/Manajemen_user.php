<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_user extends CI_Controller {

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

    public function daftar_user()
    {
        $page = !is_null($this->input->post('page')) ? $this->input->post('page') : 1;
    	$rows = !is_null($this->input->post('rows')) ? $this->input->post('rows') : 10;
    	$offset = ($page - 1) * $rows;

        $result = $this->User_model->daftar_user($offset, $rows);

		echo json_encode($result);
    }

    public function tambah_user()
    {
        $input['first_name'] = $this->input->post('first_name');
        $input['last_name'] = $this->input->post('last_name');
        $input['phone'] = $this->input->post('phone');
        $input['email'] = $this->input->post('email');
        $input['password'] = md5('rahasia');
        $input['created_on'] = strtotime(date('Y-m-d H:i:s'));

        $result = $this->User_model->tambah_user($input);

        if ($result) {
            $input['id'] = $result;
            unset($input['password'], $input['created_on']);
        }

        echo json_encode($input);
    }

    public function ubah_user()
    {
        $id = $this->input->post('id');
        $input['first_name'] = $this->input->post('first_name');
        $input['last_name'] = $this->input->post('last_name');
        $input['phone'] = $this->input->post('phone');
        $input['email'] = $this->input->post('email');

        $result = $this->User_model->ubah_user($input, $id);

        if ($result) {
            $input['id'] = $result;
            unset($input['password'], $input['created_on']);
        }

        echo json_encode($input);
    }

    public function hapus_user()
    {
        $id = $this->input->post('id');

        $result = $this->User_model->hapus_user($id);

        $status['success'] = false;
        if ($result) {
            $status['success'] = true;
        }

        echo json_encode($status);
    }
}
