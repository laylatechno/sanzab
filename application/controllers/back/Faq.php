<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Faq_model');
    $this->load->model('Konfigurasi_model');
    $this->simple_login->cek_login_back();
	}


    public function index()
  {
    $faq = $this->Faq_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Faq',
                  'faq' => $faq,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/faq/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


public function tambah()
  {
    $faq = $this->Faq_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $valid = $this->form_validation;
      $valid->set_rules('pertanyaan','Pertanyaan','required',
      array('required' => '%s harus diisi'));
      if($valid->run()===FALSE){
      $data = array('title' => 'Data Faq',
                  'faq' => $faq,
                'konfigurasi' => $konfigurasi,
                 'isi' => 'back/faq/tambah'
        );
    $this->load->view('back/layout/wrapper', $data, FALSE);
    }else{
    $i = $this->input;
    $data = array('pertanyaan' => $i->post('pertanyaan'), 
                  ' jawaban' => $i->post('jawaban'),
                  ' urutan' => $i->post('urutan'),
                  
                  
                    );
      $this->Faq_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
      redirect(base_url('back/faq'),'refresh');
    }
  
    $data = array('title' => 'Data faq',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/faq/tambah'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

}
 

 public function edit($id_faq)
  {
   
   $faq=$this->Faq_model->detail($id_faq);
   $konfigurasi = $this->Konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('pertanyaan','Nama Faq','required',
      array('required' => '%s harus diisi'));
 

    if($valid->run()===FALSE){
    $data = array('title' => 'Edit Pengguna',
                  'faq' => $faq,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/faq/edit'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $i = $this->input;
      $data = array('id_faq' => $id_faq,
                    'pertanyaan' => $i->post('pertanyaan'), 
                  ' jawaban' => $i->post('jawaban'),
                  
                  ' urutan' => $i->post('urutan'),
                    );
      $this->Faq_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/faq'),'refresh');
    }
  }
 
  public function delete($id_faq)
  {
     $data = array('id_faq' => $id_faq);
     $this->Faq_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/faq'),'refresh');

  }
 


}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */