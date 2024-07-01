<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_berita_model');
    $this->load->model('Konfigurasi_model');
    $this->simple_login->cek_login_back();
	}


    public function index()
  {
    $kategori_berita = $this->Kategori_berita_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data Kategori Berita',
                  'kategori_berita' => $kategori_berita,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/kategori_berita/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


public function tambah()
  {
    $kategori_berita = $this->Kategori_berita_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $valid = $this->form_validation;
      $valid->set_rules('nama_kategori_berita','Nama Lengkap','required',
      array('required' => '%s harus diisi'));
      if($valid->run()===FALSE){
      $data = array('title' => 'Data Kategori Berita',
                  'kategori_berita' => $kategori_berita,
                'konfigurasi' => $konfigurasi,
                 'isi' => 'back/kategori_berita/tambah'
        );
    $this->load->view('back/layout/wrapper', $data, FALSE);
    }else{
    $slug_kategori_berita = url_title($this->input->post('nama_kategori_berita'),'dash',TRUE);
    $i = $this->input;
    $data = array('nama_kategori_berita' => $i->post('nama_kategori_berita'), 
                  'slug_kategori_berita' => $slug_kategori_berita,
                  ' urutan' => $i->post('urutan'),
                  ' tanggal_input' => date('Y-m-d H:i:s'),
                  ' pengguna' => $this->session->userdata('nama'),
                  
                    );
      $this->Kategori_berita_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
      redirect(base_url('back/kategori_berita'),'refresh');
    }
  
    $data = array('title' => 'Data kategori Berita',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/kategori_berita/tambah'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

}
 

 public function edit($id_kategori_berita)
  {
   
   $kategori_berita=$this->Kategori_berita_model->detail($id_kategori_berita);
   $konfigurasi = $this->Konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('nama_kategori_berita','Nama Kategori Berita','required',
      array('required' => '%s harus diisi'));
 

    if($valid->run()===FALSE){
    $data = array('title' => 'Edit Kategori',
                  'kategori_berita' => $kategori_berita,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/kategori_berita/edit'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
     $slug_kategori_berita = url_title($this->input->post('nama_kategori_berita'),'dash',TRUE);
    $i = $this->input;
      $data = array('id_kategori_berita' => $id_kategori_berita,
                    'nama_kategori_berita' => $i->post('nama_kategori_berita'), 
                  'slug_kategori_berita' => $slug_kategori_berita,
                  ' urutan' => $i->post('urutan'),
                  ' pengguna' => $this->session->userdata('nama'),
                    );
      $this->Kategori_berita_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/kategori_berita'),'refresh');
    }
  }
 
  public function delete($id_kategori_berita)
  {
     $data = array('id_kategori_berita' => $id_kategori_berita);
     $this->Kategori_berita_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/kategori_berita'),'refresh');

  }
 


}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */