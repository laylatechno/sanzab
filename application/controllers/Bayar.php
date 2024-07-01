<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Galeri_model');
		$this->load->model('Konfigurasi_model');
		$this->load->model('Bayar_model');
	}

	// Tampilan awal untuk berita
	public function index()
	{ 
		$galeri = $this->Galeri_model->listing();
		$konfigurasi = $this->Konfigurasi_model->listing();
		$bayar = $this->Bayar_model->listing();
		$galeri_footer = $this->Galeri_model->listing_footer();
		 
		  
		$data = array('title' => 'Halaman Konfirmasi Pembayaran',
					  
						'konfigurasi' => $konfigurasi,
						 'galeri'      => $galeri, 
						 'galeri_footer' => $galeri_footer,
						  'bayar'      => $bayar, 
					  'isi'  => 'bayar/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


   public function bayar()
  {
    $galeri = $this->Galeri_model->listing();
    $konfigurasi = $this->Konfigurasi_model->listing();
	$bayar = $this->Bayar_model->listing();
	$galeri_footer = $this->Galeri_model->listing_footer();

    $valid = $this->form_validation;
    $valid->set_rules('nama','Nama','required',
      array('required' => '%s harus diisi'));


    if($valid->run()){
                $config['upload_path']          = './upload/bayar/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
     
    
      $this->load->library('upload', $config);
     
  
      if ( ! $this->upload->do_upload('gambar')){
       
    
     $data = array('title' => 'Data Bayar',
                  'konfigurasi' => $konfigurasi,
                  'bayar'      => $bayar,
                  'galeri'      => $galeri,
                  'galeri_footer' => $galeri_footer,
                  'error' => $this->upload->display_errors(),
                  'isi' => 'bayar/list'
  );
    $this->load->view('layout/wrapper', $data, FALSE);
  }else{
    $upload_data=array('uploads'=>$this->upload->data());


    $config['image_library'] = 'gd2';
    $config['source_image'] = './upload/bayar/'.$upload_data['uploads']['file_name'];
    // gambar versi kecilpindahkan
    $config['new_image']= './upload/bayar/thumbs/'.$upload_data['uploads']['file_name'];
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;
    $config['thumb_marker']='';
   


    $this->load->library('image_lib', $config);


    $this->image_lib->resize();
    $i = $this->input;
   
    $data = array('nama' => html_escape($i->post('nama')),  
                  'bank' =>  html_escape($i->post('bank')),  
                  'no_telp' =>  html_escape($i->post('no_telp')),    
                  'tanggal_konfirmasi' => date('Y-m-d H:i:s'),
                  'gambar' => $upload_data['uploads']['file_name'], 
                
                    );
      $this->Bayar_model->tambah($data);
      $this->session->set_flashdata('pesan', 'Konfirmasi Berhasil, data akan kami verifikasi kembali. Syukron Jazakumulloh Khoir. ');
      redirect(base_url('bayar'),'refresh');
    }
  }
      $data = array('title' => 'Data Bayar',
                   'konfigurasi' => $konfigurasi,
                   'bayar'      => $bayar,
                   'galeri'      => $galeri,
                   'isi' => 'bayar/list'
                 );
    $this->load->view('layout/wrapper', $data, FALSE);

  


}

  
}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */