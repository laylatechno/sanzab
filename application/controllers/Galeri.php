<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	$this->load->model('Konfigurasi_model');
    $this->load->model('Galeri_model'); 
 
	}

	public function index()
	{
      $konfigurasi = $this->Konfigurasi_model->listing();
      $galeri = $this->Galeri_model->listing();
        $galeri_footer = $this->Galeri_model->listing_footer();
 	    
      $data = array('title'		=> 'Galeri Kami',  
                	'konfigurasi' 	=> $konfigurasi,
                    'galeri'   => $galeri, 
                         'galeri_footer' => $galeri_footer,
                    'isi'				=> 'galeri/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


  

	

}
