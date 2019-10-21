<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal_memorial_model extends CI_Model {
  public function view(){
    return $this->db->get('siswa')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); 
    $config['upload_path'] = './excel/';

    $config['allowed_types'] = 'xls';

    $config['max_size'] = '2048';

    $config['overwrite'] = true;

    $config['file_name'] = $filename.' '.date('d-m-Y his');

  

    $this->upload->initialize($config); // Load konfigurasi uploadnya

    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  
}