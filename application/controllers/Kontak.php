<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	  
 
	}

	public function index()
	{
      $konfigurasi = $this->Konfigurasi_model->listing(); 
      $galeri = $this->Galeri_model->listing();
 $galeri_footer = $this->Galeri_model->listing_footer();
      $kontak = $this->Kontak_model->listing();
 	    
      $data = array('title'		=> 'Kontak Kami',  
                	'konfigurasi' 	=> $konfigurasi,  
                	     'galeri_footer' => $galeri_footer,
                  'kontak'   => $kontak, 
                  'galeri' => $galeri,
                  'isi'				=> 'kontak/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


  public function tambah()
  {
    $kontak = $this->Kontak_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
     $galeri_footer = $this->Galeri_model->listing_footer();

      $galeri = $this->Galeri_model->listing();
     $valid = $this->form_validation;
      $valid->set_rules('nama','Nama Lengkap','required',
      array('required' => '%s harus diisi'));
      if($valid->run()===FALSE){
      $data = array('title'   => 'Kontak Kami',  
                  'konfigurasi'   => $konfigurasi,
                    'kontak'   => $kontak, 
                    'galeri' => $galeri,
                    'isi'       => 'kontak/list'
            );
    $this->load->view('layout/wrapper', $data, FALSE);
    }else{
    $i = $this->input;
    $data = array('nama' => html_escape($i->post('nama')), 
                  ' email' => html_escape($i->post('email')),
                  ' subjek' => html_escape($i->post('subjek')),
                  ' no_telp' => html_escape($i->post('no_telp')),
                  ' isi' => html_escape($i->post('isi')),
                  ' tanggal_kirim' => date("Y-m-d H:i:s")
                                    
                    );
      $this->Kontak_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Data berhasil dikirim dan akan segera kami respon. Terima kasih');
      redirect(base_url('kontak'),'refresh');
    }
  
    $data = array('title'   => 'Kontak Kami',  
                  'konfigurasi'   => $konfigurasi,
                    'kontak'   => $kontak, 
                     'galeri_footer' => $galeri_footer,
                     'galeri' => $galeri,
                    'isi'       => 'kontak/list'
            );
    $this->load->view('layout/wrapper', $data, FALSE);

}


  

	

}
