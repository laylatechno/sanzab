<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
 
	}

	public function index()
	{
      $konfigurasi = $this->Konfigurasi_model->listing();
	  $slide = $this->Slide_model->listing();
      $galeri = $this->Galeri_model->listing();
      $agenda = $this->Agenda_model->listing();
      $galeri_footer = $this->Galeri_model->listing_footer();
 

 	    
      $data = array('title'		=> 'Agenda Baznas',  
					  'konfigurasi' 	=> $konfigurasi,
					  'slide' 	=> $slide,
                      'galeri' 	=> $galeri,
                      'galeri_footer' => $galeri_footer,
                      'agenda' 	=> $agenda,
                	     
                    'isi'				=> 'agenda/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function detail($nama)
  {
    $konfigurasi = $this->Konfigurasi_model->listing();
    $agenda = $this->Agenda_model->read($nama);
    
 
     
    $galeri = $this->Galeri_model->listing();


    $data = array('title' => 'Program Baznas',
             
            'konfigurasi' => $konfigurasi,
             
            'galeri' => $galeri,
            'agenda' => $agenda,  
            'isi'  => 'agenda/detail'
        );
    $this->load->view('layout/wrapper', $data, FALSE);
  }




  

	

}
