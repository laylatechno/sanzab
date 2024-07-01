<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
 
	}

	public function index()
	{
      $konfigurasi = $this->Konfigurasi_model->listing();
	  $slide = $this->Slide_model->listing();
	  $galeri = $this->Galeri_model->listing();
  $galeri_footer = $this->Galeri_model->listing_footer();

 	    
      $data = array('title'		=> 'Tentang Baznas',  
					  'konfigurasi' 	=> $konfigurasi,
					  'slide' 	=> $slide,
					  'galeri' 	=> $galeri,
					  'galeri_footer' => $galeri_footer,
                	     
                    'isi'				=> 'tentang/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


  

	

}
