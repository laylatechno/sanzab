<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
 
	}

	public function index()
	{
      $konfigurasi = $this->Konfigurasi_model->listing();
	  $slide = $this->Slide_model->listing();
	  $galeri = $this->Galeri_model->listing();
	  $team = $this->Team_model->listing();
	   $galeri_footer = $this->Galeri_model->listing_footer();
 

 	    
      $data = array('title'		=> 'Staff Baznas Kota Tasik',  
					  'konfigurasi' 	=> $konfigurasi,
					  'slide' 	=> $slide,
					   'galeri_footer' => $galeri_footer,
					  'team' 	=> $team,
					  'galeri' 	=> $galeri,
                    'isi'				=> 'team/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


  

	

}
