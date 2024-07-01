<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Layanan_model');
    $this->load->model('Konfigurasi_model');
    $this->simple_login->cek_login_back();
	}


    public function index()
  {
    $layanan = $this->Layanan_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data layanan',
                  'layanan' => $layanan,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/layanan/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


public function tambah()
  {
    $layanan = $this->Layanan_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $valid = $this->form_validation;
  
    $valid->set_rules('urutan', 'Urutan', 'required|is_unique[layanan.urutan]',
        array('is_unique' => '%s sudah ada' ));


      if($valid->run()===FALSE){
      $data = array('title' => 'Data Layanan',
                  'layanan' => $layanan,
                'konfigurasi' => $konfigurasi,
                 'isi' => 'back/layanan/tambah'
        );
    $this->load->view('back/layout/wrapper', $data, FALSE);
    }else{
    $i = $this->input;
 
     $data = array('nama' => html_escape($i->post('nama')), 
                  ' isi' => html_escape($i->post('isi')),
                  ' icon' => html_escape($i->post('icon')),
                  ' urutan' => html_escape($i->post('urutan')),
                  ' tanggal_input' => date('Y-m-d H:i:s'),
                  ' pengguna' => html_escape($this->session->userdata('nama')),
                    );
      $this->Layanan_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
      redirect(base_url('back/layanan'),'refresh');
    }
  
    $data = array('title' => 'Data layanan',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/layanan/tambah'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

}
 

 public function edit($id_layanan)
  {
   
   $layanan=$this->Layanan_model->detail($id_layanan);
   $konfigurasi = $this->Konfigurasi_model->listing();

    $valid = $this->form_validation;
     $valid->set_rules('nama', 'Nama', 'required',
        array('required' => '%s jangan kosong' ));
 

    if($valid->run()===FALSE){
    $data = array('title' => 'Edit Layanan',
                  'layanan' => $layanan,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/layanan/edit'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $i = $this->input;
      $data = array('id_layanan' => html_escape($id_layanan),
                  ' nama' => html_escape($i->post('nama')),
                  ' isi' => html_escape($i->post('isi')),
                  ' icon' => html_escape($i->post('icon')),
                  ' urutan' => html_escape($i->post('urutan')), 
                  ' pengguna' => html_escape($this->session->userdata('nama')),
                    );
      $this->Layanan_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/layanan'),'refresh');
    }
  }
 
  public function delete($id_layanan)
  {
     $data = array('id_layanan' => $id_layanan);
     $this->Layanan_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/layanan'),'refresh');

  }
 


}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */