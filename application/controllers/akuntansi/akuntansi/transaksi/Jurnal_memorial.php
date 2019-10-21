<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_memorial extends CI_Controller {

    private $filename = "template";  
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
    	$this->load->view('akuntansi/akuntansi/transaksi/v_jurnal_memorial', $this->data_respon);
    }

    public function form(){
    $data = array(); // Buat variabel $data sebagai array
    

    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
        
      $upload = $this->Jurnal_memorial_model->upload_file($this->filename);
      /*var_dump($_POST);
      exit();*/
      if($upload['result'] == "success"){

        include APPPATH.'third_party\PHPExcel\PHPExcel.php';

        /*$excelreader = new PHPExcel_Reader_Excel2007();*/
        $excelreader = new PHPExcel_Reader_Excel5();
        
        $loadexcel = $excelreader->load('excel/'.$upload['file']['file_name']); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
        $dat=[];
        $debit=0;
        $kredit=0;
        $pages_array=[];
        foreach ($data['sheet'] as $key => $v) {
            if($key!=1){
                    $dat[$key]['Kode']=$v['A'];

                    $dat[$key]['Cost']=$v['B'];

                    $dat[$key]['Des']=$v['C'];

                    $dat[$key]['Debit']=$v['D'];

                    $dat[$key]['Kredit']=$v['E'];

                    $debit+=$v['D'];
                    $kredit+=$v['E'];
                     $pages_array[] = (object) array('A' => $v['A'],
                                                     'B' => $v['B'],
                                                     'C' => $v['C'],
                                                     'D' => $v['D'],
                                                     'E' => $v['E'],
                                                    );
            }
        }
            $status=true;
        if($debit != $kredit){        
            $status=false;
        }
        $res['total']=count($dat);
        $res['rows']=$pages_array;
        $res['status']=$status;
        $res['debit']=$debit;
        $res['kredit']=$kredit;
        
        echo json_encode($res);


    }
}
