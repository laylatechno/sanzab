<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
 {
  protected $CI;
  public function __construct()
  {
   $this->CI =& get_instance();
  }
 
  public function cek_login_back()
  {
  	if($this->CI->session->userdata('email')=="")
    {
  		$this->CI->session->set_flashdata('warning','<div class="alert alert-danger">Upps.. Anda Belum Login !</div>');
  		redirect(base_url('auth'),'refresh');
  	}
  }

      public function cek_login_pelanggan()
  {
    if($this->CI->session->userdata('email')=="")
    {
      $this->CI->session->set_flashdata('warning','<div class="alert alert-danger">Anda Belum Login </div>');
      redirect(base_url('login_pelanggan'),'refresh');
    }

  }

  public function logout()
  {
      $this->CI->session->unset_userdata('id_pelanggan');
      $this->CI->session->unset_userdata('nama');
      $this->CI->session->unset_userdata('email');
       
 }



 


}
