<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kontak_model');
    $this->load->model('Konfigurasi_model');
   $this->simple_login->cek_login_back();
    
     
  }


    public function index()
  {
    
    $kontak = $this->Kontak_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Kontak',
                  'kontak' => $kontak,
                  'total_kontak' => $this->Kontak_model->total_rows(),
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/kontak/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }
  public function delete($id_kontak)
  {
     $data = array('id_kontak' => $id_kontak);
     $this->Kontak_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/kontak'),'refresh');

  }


 public function detail($id_kontak)
  {
   
   $kontak=$this->Kontak_model->detail($id_kontak);
   $konfigurasi = $this->Konfigurasi_model->listing();

       
    $data = array('title' => 'Cetak Pengirim Informasi',
                  'kontak' => $kontak,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/kontak/detail'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
 
      
  }

  public function cetak()
  {
   
    $kontak = $this->Kontak_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Kontak',
                  'kontak' => $kontak,
               
                  'konfigurasi' => $konfigurasi,
                  
  );
     $this->load->view('back/kontak/cetak', $data, FALSE);
  }

 

   public function cetak_detail($id_kontak)
  {
   
    $kontak=$this->Kontak_model->detail($id_kontak);
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Kontak',
                  'kontak' => $kontak,
               
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/kontak/detail',
                  
  );
     $this->load->view('back/kontak/cetak_detail', $data, FALSE);
  }


  public function get_tot()
  {
        $total_kontak = $this->Kontak_model->total_rows();
        $result['tot'] = $tot;
        $result['msg'] = "Berhasil direfresh secara realtime";
        echo json_encode($result);
  }

 

 



}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */