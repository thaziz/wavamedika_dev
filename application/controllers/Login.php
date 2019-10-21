<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
		$this->load->view('login/v_login');
	}

	public function validasi()
    {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$data_validasi = $this->User_model->login($username, $password);
		if ($data_validasi) {
            // helper_dd($data_validasi);
			$this->session->set_userdata('username', $data_validasi[0]->username);
			redirect('admin');
		} else {
			$this->session->set_flashdata('notifikasi', '<div id="notifikasi">NAMA PENGGUNA DAN KATA SANDI TIDAK COCOK. SILAKAN ULANGI LAGI</div>');
			redirect('login');
		}
	}
}
