<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
	
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('password'); 
		$konfigurasi = $this->Konfigurasi_model->listing(); //**(b)**
		$data = array('konfigurasi' => $konfigurasi);
		$data['title'] =  'Halaman Login';
		$this->load->view('back/layout_login/auth_header', $data, FALSE);
		$this->load->view('back/layout_login/list');
		$this->load->view('back/layout_login/auth_footer');

	}

	public function reset()
	{

	$konfigurasi = $this->Konfigurasi_model->listing();
    $valid = $this->form_validation;
    $valid->set_rules('email','Email','required',
      array('required' => '%s harus diisi'));

   
    if($valid->run()===FALSE){
    $data = array('konfigurasi' => $konfigurasi);
		$data['title'] =  'Halaman Login';
		$this->load->view('back/layout_login/auth_header', $data, FALSE);
		$this->load->view('back/layout_login/list');
		$this->load->view('back/layout_login/auth_footer');
  }else{
    $i = $this->input;
   
    $data = array(  ' email' => $i->post('email'),
                  	'password' =>  $i->post('password'),
                    ' tanggal_kirim' => date('Y-m-d H:i:s')
                    );
      $this->Pengguna_model->reset($data);
      $this->session->set_flashdata('pesan', 'Data berhasil dikirim');
      redirect(base_url('auth'),'refresh');
    }
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */