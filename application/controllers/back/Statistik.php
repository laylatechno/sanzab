<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Statistik_model');
    $this->load->model('Konfigurasi_model');
    $this->simple_login->cek_login_back();
	}


    public function index()
  {
    $statistik = $this->Statistik_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();

    $data = array('title' => 'Data statistik',
                  'statistik' => $statistik,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/statistik/list'
  );
     $this->load->view('back/layout/wrapper', $data, FALSE);

  }


public function tambah()
  {
    $statistik = $this->Statistik_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $valid = $this->form_validation;
  
    $valid->set_rules('urutan', 'Urutan', 'required|is_unique[statistik.urutan]',
        array('is_unique' => '%s sudah ada' ));


      if($valid->run()===FALSE){
      $data = array('title' => 'Data Statistik',
                  'statistik' => $statistik,
                'konfigurasi' => $konfigurasi,
                 'isi' => 'back/statistik/tambah'
        );
    $this->load->view('back/layout/wrapper', $data, FALSE);
    }else{
    $i = $this->input;
 
     $data = array('nama' => html_escape($i->post('nama')), 
                  ' isi' => html_escape($i->post('isi')),
                  ' satuan' => html_escape($i->post('satuan')),
                  ' icon' => html_escape($i->post('icon')),
                  ' urutan' => html_escape($i->post('urutan')),
                  ' tanggal_input' => date('Y-m-d H:i:s'),
                  ' pengguna' => html_escape($this->session->userdata('nama')),
                    );
      $this->Statistik_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
      redirect(base_url('back/statistik'),'refresh');
    }
  
    $data = array('title' => 'Data statistik',
                   'konfigurasi' => $konfigurasi,
                   'isi' => 'back/statistik/tambah'
                 );
    $this->load->view('back/layout/wrapper', $data, FALSE);

}
 

 public function edit($id_statistik)
  {
   
   $statistik=$this->Statistik_model->detail($id_statistik);
   $konfigurasi = $this->Konfigurasi_model->listing();

    $valid = $this->form_validation;
     $valid->set_rules('nama', 'Nama', 'required',
        array('required' => '%s jangan kosong' ));
 

    if($valid->run()===FALSE){
    $data = array('title' => 'Edit Statistik',
                  'statistik' => $statistik,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'back/statistik/edit'
  );
    $this->load->view('back/layout/wrapper', $data, FALSE);
  }else{
    $i = $this->input;
      $data = array('id_statistik' => html_escape($id_statistik),
                  ' nama' => html_escape($i->post('nama')),
                  ' satuan' => html_escape($i->post('satuan')),
                  ' isi' => html_escape($i->post('isi')),
                  ' icon' => html_escape($i->post('icon')),
                  ' urutan' => html_escape($i->post('urutan')), 
                  ' pengguna' => html_escape($this->session->userdata('nama')),
                    );
      $this->Statistik_model->edit($data);
      $this->session->set_flashdata('pesan', 'Data berhasil diperbaharui');
      redirect(base_url('back/statistik'),'refresh');
    }
  }
 
  public function delete($id_statistik)
  {
     $data = array('id_statistik' => $id_statistik);
     $this->Statistik_model->delete($data);
     $this->session->set_flashdata('pesan', 'Data berhasil dihapus');  
     redirect(base_url('back/statistik'),'refresh');

  }
 


}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */