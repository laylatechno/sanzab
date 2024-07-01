<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Download_model');
    $this->load->model('Konfigurasi_model');
    $this->simple_login->cek_login_back();
	}


    public function index()
  {
    $download = $this->Download_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data download',
                  'download' => $download,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/download/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


public function tambah()
  {
    $download = $this->Download_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $valid = $this->form_validation;
      $valid->set_rules('nama','Nama Lengkap','required',
      array('required' => '%s harus diisi'));
      if($valid->run()===FALSE){
      $data = array('title' => 'Data Download',
                  'download' => $download,
                'konfigurasi' => $konfigurasi,
                 'isi' => 'back/download/tambah'
        );
    $this->load->view('back/layout/wrapper', $data, FALSE);
    }else{
    $i = $this->input;
    $data = array('nama' => $i->post('nama'), 
                  ' deskripsi' => $i->post('deskripsi'),
                  ' link' => $i->post('link'),
                  ' urutan' => $i->post('urutan'),
                  ' tanggal_input' => date('Y-m-d H:i:s'),
                  ' pengguna' => $this->session->userdata('nama'),
                  
                    );
      $this->Download_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
      redirect(base_url('back/download'),'refresh');
    }
  
    $data = array('title' => 'Data download',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/download/tambah'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

}
 

 public function edit($id_download)
  {
   
   $download=$this->Download_model->detail($id_download);
   $konfigurasi = $this->Konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('nama','Nama Download','required',
      array('required' => '%s harus diisi'));
 

    if($valid->run()===FALSE){
    $data = array('title' => 'Edit Pengguna',
                  'download' => $download,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/download/edit'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $i = $this->input;
      $data = array('id_download' => $id_download,
                    'nama' => $i->post('nama'), 
                  ' deskripsi' => $i->post('deskripsi'),
                  ' link' => $i->post('link'),
                  ' urutan' => $i->post('urutan'),
                  ' pengguna' => $this->session->userdata('nama'),
                    );
      $this->Download_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/download'),'refresh');
    }
  }
 
  public function delete($id_download)
  {
     $data = array('id_download' => $id_download);
     $this->Download_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/download'),'refresh');

  }
 


}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */