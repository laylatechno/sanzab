<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Bayar_model');
    $this->load->model('Konfigurasi_model');
   $this->simple_login->cek_login_back();
    
     
  }


    public function index()
  {
    
    $bayar = $this->Bayar_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Bayar',
                  'bayar' => $bayar,
                  
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/bayar/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }
  public function delete($id_bayar)
  {
     $data = array('id_bayar' => $id_bayar);
     $this->Bayar_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/bayar'),'refresh');

  }


 public function detail($id_bayar)
  {
   
   $bayar=$this->Bayar_model->detail($id_bayar);
   $konfigurasi = $this->Konfigurasi_model->listing();

       
    $data = array('title' => 'Cetak Pengirim Informasi',
                  'bayar' => $bayar,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/bayar/detail'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
 
      
  }

  public function cetak()
  {
   
    $bayar = $this->Bayar_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Bayar',
                  'bayar' => $bayar,
               
                  'konfigurasi' => $konfigurasi,
                  
  );
     $this->load->view('back/bayar/cetak', $data, FALSE);
  }

 

   public function cetak_detail($id_bayar)
  {
   
    $bayar=$this->Bayar_model->detail($id_bayar);
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Bayar',
                  'bayar' => $bayar,
               
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/bayar/detail',
                  
  );
     $this->load->view('back/bayar/cetak_detail', $data, FALSE);
  }


  public function get_tot()
  {
        $total_bayar = $this->Bayar_model->total_rows();
        $result['tot'] = $tot;
        $result['msg'] = "Berhasil direfresh secara realtime";
        echo json_encode($result);
  }

 

 



}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */